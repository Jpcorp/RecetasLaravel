<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'rut', 'direccion', 'tlf',
        'comuna', 'region', 'giro',
        'descripcion', 'user_id', 'residencias_id',

    ];

    //Obtiene la informacion por via PK
    public function provee()
    {
        return $this->belongsTo(User::class, 'user_id') ;//fk de la tabla
    }

    public function prestaServicio()
    {
        return $this->belongsTo(Residencias::class, 'residencias_id');
    }

}
