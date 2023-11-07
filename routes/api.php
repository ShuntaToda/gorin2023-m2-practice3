<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;

use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("auth/login", [LoginController::class, "login"]);

Route::group(["middleware" => ["auth:sanctum"]],function(){
    Route::post("auth/logout", [LoginController::class, "logout"]);

    Route::get("show", function(Request $request){
        return $request->user();
    });
    Route::put("update", function(Request $request){
        $user = User::find($request->user()->id);

        $user->update([
            "name" => isset($request->name) ? $request->name : $user->name,
            "memo" => isset($request->memo) ? $request->memo : $user->memo,
        ]);

        return response()->json("更新できました");
    });
    
    Route::delete("delete", function(Request $request){
        $user = User::find($request->user()->id);
        
        $user->delete();
        
        return response()->json("削除できました");
    });

});