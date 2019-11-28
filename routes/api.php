<?php

use Illuminate\Http\Request;

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

//pesquisa de ano, mês e código trabalhador
Route::get('/contra-cheque/', 'ContraChequeController@show');

//listagem dos anos, {id} : código do usuário
Route::get('/anos/{id}', 'ContraChequeController@anos');

