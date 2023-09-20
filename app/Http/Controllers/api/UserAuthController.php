<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function register(Request $request){

        $request->validate([
                'name' => 'required',
                 'email'=>['required','unique:users'],
                    'password'=> 'required|min:6',
        ]);
        try {
             $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email ,
                'password' =>Hash::make($request->password),
                'api_token' =>Str::random(64),
             ]);
             return response()->json([
                'status' => 'User Register',
                'user'=>$user
             ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'Falid',
                'Error' => $e->getMessage()
             ],500);

        }

    }
    public function login(Request $request){
        $request->validate([
            'email' =>'required',
            'password' => 'required|min:6'
        ]);
        if ($user= User::firstWhere('email',$request->email)) {
            if (Hash::check($request->password , $user->password)) {
                 $user->update(['api_token'=>Str::random(64)]);
                 return response()->json([
                    'status' => 'LogIn' ,
                    'api_token'=> $user->api_token
                 ]);
            }
        }
        return  response()->json([
            'status'=>'falid',
            'message'=>'Email or password Not valid'
        ],500);
    }
}
