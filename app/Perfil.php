<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    /** Relacion 1:1 de Perfil a Usuario */
    public function perfilToUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
