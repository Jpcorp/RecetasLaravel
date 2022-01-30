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
        'tipo_cuenta_id', 'residencia_id'
    ];

    public function tieneProveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function tieneResidencia ()
    {
        return $this->belongsTo(Residencias::class, 'residencias_id');
    }

    public function tieneTipoCta ()
    {
        return $this->belongsTo(TipoCuenta::class, 'tipo_cuenta_id');
    }

    public function tieneInscrito()
    {
        return $this->belongsTo(User::class, 'user_id') ;//fk de la tabla
    }


}
