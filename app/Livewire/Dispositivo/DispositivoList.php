<?php

namespace App\Livewire\Dispositivo;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sensor;

class DispositivoList extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 15;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function toggleStatus($sensorId){
        $sensor = Sensor::find($sensorId);
        if ($sensor){
            $sensor->status = ($sensor->status == 1) ? 0 : 1;
            $sensor->save();
        }
    }

    public function render()
    {
        $sensor = Sensor::where('codigo', 'like', "%{}|$this->search%")
        ->orWhere('tipo', 'like', "%{$this->search}%")
        ->orWhere('status', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.dispositivo.dispositivo-list', compact('sensor'));
    }
}
