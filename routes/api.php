<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PizzaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//singola pizza
Route::get('/menu/{slug}', [PizzaController::class, 'show']);
// menu pizze completo
Route::get("/pizze", "Api\PizzaController@index");
// post store ordine
Route::post("/orders", "Api\OrderController@store");
// /api/contacts
Route::post('/contacts', 'Api\ContactController@store');
// api get order
Route::get('/orders', [OrderController::class, 'index']);
// api per ordine singolo
Route::get('/order/{id}', [OrderController::class, 'show']);
// api per categorie
Route::get('/categories', [CategoryController::class, 'index']);
