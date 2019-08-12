<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbRepositorio extends Model
{
    //


    protected $fillable = [
        'nombre_archivo', 'estatus', 'id_user_subio','fecha','descripcion'
    ];
}
