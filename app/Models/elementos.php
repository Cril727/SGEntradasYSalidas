<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class elementos extends Model
{
    //
    protected $table = 'elementos';
    protected $primaryKey = 'idElemento';

    protected $fillable = [
        'codigo',
        'nombre',
        'caracteristicas',
        'foto',
        'idTipo',
        'idPersona'
    ];


    public function tipo(){
        return $this->belongsTo(tipos::class, 'idTipo','idTipo');
    }

    public function persona(){
        return $this->belongsTo(personas::class, 'idPersona', 'idPersona');
    }

    public function ingresoElemento(){
        return $this->hasMany(ingresoElementos::class, 'idIngresoElemento', 'idIngresoElemento');
    } 
}
