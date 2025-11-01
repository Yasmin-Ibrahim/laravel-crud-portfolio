<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Client;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $skills = Skill::where('client_id', $search)->get();
        }else{
            $skills = Skill::all();
        }
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        $clients = Client::select('id', 'name')->get();
        return view('skills.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "client_id" => "required|exists:clients,id",
            "type" => "required|string",
            "title" => "required|string|regex:/^[a-zA-Z\s]+$/u",
            "content" => "required|string"
        ]);

        $content = array_map(function($item) {
            return ucwords(trim($item));
        }, explode(',', $request->content));

        Skill::create([
            "client_id" => $request->client_id,
            "type" => $request->type,
            "title" => ucwords($request->title),
            "content" => $content,
        ]);

        return redirect()->back()->with('success', 'The skill has been added successfully!');
    }

    public function show(string $id){
        $client = Client::with('skills')->findOrFail($id);
        return view('skills.show', compact('client'));
    }

    public function edit(string $id)
    {
        $skill = Skill::find($id);
        $clients = Client::select('id', 'name')->get();
        return view('skills.edit', compact('skill', 'clients'));
    }

    public function update(Request $request, string $id){
        $skill = Skill::findOrFail($id);

        $request->validate([
            "client_id" => "required|exists:clients,id",
            "type" => "required|string",
            "title" => "required|string|regex:/^[a-zA-Z\s]+$/u",
            "content" => "required|string"
        ]);

        $content = array_map(function($item) {
            return ucwords(trim($item));
        }, explode(',', $request->content));

        $skill->update([
            "client_id" => $request->client_id,
            "type" => $request->type,
            "title" => ucwords($request->title),
            "content" => $content,
        ]);

        return redirect()->back()->with('success', 'The Skill has been updated successfully.');
    }

    public function destroy(string $id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->back()->with('success', "The skill has been deleted successfully!");
    }
}
