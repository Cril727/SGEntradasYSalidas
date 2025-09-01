<?php

namespace App\Http\Controllers;

use App\Models\ingresoElementos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class IngresoElementosController extends Controller
{
    //

    public function index(){
        $ingresos = ingresoElementos::all();

        return response()->json(['ingresos' => $ingresos]);
    }

    public function elementoPersona(){
        $elementoPersona = ingresoElementos::where('documento');
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'idIngreso' => 'required|exists:ingresos,idIngreso',
            'idElemento' => 'required|exists:elementos,idElemento',
            'estado' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $ingresoElemento = ingresoElementos::create([
            'idIngreso' => $request->idIngreso,
            'idElemento' => $request->idElemento,
            'estado' => $request->estado
        ]);

        return response()->json(['success' => true, 'message' => 'Elemento ingresado Correctamente', 'ingreso elemento' => $ingresoElemento]);
    }


    public function update(Request $request, string $idIngresoElemento){
        $ingresoElemento = ingresoElementos::find($idIngresoElemento);

        $validator = Validator::make($request->all(),[
            'idIngreso' => 'required|exists:ingresos,idIngreso',
            'idElemento' => 'required|exists:elementos,idElemento',
            'estado' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $ingresoElemento->update($validator->validated());
        return response()->json(["Success" => true, "Message" => "Actualizado Correctamente" , $ingresoElemento], 200);
    }
}
