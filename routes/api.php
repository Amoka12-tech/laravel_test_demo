<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

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

Route::post('/login', [AdminUserController::class, 'api_login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::patch('/me/profile', [ContactController::class, 'update_user']);
    Route::get('/contacts/search/{field}/{query}', [ContactController::class, 'search']);
    Route::get('/contacts', [ContactController::class, 'show']); //Get all contacts
    Route::post('/contacts', [ContactController::class, 'store']); //Save contact
    Route::patch('/contacts/{contact}', [ContactController::class, 'update']); //Update a contact
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']); //Delete a contact
    Route::get('/logout', [AdminUserController::class, 'api_logout']); //Logout from app
});



