<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    //
    public function listarRoles(){
        $rol = roles::all();
        return response()->json([$rol],200);
    }
    

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'rol' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->validated();

        $rol = roles::create([
            'rol' => $request->rol
        ]);

        return response()->json(['message' => 'Rol agregado Correctamente', 'rol'=> $rol],201);
    }
}
