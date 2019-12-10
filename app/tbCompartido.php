<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbCompartido extends Model
{
    protected $fillable = [
        'nombre_archivo', 'estatus', 'id_user_subio', 'user_compartio'
    ];
}
