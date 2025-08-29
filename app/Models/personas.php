<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    //
    protected $table = 'personas';
    protected $primaryKey = 'idPersona';

    protected $fillable = [
        'documento',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'password',
        'idFicha'
    ];

    protected $hidden = ['password','remember_token'];

    public function ficha(){
        //muchos a uno  belongsTo
        return $this->belongsTo(fichas::class, 'idFicha');
    }
}
