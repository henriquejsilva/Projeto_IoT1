<?php

namespace App\Livewire;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{
    public $nome, $descricao, $status;

    protected $rules = [
        'nome' => 'required|min:2|max:255',
        'status' => 'required'
    ];

    protected $messages = [

    ];

    public function store(){
    $this->validate();

    Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);
    
        session()->flash('sucess', 'Ambiente cadastrado com sucesso!');
        return redirect()->route('ambientes.index');
    }

    public function render()
    {
        return view('livewire.ambiente-create');
    }
}
