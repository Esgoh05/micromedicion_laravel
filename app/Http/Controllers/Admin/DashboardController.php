<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Device;
use App\Models\Instalacion;
use App\Http\Controllers\Controller;
use App\Models\MedicionContinua;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Carbon\Carbon;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Str;

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
        // $users = User::all();
        $users = User::withCount('instalacion')->get();

        session_start();
        
        //$value = 'success';


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


        return redirect('/role-register') ->with('status','Tu información ha sido actualizada');
    }

    public function registerdelete(Request $request, $id){
        $users = User::findOrFail($id);
        $users->delete();


        return redirect('/role-register') ->with('status','Tu infromación ha sido eliminada');
    }

    public function deviceregister(){
        $user = Auth::user();
        $device = Device::all();
        return view('admin.registerDevices', compact('user')) ->with('devices', $device);
    }

    public function savenewdevice(Request $request){
        $deviceStatusActivo = 1;
        $device = new Device;

        $device->direccionMac = $request->input('direccionMac');
        $device->modeloSensor = $request->input('modeloSensor');
        $device->factorK = $request->input('factorK');
        //$device->status_dispositivo = $request->input('status_dispositivo');
        $device->status_dispositivo = $deviceStatusActivo;

        $device->save();
        
        return redirect('/device-register') ->with('status', 'Un nuevo dispositivo ha sigo agregado');
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


        return redirect('/device-register') ->with('status','Tu información ha sido actualizada');
    }

    public function devicedelete(Request $request, $id){
        $device = Device::findOrFail($id);
        $device->delete();


        return redirect('/device-register') ->with('status','Tu infromación ha sido eliminada');
    }

    public function savenewuser(Request $request){
        $data = new User;

        //dd($request->hasFile('foto_perfil'));
        if($request->hasFile('foto_perfil')){
            $file = $request->file('foto_perfil');
            $destinationPath = 'img/fotos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucces = $request->file('foto_perfil')->move($destinationPath, $filename);
            $data->foto_perfil = $destinationPath . $filename;

        } else {
            // Puedes asignar un valor por defecto o dejarlo vacío, dependiendo de tus necesidades
            $data->foto_perfil = 'img/avatar.png'; // Cambia 'default.jpg' por el nombre de tu imagen por defecto
        }

        $data->name = $request->input('name');
        $data->phone = $request->input('phone');
        $data->usertype = $request->input('usertype');
        $data->email = $request->input('email');
        // $data->password = Hash::make($request->input('password'));

        // Establecer contraseña por defecto
        // $users->password = Hash::make('micromedicion_IoT2025!'); 
        // $data->password = Hash::make($request->input('micromedicion_IoT2025!'));
        $data->password = Hash::make('micromedicion_IoT2025!');
        
       // input('password');

        $data->save();
        
        return redirect('/role-register') ->with('status', 'Un nuevo usuario ha sido agregado.');
    }

    //cambios en la funcion
    public function instalacion(){
        $user = Auth::user();
        $userId = User::select('id','email')->get(); 
        $deviceIds = Device::select('id','modeloSensor', 'status_dispositivo')->get(); 
        // $instalacion = Instalacion::all();
        // Aquí cargamos las relaciones necesarias para mostrar el email y modeloSensor
        $instalacion = Instalacion::with(['user', 'device'])->get();
        return view('admin.instalacion', compact('user','userId', 'deviceIds')) ->with('instalacion', $instalacion);
    }

    public function savenewinstalacion(Request $request){
        $deviceStatusActivo = 1;
        $deviceStatusInstalado = 2;
        $deviceIdRequest = $request->input('idDispositivo');
        

        $device = Device::where('id', $deviceIdRequest)
        ->pluck('status_dispositivo')->first();

        //echo($deviceStatusActivo);
        //echo($device);
        if($device == $deviceStatusActivo){ 
            //$d = "Activo";
            //echo($d);
            $dispositivo = Device::find($deviceIdRequest);
            $dispositivo->status_dispositivo = $deviceStatusInstalado;
            $dispositivo->update();
            //echo($dispositivo);
            $instalacion = new Instalacion;

            $instalacion->idUsuario = $request->input('idUsuario');
            $instalacion->idDispositivo = $request->input('idDispositivo');
            $instalacion->diametroTuberia = $request->input('diametroTuberia');
            $instalacion->ssid = $request->input('ssid');
            $instalacion->passwordSsid = $request->input('passwordSsid');
            $instalacion->ubicacionDispositivo = $request->input('ubicacionDispositivo');
                
            //echo $request->input('idUsuario');
            //echo $request->input('idDispositivo');
            //echo $request->input('diametroTuberia');
            $instalacion->save();
            return redirect('/instalacion-register') ->with('status', 'Una nueva instalación ha sido agregada');
        }
        elseif ($device == $deviceStatusInstalado){
            return redirect('/instalacion-register') ->with('status', 'Este dispositivo ya se encuentra instalado');
        };
 
        
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


        return redirect('/instalacion-register') ->with('status','Tu información ha sido actualizada');
    }

    public function installationdelete(Request $request, $id){
        

        $deviceStatusInstalado = 2;
        $deviceStatusBaja = 3;
        //$dispositivo = Device::find($deviceIdRequest);
        //$dispositivo->status_dispositivo = $deviceStatusInstalado;
        
        
        //echo($id);
        $installation = Instalacion::where('id', $id)->pluck('idDispositivo')->first();
        //echo($installation);
        $deviceStatus = Device::where('id', $installation)->pluck('status_dispositivo')->first();
        //echo($deviceStatus);

        if($deviceStatus == $deviceStatusInstalado){ 
            $estadoBaja = Device::find($installation);
            $estadoBaja->status_dispositivo = $deviceStatusBaja;
            //echo($estadoBaja);
            //echo($deviceStatusBaja);
            $estadoBaja->update();

            $instalacion = Instalacion::findOrFail($id);
            $instalacion->delete();
            return redirect('/instalacion-register') ->with('status','Tu infromación ha sido eliminada');
        }
        
        //return redirect('/instalacion-register') ->with('status','Tu infromación ha sido eliminada');
    }

    public function viewpanelconsumo(Request $request){
        $user = Auth::user();
        $userId = User::select('id','email')->get(); 

            
        $deviceIds = Device::select('id','modeloSensor')->get();

        $getDeviceSelected = $request->get('valor');

        $inicioMes = Carbon::now()->startOfMonth();

        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subDays()->format('Y-m-d');

        //$medicionesContinuas = MedicionContinua::whereMonth('fin', now()->month(5))->select(DB::raw('sum(caudalpromedio) as caudalpromedio'), DB::raw('sum(volumen) as volumen'))->get();

        
        //$medicionesContinuas = MedicionContinua::all();
        //$medicionesContinuas = MedicionContinua::selectRaw('SUM(caudalpromedio) as caudalpromedio, SUM(volumen) as volumen')->get();
        //Filtrar por dia
        $medicionesContinuas = MedicionContinua::groupBy(DB::raw('fin::date'))->select(DB::raw('fin::date'), DB::raw('sum(caudalpromedio) as caudalpromedio'), DB::raw('sum(volumen) as volumen'))->get();

        //$medicionesContinuas = MedicionContinua::select('idDispositivo', DB::raw('SUM(volumen) as volumen'))->groupBy('idDispositivo')->get();
        
        //echo($medicionesContinuas);
        //$data=[];

        //$iddispositivo = 'Todos los dispositivos';
        

        //echo($deviceIds);
        //echo($getDeviceSelected);

        
        //echo($caudalPromedioGeneral);
        //echo($tiempoGeneral);
        //echo($medicionesContinuas);
          

        /*foreach($medicionesContinuas as $medicionContinua){
            $data['caudalpromedio'][] = $medicionContinua->caudalpromedio;
            $data['volumen'][] = $medicionContinua->volumen;
            $data['data'][] = $medicionContinua->fin;
            $data['iddispositivo'] = $iddispositivo;
        }*/



        //$data['data'] = json_encode($data); 
        $data['data'] = json_encode($medicionesContinuas); 

            
        

        //$getEmailUSer = $request->get('valorEmail');
        


        //dd($data);

        return view('admin.panel-consumo', $data, compact('user', 'userId', 'deviceIds', 'end', 'start'));  
        
    }

    /*
        public function viewpanelconsumo(Request $request){
        $user = Auth::user();
        $userId = User::select('id','email')->get(); 
        $deviceIds = Device::select('id','modeloSensor')->get();

        $getEmailSelected = $request->get('valorEmail');

        $getDeviceSelected = $request->get('valor');

        $inicioMes = Carbon::now()->startOfMonth();

        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subDays()->format('Y-m-d');

        //$medicionesContinuas = MedicionContinua::whereMonth('fin', now()->month(5))->select(DB::raw('sum(caudalpromedio) as caudalpromedio'), DB::raw('sum(volumen) as volumen'))->get();

        
        //$medicionesContinuas = MedicionContinua::all();
        //$medicionesContinuas = MedicionContinua::selectRaw('SUM(caudalpromedio) as caudalpromedio, SUM(volumen) as volumen')->get();
        //Filtrar por dia
        $medicionesContinuas = MedicionContinua::groupBy(DB::raw('fin::date'))->select(DB::raw('fin::date'), DB::raw('sum(caudalpromedio) as caudalpromedio'), DB::raw('sum(volumen) as volumen'))->get();

        //$medicionesContinuas = MedicionContinua::select('idDispositivo', DB::raw('SUM(volumen) as volumen'))->groupBy('idDispositivo')->get();
        
        //echo($medicionesContinuas);
        $data=[];

        $iddispositivo = 'Todos los dispositivos';
        

        //echo($deviceIds);
        //echo($getDeviceSelected);

        
        //echo($caudalPromedioGeneral);
        //echo($tiempoGeneral);
        //echo($medicionesContinuas);
          

        foreach($medicionesContinuas as $medicionContinua){
            $data['caudalpromedio'][] = $medicionContinua->caudalpromedio;
            $data['volumen'][] = $medicionContinua->volumen;
            $data['data'][] = $medicionContinua->fin;
            $data['iddispositivo'] = $iddispositivo;
        }



        $data['data'] = json_encode($data); 

        //dd($data);

        return view('admin.panel-consumo', $data, compact('user', 'userId', 'deviceIds', 'end', 'start'));  
        
    }
    */


    public function btnmediciontotal(Request $request){
        $user = Auth::user();
        $userId = User::select('id','email')->get(); 
        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subDay()->format('Y-m-d');

        $deviceIds = Device::select('id','modeloSensor')->get();
        

        $getDeviceValue = $request->get('valor');
        //dd($getDeviceValue);

        if(!is_null($getDeviceValue)){
            //echo($getDevices);
        
        //raw sirve para que interprete como comando sql
        $getDeviceSelected = MedicionContinua::whereIn('iddispositivo', $getDeviceValue)->groupBy(DB::raw('iddispositivo::int'), DB::raw('fin::date'))->select(DB::raw('iddispositivo::int'), DB::raw('fin::date'), DB::raw('sum(caudalpromedio) as caudalpromedio'), DB::raw('sum(volumen) as volumen'))->get();

        //$data=[];

        $data['data'] = json_encode($getDeviceSelected); 
        
         
        return view('admin.panel-consumo', $data, compact('user', 'userId', 'deviceIds', 'end', 'start'));
        } else{
            return view('admin.panel-consumo', compact('user', 'deviceIds', 'end', 'start'));
        }

    }

    public function btnmedicionvolumen(Request $request){
        $user = Auth::user();
        $deviceIds = Device::select('id','modeloSensor')->get();

        $getValue = $request->get('valorVolumen');


        //raw sirve para que interprete como comando sql
        $getSelected = MedicionContinua::whereIn('idDispositivo', [$getValue])->groupBy(DB::raw('fin::date'))->select(DB::raw('fin::date'), DB::raw('sum(volumen) as suma'))->get();

        //$data = $getDeviceSelected;
        //echo($deviceIds);
        //echo($getValue);
        //echo($getSelected);

        $data=[];

        foreach($getSelected as $medicionContinua){
            $data['volumen'][] = $medicionContinua->suma;
            $data['data'][] = $medicionContinua->fin;
        };

        $data['data'] = json_encode($data); 

         
        return view('admin.panel-consumo', $data, compact('user', 'deviceIds','end', 'start'));   
    
    }

    public function btncaudalpormes(Request $request){
        $user = Auth::user();
        $userId = User::select('id','email')->get(); 
        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subDay()->format('Y-m-d');
        $deviceIds = Device::select('id','modeloSensor')->get();

        $getDeviceSelected = $request->get('valor');
        $mesSeleccionado = $request->input('valorMesSeleccionado');

        $getMonth = $request->input('datosMeses');

        $fecha = Carbon::parse($getMonth);
        $afecha = $fecha->year;
        $mfecha = $fecha->month;

        //Filtrado por mes y suma de valores de caudal promedio/volumen de agua.
        //$medicionesContinuas = MedicionContinua::whereMonth('fin', now()->month($mesSeleccionado))->select(DB::raw('sum(caudalpromedio) as caudalpromedio'), DB::raw('sum(volumen) as volumen'))->get();
        
        $medicionesContinuas = MedicionContinua::groupBy(DB::raw('fin::date'))->select(DB::raw('fin::date'), DB::raw('sum(caudalpromedio) as caudalpromedio'), DB::raw('sum(volumen) as volumen'))->whereYear('fin', '=', $afecha)->whereMonth('fin', now()->month($mfecha))->get();
        $medicionesContinuasVolumen = MedicionContinua::whereMonth('fin', now()->month($mesSeleccionado))->select(DB::raw('sum(volumen) as volumen'))->get();

        switch ($mesSeleccionado) {
            case 1:
                $mesSeleccionado = 'Enero';
                break;
            case 2:
                $mesSeleccionado = 'Febrero';
                break;
            case 3:
                $mesSeleccionado = 'Marzo';
                break;
            case 4:
                $mesSeleccionado = 'Abril';
                break;
            case 5:
                $mesSeleccionado = 'Mayo';
                break;
            case 6:
                $mesSeleccionado = 'Junio';
                break;
            case 7:
                $mesSeleccionado = 'Julio';
                break;
            case 8:
                $mesSeleccionado = 'Agosto';
                break;
            case 9:
                $mesSeleccionado = 'Septiembre';
                break;
            case 10:
                $mesSeleccionado = 'Octubre';
                break;
            case 11:
                $mesSeleccionado = 'Noviembre';
                break;
            case 12:
                $mesSeleccionado = 'Diciembre';
                break;
        }
        
        echo($medicionesContinuas);
        $data=[];
          

        foreach($medicionesContinuas as $medicionContinua){
            $data['caudalpromedio'][] = $medicionContinua->caudalpromedio;
            $data['volumen'][] = $medicionContinua->volumen;
            $data['data'][] = $medicionContinua->fin;
            //$data['data'][] = $mesSeleccionado;
        }

        //echo($mesSeleccionado);


        $data['data'] = json_encode($data); 
        $data['data'] = json_encode($medicionesContinuas); 

        return view('admin.panel-consumo', $data, compact('user', 'userId', 'deviceIds', 'end', 'start'));  
    
    }

    
    public function btncaudaldatepicker(Request $request){
        $user = Auth::user();
        $userId = User::select('id','email')->get(); 
        $deviceIds = Device::select('id','modeloSensor')->get();
        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subDay()->format('Y-m-d');

        $fechaInicioCaudal = $request->get('fechaInicioCaudal');
        $fechaFinCaudal = $request->get('fechaFinCaudal');

        echo($fechaInicioCaudal);
        echo($fechaFinCaudal);

        $medicionContinuaFiltroFechas = MedicionContinua::whereBetween('fin', [$fechaInicioCaudal.' 00:00:00', $fechaFinCaudal. ' 23:59:59'])->groupBy(DB::raw('fin::date'))->select(DB::raw('sum(caudalpromedio) as caudalpromedio'), DB::raw('sum(volumen) as volumen'), DB::raw('fin::date'))->get();;

        echo($medicionContinuaFiltroFechas);

        $data=[];
          

        foreach($medicionContinuaFiltroFechas as $medicionContinua){
            $data['caudalpromedio'][] = $medicionContinua->caudalpromedio;
            $data['volumen'][] = $medicionContinua->volumen;
            $data['data'][] = $medicionContinua->fin;
            //$data['data'][] = $mesSeleccionado;
        }

        //echo($mesSeleccionado);


        $data['data'] = json_encode($data); 
        $data['data'] = json_encode($medicionContinuaFiltroFechas); 

        return view('admin.panel-consumo', $data, compact('user', 'userId', 'deviceIds', 'end', 'start'));


    }

    public function dispositivosAsignados(Request $request){
        
        // Obtener el valor seleccionado del correo electrónico del request
        $idUsuario = $request->input('valor');
        //echo($valorEmail);

        // Buscar el dispositivo(s) asociado(s) al correo electrónico
        $getDispositivos = Instalacion::where('idUsuario', $idUsuario)->pluck('idDispositivo');
        
        // Inicializar una variable para almacenar los dispositivos como un arreglo
        $dispositivosArray = [];

        // Recorrer la colección de idDispositivos y agregarlos al arreglo
        foreach($getDispositivos as $dispositivo) {
            $dispositivosArray[] = $dispositivo;
        }

        // Retornar la respuesta JSON con los idDispositivos encontrados
        return response()->json([
            'message' => '¡Solicitud POST recibida correctamente!',
            'idUsuario' => $idUsuario,
            'dispositivos' => $dispositivosArray,
        ]);
    }





    

    
}
