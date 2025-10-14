<div class="mt-5">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Ambiente</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('ambientes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Novo Dispositivo
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.debounce.300ms="search" class="form-control"
                        placeholder="Buscar Ambientes...">
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensor as $s)
                            <tr>
                                <td>{{ $sensor->codigo }}</td>
                                <td>{{ $sensor->tipo }}</td>
                                <td class = "align-middle">
                                    <span class="badge {{ $s->status == 1 ? 'bg-success' : 'bg-secondary'}}">
                                        {{$s->status == 1 ? 'Ativo' : 'Inativo'}}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <button wire:click="toggleStatus({{ $s->id}})"
                                        class="btn btn-sm {{ $s->status == 1 ? 'btn-danger' : 'btn-success'}}">
                                        {{ $s->status == 1 ? 'Desativar' : 'Ativar'}}
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum Ambiente encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
