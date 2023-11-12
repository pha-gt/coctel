<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function iniciar()
    {
        if(session()->exists('carrito'))
        {
            session()->pull('carrito');
        }
        dd('inicializado');
    }

    public function agregar()
    {
        $producto = (object) array(
            "nombre"=>"Lenovo",
            "precio"=>"$70000",
            "cantidad"=>2
        );

        session()->push('carrito',$producto );
        return "Agregado";
        //dd('agregado',session('carrito'));
    }

    public function imprimirCarrito()
    {
        if(session()->exists('carrito'))
        {
            dd(session('carrito'));
        }
        else
        {
            dd('Sin datos');
        }
    }

    public function eliminarCarrito()
    {
        //session()->forget('carrito');
        session()->pull('carrito');


        return "Eliminado";

    }

    public function elimninarUnElemento()
    {
        //Resplado el carrito en $arreglo
        $arreglo = session('carrito');
        array_splice($arreglo, 0,1);
        //limpiamos Carrito
        session()->pull('carrito');
        foreach($arreglo as $item)
        {
            session()->push('carrito',$item);
        }

    }
}
