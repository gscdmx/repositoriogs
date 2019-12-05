<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbCarpetas extends Model
{
     protected $fillable = [
        'id_usuario','nombre_carpeta', 'estatus'
    ];
}


