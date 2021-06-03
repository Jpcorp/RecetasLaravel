<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tipo_cuentas')->insert([
            'nombre' => 'Ctas por pagar',
            'descripcion' => 'Cuentas por pagar',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);

        DB::table('tipo_cuentas')->insert([
            'nombre' => 'Ctas por cobrar',
            'descripcion' => 'Cuentas por cobrar',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
