<?php

namespace App\Http\Controllers;

use App\Models\MedicionContinua;
use Illuminate\Http\Request;

class MedicionContinuaController extends Controller
{
    public function saveData(Request $request){
         //$nuevosDatos = new tablaNuevosDatos();
        $nuevosDatos = new MedicionContinua();
        
        $nuevosDatos->caudalpromedio = $request->caudalpromedio;
        $nuevosDatos->tiempo = $request->tiempo;
        $nuevosDatos->volumen = $request->volumen;
        $nuevosDatos->fin = $request->fin;
        $nuevosDatos->iddispositivo = $request->iddispositivo;

        $nuevosDatos->save();
    }
}
