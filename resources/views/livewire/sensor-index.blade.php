<div class="mt-5">
      <div class="row mb-3">
        <div class="col-md-6">
            <h2>Sensor</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('sensores.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Novo Sensor
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.debounce.300ms="search" class="form-control"
                        placeholder="Buscar Sensores...">
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
                            <th>Codigo</th>
                            <th>Tipo</th>
                            <th>Descricao</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensores as $sensores)
                            <tr>
                                <td>{{ $sensores->codigo }}</td>
                                <td>{{ $sensores->tipo }}</td>
                                <td>{{ $sensores->descricao }}</td>
                                <td>
                                    <a href="{{ route('sensores.index') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('sensores.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum Sensor encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
