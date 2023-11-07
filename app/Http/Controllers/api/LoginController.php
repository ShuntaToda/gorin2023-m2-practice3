<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $check = $request->only(["name", "password"]);
        if(Auth::attempt($check)){
            $request->session()->regenerate();
            $token = $request->user()->createToken("token");
            return response()->json(["user" => $request->user(), "token" => $token->plainTextToken]);
        }
        return response()->json("ログインできませんでした");
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->flush();
        return response()->json("ログアウトしました");
    }
}
