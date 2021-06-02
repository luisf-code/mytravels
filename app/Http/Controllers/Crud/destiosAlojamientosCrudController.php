<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\destinos_alojamientos;
use Illuminate\Support\Facades\DB;

class destiosAlojamientosCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['query'] = destinos_alojamientos::get();
        return view('destinosAlojamientosCrud.listar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data["destino"] = DB::table( 'destinos' )
                -> select ( 'id', 'titulo' )
                -> get();

        $data["alojamiento"] = DB::table( 'alojamientos' )
                -> select ( 'id', 'titulo' )
                -> get();

        return view('destinosAlojamientosCrud.crear', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $this -> getUrl( $request ->txtDestiAloja );
        $query = new destinos_alojamientos();

        $varTitulo = $request ->txtDestiAloja;
        $varDescripcion = $request ->txtDescripcion;
        $varPrecio = $request ->txtPrecio;
        $varDestino = $request ->txtDestino;
        $varAlojamiento = $request ->txtAlojamiento;

        if(isset($varTitulo) and isset($varDescripcion) and isset($varPrecio) and isset($varDestino) and isset($varAlojamiento)){

            $query -> idDestinos = $request ->txtDestino;
            $query -> idAlojamientos = $request ->txtAlojamiento;
            $query -> titulo = $request ->txtDestiAloja;
            $query -> url = $url;
            $query -> descripcion = $request ->txtDescripcion;
            $query -> valorCU = $request ->txtPrecio;
            $query -> save();

        }else{
            return view("error");
        }

        return redirect('/destinosAlojamientos-crud')->with(['msg' => 'Registro creado correctamente', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["destino"] = DB::table( 'destinos' )
                -> select ( 'id', 'titulo' )
                -> get();

        $data["alojamiento"] = DB::table( 'alojamientos' )
                -> select ( 'id', 'titulo' )
                -> get();


        $data["destinoActual"] = DB::table( 'destinos' )
                -> select(
                            'destinos.titulo AS titulo',
                            'destinos.id AS id'
                            )
                -> join('destinos_alojamientos', 'destinos.id', '=', "destinos_alojamientos.idDestinos")
                -> where ('destinos_alojamientos.id', '=', $id )
                ->get();

        $data["alojamientoActual"] = DB::table( 'alojamientos' )
                -> select(
                            'alojamientos.titulo AS titulo',
                            'alojamientos.id AS id'
                        )
                -> join('destinos_alojamientos', 'alojamientos.id', '=', "destinos_alojamientos.idAlojamientos")
                -> where ('destinos_alojamientos.id', '=', $id )
                ->get();

        $data['query'] = destinos_alojamientos::findOrFail( $id );
        return view('destinosAlojamientosCrud.actualizar', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url = $this -> getUrl( $request ->txtDestiAloja );
        $query = destinos_alojamientos::find( $id );

        $varTitulo = $request ->txtDestiAloja;
        $varDescripcion = $request ->txtDescripcion;
        $varPrecio = $request ->txtPrecio;
        $varDestino = $request ->txtDestino;
        $varAlojamiento = $request ->txtAlojamiento;


        if(isset($varTitulo) and isset($varDescripcion) and isset($varPrecio) and isset($varDestino) and isset($varAlojamiento)){

            $query -> idDestinos = $request ->txtDestino;
            $query -> idAlojamientos = $request ->txtAlojamiento;
            $query -> titulo = $request ->txtDestiAloja;
            $query -> url = $url;
            $query -> descripcion = $request ->txtDescripcion;
            $query -> valorCU = $request ->txtPrecio;
            $query -> update();

        }else{
            return view("error");
        }

        return redirect('/destinosAlojamientos-crud')->with(['msg' => 'Registro actualizado correctamente', 'class' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $query = destinos_alojamientos::find( $id );
            $query -> delete();
            return redirect('/destinosAlojamientos-crud')->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-success']);
        }
        catch ( \Exception $ex)
        {
            return redirect('/destinosAlojamientos-crud')->with(['msg' => 'Ha ocurrido un error al eliminar el registro, inténtelo de nuevo', 'class' => 'alert-danger']);
        }
    }

    private static function getUrl($str = '')
    {
        $buscar = 'áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛäëïöüÄËÏÖÜñÑÜü ';
        $cambiar = 'aeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiounnuu-';
        $patron = '([^A-Za-z0-9-.])';

        $url_titulo = trim($str);
        $url_titulo = strtr(utf8_decode($url_titulo), utf8_decode($buscar), utf8_decode($cambiar));
        $url_titulo = preg_replace(utf8_decode($patron), "", utf8_decode($url_titulo));
        $url_titulo = preg_replace('/--/', '-', $url_titulo);
        $url_titulo = preg_replace('/---/', '-', $url_titulo);
        $url_titulo = strtolower($url_titulo);

        return $url_titulo;
    }
}
