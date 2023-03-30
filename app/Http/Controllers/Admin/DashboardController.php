<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Device;
use App\Models\Instalacion;
use App\Http\Controllers\Controller;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

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
        $value = 'success';

        //Session::flash('statuscode', 'success');
        //$request->session()->flash('statuscode', $value);
        return view('admin.register', compact('user')) ->with('users', $users);
    }

    public function registeredit(Request $request, $id){
        $user = Auth::user();
        $users = User::findOrFail($id);
        return view('admin.register-edit', compact('user')) ->with('users', $users);
    }

    public function registerupdate(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->phone = $request->input('phone');
        $users->usertype = $request->input('usertype');
        $users->email = $request->input('email');
        $users->update();


        return redirect('/role-register') ->with('status','Your data is updated');
    }

    public function registerdelete(Request $request, $id){
        $users = User::findOrFail($id);
        $users->delete();


        return redirect('/role-register') ->with('status','Your data is deleted');
    }

    public function deviceregister(){
        $user = Auth::user();
        $device = Device::all();
        return view('admin.registerDevices', compact('user')) ->with('devices', $device);
    }

    public function savenewdevice(Request $request){
        $device = new Device;

        $device->direccionMac = $request->input('direccionMac');
        $device->modeloSensor = $request->input('modeloSensor');
        $device->factorK = $request->input('factorK');

        $device->save();
        
        return redirect('/device-register') ->with('status', 'New device was added');
    }

    public function registerdeviceedit(Request $request, $id){
        $user = Auth::user();
        $device = Device::findOrFail($id);
        return view('admin.registerDevicesEdit', compact('user')) ->with('device', $device);
    }

    public function deviceupdate(Request $request, $id){
        $device = Device::find($id);
        $device->direccionMac = $request->input('direccionMac');
        $device->modeloSensor = $request->input('modeloSensor');
        $device->factorK = $request->input('factorK');
        $device->update();


        return redirect('/device-register') ->with('status','Your data is updated');
    }

    public function devicedelete(Request $request, $id){
        $device = Device::findOrFail($id);
        $device->delete();


        return redirect('/device-register') ->with('status','Your data is deleted');
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
        $user = Auth::user();
        $userId = User::select('id','email')->get(); 
        $deviceIds = Device::select('id','modeloSensor')->get(); 
        $instalacion = Instalacion::all();
        return view('admin.instalacion', compact('user','userId', 'deviceIds')) ->with('instalacion', $instalacion);
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

    public function instalacionedit(Request $request, $id){
        $user = Auth::user();
        $instalacion = Instalacion::findOrFail($id);
        return view('admin.instalacionEdit', compact('user')) ->with('instalacion', $instalacion);
    }

    public function installationupdate(Request $request, $id){
        $instalacion = Instalacion::find($id);
        $instalacion->idUsuario = $request->input('idUsuario');
        $instalacion->idDispositivo = $request->input('idDispositivo');
        $instalacion->diametroTuberia = $request->input('diametroTuberia');
        $instalacion->update();


        return redirect('/instalacion-register') ->with('status','Your data is updated');
    }

    public function installationdelete(Request $request, $id){
        $instalacion = Instalacion::findOrFail($id);
        $instalacion->delete();


        return redirect('/instalacion-register') ->with('status','Your data is deleted');
    }
    
}
