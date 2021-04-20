<?php

namespace App\Http\Controllers\Sitio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Lugarescontroller extends Controller
{
    public function lugaresController(){
        $datos["lugares"] = [
            ["../../.././img/l9.jpg", "Providencia", "Ven a disfrutar de esta maravillosa isla.","../../.././img/l8.png", "San Andrés", "Date la oportunidad de conocer las profundidades del mar.","../../.././img/l7.jpg", "Cartagena", "Si quieres disfrutar de unas buenas playas, lo que debes de hacer es venir con nosotros a Cartagena."]
        ];
        $datos["fincas"] = [
            ["../../.././img/l1.jpg","../../.././img/l2.jpg","../../.././img/l3.jpg"]
        ];
        $datos["hoteles"] = [
            ["../../.././img/l4.png","../../.././img/l5.jpg","../../.././img/l6.jpg"]
        ];        
        return view("lugares", $datos);
    }
}
