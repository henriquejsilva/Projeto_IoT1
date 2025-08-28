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
                    <form class="d-flex">

                    <input class="form-control me-4" type="search" name="search" placeholder="Buscar por Sensor" aria-label="search" wire:model.live="search">
                    </form>
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
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

                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensores as $sensor)
                            <tr>
                                <td>{{ $sensor->codigo }}</td>
                                <td>{{ $sensor->tipo }}</td>
                                <td>{{ $sensor->descricao }}</td>
                                <td>{{ $sensor->status }}</td>

                                <td>
                                   

                                    <a href="{{ route('sensores.edit', $sensor->id) }}"
                                    class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            <button wire:click="delete({{$sensor->id}})"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Tem Certeza')">
                                    <i class="bi bi-person-x-fill"></i>
                                </button>                                      
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum sensor encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex flex-column align-items-center mt-3">
                        <div class="mb-2">
                            Mostrando {{ $sensores->firstItem() }} até {{ $sensores->lastItem() }} de
                            {{ $sensores->total() }} resultados
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                             
                                <li class="page-item {{ $sensores->onFirstPage() ? 'disabled' : '' }}">
                                    <a href="#" class="page-link" wire:click.prevent="previousPage"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                @foreach ($sensores->getUrlRange(1, $sensores->lastPage()) as $page => $url)
                                    <li class="page-item {{ $sensores->currentPage() == $page ? 'active' : '' }}">
                                        <a href="#" class="page-link"
                                            wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                    </li>
                                @endforeach

                               
                                <li class="page-item {{ $sensores->hasMorePages() ? '' : 'disabled' }}">
                                    <a href="#" class="page-link" wire:click.prevent="nextPage" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>


                    </div>
            </div>
        </div>
    </div>
</div>
