<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\Presets\React;

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


//ipCompu:8000/api/save_data

Route::post('save_data', function (Request $request){

    /*

    $nuevosDatos = new tablaNuevosDatos();
    
    $nuevosDatos->flujo = $request->dato_flujo;

    $nuevosDatos->save();

    */
});