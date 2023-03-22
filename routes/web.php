<?php

use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
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


/*Cambié la ruta. Ruta anterior /dashboard */
Route::group(['middleware' => ['auth', 'admin']], function(){
    /*Route::get('/dashboard', function () {
        $user = Auth::user();
        return view('admin.dashboard',compact('user'));
    });*/

    Route::get('/dashboard', [DashboardController::class,'viewdashboard']);

    Route::post('/save-new-user', [DashboardController::class,'savenewuser']);

    Route::get('/role-register', [DashboardController::class,'registered']);

    Route::get('/role-edit/{id}', [DashboardController::class,'registeredit']);

    Route::put('/role-register-update/{id}', [DashboardController::class,'registerupdate']);

    Route::delete('/role-delete/{id}', [DashboardController::class,'registerdelete']);

    Route::get('/device-register', [DashboardController::class,'deviceregister']);

    Route::post('/save-new-device', [DashboardController::class,'savenewdevice']);

    Route::get('/instalacion-register', [DashboardController::class,'instalacion']);

    Route::post('/save-new-instalacion', [DashboardController::class,'savenewinstalacion']);
    
});

Route::group(['middleware' => ['auth', 'user']], function(){

    Route::get('/user-dashboard', [UserDashboardController::class,'viewdashboard']);
    Route::get('/user-installation', [UserDashboardController::class,'viewuserinstallation']);
    
});






