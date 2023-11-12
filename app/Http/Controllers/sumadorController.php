<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sumadorController extends Controller
{
    //
    public function metodo_sumar($num_1,$num_2){
        $suma= $num_1+$num_2;
        $respuesta = "Las suma es:".($suma)."<br>";
        for($i=0;$i<$suma;$i++)
        {
            $respuesta=$respuesta."Fabian Gonzalez <br>";
        }
        return $respuesta;
    }
}
