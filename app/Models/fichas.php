<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fichas extends Model
{
    //
    protected $table = 'fichas';
    protected $primaryKey = 'idFicha';

    protected $fillable = [
        'numeroFicha',
        'fechaInicio',
        'fechaFinal'
    ];

}
