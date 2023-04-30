<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicionContinua extends Model
{
    protected $table = 'medicion_continuas';

    protected $fillable = [
        'caudalPromedio',
        'tiempo',
        'volumen',
    ];
}
