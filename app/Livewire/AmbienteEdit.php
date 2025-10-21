<?php

namespace App\Livewire;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{
   public $ambiente_id;
    public $nome;
    public $descricao;
    public $status;
    public $ambiente;

    public function mount($id)

    {
        $ambiente = Ambiente::find($id);

       
        if($ambiente == null){
            session()->flash('danger', 'Ambiente não encontrado');
            return redirect()->route('ambiente.list');
        }
       
        $this->ambiente_id = $ambiente->id;
        $this->ambiente = $ambiente->id;
        $this->nome = $ambiente->nome;
        $this->descricao = $ambiente->descricao;
        $this->status = $ambiente->status;
    }

    public function salvar()
    {
        $ambiente = Ambiente::find($this->ambiente_id);


        $ambiente->update([
            'ambiente_id' => $this->ambiente_id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);
       
        $ambiente->save();
        session()->flash('success', 'Ambiente Atualizado');
        return redirect()->route('ambiente.list');
    }
    public function render()
    {
        return view('livewire.ambiente-edit');
    }
}
