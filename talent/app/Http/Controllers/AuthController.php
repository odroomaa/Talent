<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' =>['required'],
        ]);

        $newuser = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ])->save();

        return response([
            'New User'=>$newuser
        ]);
        
    }
    function login(Request $request){
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);


        $user=User::where('email',$request->email)->first();
        if(!$user){
            return response(['massage'=>'User not found'],401);
        }

        elseif(!Hash::check($request->password,$user->password)){

            return response(['message'=>'wrong password'],401);
        }

        $token  = $user->createToken('toka')->plainTextToken;

        return response([
            'token'=>$token,
            'user'=>$user
        ]);

    }

    function logout(Request $request){
        $request->user()->tokens()->delete();

        return response(['message'=>'logged out'],201);
    }
}
