<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Device;
use App\Models\Instalacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    //
    public function viewdashboard(){
        $user = Auth::user();
        $users = User::all();
        return view('user.userDashboard',compact('user'))->with('users', $users);
    }

    public function viewuserinstallation(){
        $user = Auth::user();
        $userId = Auth::id();

        //echo $userId;

        //$users = User::whereId($userId)->get();

        $instalacion = Instalacion::where('idUsuario', $userId)->get();
  
        //echo ($instalacion);
        return view('user.instalacionUser',compact('user')) ->with('instalacion', $instalacion);
        
    }

    public function viewinstallationedit(Request $request, $id){
        $user = Auth::user();
        $devices = Device::findOrFail($id);
        return view('admin.register-edit', compact('user')) ->with('devices', $devices);
    }

    public function viewuserprofile(){
        $user = Auth::user();

        return view('user.profileUser', compact('user'));
    }

}