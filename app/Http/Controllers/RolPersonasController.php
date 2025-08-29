<?php

namespace App\Http\Controllers;

use App\Models\rolPersonas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolPersonasController extends Controller
{
    //
    public function asignarRol(Request $request){
        $validator = Validator::make($request->all(),[
            'idRol' => 'required|exists:roles,idRol',
            'idPersona' =>'required|exists:personas,idPersona'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $asigar = rolPersonas::create([
            'idRol' => $request->idRol,
            'idPersona' => $request->idPersona
        ]);

        return response()->json(['message' => 'Rol asigando Correctamente']);
    }

    
}
