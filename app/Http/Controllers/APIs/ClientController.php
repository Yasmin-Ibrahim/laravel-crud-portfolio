<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Client;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class ClientController extends Controller
{

    // public function index(Request $request){
    //     $clients = Client::all();

    //     if($clients->isEmpty()){
    //         return response()->json([
    //             "status" => 404,
    //             "message" => "Not Found The Clients"
    //             ], 404);
    //     }
    //     return response()->json([
    //         "status" => 200,
    //         "message" => "Data fetched successfully",
    //         "data" => $clients
    //         ], 200);

    // }

    // public function store(Request $request){
    //     $request->validate([
    //         "name" => "required|string|min:3|max:50|regex:/^[a-zA-Z\s]+$/u",
    //         "phone" => "required|string|min:7|max:20|regex:/^[0-9+\-\(\)\s]+$/",
    //         "address" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
    //         "job" => "required|string|regex:/^[a-zA-Z\s]+$/u",
    //         "experience" => "required|numeric",
    //         "location" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
    //         "image" => "image|mimes:jpg,jpeg,png,webp|max:2048",
    //         "cost" => "required|numeric"
    //     ]);

    //     $path = null;
    //     if($request->hasFile('image')){
    //         $path = $request->file('image')->store('clients_img', 'public');
    //     }else{
    //         $path = 'clients_img/img-null.webp';
    //     }

    //     $client = Client::create([
    //                     "name" => $request->name,
    //                     "phone" => $request->phone,
    //                     "address" => $request->address,
    //                     "job" => $request->job,
    //                     "experience" => $request->experience,
    //                     "location" => $request->location,
    //                     "image" => $path,
    //                     "cost" => $request->cost
    //                 ]);

    //         $response = [
    //             "status" => 201,
    //             "message" => "Created The Client successfully",
    //             "data" => $client
    //         ];

    //         return response()->json($response, 201);
    // }

    public function show($id)
    {
        $client = Client::with(['about', 'contact', 'projects', 'skills'])->find($id);

        if(!$client)
        {
            return response()->json([
                "status" => 404,
                "message" => "Not Found This Client"
                ], 404);

        }

        return response()->json([
            "status" => 200,
            "message" => "We Found This Client successfully",
            "data" => $client
            ], 200);
    }

    // public function update(Request $request, string $id)
    // {
    //     $client = Client::find($id);

    //     if (!$client) {
    //         return response()->json([
    //             "status" => 404,
    //             "message" => "Client Not Found"
    //         ], 404);
    //     }

    //          $request->validate([
    //         "name" => "required|string|min:3|max:50|regex:/^[a-zA-Z\s]+$/u",
    //         "phone" => "required|string|min:7|max:20|regex:/^[0-9+\-\(\)\s]+$/",
    //         "address" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
    //         "job" => "required|string|regex:/^[a-zA-Z\s]+$/u",
    //         "experience" => "required|numeric",
    //         "location" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s,.-]+$/",
    //         "image" => "image|mimes:jpg,jpeg,png,webp|max:2048",
    //         "cost" => "required|numeric"
    //     ]);

    //     //image
    //     $path = $client->image;
    //     if($request->hasFile('image')){
    //         if($client->image && $client->image != 'clients_img/img-null.webp'){
    //             Storage::disk('public')->delete($client->image);
    //         }

    //         $path = $request->file('image')->store('clients_img', 'public');
    //     }

    //     $client->update([
    //         "name" => $request->name,
    //         "phone" => $request->phone,
    //         "address" => $request->address,
    //         "job" => $request->job,
    //         "experience" => $request->experience,
    //         "location" => $request->location,
    //         "image" => $path,
    //         "cost" => $request->cost
    //     ]);

    //     $response = [
    //             "status" => 200,
    //             "data" => $client,
    //             "message" => "Updated This Client successfully"
    //         ];

    //         return response()->json($response, 200);
    // }

    // public function destroy(string $id)
    // {
    //     $client = Client::find($id);

    //     if (!$client) {
    //         return response()->json([
    //             "status" => 404,
    //             "message" => "Client Not Found"
    //         ], 404);
    //     }

    //     if ($client->image && $client->image != 'clients_img/img-null.webp') {
    //     Storage::disk('public')->delete($client->image);
    //     }

    //     return response()->json([
    //             "status" => 200,
    //             "data" => $client,
    //             "message" => "deleted This Client successfully"
    //         ], 200);
    // }
}
