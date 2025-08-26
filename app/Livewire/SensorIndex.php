<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class SensorIndex extends Component
{
    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {
        $sensores = Sensor::where('nome', 'like', "%{$this->search}%")
        ->orWhere('descricao', 'like', "%{$this->search}%")
        ->orWhere('status', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.sensor-index');
    }
}
