<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Editar Sensor</h4>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Código</label>
                    <input type="text" class="form-control" wire:model.defer="codigo">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <textarea class="form-control" wire:model.defer="tipo"></textarea>
                </div>
                 <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" wire:model.defer="descricao"></textarea>
                </div>

                 <select class="form-select" aria-label="default-select example"@error('status') is-invalid @enderror
                id="status" wire:model.defer="status" placeholder="">
                <option hidden></option>
                <option value="1">True</option>
                <option value="0">False</option>
            </select>
            @error('cargo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            <br>
                <button class="btn btn-success">Atualizar</button>
                <a href="{{ route('sensores.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>