<?php

namespace App\Http\Controllers;

use App\Models\Cuentahabiente;
use Illuminate\Http\Request;

class CuentahabienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /*
        $diego=Cuentahabiente::findOrFail(3);
        $diego->delete();
        */

        /*
        //Crear usuario
        $ch1 = new Cuentahabiente;
        $ch1->nombre= "Diego ";
        $ch1->correo="d@gmail.com";
        $ch1->save();
        dd($ch1);
        */

        $lista = Cuentahabiente::all();


        
        $contador_tarjetas = $lista[2]->tarjetas;
        dd($lista, $lista[2]->nombre,count($contador_tarjetas), $contador_tarjetas[1]->numero);



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
    public function show(Cuentahabiente $cuentahabiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuentahabiente $cuentahabiente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuentahabiente $cuentahabiente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuentahabiente $cuentahabiente)
    {
        //
    }

    public function search(Request $request)
    {
        //return "1";
        $listado = Cuentahabiente::where('nombre','like', '%'.$request->palabra.'%')
        ->get();
        //dd(1);
        return json_encode($listado);
    }
}
