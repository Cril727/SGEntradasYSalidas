<?php

namespace App\Http\Controllers;

use App\Models\personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function agregarUsuario(Request $request){
        $validator = Validator::make($request->all(),[
        'documento' => 'required|string',
        'nombres'   => 'required|string',
        'apellidos' => 'required|string',
        'email'     => 'required|email',
        'telefono'  => 'nullable|string',
        'password'  => 'required|string|min:8|confirmed',
        'idFicha'   => 'nullable|exists:fichas,idFicha',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->validated();

        $persona = personas::create([
            'documento' => $request->documento,
            'nombres'   => $request->nombres,
            'apellidos' => $request->apellidos,
            'email'     => $request->email,
            'telefono'  => $request->telefono,
            'password'  => Hash::make($request->password),
            'idFicha'   => $request->idFicha,
        ]);

        $token = JWTAuth::fromUser($persona);

        return response()->json(["Persona" => $persona,
                                 "message"=>"Creado correctamente",
                                  "token"=>$token],201);

    }
}
