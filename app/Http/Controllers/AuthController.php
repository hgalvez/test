<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:4',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'errors' => [ 'auth' => 'Usuario y/o Contraseña incorrectos.']
            ],422);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if($request->remember_me){
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
            'user' => Auth::user()
        ]);
    }

    
    

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
