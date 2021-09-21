<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residencias extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'direccion', 'comuna',
        'region', 'user_id',
    ];

    public function redise()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function residenciasToProveedor()
    {
        return $this->hasMany(Proveedor::class);
    }

    public function registraCtasProveedores()
    {
        return $this->hasMany(CuentasProveedores::class, 'residencia_id');
    }

}
