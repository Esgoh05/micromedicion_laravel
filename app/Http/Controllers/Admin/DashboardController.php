<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Device;
use App\Models\Instalacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    //
    public function viewdashboard(){
        $user = Auth::user();
        $users = User::all();
        return view('admin.dashboard',compact('user'))->with('users', $users);
    }


    public function registered(){
        $user = Auth::user();
        $users = User::all();
        return view('admin.register', compact('user')) ->with('users', $users);
    }

    public function registeredit(Request $request, $id){
        $users = User::findOrFail($id);
        return view('admin.register-edit') ->with('users', $users);
    }

    public function registerupdate(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();


        return redirect('/role-register') ->with('status','Your data is updated');
    }

    public function registerdelete(Request $request, $id){
        $users = User::findOrFail($id);
        $users->delete();


        return redirect('/role-register') ->with('status','Your data is deleted');
    }

    public function deviceregister(){
        $device = Device::all();
        return view('admin.registerDevices') ->with('devices', $device);
    }

    public function savenewdevice(Request $request){
        $device = new Device;

        $device->direccionMac = $request->input('direccionMac');
        $device->modeloSensor = $request->input('modeloSensor');
        $device->factorK = $request->input('factorK');

        $device->save();
        
        return redirect('/device-register') ->with('status', 'New device was added');
    }

    public function savenewuser(Request $request){
        $data = new User;

        $data->name = $request->input('name');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->password = Hash::make($request->input('password'));
        
       // input('password');

        $data->save();
        
        return redirect('/role-register') ->with('status', 'New user was added');
    }

    //cambios en la funcion
    public function instalacion(){
        $userId = User::select('id','email')->get(); 
        $deviceIds = Device::select('id','modeloSensor')->get(); 
        $instalacion = Instalacion::all();
        return view('admin.instalacion', compact('userId', 'deviceIds')) ->with('instalacion', $instalacion);
    }

    public function savenewinstalacion(Request $request){
        $instalacion = new Instalacion;

        $instalacion->idUsuario = $request->input('idUsuario');
        $instalacion->idDispositivo = $request->input('idDispositivo');
        $instalacion->diametroTuberia = $request->input('diametroTuberia');
        $instalacion->ssid = $request->input('ssid');
        $instalacion->passwordSsid = $request->input('passwordSsid');
        $instalacion->ubicacionDispositivo = $request->input('ubicacionDispositivo');
        
        
       // input('password');
       echo $request->input('idUsuario');
       echo $request->input('idDispositivo');
       echo $request->input('diametroTuberia');
        $instalacion->save();
        
        return redirect('/instalacion-register') ->with('status', 'New user was added');
    }
    
}
