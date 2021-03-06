<?php

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
// TODO REFAIRE LES ROUTE ICI DASHBOARD
Route::middleware((['auth:api', 'roles:Admin']))->prefix('/dashboard')->group(function() {
    Route::get('/producteurs', 'ProducteursController@index');
});

// TODO refaire les middleware //
Route::middleware(['auth:api', 'roles:Admin|Producteur'])->group(function () {
    Route::post('/create', 'ConfitureController@store');
});

Route::middleware(['auth:api', 'roles:Producteur'])->prefix('/producteur')->group(function () {
    Route::get('/confitures', 'ConfitureController@getOfProducteur');
});
Route::middleware(['auth:api', 'roles:Client|Producteur'])->group(function () {
    Route::post('/panier', 'CommandeController@commandePanier');
});

Route::post('/paiement', 'CommandeController@paiement');

Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::get('/liste', 'ConfitureController@index');
Route::get('/test, ProducteursController@getConfitures');

// Route::post('/confitures/{id}', 'ConfituresController@update')->where('id', "[0-9]+");
Route::get('/producteurs', 'ConfitureController@getProducteurs');
Route::get('/fruits', 'ConfitureController@getFruits');
Route::get('/users', 'UserController@index');

Route::get('/producteur, ProducteursController@index');