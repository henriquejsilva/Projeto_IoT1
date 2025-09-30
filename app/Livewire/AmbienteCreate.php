<?php

namespace App\Livewire;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{
    public $nome, $descricao, $status;


    protected function cadastrarAmbiente()
    {

        $this->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'status' => 'required',
        ]);

        $this->validate();
         Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

        Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);
    
        session()->flash('sucess', 'Ambiente cadastrado com sucesso!');
        return redirect()->route('ambientes.create');
        $this->validate();

    }

    public function render()
    {
        return view('livewire.ambiente-create');
    }
}
