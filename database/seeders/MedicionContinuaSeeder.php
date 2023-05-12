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
                
                /*array('caudalPromedio'=>179, 'tiempo'=>'00:00:01', 'volumen'=>0.05, 'fin'=>'2023-05-9 22:25:05', 'idDispositivo'=>1),
                array('caudalPromedio'=>179, 'tiempo'=>'00:00:02', 'volumen'=>0.1, 'fin'=>'2023-05-9 22:25:06', 'idDispositivo'=>1),
                array('caudalPromedio'=>238, 'tiempo'=>'00:00:03', 'volumen'=>0.17, 'fin'=>'2023-05-9 22:25:07', 'idDispositivo'=>1),
                array('caudalPromedio'=>218, 'tiempo'=>'00:00:04', 'volumen'=>0.23, 'fin'=>'2023-05-9 22:25:08', 'idDispositivo'=>1),
                array('caudalPromedio'=>348, 'tiempo'=>'00:00:05', 'volumen'=>0.32, 'fin'=>'2023-05-9 22:25:09', 'idDispositivo'=>1),
                array('caudalPromedio'=>398, 'tiempo'=>'00:00:06', 'volumen'=>0.43, 'fin'=>'2023-05-9 22:25:10', 'idDispositivo'=>1),
                array('caudalPromedio'=>407, 'tiempo'=>'00:00:07', 'volumen'=>0.55, 'fin'=>'2023-05-9 22:25:11', 'idDispositivo'=>1),
                array('caudalPromedio'=>417, 'tiempo'=>'00:00:08', 'volumen'=>0.66, 'fin'=>'2023-05-9 22:25:12', 'idDispositivo'=>1),
                array('caudalPromedio'=>407, 'tiempo'=>'00:00:09', 'volumen'=>0.78, 'fin'=>'2023-05-9 22:25:13', 'idDispositivo'=>1),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:10', 'volumen'=>0.9, 'fin'=>'2023-05-9 22:25:14', 'idDispositivo'=>1),
                array('caudalPromedio'=>467, 'tiempo'=>'00:00:11', 'volumen'=>1.03, 'fin'=>'2023-05-9 22:25:15', 'idDispositivo'=>1),
                array('caudalPromedio'=>457, 'tiempo'=>'00:00:12', 'volumen'=>1.15, 'fin'=>'2023-05-9 22:25:16', 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:13', 'volumen'=>1.28, 'fin'=>'2023-05-9 22:25:17', 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:13', 'volumen'=>1.4, 'fin'=>'2023-05-9 22:25:18', 'idDispositivo'=>1),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:14', 'volumen'=>1.52, 'fin'=>'2023-05-9 22:25:19', 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:15', 'volumen'=>1.64, 'fin'=>'2023-05-9 22:25:20', 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:16', 'volumen'=>1.77, 'fin'=>'2023-05-9 22:25:21', 'idDispositivo'=>1),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:17', 'volumen'=>1.89, 'fin'=>'2023-05-9 22:25:22', 'idDispositivo'=>1),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:18', 'volumen'=>2.01, 'fin'=>'2023-05-9 22:25:23', 'idDispositivo'=>1),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:19', 'volumen'=>2.13, 'fin'=>'2023-05-9 22:25:24', 'idDispositivo'=>1),*/

                array('caudalPromedio'=>179, 'tiempo'=>'00:00:02', 'volumen'=>0.1, 'fin'=>'2023-05-10 22:25:06', 'idDispositivo'=>1),
                array('caudalPromedio'=>238, 'tiempo'=>'00:00:03', 'volumen'=>0.17, 'fin'=>'2023-05-10 22:25:07', 'idDispositivo'=>1),
                array('caudalPromedio'=>218, 'tiempo'=>'00:00:04', 'volumen'=>0.23, 'fin'=>'2023-05-10 22:25:08', 'idDispositivo'=>1),
                array('caudalPromedio'=>348, 'tiempo'=>'00:00:05', 'volumen'=>0.32, 'fin'=>'2023-05-10 22:25:09', 'idDispositivo'=>1),
                array('caudalPromedio'=>398, 'tiempo'=>'00:00:06', 'volumen'=>0.43, 'fin'=>'2023-05-10 22:25:10', 'idDispositivo'=>1),
                array('caudalPromedio'=>407, 'tiempo'=>'00:00:07', 'volumen'=>0.55, 'fin'=>'2023-05-10 22:25:11', 'idDispositivo'=>1),
                array('caudalPromedio'=>417, 'tiempo'=>'00:00:08', 'volumen'=>0.66, 'fin'=>'2023-05-10 22:25:12', 'idDispositivo'=>1),
                array('caudalPromedio'=>407, 'tiempo'=>'00:00:09', 'volumen'=>0.78, 'fin'=>'2023-05-10 22:25:13', 'idDispositivo'=>1),

        ]);
    }
}

