<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get("login", [LoginController::class, "index"])->name("login");
Route::post("login", [LoginController::class, "login"]);
Route::get("logout", [LoginController::class, "logout"])->name("logout");

Route::group(["middleware" => ["isActive", "noStore"]], function(){
    Route::get('/', function () {
        $users = User::get();
        return view('home',compact("users"));
    })->name("home");

    Route::group(["middleware" => ["auth", "can:admin"], "prefix" => "admin", "as" => "admin."], function(){
        Route::get("create", [AdminController::class, "create"])->name("createUser");
        Route::post("create", [AdminController::class, "store"]);
        
        Route::get("show/{id}", [AdminController::class, "show"])->name("showUser");
    
        Route::get("edit/{id}", [AdminController::class, "edit"])->name("editUser");
        Route::put("edit/{id}", [AdminController::class, "update"]);
        
        
        Route::delete("delete/{id}", [AdminController::class, "delete"])->name("deleteUser");
    
    });
});


