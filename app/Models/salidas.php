<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salidas extends Model
{
    //
    protected $table = 'salidas';
    protected $primaryKey = 'idSalida';

    protected $fillable = [
        'fechaHora',
        'observaciones',
        'idIngreso'
    ];

    public function ingreso(){
        return $this->belongsTo(ingresos::class, 'idIngreso', 'idIngreso');
    }

}
