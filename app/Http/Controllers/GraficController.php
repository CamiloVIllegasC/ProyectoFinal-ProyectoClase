<?php

namespace App\Http\Controllers;

use App\Models\grafic;
use Illuminate\Http\Request;

class GraficController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('graficos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(grafic $grafic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(grafic $grafic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, grafic $grafic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grafic $grafic)
    {
        //
    }
}
