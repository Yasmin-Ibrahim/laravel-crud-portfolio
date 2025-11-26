<?php

namespace App\Http\Controllers\APIs;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        // token
        $token = $user->createToken('auth_token')->plainTextToken;

        $response = [
            'status' => 200,
            'data' => $user,
            'token' => $token,
            'message' => "create new user successfully"
        ];

        return response($response, 200);
    }

    public function login(Request $request){
         $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)){
            return response([
                'status' => 401,
                'message' => "Invalid email or password"
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response([
                'status' => 200,
                'data' => $user,
                'token' => $token,
                'message' => "login successfully"
            ], 200);
    }

    public function logout(Request $request){
       $request->user()->tokens()->delete();

        $response = [
            'status' => 200,
            'message' => "logout successfully"
        ];

        return response($response, 200);
    }
}
