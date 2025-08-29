<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingresos extends Model
{
    //
    protected $table = 'ingresos';
    protected $primaryKey = 'idIngreso';

    protected $fillable = [
        'fechaHora',
        'observacion',
        'idPersona'
    ];


    public function persona(){
        return $this->belongsTo(personas::class, 'idPersona', 'idPersona');
    }
}
