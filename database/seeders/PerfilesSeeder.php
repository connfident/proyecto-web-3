<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perfiles')->insert([
            ['id'=>1,'nombre'=>'Admin',],
            ['id'=>2,'nombre'=>'Artista',],
        ]);

        DB::table('cuentas')->insert([
            ['user' => "Admin", 'password'=>Hash::make('admin'),'nombre'=>'Admin 1','apellido'=>'Admin','perfil_id'=>1],
        ]);
    }
}
