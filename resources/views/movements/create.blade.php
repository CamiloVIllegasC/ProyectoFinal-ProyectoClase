@extends('layaout.layaout')

@section('title', 'Nuevo Movimiento')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card app-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-uppercase text-muted mb-1 small">Registrar movimiento</p>
                    <h2 class="h4 mb-0 text-white">Nuevo flujo de inventario</h2>
                </div>
                <span class="badge-soft">
                    <i class="fa-solid fa-arrows-rotate mr-2"></i> Tiempo real
                </span>
            </div>

            <div class="card-body">
                <form action="{{ route('movements.store') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="type">Tipo de movimiento</label>
                            <select name="type" id="type" class="form-control" required>
                                @foreach($movementTypes as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ammount">Cantidad</label>
                            <input type="number" name="ammount" id="ammount" class="form-control" min="1" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="sale_point">Caja de venta</label>
                            <select name="sale_point" id="sale_point" class="form-control" required>
                                <option selected disabled>Seleccione...</option>
                                <option value="caja 1">Caja 1</option>
                                <option value="caja 2">Caja 2</option>
                                <option value="caja 3">Caja 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product_id">Producto asociado</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            <option selected disabled>Seleccione un producto...</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="border-secondary">

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-floppy-disk mr-2"></i> Guardar
                        </button>
                        <button type="reset" class="btn btn-secondary px-4 ml-2">
                            <i class="fa-solid fa-xmark mr-2"></i> Limpiar
                        </button>
                        <a href="{{ route('movements.index') }}" class="btn btn-outline-light px-4 ml-2">
                            <i class="fa-solid fa-arrow-left mr-2"></i> Volver al listado
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
