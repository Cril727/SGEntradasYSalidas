<?php

namespace App\Http\Controllers;

use App\Models\personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    //
    public function personaPorDocumento(string $documento)
    {

        $persona = personas::where('documento', $documento)
            ->with([
                'elementos.tipo',
                'elementos.ultimoIngresoElemento',
                'roles'
            ])->first();

        if (!$persona) {
            return response()->json(['success' => false, 'error' => 'persona no encontrada'], 404);
        }

        return response()->json(['success' => true, 'persona' => $persona], 200);
    }


}
