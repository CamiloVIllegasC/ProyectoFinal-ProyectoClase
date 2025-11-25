@extends('layaout.layaout')
@section('title','Movimientos')
@section('content')
    @if (Session::has('error'))
        <div class="alert alert-danger border-0 rounded-pill mb-4">
            <i class="fa-solid fa-circle-exclamation mr-2"></i> {{ Session::get('error') }}
        </div>
    @endif

    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-lg-8">
            <p class="text-uppercase text-muted mb-1">Flujo</p>
            <h1 class="h3 font-weight-bold text-white">Movimientos recientes</h1>
            <p class="text-muted mb-0">Entradas, salidas y devoluciones registradas en tus puntos de venta.</p>
        </div>
        <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
            <a href="{{ route('movements.create') }}" class="btn btn-primary px-4">
                <i class="fa-solid fa-plus mr-2"></i> Nuevo movimiento
            </a>
        </div>
    </div>

    <div class="card app-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="badge-soft">Listado actualizado</span>
            <span class="text-muted small">Total: {{ $movements->count() }} registros</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 data-table align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                            <th>Venta</th>
                            <th>Producto</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movements as $movement)
                            <tr>
                                <td>{{ $movement->id }}</td>
                                <td class="text-capitalize">{{ $movement->type }}</td>
                                <td>{{ number_format($movement->ammount, 2, ',', '.') }}</td>
                                <td>{{ $movement->sale_point }}</td>
                                <td>{{ $movement->product->name }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-secondary btn-sm disabled">
                                        <i class="fa-solid fa-pen-to-square mr-1"></i> Editar
                                    </a>
                                    <form action="#" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Seguro que deseas eliminar este movimiento?')">
                                            <i class="fa-solid fa-trash mr-1"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
