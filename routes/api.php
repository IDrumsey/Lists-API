<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;
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

//users
//CRUD Ops
//  1. Get all the users (GET) /api/users
//  2. Create a user (POST) /api/users
//  3. Get an individual user (GET) /api/users/{id}
//  4. Update an individual user (PUT/PATCH) /api/users/{id}
//  5. Delete an individual user (DELETE) /api/users/{id}



//Lists
//CRUD Ops
//  1. Get all the lists (GET) /api/lists
//  2. Create a list (POST) /api/lists
//  3. Get an individual list (GET) /api/lists/{id}
//  4. Update an individual list (PUT/PATCH) /api/lists/{id}
//  5. Delete an individual list (DELETE) /api/lists/{id}


Route::apiResource('lists', ChecklistController::class);

Route::apiResource('users', UserController::class);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
