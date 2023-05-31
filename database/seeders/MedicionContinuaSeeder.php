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
                
                /*array('caudalpromedio'=>179, 'tiempo'=>'00:00:01', 'volumen'=>0.05, 'fin'=>'2023-05-9 22:25:05', 'iddispositivo'=>1),
                array('caudalpromedio'=>179, 'tiempo'=>'00:00:02', 'volumen'=>0.1, 'fin'=>'2023-05-9 22:25:06', 'iddispositivo'=>1),
                array('caudalpromedio'=>238, 'tiempo'=>'00:00:03', 'volumen'=>0.17, 'fin'=>'2023-05-9 22:25:07', 'iddispositivo'=>1),
                array('caudalpromedio'=>218, 'tiempo'=>'00:00:04', 'volumen'=>0.23, 'fin'=>'2023-05-9 22:25:08', 'iddispositivo'=>1),
                array('caudalpromedio'=>348, 'tiempo'=>'00:00:05', 'volumen'=>0.32, 'fin'=>'2023-05-9 22:25:09', 'iddispositivo'=>1),
                array('caudalpromedio'=>398, 'tiempo'=>'00:00:06', 'volumen'=>0.43, 'fin'=>'2023-05-9 22:25:10', 'iddispositivo'=>1),
                array('caudalpromedio'=>407, 'tiempo'=>'00:00:07', 'volumen'=>0.55, 'fin'=>'2023-05-9 22:25:11', 'iddispositivo'=>1),
                array('caudalpromedio'=>417, 'tiempo'=>'00:00:08', 'volumen'=>0.66, 'fin'=>'2023-05-9 22:25:12', 'iddispositivo'=>1),
                array('caudalpromedio'=>407, 'tiempo'=>'00:00:09', 'volumen'=>0.78, 'fin'=>'2023-05-9 22:25:13', 'iddispositivo'=>1),
                array('caudalpromedio'=>437, 'tiempo'=>'00:00:10', 'volumen'=>0.9, 'fin'=>'2023-05-9 22:25:14', 'iddispositivo'=>1),
                array('caudalpromedio'=>467, 'tiempo'=>'00:00:11', 'volumen'=>1.03, 'fin'=>'2023-05-9 22:25:15', 'iddispositivo'=>1),
                array('caudalpromedio'=>457, 'tiempo'=>'00:00:12', 'volumen'=>1.15, 'fin'=>'2023-05-9 22:25:16', 'iddispositivo'=>1),
                array('caudalpromedio'=>447, 'tiempo'=>'00:00:13', 'volumen'=>1.28, 'fin'=>'2023-05-9 22:25:17', 'iddispositivo'=>1),
                array('caudalpromedio'=>447, 'tiempo'=>'00:00:13', 'volumen'=>1.4, 'fin'=>'2023-05-9 22:25:18', 'iddispositivo'=>1),
                array('caudalpromedio'=>437, 'tiempo'=>'00:00:14', 'volumen'=>1.52, 'fin'=>'2023-05-9 22:25:19', 'iddispositivo'=>1),
                array('caudalpromedio'=>447, 'tiempo'=>'00:00:15', 'volumen'=>1.64, 'fin'=>'2023-05-9 22:25:20', 'iddispositivo'=>1),
                array('caudalpromedio'=>447, 'tiempo'=>'00:00:16', 'volumen'=>1.77, 'fin'=>'2023-05-9 22:25:21', 'iddispositivo'=>1),
                array('caudalpromedio'=>437, 'tiempo'=>'00:00:17', 'volumen'=>1.89, 'fin'=>'2023-05-9 22:25:22', 'iddispositivo'=>1),
                array('caudalpromedio'=>447, 'tiempo'=>'00:00:18', 'volumen'=>2.01, 'fin'=>'2023-05-9 22:25:23', 'iddispositivo'=>1),
                array('caudalpromedio'=>437, 'tiempo'=>'00:00:19', 'volumen'=>2.13, 'fin'=>'2023-05-9 22:25:24', 'iddispositivo'=>1),

                array('caudalpromedio'=>179, 'tiempo'=>'00:00:02', 'volumen'=>0.1, 'fin'=>'2023-05-10 22:25:06', 'iddispositivo'=>1),
                array('caudalpromedio'=>238, 'tiempo'=>'00:00:03', 'volumen'=>0.17, 'fin'=>'2023-05-10 22:25:07', 'iddispositivo'=>1),
                array('caudalpromedio'=>218, 'tiempo'=>'00:00:04', 'volumen'=>0.23, 'fin'=>'2023-05-10 22:25:08', 'iddispositivo'=>1),
                array('caudalpromedio'=>348, 'tiempo'=>'00:00:05', 'volumen'=>0.32, 'fin'=>'2023-05-10 22:25:09', 'iddispositivo'=>1),
                array('caudalpromedio'=>398, 'tiempo'=>'00:00:06', 'volumen'=>0.43, 'fin'=>'2023-05-10 22:25:10', 'iddispositivo'=>1),
                array('caudalpromedio'=>407, 'tiempo'=>'00:00:07', 'volumen'=>0.55, 'fin'=>'2023-05-10 22:25:11', 'iddispositivo'=>1),
                array('caudalpromedio'=>417, 'tiempo'=>'00:00:08', 'volumen'=>0.66, 'fin'=>'2023-05-10 22:25:12', 'iddispositivo'=>1),
                array('caudalpromedio'=>407, 'tiempo'=>'00:00:09', 'volumen'=>0.78, 'fin'=>'2023-05-10 22:25:13', 'iddispositivo'=>1),

                array('caudalpromedio'=>179, 'tiempo'=>'00:00:02', 'volumen'=>0.1, 'fin'=>'2023-05-10 22:25:06', 'iddispositivo'=>2),
                array('caudalpromedio'=>238, 'tiempo'=>'00:00:03', 'volumen'=>0.17, 'fin'=>'2023-05-10 22:25:07', 'iddispositivo'=>2),
                array('caudalpromedio'=>218, 'tiempo'=>'00:00:04', 'volumen'=>0.23, 'fin'=>'2023-05-10 22:25:08', 'iddispositivo'=>2),
                array('caudalpromedio'=>348, 'tiempo'=>'00:00:05', 'volumen'=>0.32, 'fin'=>'2023-05-10 22:25:09', 'iddispositivo'=>2),
                array('caudalpromedio'=>398, 'tiempo'=>'00:00:06', 'volumen'=>0.43, 'fin'=>'2023-05-10 22:25:10', 'iddispositivo'=>2),
                array('caudalpromedio'=>407, 'tiempo'=>'00:00:07', 'volumen'=>0.55, 'fin'=>'2023-05-10 22:25:11', 'iddispositivo'=>2),
                array('caudalpromedio'=>417, 'tiempo'=>'00:00:08', 'volumen'=>0.66, 'fin'=>'2023-05-10 22:25:12', 'iddispositivo'=>2),
                array('caudalpromedio'=>407, 'tiempo'=>'00:00:09', 'volumen'=>0.78, 'fin'=>'2023-05-10 22:25:13', 'iddispositivo'=>2),

                array('caudalpromedio'=>179, 'tiempo'=>'00:00:02', 'volumen'=>0.1, 'fin'=>'2023-05-11 22:25:06', 'iddispositivo'=>3),
                array('caudalpromedio'=>238, 'tiempo'=>'00:00:03', 'volumen'=>0.17, 'fin'=>'2023-05-11 22:25:07', 'iddispositivo'=>3),
                array('caudalpromedio'=>218, 'tiempo'=>'00:00:04', 'volumen'=>0.23, 'fin'=>'2023-05-11 22:25:08', 'iddispositivo'=>3),
                array('caudalpromedio'=>348, 'tiempo'=>'00:00:05', 'volumen'=>0.32, 'fin'=>'2023-05-11 22:25:09', 'iddispositivo'=>3),
                array('caudalpromedio'=>398, 'tiempo'=>'00:00:06', 'volumen'=>0.43, 'fin'=>'2023-05-11 22:25:10', 'iddispositivo'=>3),
                array('caudalpromedio'=>407, 'tiempo'=>'00:00:07', 'volumen'=>0.55, 'fin'=>'2023-05-11 22:25:11', 'iddispositivo'=>3),
                array('caudalpromedio'=>417, 'tiempo'=>'00:00:08', 'volumen'=>0.66, 'fin'=>'2023-05-11 22:25:12', 'iddispositivo'=>3),
                array('caudalpromedio'=>407, 'tiempo'=>'00:00:09', 'volumen'=>0.78, 'fin'=>'2023-05-11 22:25:13', 'iddispositivo'=>3),*/

                array('created_at'=>'2023-06-11 22:25:06', 'caudalpromedio'=>179, 'tiempo'=>'00:00:02', 'volumen'=>0.1, 'fin'=>'2023-06-11 22:25:06', 'iddispositivo'=>1),




        ]);
    }
}

