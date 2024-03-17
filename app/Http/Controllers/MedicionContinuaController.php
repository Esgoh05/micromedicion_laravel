<?php

namespace App\Http\Controllers;

use App\Models\MedicionContinua;
use Illuminate\Http\Request;

/*class MedicionContinuaController extends Controller
{
    public function saveData(Request $request){
         //$nuevosDatos = new tablaNuevosDatos();
         echo($request);
        $nuevosDatos = new MedicionContinua();
        
        $nuevosDatos->caudalpromedio = $request->caudalpromedio;
        $nuevosDatos->tiempo = $request->tiempo;
        $nuevosDatos->volumen = $request->volumen;
        $nuevosDatos->fin = $request->fin;
        $nuevosDatos->iddispositivo = $request->iddispositivo;

        $nuevosDatos->save();
    }
}*/
class MedicionContinuaController extends Controller
{
    public function saveData(Request $request){
        // Decodificar el JSON enviado en la solicitud
        $datosJson = json_decode($request->getContent(), true);

        // Crear una instancia del modelo MedicionContinua
        $nuevosDatos = new MedicionContinua();
        
        // Asignar los valores de los campos usando los datos del JSON
        $nuevosDatos->caudalpromedio = $datosJson['caudalpromedio'];
        $nuevosDatos->tiempo = $datosJson['tiempo'];
        $nuevosDatos->volumen = $datosJson['volumen'];
        $nuevosDatos->fin = $datosJson['fin'];
        $nuevosDatos->iddispositivo = $datosJson['iddispositivo'];

        // Guardar los datos en la base de datos
        $nuevosDatos->save();

        // Crear una respuesta JSON con un mensaje de confirmación
        return response()->json(['message' => 'Datos guardados correctamente', 'data' => $datosJson], 200);
    }
}
