<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Client;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $abouts = About::where('client_id', $search)->get();
        }else{
            $abouts = About::all();
        }
        return view('about.index', compact('abouts'));
    }

    public function create()
    {
        $clients = Client::select('id', 'name')->get();
        return view('about.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "client_id" => "required",
            "content" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s\p{P}]+$/"
        ]);

        About::create([
            "client_id" => $request->client_id,
            "content" => $request->content
        ]);

        return redirect()->back()->with("success", "Added About to the client Successfully!");
    }

    public function edit(string $id)
    {
        $about = About::find($id);
        $clients = Client::select('id', 'name')->get();
        return view('about.edit', compact('about', 'clients'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            "client_id" => "required",
            "content" => "required|string"
        ]);

        About::where('id', '=', $id)->update([
            "client_id" => $request->client_id,
            "content" => $request->content
        ]);

        return redirect()->back()->with("success", "Updated About on the client Successfully!");
    }

    public function destroy(string $id)
    {
        $about = About::find($id);
        $about->delete();

        return redirect()->back()->with('success', 'About of the client has been deleted successfully!');
    }
}
