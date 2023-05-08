<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicionContinuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicion_continuas')->insert([
                
                array('caudalPromedio'=>179, 'tiempo'=>'00:00:01', 'volumen'=>0.05, 'idDispositivo'=>1),
                array('caudalPromedio'=>179, 'tiempo'=>'00:00:02', 'volumen'=>0.1, 'idDispositivo'=>1),
                array('caudalPromedio'=>238, 'tiempo'=>'00:00:03', 'volumen'=>0.17, 'idDispositivo'=>1),
                array('caudalPromedio'=>218, 'tiempo'=>'00:00:04', 'volumen'=>0.23, 'idDispositivo'=>1),
                array('caudalPromedio'=>348, 'tiempo'=>'00:00:05', 'volumen'=>0.32, 'idDispositivo'=>1),
                array('caudalPromedio'=>398, 'tiempo'=>'00:00:06', 'volumen'=>0.43, 'idDispositivo'=>1),
                array('caudalPromedio'=>407, 'tiempo'=>'00:00:07', 'volumen'=>0.55, 'idDispositivo'=>1),
                array('caudalPromedio'=>417, 'tiempo'=>'00:00:08', 'volumen'=>0.66, 'idDispositivo'=>1),
                array('caudalPromedio'=>407, 'tiempo'=>'00:00:09', 'volumen'=>0.78, 'idDispositivo'=>1),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:10', 'volumen'=>0.9, 'idDispositivo'=>1),
                array('caudalPromedio'=>467, 'tiempo'=>'00:00:11', 'volumen'=>1.03, 'idDispositivo'=>1),
                array('caudalPromedio'=>457, 'tiempo'=>'00:00:12', 'volumen'=>1.15, 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:13', 'volumen'=>1.28, 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:13', 'volumen'=>1.4, 'idDispositivo'=>1),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:14', 'volumen'=>1.52, 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:15', 'volumen'=>1.64, 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:16', 'volumen'=>1.77, 'idDispositivo'=>1),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:17', 'volumen'=>1.89, 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:18', 'volumen'=>2.01, 'idDispositivo'=>1),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:19', 'volumen'=>2.13, 'idDispositivo'=>1),

                /*array('caudalPromedio'=>179, 'tiempo'=>'00:00:01', 'idDispositivo'=>2),
                array('caudalPromedio'=>179, 'tiempo'=>'00:00:02', 'idDispositivo'=>2),
                array('caudalPromedio'=>238, 'tiempo'=>'00:00:03', 'idDispositivo'=>2),
                array('caudalPromedio'=>238, 'tiempo'=>'00:00:04', 'idDispositivo'=>2),*/

        ]);
    }
}

