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
            //$data = [
                
                array('caudalPromedio'=>179, 'tiempo'=>'00:00:01'),
                array('caudalPromedio'=>179, 'tiempo'=>'00:00:02'),
                array('caudalPromedio'=>238, 'tiempo'=>'00:00:03'),
                array('caudalPromedio'=>218, 'tiempo'=>'00:00:04'),
                array('caudalPromedio'=>348, 'tiempo'=>'00:00:05'),
                array('caudalPromedio'=>398, 'tiempo'=>'00:00:06'),
                array('caudalPromedio'=>407, 'tiempo'=>'00:00:07'),
                array('caudalPromedio'=>417, 'tiempo'=>'00:00:08'),
                array('caudalPromedio'=>407, 'tiempo'=>'00:00:09'),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:10'),
                array('caudalPromedio'=>467, 'tiempo'=>'00:00:11'),
                array('caudalPromedio'=>457, 'tiempo'=>'00:00:12'),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:13'),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:14'),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:15'),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:16'),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:17'),
                array('caudalPromedio'=>437, 'tiempo'=>'00:00:18'),
                array('caudalPromedio'=>447, 'tiempo'=>'00:00:19'),


                //'caudalPromedio'=>179, 'tiempo'=>'00:00:01',
                //'caudalPromedio'=>179, 'tiempo'=>'00:00:02',
                //'caudalPromedio'=>238, 'tiempo'=>'00:00:03',
                //'caudalPromedio'=>218, 'tiempo'=>'00:00:04',
                //'caudalPromedio'=>348, 'tiempo'=>'00:00:05',
                //'caudalPromedio'=>398, 'tiempo'=>'00:00:06',
                //'caudalPromedio'=>407, 'tiempo'=>'00:00:07',
                //'caudalPromedio'=>417, 'tiempo'=>'00:00:08',
                //'caudalPromedio'=>407, 'tiempo'=>'00:00:09',
                //'caudalPromedio'=>437, 'tiempo'=>'00:00:10',
                //'caudalPromedio'=>467, 'tiempo'=>'00:00:11',
                //'caudalPromedio'=>457, 'tiempo'=>'00:00:12',
                //'caudalPromedio'=>447, 'tiempo'=>'00:00:13',
                //'caudalPromedio'=>447, 'tiempo'=>'00:00:14',
                //'caudalPromedio'=>437, 'tiempo'=>'00:00:15',
                //'caudalPromedio'=>447, 'tiempo'=>'00:00:16',
                //'caudalPromedio'=>447, 'tiempo'=>'00:00:17',
                //'caudalPromedio'=>437, 'tiempo'=>'00:00:18',
                //'caudalPromedio'=>447, 'tiempo'=>'00:00:19',
                
            //];
        ]);
    }
}

