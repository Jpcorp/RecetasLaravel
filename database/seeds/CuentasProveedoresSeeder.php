<?php

use App\User;
use App\Proveedor;
use App\TipoCuenta;
use App\Residencias;
use App\CuentasProveedores;
use Illuminate\Database\Seeder;

class CuentasProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         $residencia = Residencias::where('id', 1)->first();
         $user = User::where('id', 2)->first();
         $proveedor = Proveedor::where('id', 1)->first();
         $tipocta = TipoCuenta::where('id', 1)->first();

         $ctas = CuentasProveedores::create([
             'nombre' => 'Servicio de internet',
             'dia_pago' => '1',
             'dia_vencimiento' => '5',
             'nmro_cliente' => '12212332',
             'user_id' =>  $user->id,
             'proveedor_id' => $proveedor->id,
             'residencia_id' => $residencia->id,
             'tipo_cuenta_id' => $tipocta->id,
             'created_at' => date('Y-m-d H:m:s'),
             'updated_at' => date('Y-m-d H:m:s'),
         ]);
    }
}
