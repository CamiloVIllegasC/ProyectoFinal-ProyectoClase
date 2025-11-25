@extends('layaout.layaout')

@section('title', 'Dashboard')

@section('content')
@php($recentMovements = $summary['recentMovements'])

    <div class="row align-items-center mb-4">
        <div class="col-lg-8">
            <p class="text-uppercase text-muted mb-1">Panel general</p>
            <h1 class="h3 font-weight-bold text-white">Salud del inventario</h1>
            <p class="text-muted mb-0">Visualiza tus productos, movimientos y valor economico en tiempo real.</p>
        </div>
        <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
            <a href="{{ route('products.index') }}" class="btn btn-primary px-4">
                <i class="fa-solid fa-box mr-2"></i> Gestionar productos
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card app-card h-100">
                <div class="card-body">
                    <p class="text-uppercase text-muted mb-1">Productos registrados</p>
                    <h3 class="mb-0 text-white">{{ number_format($summary['totalProducts']) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card app-card h-100">
                <div class="card-body">
                    <p class="text-uppercase text-muted mb-1">Unidades en inventario</p>
                    <h3 class="mb-0 text-white">{{ number_format($summary['totalStock'], 2, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card app-card h-100">
                <div class="card-body">
                    <p class="text-uppercase text-muted mb-1">Valor estimado</p>
                    <h3 class="mb-0 text-white">$ {{ number_format($summary['inventoryValue'], 2, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6 mb-4">
            <div class="card app-card h-100">
                <div class="card-header">
                    Top productos por stock
                </div>
                <div class="card-body">
                    @if($productLabels->isEmpty())
                        <p class="text-muted text-center mb-0">Registra productos para visualizar esta grafica.</p>
                    @else
                        <canvas id="stockChart" height="220"></canvas>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card app-card h-100">
                <div class="card-header">
                    Distribucion de movimientos
                </div>
                <div class="card-body">
                    @if($movementLabels->isEmpty())
                        <p class="text-muted text-center mb-0">Todavia no hay movimientos registrados.</p>
                    @else
                        <canvas id="movementChart" height="220"></canvas>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card app-card">
                <div class="card-header">
                    Productos con mayor valor acumulado
                </div>
                <div class="card-body">
                    @if($valueLabels->isEmpty())
                        <p class="text-muted text-center mb-0">Anade precios y cantidades para visualizar esta informacion.</p>
                    @else
                        <canvas id="valueChart" height="120"></canvas>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card app-card">
        <div class="card-header">
            Movimientos recientes
        </div>
        <div class="card-body p-0">
            @if($recentMovements->isEmpty())
                <p class="text-muted text-center py-4 mb-0">Aun no hay movimientos registrados.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0 data-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                                <th>Punto de venta</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentMovements as $movement)
                                <tr>
                                    <td>{{ $movement->product->name ?? 'Producto eliminado' }}</td>
                                    <td class="text-capitalize">{{ $movement->type }}</td>
                                    <td>{{ number_format($movement->ammount, 2, ',', '.') }}</td>
                                    <td>{{ $movement->sale_point }}</td>
                                    <td>{{ optional($movement->created_at)->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const palette = ['#8b5cf6', '#38bdf8', '#22d3ee', '#fbbf24', '#fb7185', '#f472b6', '#64c2a6'];

        const stockLabels = @json(array_values($productLabels->toArray()));
        const stockValues = @json(array_values($productData->toArray()));
        const stockCanvas = document.getElementById('stockChart');

        if (stockCanvas) {
            new Chart(stockCanvas, {
                type: 'bar',
                data: {
                    labels: stockLabels,
                    datasets: [{
                        label: 'Unidades',
                        data: stockValues,
                        backgroundColor: palette,
                        borderRadius: 8,
                    }],
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { color: '#9fb4d9' },
                        },
                        x: {
                            ticks: { color: '#9fb4d9' },
                        },
                    },
                    plugins: {
                        legend: { display: false },
                    },
                },
            });
        }

        const movementLabels = @json(array_values($movementLabels->toArray()));
        const movementValues = @json(array_values($movementData->toArray()));
        const movementCanvas = document.getElementById('movementChart');

        if (movementCanvas) {
            new Chart(movementCanvas, {
                type: 'doughnut',
                data: {
                    labels: movementLabels,
                    datasets: [{
                        data: movementValues,
                        backgroundColor: palette,
                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { color: '#9fb4d9' },
                        },
                    },
                },
            });
        }

        const valueLabels = @json(array_values($valueLabels->toArray()));
        const valueValues = @json(array_values($valueData->toArray()));
        const valueCanvas = document.getElementById('valueChart');

        if (valueCanvas) {
            new Chart(valueCanvas, {
                type: 'line',
                data: {
                    labels: valueLabels,
                    datasets: [{
                        label: 'Valor total ($)',
                        data: valueValues,
                        borderColor: '#8b5cf6',
                        backgroundColor: 'rgba(139, 92, 246, 0.25)',
                        tension: 0.35,
                        fill: true,
                    }],
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { ticks: { color: '#9fb4d9' } },
                        x: { ticks: { color: '#9fb4d9' } },
                    },
                },
            });
        }
    </script>
@endsection
