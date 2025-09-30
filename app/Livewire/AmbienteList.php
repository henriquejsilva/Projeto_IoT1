<?php

namespace App\Livewire;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteList extends Component
{

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {
        $ambientes = Ambiente::where('nome', 'like', "%{$this->search}%")
        ->orWhere('descricao', 'like', "%{$this->search}%")
        ->orWhere('status', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.ambiente-list', compact('ambientes'));
    }
}
