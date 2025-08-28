<div class="container mt-5">
   <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Cadastrar Sensor</h4>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                     <div class="mb-3">
                         <option selected class="form-label">Ambiente</option>
                          <select class="form-select" aria-label="Default select example" wire:model.defer='ambiente_id' id="ambiente_id">
                            <option selected>Ambiente</option>
                        @foreach ($ambientes as $a)
                        <option value="{{$a->id}}">{{$a->nome}}</option>
                        @endforeach
                        </select>
                     </div>

            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <label class="form-label">Codigo</label>
                    <input type="text" wire:model="codigo" class="form-control">
                    @error('codigo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <input type="text" wire:model="tipo" class="form-control">
                    @error('tipo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" wire:model="descricao" class="form-control">
                    @error('descricao') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>

                    <select class="form-select @error('status') is-invalid @enderror" id="status"  wire:model.defer="status">
                        <option hidden></option>
                        <option value="1">ativo</option>
                        <option value="0">inativo</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
