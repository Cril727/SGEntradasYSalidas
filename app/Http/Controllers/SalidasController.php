<?php

namespace App\Http\Controllers;

use App\Models\salidas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalidasController extends Controller
{
    //
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'fechaHora' => 'required|date_format:Y-m-d H:i:s',
            'observaciones' => 'required|string',
            'idIngreso' => 'required|exists:ingresos,idIngreso'
        ]);
        
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $salida = salidas::create([
            'fechaHora' => $request->fechaHora,
            'observaciones' => $request->observaciones,
            'idIngreso' => $request->idIngreso
        ]);


        return response()->json(['success' => false,'message' => 'Salida exitosa', 'salida' => $salida]);
    }
}
