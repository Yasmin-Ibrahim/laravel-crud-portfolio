<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $projects = Project::where('client_id', $search)->get();
        }else{
            $projects = Project::all();
        }
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::select('id', 'name')->get();
        return view('projects.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "client_id" => "required|exists:clients,id",
            "title" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
            "description" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
            "category" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
            "image" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "link" => "required|url",
        ]);

        $path = null;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('clients_img', 'public');
        }

        Project::create([
            "client_id" => $request->client_id,
            "title" => $request->title,
            "description" => $request->description,
            "category" => $request->category,
            "image" =>$path,
            "link" => $request->link,
        ]);

        return redirect()->back()->with('success', 'The Project has been added to Client successfully.');
    }

    public function show(string $id)
    {
        $client = Client::with('projects')->findOrFail($id);
        return view('projects.show', compact('client'));
    }

    public function edit(string $id)
    {
        $projects = Project::find($id);
        $clients = Client::select('id', 'name')->get();
        return view('projects.edit', compact('clients', 'projects'));
    }

    public function update(Request $request, string $id)
    {
        $projects = Project::find($id);

        $request->validate([
            "title" => "string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",

            "category" => "string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
            "image" => "image|mimes:jpg,jpeg,png,webp|max:2048",
            "link" => "url",
        ]);

        $path = $projects->image;
        if($request->hasFile('image')){
            if($path){
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('image')->store('clients_img', 'public');
            $projects->image = $path;
        }

        Project::where("id", "=", $id)->update([
            "client_id" => $request->client_id,
            "title" => $request->title,
            "description" => $request->description,
            "category" => $request->category,
            "image" =>$path,
            "link" => $request->link,
        ]);

        return redirect()->back()->with('success', 'The Project has been Updated to Client successfully.');
    }

    public function destroy(string $id)
    {
        $projects = Project::find($id);
        $projects->delete();

        return redirect()->back()->with('success', 'The Project has been deleted successfully.');
    }
}
