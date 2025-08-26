<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{
    public $ambiente_id, $codigo, $tipo, $descricao, $status;


    protected function cadastrarSensor()
    {
        Sensor::create([
            'ambiente_id' => $this->ambiente->id,
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);
    
        session()->flash('sucess', 'Sensor cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.sensor-create');
    }
}
