<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name'=> 'required|string',
            'surname' => 'required|string',
            'email'=> 'required|string|unique:users,email',
            'adress' => 'required|string',
            'age' => 'required|integer',
            'password'=> 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'surname' => $fields['surname'],
            'email' => $fields['email'],
            'adress' => $fields['adress'],
            'isAdmin' => false,
            'age' => $fields['age'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    public function login(Request $request){
        $fields = $request->validate([
            'email'=> 'required|string',
            'password'=> 'required|string'
        ]);

        // Check Email
        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }

    public function index(Request $request){
        $users = User::where('isAdmin', false)->get();

        return response($users, 200);
    }
    //
}
