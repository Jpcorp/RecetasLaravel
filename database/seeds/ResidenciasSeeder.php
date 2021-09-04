<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residencias')->insert([
            'nombre' => 'Casa 28',
            'direccion' => 'Thiare 1195',
            'comuna' => 'Santiago',
            'region' => 'RM',
            'user_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
