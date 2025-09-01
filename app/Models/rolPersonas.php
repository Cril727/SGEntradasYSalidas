<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rolPersonas extends Model
{
    //
    protected $table = 'rolPersonas';
    protected $primaryKey = 'idRolPersona';

    protected $fillable = [
        'idRol',
        'idPersona'
    ];

    //relacion con roles
    public function role(){
        return $this->belongsTo(roles::class, 'idRol', 'idRol');
    }

    public function personas(){
        return $this->belongsTo(personas::class, 'idPersona', 'idPersona');
    }




}
