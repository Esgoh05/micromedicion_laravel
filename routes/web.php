<?php

use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [FrontendController::class, 'index']);

Route::get('/nosotros', [FrontendController::class, 'nosotros']);

Route::get('/contacto', [FrontendController::class, 'contacto']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

    Route::get('/devices-edit/{id}', [DashboardController::class,'registerdeviceedit']);

    Route::put('/register-devices-update/{id}', [DashboardController::class,'deviceupdate']);

    Route::delete('/device-delete/{id}', [DashboardController::class,'devicedelete']);

    Route::get('/instalacion-edit/{id}', [DashboardController::class,'instalacionedit']);

    Route::put('/installation-update/{id}', [DashboardController::class,'installationupdate']);

    Route::delete('/installation-delete/{id}', [DashboardController::class,'installationdelete']);

    Route::get('/panel-consumo', [DashboardController::class,'viewpanelconsumo']);

    Route::post('/panel', [DashboardController::class,'btnmediciontotal']);

    Route::post('/panel-consumo', [DashboardController::class,'btncaudalpormes']);

    Route::post('/panel-consumo-datepicker', [DashboardController::class,'btncaudaldatepicker']);

    Route::post('/medicion-volumen', [DashboardController::class,'btnmedicionvolumen']);
    
});

Route::group(['middleware' => ['auth', 'user']], function(){

    Route::get('/user-dashboard', [UserDashboardController::class,'viewdashboard']);
    Route::get('/user-installation', [UserDashboardController::class,'viewuserinstallation']);
    Route::get('/edit-installation-user/{id}', [UserDashboardController::class,'viewinstallationedit']);
    Route::put('/installation-update-user/{id}', [UserDashboardController::class,'installationupdateuser']);
    Route::get('/user-profile', [UserDashboardController::class,'viewuserprofile']);
    Route::put('/user-profile/{id}', [UserDashboardController::class,'userprofileedit']);
    Route::put('/foto-perfil/{id}', [UserDashboardController::class,'fotoperfiledit']);
    
    
});






