@extends('layaout.layaout')
@section('title','Gestion de inventario')
@section('content')
    <div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Listado de Productos</h4>
            <a href="{{route('products.create')}}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Nuevo Producto
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>
                        <th>Precio</th>
                        <th>Fecha Creacion</th>
                        <th>Fecha Actualizacion</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Ejemplo con datos fijos --}}
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->ammount}}</td>
                        <td>{{$product->unit}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->created_at->format('d-m-Y')}}</td>
                        <td>{{$product->updated_at->format('d-m-Y')}}</td>
                        <td class="text-center">
                            <a href="{{route('products.edit',$product)}}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{route('products.destroy', $product)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este producto {{$product->name}}?')">
                                    <i class="bi bi-trash"></i> Eliminar
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