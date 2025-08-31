<?php

namespace App\Http\Controllers;

use App\Models\ingresos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngresosController extends Controller
{
    //
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'fechaHora' => 'required|date_format:Y-m-d H:i:s',
            'observacion' => 'required|string',
            'idPersona' => 'required|exists:personas,idPersona'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ingreso = ingresos::create([
            'fechaHora' => $request->fechaHora,
            'observacion' => $request->observacion,
            'idPersona' => $request->idPersona
        ]);

        return response()->json(['success' => true, 'message' => 'Ingreso exitoso', 'registro' => $ingreso]);
    }
}
