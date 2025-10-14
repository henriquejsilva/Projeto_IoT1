<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function show(Request $request){
        $sensor = Sensor::where('codigo', $request->codigo)->first();

        if($sensor){
            return response()->json(['error'=> 'Sensor não encontrado'], 404);
        }
        return response()->json([
            'success' => 'Sensor encontrado',
            'status' => $sensor->status
        ]);
    }

    public function update(Request $request){
        $sensor = Sensor::where('codigo', $request->codigo)->first();
        if($sensor){
            return response()->json(['error' => 'Sensor não encontrado'], 404);
        }

        $sensor->update([
            'status'=> $request->status
        ]);

        return response()->json([
            'success' => 'Sensor Atualizado',
            'status' => $sensor
        ]);
    }
}
