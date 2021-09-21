<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'created_at'
    ];

    public function hasManyCtasProveedor()
    {
        return $this->hasMany(CuentasProveedores::class, 'tipo_cuenta_id');
    }

}
