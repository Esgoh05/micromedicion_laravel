<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function nosotros(){
        return view('frontend.nosotros');
    }

    public function contacto(){
        return view('frontend.contacto');
    }
}
