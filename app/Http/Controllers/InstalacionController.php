<?php

namespace App\Http\Controllers;

use App\Models\Instalacion;
use Illuminate\Http\Request;

class InstalacionController extends Controller
{
    public function index(Request $req)
    {
        $disp = Instalacion::where('',$req->MAC)->first();

        return $disp;
    }
}
