<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthContrller extends Controller
{
    //registre
    public function register(Request $request) {
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
     
        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password'])
        ]);
     
        return response(['user'=>$user,
        'token'=>$user->createToken('secret')->plainTextToken
        ]);
    }

    public function login(Request $request) {
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
     
        if(!Auth::attempt($attrs)){
            return response([
                'message'=>'invalide credentials.'
            ],403);
        }
     
        return response([
            'user'=>auth()->$User(),
            'token'=>auth()->$User()->createToken('secret')->plainTextToken
        ]);
    }
    //logout 
    public function logout() {

        auth()->$user()->tokens()->delete();
        return response(['message'=>'logout success'],200);
    }

    public function user() {

        return response(['user'=>auth()->user()],200);
    }
}
