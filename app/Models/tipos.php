<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipos extends Model
{
    //
    protected $table = 'tipos';
    protected $primaryKey = 'idTipo';

    protected $fillable = [
        'tipo'
    ];
}
