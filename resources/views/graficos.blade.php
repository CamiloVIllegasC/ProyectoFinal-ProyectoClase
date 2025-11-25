@extends('layaout.layaout')
@section('title','Graficos')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card app-card text-center p-4">
                <div class="card-body">
                    <span class="badge-soft mb-3 d-inline-block">
                        <i class="fa-solid fa-chart-line mr-2"></i> Visualizaciones
                    </span>
                    <h2 class="h4 text-white">Dashboard en tiempo real</h2>
                    <p class="text-muted">
                        Los graficos principales ahora viven en el Dashboard para centralizar la informacion de inventario,
                        movimientos y valor de stock.
                    </p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary px-4">
                        Ir al Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

