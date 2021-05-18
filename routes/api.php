<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ListItemController;
use App\Http\Controllers\ListAccessController;
use App\Http\Controllers\AuthController;


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

//Public routes

//register
Route::post('/register', [AuthController::class, 'register']);

//login
Route::post('/login', [AuthController::class, 'login']);

//items

//get all items
Route::get('/items', [ItemController::class, 'index']);
//get specific item
Route::get('/items/{id}', [ItemController::class, 'show']);

//create new item
Route::post('/items', [ItemController::class, 'store']);

//Private routes

Route::group(['middleware' => ['auth:sanctum']], function () {
    //update item
    Route::put('/items/{id}', [ItemController::class, 'update']);
    //delete item
    Route::delete('/items/{id}', [ItemController::class, 'delete']);

    //logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::apiResource('users', UserController::class);

Route::apiResource('lists', ChecklistController::class);

Route::apiResource('list-access', ListAccessController::class);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
