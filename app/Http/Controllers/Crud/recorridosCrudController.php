<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\recorridos;
use Illuminate\Support\Facades\DB;

class recorridosCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['query'] = recorridos::get();
        return view('recorridosCrud.listar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["data"] = DB::table( 'destinos_alojamientos' )
                -> select ( 'id', 'titulo' )
                -> get();

        return view('recorridosCrud.crear', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $this -> getUrl( $request ->txtRecorrido );
        $query = new recorridos();

        $varTitulo = $request ->txtRecorrido;
        $varDescripcion = $request ->txtDescripcion;
        $varPrecio = $request ->txtPrecio;
        $varDestino = $request ->txtDestiAloja;

        if(isset($varTitulo) and isset($varDescripcion) and isset($varPrecio) and isset($varDestino)){

            $query -> titulo = $request ->txtRecorrido;
            $query -> url = $url;
            $query -> descripcion = $request ->txtDescripcion;
            $query -> precio = $request ->txtPrecio;
            $query -> idDestinos_Alojamientos = $request ->txtDestiAloja;
            $query -> save();

        }else{
            return view("error");
        }

        return redirect('/recorridos-crud')->with(['msg' => 'Registro creado correctamente', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table( 'recorridos' )
        -> select ( "bloqueo" )
        -> where ("id", "=", $id )
        -> get();

        $bloqueo = intval($data[0] -> bloqueo);

        if($bloqueo === 0) {
            DB::table('recorridos')
            ->where('id', "=", $id)
            ->update(['bloqueo' => 1]);
            return redirect('/recorridos-crud')->with(['msg' => 'Registro bloqueado correctamente', 'class' => 'alert-success']);
        } else {
            DB::table('recorridos')
            ->where('id', "=", $id)
            ->update(['bloqueo' => 0]);
            return redirect('/recorridos-crud')->with(['msg' => 'Registro desbloqueado correctamente', 'class' => 'alert-success']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["destiAloja"] = DB::table( 'destinos_alojamientos' )
                -> select ( 'id', 'titulo' )
                -> get();

        $data["titulo"] = DB::table( 'recorridos' )
                -> select ( 'id', 'titulo', "idDestinos_Alojamientos" )
                -> where ( 'id', '=', $id )
                -> get();

        $aux = $data['titulo'][0] -> idDestinos_Alojamientos;

        $data["luis"] = DB::table( 'destinos_alojamientos' )
        -> select ( 'id', 'titulo' )
        -> where ( 'id', '=', $aux )
        -> get();


        $data['query'] = recorridos::findOrFail( $id );

        return view('recorridosCrud.actualizar', $data);
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
        $url = $this -> getUrl( $request ->txtRecorrido );
        $query = recorridos::find( $id );

        $varTitulo = $request ->txtRecorrido;
        $varDescripcion = $request ->txtDescripcion;
        $varPrecio = intval($request ->txtPrecio);
        $varDestino = $request ->txtDestiAloja;

        if(isset($varTitulo) and isset($varDescripcion) and isset($varPrecio) and isset($varDestino)){

            $query -> titulo = $varTitulo;
            $query -> url = $url;
            $query -> descripcion = $varDescripcion;
            $query -> precio = $varPrecio;
            $query -> idDestinos_Alojamientos = $varDestino;
            $query -> update();

        }else{
            return view("error");
        }

        return redirect('/recorridos-crud')->with(['msg' => 'Registro actualizado correctamente', 'class' => 'alert-success']);
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
            $query = recorridos::find( $id );
            $query -> delete();
            return redirect('/recorridos-crud')->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-success']);
        }
        catch ( \Exception $ex)
        {
            return redirect('/recorridos-crud')->with(['msg' => 'Ha ocurrido un error al eliminar el registro, inténtelo de nuevo', 'class' => 'alert-danger']);
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
