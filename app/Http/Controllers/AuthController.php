<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $req) {
        $fields = $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('randomToken1')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $req) {
        $fields = $req->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //checking email
        $user = User::where('email', $fields['email'])->first();

        //check the password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                "status" => "Failed to login"
            ], 401);
        }

        $token = $user->createToken('randomToken1')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $req){
        auth()->user()->tokens()->delete();

        return [
            "status" => "Logged out"
        ];
    }
}
