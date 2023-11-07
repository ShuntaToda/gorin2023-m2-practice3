<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{

    public function create(){
        return view("createUser");
    }
    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "memo" => $request->memo,
            "is_active" => true,
            "role" => "user",
        ]);
        
        return redirect(route("admin.createUser"))->with(["message" => "登録完了しました"]);
        
    }

    public function show($id){
        $user = User::find($id);
        return view("showUser", compact("user"));
    }

    public function edit($id){
        $user = User::find($id);
        return view("editUser", compact("user"));
    }
    public function update(Request $request, $id){
        
        $request->validate([
            "name" => "required",
            "email" => "required|email",
        ]);

        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "memo" => $request->memo,
        ]);

        return redirect(route("admin.editUser", $user->id))->with(["message" => "更新完了しました"]);
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect(route("home"))->with(["message" => "削除完了しました"]);
    }
}
