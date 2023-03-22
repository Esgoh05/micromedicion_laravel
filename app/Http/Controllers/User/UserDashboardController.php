<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    //
    public function viewdashboard(){
        $user = Auth::user();
        $users = User::all();
        return view('user.userDashboard',compact('user'))->with('users', $users);
    }

}