@extends('layaout.layaout')

@section('title', 'Registrar Producto')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Agregar Nuevo Producto</h4>
        </div>

        <div class="card-body">
            <form action="{{route('products.store')}}" method="POST">
                @csrf
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="codigo">codigo</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Ej: P003" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre del Producto</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ej: Teclado Logitech K120" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="ammount" id="ammount" class="form-control" min="1" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="unidad">Unidad</label>
                        <select name="unit" id="unidad" class="form-control" required>
                            <option selected="" selected disabled>Seleccione unidad de medida</option>
                            <option value="Libra">Unidad</option>
                            <option value="Kilogramo">Caja</option>
                            <option value="Paquete">Paquete</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="precio">Precio ($)</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01" min="1" required>
                    </div>
                </div>

                <hr>

                <div class="text-center mt-4">
                    <!-- Botón Guardar -->
                    <button class = "btn btn-primary">Guardar <i class="fa-solid fa-save me-1"></i></button>
                    
                    <!-- Botón Cancelar -->
                    <a href="{{ route('products.index') }}" class="btn btn-secondary px-4 ml-2">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </a>

                    <!-- Volver al listado -->
                    <a href="{{ route('products.index') }}" class="btn btn-primary px-4 ml-2">
                        <i class="bi bi-arrow-left-circle"></i> Volver al Listado
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
