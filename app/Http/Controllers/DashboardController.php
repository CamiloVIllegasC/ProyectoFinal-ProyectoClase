<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Display a quick inventory overview with simple charts.
     */
    public function __invoke()
    {
        $topProducts = Product::select('name', 'ammount')
            ->orderByDesc('ammount')
            ->take(5)
            ->get();

        $movementTotals = Movement::select('type')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type');

        $inventoryByValue = Product::select('name')
            ->selectRaw('(ammount * price) as total_value')
            ->orderByDesc('total_value')
            ->take(5)
            ->get();

        $summary = [
            'totalProducts' => Product::count(),
            'totalStock' => (float) Product::sum('ammount'),
            'inventoryValue' => (float) (Product::selectRaw('SUM(ammount * price) as value')->value('value') ?? 0),
            'recentMovements' => Movement::with('product')
                ->latest()
                ->take(5)
                ->get(),
        ];

        return view('dashboard', [
            'productLabels' => $topProducts->pluck('name'),
            'productData' => $topProducts->pluck('ammount'),
            'movementLabels' => $movementTotals->keys(),
            'movementData' => $movementTotals->values(),
            'valueLabels' => $inventoryByValue->pluck('name'),
            'valueData' => $inventoryByValue->pluck('total_value'),
            'summary' => $summary,
        ]);
    }
}
