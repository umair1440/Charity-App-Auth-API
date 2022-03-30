<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Registor User Api Route
Route::post("/users/registor", [UserController::class, "store"]);

// Login User Api Route
Route::post("/users/login", [UserController::class, "login"]);

// Show User Api Route
Route::get("/users/show", [UserController::class, "show"]);

// Update User Api Route
Route::post("/users/update", [UserController::class, "update"]);

// Delete User Api Route
Route::delete("/users/destroy", [UserController::class, "destroy"]);

// Uplaod User Profile Image Api Route
Route::post("/users/updateImg", [UserController::class, "updateImg"]);

// Reset User Password
Route::post("/users/resetPass", [UserController::class, "resetPass"]);















