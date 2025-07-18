<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    //use HasFactory;
    protected $table = 'instalacion';

    protected $fillable = [
        'idUsuario',
        'idDispositivo',
        'diametroTuberia',
        'ssid',
        'passwordSsid',
        'ubicacionDispositivo',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'idUsuario');
    }

    public function device(){
        return $this->belongsTo(Device::class, 'idDispositivo');
    }
}
