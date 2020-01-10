<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbCompartido extends Model
{
    //
    protected $fillable = [
        'id_archivo', 'estatus', 'id_user_subio', 'id_user_compartio'
    ];
}
