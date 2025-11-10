<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movements = Movement::all();
        return view('movements.index', ['movements' => $movements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        return view('movements.create',[
            'products' => $products,
            'movementTypes' => [
                Movement::MOVEMENT_TYPES_IN,
                Movement::MOVEMENT_TYPES_DEVOLUTION,
                Movement::MOVEMENT_TYPES_OUT
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        $movement = new Movement();
        $movement->type = $request->type;
        $movement->ammount = $request->ammount;
        $movement->sale_point = $request->sale_point;
        $movement->product_id = $request->product;
        $movement->save();

        $product = Product::find($request->product);
        try {
            switch($movement->type){
                case Movement::MOVEMENT_TYPES_IN:
                case Movement::MOVEMENT_TYPES_DEVOLUTION:
                    $product->increment('ammount', $movement->ammount);
                break;
                case Movement::MOVEMENT_TYPES_OUT:
                    if ($product->ammount < $movement->ammount){
                        throw new \Exception("La cantidad solicitada supera la cantidad disponible");
                    }
            }
        } catch (\Throwable $th) {
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movement $movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movement $movement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movement $movement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movement $movement)
    {
        //
    }
}
