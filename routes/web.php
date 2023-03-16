<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Cambié la ruta. Ruta anterior /dashboard */
Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::post('/save-new-user', 'App\Http\Controllers\Admin\DashboardController@savenewuser');

    Route::get('/role-register', 'App\Http\Controllers\Admin\DashboardController@registered');

    Route::get('/role-edit/{id}', 'App\Http\Controllers\Admin\DashboardController@registeredit');

    Route::put('/role-register-update/{id}', 'App\Http\Controllers\Admin\DashboardController@registerupdate');

    Route::delete('/role-delete/{id}', 'App\Http\Controllers\Admin\DashboardController@registerdelete');

    Route::get('/device-register', 'App\Http\Controllers\Admin\DashboardController@deviceregister');

    Route::post('/save-new-device', 'App\Http\Controllers\Admin\DashboardController@savenewdevice');

    Route::get('/instalacion-register', 'App\Http\Controllers\Admin\DashboardController@instalacion');

    Route::post('/save-new-instalacion', 'App\Http\Controllers\Admin\DashboardController@savenewinstalacion');

    Route::get('/search-email', 'App\Http\Controllers\Admin\DashboardController@index');

    Route::get('/search-byemail', 'App\Http\Controllers\Admin\DashboardController@serachbyemail');
    
});




