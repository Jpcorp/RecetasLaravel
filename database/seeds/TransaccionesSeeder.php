<?php

use App\CuentasProveedores;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = User::where('id', 1)->first();
        $cuentasProveedores = CuentasProveedores::where('id', 1)->first();

        DB::table('transacciones')->insert([
            'user_id' => $usuarios->id,
            'cuenta_proveedores_id' => $cuentasProveedores->id,
            'fecha_pago' => date('Y-m-d'),
            'monto' => 16000,
            'rectificatoria' => 'no',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
