<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view("login");
    }
    public function login(Request $request) {
        $check = $request->only(["name", "password"]);
        if(Auth::attempt($check)){
            $request->session()->regenerate();
            return redirect(route("home"));
        }

        return back()->with(["message" => "アカウントまたはパスワードが正しくありません"]);
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->flush();



        return redirect(route("home"));

    }
}
