<?php

use App\Proveedor;
use App\Residencias;
use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $residencias = Residencias::where('user_id', 2)->first();

        $proveedor = Proveedor::create([
            'nombre' => 'Vtr.com',
            'rut' => '76.114.143-0',
            'direccion' => 'Apoquindo N 4800 piso 11',
            'tlf' => '6008009000',
            'comuna' => 'Las Condes',
            'region' => 'RM',
            'giro' => 'Servicios de Telefonía Móvil / Instalación,
                       Explotación y Comercialización de Servicios de Telecomunicaciones',
            'descripcion' => 'Servicios de Telefonía Móvil y Servicios de Telecomunicaciones',
            'user_id' => 2,
            'residencias_id' => $residencias->id,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
