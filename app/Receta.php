<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    const USER_ID = 'user_id';

    protected $fillable = [
        'titulo', 'ingredientes', 'imagen', 'categoria_id', 'preparacion',
    ];

    //Obtiene la categoria de la receta via FK
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    //Obtiene la informacion por via PK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id') ;//fk de la tabla
    }

    //Relacion n:n de Usuario a Receta ! likes que se ha recibido una receta
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta', 'user_id', 'receta_id');
    }
}
