<?php

namespace App\Http\Controllers\Sitio;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\destinos;
use App\Models\destinos_alojamientos;
use App\Models\tipo_alojamientos;
use App\Models\recorridos;
use App\Models\reserva;
use DateTime;

class planescontroller extends Controller
{
    public function InicioController()
    {

        $datos['query'] = destinos::get();
        $datos['queryTA'] = tipo_alojamientos::get();
        $datos['queryDA'] = destinos_alojamientos::get();

        $datos["testimonios"] = [
            ["../../.././img/r1.jpg", "Dario", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r2.jpg", "Diomedez", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r3.jpeg", "Juancho", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r4.png", "Miguel", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r5.jpg", "Kaleth", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/r6.jpg", "Silvestre", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."]
        ];
        return view("index", $datos);
    }

    public function PlanesController()
    {

        $datos['query'] = destinos::get();
        $datos['queryDA'] = destinos_alojamientos::get();
        $datos['queryR'] = recorridos::get();

        $datos["planes"] = [
            ["../../.././img/p1.jpeg", "Alojamiento con alimentacion", "COP 1.292.770"],
            ["../../.././img/p2.jpeg", "Alojamiento sin alimentacion", "COP 1.560.770"],
            ["../../.././img/p3.jpeg", "Dia de sol con recorrido", "COP 1.720.770"],
            ["../../.././img/p4.jpeg", "Dia de sol con tour", "COP 1.989.770"]
        ];
        $datos["adicional"] = [
            ["../../.././img/pa1.png", "Transporte", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."],
            ["../../.././img/pa2.png", "Online", "Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod."]
        ];
        return view("planes", $datos);
    }

    public function PresupuestoController(Request $request)
    {
        if (is_numeric($request->dinero)) {
            $datos['queryDA'] = destinos_alojamientos::where('valorCU', '<', $request->dinero)->get();
            return view("presupuesto", $datos);
        } else {
            return view("error");
        }
    }

    public function show($recorridos)
    {
        $query= DB::table('recorridos')
            ->select("url")
            ->where('url', '=', $recorridos)
            ->get();

        if(count($query) === 0){
            return view("error");
        }

        $array = [
            [7, '07:00 A.M.'],
            [8, '08:00 A.M.'],
            [9, '09:00 A.M.'],
            [10, '10:00 A.M.'],
            [11, '11:00 A.M.'],
            [12, '12:00 M.'],
            [13, '01:00 P.M.'],
            [14, '02:00 P.M.'],
            [15, '03:00 P.M.'],
            [16, '04:00 P.M.'],
            [17, '05:00 P.M.'],
            [18, '06:00 P.M.'],
            [19, '07:00 P.M.'],
            [20, '08:00 P.M.']
        ];
        $time = [];

        $currentDate = new DateTime();
        $currentDate->modify('+4 hours');
        $currentTime = (int)$currentDate->format('G');

        foreach ($array as $c) :
            if ($c[0] >= $currentTime) :
                array_push($time, [$c[0], $c[1]]);
            endif;
        endforeach;
        if (count($time) == 0)
            $time = $array;

        $query["hora"] = $time;

        $query["consulta"] = DB::table('recorridos')
            ->select('id', 'titulo', 'descripcion', 'precio', 'url')
            ->where('url', '=', $recorridos)
            ->get();
        return view("show", $query);
    }

    public function storeTours(Request $request, $recorridos)
    {
        $queryR= DB::table('recorridos')
            ->select('id', 'titulo', 'precio', "url")
            ->where('url', '=', $recorridos)
            ->get();

        $varNombre = $request->TxtNombre;
        $varApellido = $request->TxtApellido;
        $varDocumento = $request->TxtDocumento;
        $varCantidad = $request->TxtCant_personas;
        $varTransporte = $request->TxtTransporte;
        $varSim = $request->TxtSim;
        $varFecha = $request->txtDate;
        $varHora = $request ->TxtHora;

        if (isset($varNombre) and isset($varApellido) and isset($varDocumento) and isset($varCantidad) AND isset($varHora) AND isset($varFecha)) {
            if (is_numeric($request->TxtDocumento) and is_numeric($request->TxtCant_personas)) {

                $fecha = date('h a', time());
                $seguir = false;

                $horas = [
                    [7, '07 am'],
                    [8, '08 am'],
                    [9, '09 am'],
                    [10, '10 am'],
                    [11, '11 am'],
                    [12, '12 pm'],
                    [13, '01 pm'],
                    [14, '02 pm'],
                    [15, '03 pm'],
                    [16, '04 pm'],
                    [17, '05 pm'],
                    [18, '06 pm'],
                    [19, '07 pm'],
                    [20, '08 pm']
                ];

                foreach ($horas as $h) :
                   if($h[1] == $fecha){
                        $seguir = true;
                    }
                endforeach;

                if ($seguir) {

                    $var1 = intval($request->TxtCant_personas);
                    // $var2 = intval($request->TxtValor);
                    $var2 = intval($queryR[0] -> precio);

                    $precioF = $var1 * $var2;

                    $query = new reserva();
                    $query->nombre = $request->TxtNombre;
                    $query->apellido = $request->TxtApellido;
                    $query->documento = $request->TxtDocumento;
                    $query->cant_personas = $request->TxtCant_personas;
                    $query->direccion = $request->TxtDireccion;

                    if ($varTransporte == '0') {
                        $precioF += (50000 * $var1);
                        $query->plan_transporte = 50000;
                    } else {
                        $query->plan_transporte = 0;
                    }

                    if ($varSim == '0') {
                        $precioF += (20000 * $var1);
                        $query->plan_sim = 20000;
                    } else {
                        $query->plan_sim = 0;
                    }

                    $query->fecha_reserva = $request->txtDate;
                    $query->hora_reserva = $request->txtTime;
                    $query->valorF = $precioF;
                    $query->tipo_plan = "Recorrido";
                    $query->id_recorrido = $queryR[0] -> id;
                    $query->titulo_recorrido = $queryR[0] -> titulo;
                    $query->precio_recorrido = $queryR[0] -> precio;
                    $query->save();

                    return redirect('/planes')->with(['msg' => 'Reserva guardada correctamente', 'class' => 'alert-success']);
                } else {
                    return redirect('/planes')->with(['msg' => 'No es posible realizar la reserva en este momento', 'class' => 'alert-danger']);
                }
            } else {
                return view("error");
            }
        } else {
            return view("error");
        }
    }

    public function showPlanes($plan){
        $query= DB::table('destinos_alojamientos')
            ->select("url")
            ->where('url', '=', $plan)
            ->get();

        if(count($query) === 0){
            return view("error");
        }

        $array = [
            [7, '07:00 A.M.'],
            [8, '08:00 A.M.'],
            [9, '09:00 A.M.'],
            [10, '10:00 A.M.'],
            [11, '11:00 A.M.'],
            [12, '12:00 M.'],
            [13, '01:00 P.M.'],
            [14, '02:00 P.M.'],
            [15, '03:00 P.M.'],
            [16, '04:00 P.M.'],
            [17, '05:00 P.M.'],
            [18, '06:00 P.M.'],
            [19, '07:00 P.M.'],
            [20, '08:00 P.M.']
        ];
        $time = [];

        $currentDate = new DateTime();
        $currentDate->modify('+4 hours');
        $currentTime = (int)$currentDate->format('G');

        foreach ($array as $c) :
            if ($c[0] >= $currentTime) :
                array_push($time, [$c[0], $c[1]]);
            endif;
        endforeach;

        if (count($time) == 0)
            $time = $array;

        $query["hora"] = $time;

        $query["consulta"] = DB::table('destinos_alojamientos')
            ->select('id', 'titulo', 'descripcion', 'valorCU', "url")
            ->where('url', '=', $plan)
            ->get();
        return view("showPlanes", $query);
    }

    public function storePlanes(Request $request, $recorridos){

        $queryDA= DB::table('destinos_alojamientos')
            ->select('id', 'titulo', 'valorCU', "url")
            ->where('url', '=', $recorridos)
            ->get();

        $varNombre = $request->TxtNombre;
        $varApellido = $request->TxtApellido;
        $varDocumento = $request->TxtDocumento;
        $varCantidad = $request->TxtCant_personas;
        $varTransporte = $request->TxtTransporte;
        $varSim = $request->TxtSim;
        $varFecha = $request->txtDate;
        $varHora = $request ->txtTime;

        if (isset($varNombre) and isset($varApellido) and isset($varDocumento) and isset($varCantidad) and isset($varTransporte) and isset($varSim) and isset($varFecha) and isset($varHora)) {
            if (is_numeric($request->TxtDocumento) and is_numeric($request->TxtCant_personas)) {

                $fecha = date('h a', time());
                $seguir = false;

                $horas = [
                    [7, '07 am'],
                    [8, '08 am'],
                    [9, '09 am'],
                    [10, '10 am'],
                    [11, '11 am'],
                    [12, '12 pm'],
                    [13, '01 pm'],
                    [14, '02 pm'],
                    [15, '03 pm'],
                    [16, '04 pm'],
                    [17, '05 pm'],
                    [18, '06 pm'],
                    [19, '07 pm'],
                    [20, '08 pm']
                ];

                foreach ($horas as $h) :
                   if($h[1] == $fecha){
                        $seguir = true;
                    }
                endforeach;

                if ($seguir) {

                    $var1 = intval($request->TxtCant_personas);
                    $var2 = intval($queryDA[0] -> valorCU);

                    $precioF = $var1 * $var2;

                    $query = new reserva();
                    $query->nombre = $request->TxtNombre;
                    $query->apellido = $request->TxtApellido;
                    $query->documento = $request->TxtDocumento;
                    $query->cant_personas = $request->TxtCant_personas;
                    $query->direccion = $request->TxtDireccion;
                    $query->fecha_reserva = $request->txtDate;

                    if ($varTransporte == '0') {
                        $precioF += (50000 * $var1);
                        $query->plan_transporte = 50000;
                    } else {
                        $query->plan_transporte = 0;
                    }

                    if ($varSim == '0') {
                        $precioF += (20000 * $var1);
                        $query->plan_sim = 20000;
                    } else {
                        $query->plan_sim = 0;
                    }

                    $query->hora_reserva = $request->txtTime;
                    $query->valorF = $precioF;
                    $query->tipo_plan = "Alojamiento";
                    $query->id_recorrido = $queryDA[0] -> id;
                    $query->titulo_recorrido = $queryDA[0] -> titulo;
                    $query->precio_recorrido = $queryDA[0] -> valorCU;
                    $query->save();

                    return redirect('/planes')->with(['msg' => 'Reserva guardada correctamente', 'class' => 'alert-success']);
                } else {
                    return redirect('/planes')->with(['msg' => 'No es posible realizar la reserva en este momento', 'class' => 'alert-danger']);
                }
            } else {
                return view("error");
            }
        } else {
            return view("error");
        }
    }
}
