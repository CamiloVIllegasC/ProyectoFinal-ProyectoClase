@extends('layaout.layaout')

@section('title', 'Nuevo Movimiento')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-arrow-left-right"></i> Registrar Nuevo Movimiento</h4>
        </div>

        <div class="card-body">
            <form action="#" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tipo">Tipo de Movimiento</label>
                        <select name="type" id="type" class="form-control" required>
                            @foreach($movementTypes as $type) //$movementTypes viene del controlador
                                <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="ammount" id="ammount" class="form-control" min="1" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="caja_venta">Caja de Venta</label>
                        <select name="sale_point" id="sale_point" class="form-control" required>
                        <option selected= "" selected disabled>Seleccione una caja...</option>
                        <option value="caja 1">caja 1</option>
                        <option value="caja 2">caja 2</option>
                        <option value="caja 3">caja 3</option>
                    </select>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="producto_id">Producto Asociado</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        <option selected= "" selected disabled>Seleccione un producto...</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <hr>

                <div class="text-center mt-4">
                    <!-- Guardar -->
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Guardar
                    </button>

                    <!-- Cancelar -->
                    <button type="reset" class="btn btn-secondary px-4 ml-2">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </button>

                    <!-- Volver -->
                    <a href="{{ route('movements.index') }}" class="btn btn-primary px-4 ml-2">
                        <i class="bi bi-arrow-left-circle"></i> Volver al Listado
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
