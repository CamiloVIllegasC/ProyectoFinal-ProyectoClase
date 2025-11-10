@extends('layaout.layaout')

@section('title', 'Modificar Producto')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Editar Producto</h4>
        </div>

        <div class="card-body">
            <form action="{{route('products.update', $product->id)}}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="codigo">codigo</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Ej: P003" value= "{{old('code', $product->code)}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre del Producto</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ej: Teclado Logitech K120" value="{{old('name', $product->name)}}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="ammount" id="ammount" class="form-control" min="1" value="{{old('ammount', $product->ammount)}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="unidad">Unidad</label>
                        <select name="unit" id="unidad" class="form-control" required>
                            <option selected="" selected disabled>Seleccione unidad de medida</option>
                            <option value="Libra" {{old('unit', $product->unit)=== 'Libra' ? 'selected': ''}}>Libra</option>
                            <option value="Kilogramo" {{old('unit', $product->unit)=== 'Kilogramo' ? 'selected': ''}}>Kilogramo</option>
                            <option value="Paquete" {{old('unit', $product->unit)=== 'Paquete' ? 'selected': ''}}>Paquete</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="precio">Precio ($)</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01" min="1" value="{{old('price', $product->price)}}" required>
                    </div>
                </div>

                <hr>

                <div class="text-center mt-4">
                    <!-- Botón Guardar -->
                    <button class = "btn btn-primary">Guardar <i class="fa-solid fa-save me-1"></i></button>
                    
                    <!-- Botón Cancelar -->
                    <button type="reset" class="btn btn-secondary px-4 ml-2">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </button>

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
