<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class SensorIndex extends Component
{
    public $search = '';
    public $perPage = 15;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];
    

    public function render()
    {
        $sensores = Sensor::where('ambiente_id', 'like', "%{$this->search}%")
        ->orWhere('codigo', 'like', "%{$this->search}%")
        ->orWhere('tipo', 'like', "%{$this->search}%")
        ->orWhere('descricao', 'like', "%{$this->search}%")
        ->orWhere('status', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.sensor-index', compact('sensores'));
    }
      public function delete($id){
        Sensor::findOrFail($id)->delete();
        session()->flash('message', 'Sensor deletado com sucesso');
    }
}
