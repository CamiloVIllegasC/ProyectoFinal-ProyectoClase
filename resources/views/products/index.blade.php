@extends('layaout.layaout')
@section('title','Productos')
@section('content')
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-lg-8">
            <p class="text-uppercase text-muted mb-1">Inventario</p>
            <h1 class="h3 font-weight-bold text-white">Productos registrados</h1>
            <p class="text-muted mb-0">Controla tus articulos, movimientos y costos desde una sola vista.</p>
        </div>
        <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
            <a href="{{ route('products.create') }}" class="btn btn-primary px-4">
                <i class="fa-solid fa-plus mr-2"></i> Nuevo producto
            </a>
        </div>
    </div>

    <div class="card app-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="badge-soft">Listado actualizado</span>
            <span class="text-muted small">Total: {{ $products->count() }} productos</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 data-table align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Unidad</th>
                            <th>Precio</th>
                            <th>Creacion</th>
                            <th>Actualizacion</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td class="font-weight-semibold">{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->ammount, 2, ',', '.') }}</td>
                                <td>{{ $product->unit }}</td>
                                <td>$ {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                <td>{{ $product->updated_at->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary btn-sm mb-1">
                                        <i class="fa-solid fa-pen-to-square mr-1"></i> Editar
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Seguro que deseas eliminar este producto {{ $product->name }}?')">
                                            <i class="fa-solid fa-trash mr-1"></i> Eliminar
                                        </button>
                                    </form>
                                    <a href="{{ route('pdf', $product->id) }}" target="_blank" class="btn btn-outline-light btn-sm">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
