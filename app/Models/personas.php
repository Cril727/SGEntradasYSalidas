<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable ;
use Tymon\JWTAuth\Contracts\JWTSubject;

class personas extends Authenticatable implements JWTSubject
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

    public function roles(){
        return $this->belongsToMany(roles::class, 'rolPersonas', 'idPersona', 'idRol');
    }

    public function elementos(){
        return $this->hasMany(elementos::class, 'idPersona', 'idPersona');
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

}
