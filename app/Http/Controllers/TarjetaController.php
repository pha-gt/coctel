<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use App\Models\Cuentahabiente;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Hola";
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $listado = Cuentahabiente::all();
        return view('tarjeta_crear',compact('listado'));


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
    public function show(Tarjeta $tarjeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarjeta $tarjeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarjeta $tarjeta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarjeta $tarjeta)
    {
        //
    }
}
