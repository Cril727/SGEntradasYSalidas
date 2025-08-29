<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    //
    public function store(Request $reques){
        $validator = Validator::make($reques->all(),[
            'rol' => 'require|string'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->validated();

        $rol = roles::create([
            'rol' => $reques->rol
        ]);

        return response()->json(['message' => 'Rol agregado Correctamente', 'rol'=> $rol],201);
    }
}
