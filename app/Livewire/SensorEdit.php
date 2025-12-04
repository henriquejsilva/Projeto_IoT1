<?php

namespace App\Livewire;

use App\Models\Sensor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SensorEdit extends Component
{
    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

     public function rules () {
        return [
            'codigo' => 'min:6',
            'tipo' => 'max:80',
            'descricao' => 'email|unique:users,email,'. $this->userId,
            'status' => 'max:11|unique:alunos,cpf,'
        ];
    } 

    public function mount($id)
    {
        $sensores = Sensor::find($id);
        if ($sensores == null){
            session()->flash('error', 'Sensor não encontrado');
            return redirect()->route('sensores.index');
        }
        $this->ambiente_id = $sensores->id;
        $this->codigo = $sensores->codigo;
        $this->tipo = $sensores->tipo;
        $this->descricao = $sensores->descricao;
        $this->status = $sensores->status;
    }

     public function save()
    {
        $sensores = Sensor::findOrFail($this->ambiente_id); 
        
        // $user = User::findOrFail($sensores->user->id); 

        $sensores->save([
            'codigo' => $this->codigo, 
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);
 

        // $user->email = $this->email;
        // if($this->password){
        //     $user->password = Hash::make($this->password); 
        // }

         $sensores->save(); 
       

        return redirect()->route('sensores.index')->with(['message' => 'Sensor Atualizado com sucesso']);
    }


    public function render()
    {
        return view('livewire.sensor-edit');
    }
}
