<?php

namespace App\Http\Controllers\Sitio;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\destinos;
use App\Models\destinos_alojamientos;
use App\Models\tipo_alojamientos;

class planescontroller extends Controller
{
     public function InicioController(){
        
        $datos['query'] = destinos::get();      
        $datos['queryTA'] = tipo_alojamientos::get();      
        $datos['queryDA'] = destinos_alojamientos::get();

        $datos["testimonios"] = [
            ["../../.././img/r1.jpg" ,"Dario", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r2.jpg", "Diomedez", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r3.jpeg", "Juancho", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r4.png", "Miguel", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r5.jpg", "Kaleth", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r6.jpg", "Silvestre", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."]
        ];
        return view("index", $datos);
    }

    public function PlanesController(){

        $datos['query'] = destinos::get();
        
        $datos["planes"] = [
            ["../../.././img/p1.jpeg", "Alojamiento con alimentacion", "COP 1.292.770"],
            ["../../.././img/p2.jpeg", "Alojamiento sin alimentacion", "COP 1.560.770"],            
            ["../../.././img/p3.jpeg", "Dia de sol con recorrido", "COP 1.720.770"],     
            ["../../.././img/p4.jpeg", "Dia de sol con tour", "COP 1.989.770"]       
        ];
        $datos["adicional"] = [
            ["../../.././img/pa1.png","Transporte", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/pa2.png","Online", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."]
        ];
        return view("planes", $datos);
    }

    public function PresupuestoController(){
        $datos['queryDA'] = destinos_alojamientos::get();
        return view("presupuesto", $datos);

    }
}


