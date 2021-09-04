<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /** Definicion de constantes */
    const RECETA_ID = 'receta_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Evento que se ejecuta cuando un usuario es creado
    protected static function boot()
    {
        parent::boot();

        //Asignar un perfil una vez se haya creado una usuario nuevo
        static::created(function($user) {
            $user->userToPerfil()->create();
        });
    }

    /** Relacion 1:n de Usuario a Receta */
    public function userToRecetas()
    {
        return $this->hasMany(Receta::class);
    }

    /** Relacion 1:1 de Usuario a Perfil */
    public function userToPerfil()
    {
        return $this->hasOne(Perfil::class);
    }

    //Relacion n:n de Usuario a Receta ! recetas que el usuario le a dado me gusta
    public function meGusta()
    {
        return $this->belongsToMany(Receta::class, 'likes_receta', 'user_id', 'receta_id' );
    }

    /** Relacion 1:n de Usuario a Receta */
    public function userToResidencias()
    {
        return $this->hasMany(Residencias::class);
    }

    public function userToProveedor()
    {
        return $this->hasMany(Proveedor::class, 'user_id');
    }


}
