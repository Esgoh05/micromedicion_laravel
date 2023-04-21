<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'Fanny',
            'phone' => '9622796913',
            'email' => 'ada_hack143@hackademy.mx',
            'password' => Hash::make('password'),
            'foto_perfil' => 'gatito.jpg',
        ]);
    }
}
