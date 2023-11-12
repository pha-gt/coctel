<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipos;

class EquiposController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $mi_equipo = new equipos;
        $mi_equipo->nombre= "Iphone";
        $mi_equipo->modelo="15";
        $mi_equipo->marca= "Apple";
        $mi_equipo->ns= "2222";
        $mi_equipo->save();
        */

        $listado = equipos::all();
        //dd($listado);
        /*
        foreach($listado as $item)
        {
            echo "<br>".$item->nombre;
        }*/

        return view("CRUD.equipos_index", compact('listado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CRUD.equipos_registro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->nombre==null)
        return redirect()->back()->with(["error"=>"NO registrado"]);

        //dd($request);
        $mi_equipo = new equipos;
        $mi_equipo->nombre= $request->nombre;
        $mi_equipo->modelo= $request->modelo;
        $mi_equipo->marca= $request->marca;
        $mi_equipo->ns= $request->num_serie;
        $mi_equipo->precio = $request->precio;
        $mi_equipo->save();

        return redirect()->back()->with(["mensaje"=>"Exito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(equipos $equipo)
    {
        //
        

        //dd($equipo);

        return view('CRUD.equipos_show',compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(equipos $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, equipos $equipo)
    {

        //dd($equipo);
        $equipo->precio = $request->precio;
        $equipo->save();
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(equipos $equipo)
    {
        //dd('Eliminando');
        $equipo->delete();
        return redirect(route('equipos.index'));
    }

    public function search(Request $request)
    {
        //dd("Busqueshion");
        $listado = equipos::where('marca', "like" ,"%".$request->busqueda."%")
                            ->orWhere('nombre',$request->busqueda)
                            ->get();
        return view("CRUD.equipos_index", compact('listado'));

    }
}
