<?php

namespace App\Http\Controllers;

use App\Models\elementos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ElementosController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string',
            'nombre' => 'required|string',
            'caracteristicas' => 'required|string',
            'foto' => 'required|string',
            'idTipo' => 'required|exists:tipos,idTipo',
            'idPersona' => 'required|exists:personas,idPersona'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $elemento = elementos::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'caracteristicas' => $request->caracteristicas,
            'foto' => $request->foto,
            'idTipo' => $request->idTipo,
            'idPersona' => $request->idPersona
        ]);

        return response()->json(['success' => true, 'elemento' => $elemento]);
    }
}
