<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        if($search){
            $clients = Client::Where('name', 'like', "%$search%")->get();
        }else{
            $clients = Client::all();
        }

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:3|max:50|regex:/^[a-zA-Z\s]+$/u",
            "phone" => "required|string|min:7|max:20|regex:/^(?=.*\d)[0-9+\-\(\)\s]+$/",
            "address" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
            "job" => "required|string|regex:/^[a-zA-Z\s]+$/u",
            "experience" => "required|numeric",
            "location" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
            "image" => "image|mimes:jpg,jpeg,png,webp|max:2048",
            "cost" => "required|numeric"
        ]);

        $path = null;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('clients_img', 'public');
        }else{
            $path = 'clients_img/img-null.webp';
        }

        Client::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $request->address,
            "job" => $request->job,
            "experience" => $request->experience,
            "location" => $request->location,
            "image" => $path,
            "cost" => $request->cost
        ]);

        return redirect()->back()->with('success', 'A new client has been added successfully.');
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view("clients.show", compact('client'));
        // $client = Client::with($id);
    }

    public function edit(string $id)
    {
        $client = Client::find($id);
        return view("clients.edit", compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $client = Client::find($id);

        $request->validate([
            "name" => "required|string|min:3|max:50",
            "phone" => "required|string|min:7|max:20",
            "address" => "required|string",
            "job" => "required|string",
            "experience" => "required|numeric",
            "location" => "required|string",
            "image" => "image|mimes:jpg,jpeg,png,webp|max:2048",
            "cost" => "required|numeric"
        ]);

        //image
        $path = $client->image;
        if($request->hasFile('image')){
            if($client->image && $client->image != 'clients_img/img-null.webp'){
                Storage::disk('public')->delete($client->image);
            }

            $path = $request->file('image')->store('clients_img', 'public');
            $client->image = $path;

        }

         Client::where('id', '=' , $id)->update([
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $request->address,
            "job" => $request->job,
            "experience" => $request->experience,
            "location" => $request->location,
            "image" => $path,
            "cost" => $request->cost
        ]);

        return redirect()->back()->with('success', 'The client has been updated successfully.');
    }

    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect()->back()->with('success', "The client has been deleted successfully!");
    }
}
