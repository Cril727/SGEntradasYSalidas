<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    //
    protected $table = 'roles';
    protected $primaryKey = 'idRol';

    protected $fillable = [
        'rol'
    ];

    public function personas(){
        return $this->belongsToMany(personas::class,'idRolPersona', 'idRol', 'idPersona');
    }
}
