<?php

namespace App\Http\Controllers;

use App\Models\tipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TiposController extends Controller
{
    //

    public function index(){
        $tipos = tipos::all();

        return response()->json(['tipos' => $tipos]);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'tipo' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $tipo = tipos::create([
            'tipo' => $request->tipo
        ]);

        return response()->json(['success' => true, 'message' => 'Tipo creado correctamnete', 'tipo' => $tipo],201);
    }
}
