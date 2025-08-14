<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Cadastrar Ambiente</h4>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="cadastrarAmbiente">
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" wire:model="nome" class="form-control">
                    @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descricao</label>
                    <input type="text" wire:model="descricao" class="form-control">
                    @error('descricao') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" wire:model="status" class="form-control">
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
