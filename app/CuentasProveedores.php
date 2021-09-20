<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentasProveedores extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'dia_pago', 'dia_vencimiento',
        'nmro_cliente', 'user_id', 'proveedor_id',
        'tipo_cuenta_id',
    ];
}
