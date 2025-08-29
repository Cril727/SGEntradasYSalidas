<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingresoElementos extends Model
{
    //
    protected $table = 'ingresoElementos';
    protected $primaryKey = 'idIngresoElemento';

    protected $fillable = [
        'idIngreso',
        'idElemento',
        'estado'
    ];

    public function ingreso(){
        return $this->belongsTo(ingresos::class, 'idIngreso', 'idIngreso');
    }

    public function elemento(){
        return $this->belongsTo(elementos::class, 'idElemento', 'idElemento');
    }
}
