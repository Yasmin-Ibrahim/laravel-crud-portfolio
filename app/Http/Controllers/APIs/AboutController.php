<?php

// namespace App\Http\Controllers\APIs;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\About;
// use App\Models\Client;

// class AboutController extends Controller
// {
//     public function index(){
//         $about = About::all();

//         if($about->isEmpty()){
//             return response()->json([
//                 "status" => 404,
//                 "message" => "Not Found Data"
//             ], 404);
//         }

//         return response()->json([
//             "status" => 200,
//             "message" => "Data fetched successfully",
//             "data" => $about
//         ], 200);

//     }

//     public function store(Request $request){
//         $aboutDataValidate = $request->validate([
//             "client_id" => "required|integer|exists:clients,id",
//             "content" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s\p{P}]+$/"
//         ]);

//         $about = About::create($aboutDataValidate);

//         return response()->json([
//             "status" => 201,
//             "message" => "About Section Created Successfully",
//             "data" => $about
//         ], 201);
//     }

//     public function update(Request $request, string $id){
//         $about = About::find($id);

//         if(!$about){
//             return response()->json([
//                 "status" => 404,
//                 "message" => "Not Found Data",
//             ], 404);
//         }

//         $aboutDataValidate = $request->validate([
//             "client_id" => "required|integer|exists:clients,id",
//             "content" => "required|string|regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9\s\p{P}]+$/"
//         ]);

//         $about ->update($aboutDataValidate);

//         return response()->json([
//                 "status" => 200,
//                 "message" => "About Section updated successfully",
//                 "data" => $about
//             ], 200);
//     }

//     public function show(string $id){
//         $about = About::find($id);

//         if(!$about){
//             return response()->json([
//                 "status" => 404,
//                 "message" => "Not Found Data"
//             ], 404);
//         }

//         return response()->json([
//                 "status" => 200,
//                 "message" => "Show Section About",
//                 "data" => $about
//             ], 200);
//     }

//     public function destroy(string $id){
//         $about = About::find($id);

//         if(!$about){
//             return response()->json([
//                 "status" => 404,
//                 "message" => "Not Found Data"
//             ], 404);
//         }

//         $about->delete();

//         return response()->json([
//             "status" => 200,
//             "message" => "About Section Deleted Successfully",
//             "data" => $about
//         ], 200);
//     }
// }
