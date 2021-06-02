<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\destinos;

use function PHPUnit\Framework\returnSelf;

class crudcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['query'] = destinos::get();
        return view('crud.listar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crud.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $this -> getUrl( $request ->txtdestinos );
        $query = new destinos();
        $query -> titulo = $request ->txtdestinos;
        $query -> url = $url;
        $query -> save();

        return redirect('/crud')->with(['msg' => 'Registro creado correctamente', 'class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("Crud.show");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['query'] = destinos::findOrFail( $id );
        return view('crud.actualizar', $data);
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
        $url = $this -> getUrl( $request ->txtdestinos );
        $query = destinos::find( $id );
        $query -> titulo = $request ->txtdestinos;
        $query -> url = $url;
        $query -> update();

        return redirect('/crud')->with(['msg' => 'Registro actualizado correctamente', 'class' => 'alert-success']);
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
            $query = destinos::find( $id );
            $query -> delete();
            return redirect('/crud')->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-success']);
        }
        catch ( \Exception $ex)
        {
            return redirect('/crud')->with(['msg' => 'Ha ocurrido un error al eliminar el registro, inténtelo de nuevo', 'class' => 'alert-danger']);
            //return redirect('/crud')->with(['msg' => 'Ha ocurrido un error al eliminar el registro, inténtelo de nuevo '.$ex ->getMessage(), 'class' => 'alert-danger']); --> muestra la ubicación del error
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

    public function numerico ( $url = 0)
    {
        if($url != 0)
            return $url;
        else
            return;
        //ese if else, es una validación para sanetizar el código y que no ingresen datos vacios
        //return 'Método númerico';
    }

    public function encrypt1( )
    {
        $str = 'Mensaje a cifrar :)';
        return $this -> encrypt ( $str );
    }

	public function encrypt( $str = '' )
	{
		$data = '';
		if( $str != '' ):
			$ciphering = "AES-128-CBC";
			$iv_length = openssl_cipher_iv_length($ciphering);
			$options = 0;

			$encryption_iv = '1234567891011121';
			$data = openssl_encrypt($str, $ciphering, $this->token(), $options, $encryption_iv);
            $data = str_replace( '/','___',$data );
            $data = str_replace( '+','---',$data );
        endif;
        return $data;
    }

    public function decrypt1()
    {
        $str = '';
        return $this -> decrypt ( $str );
    }

    public function decrypt( $str = '')
    {
        $data = '';
        if( $str != ''):
            $ciphering = 'AES-128-CBC';
            $decryption_iv = '1234567891011121';
            $options = 0;

            $data = str_replace( '___','/',$str );
            $data = str_replace( '---','+',$data );
            $data = openssl_decrypt ($data, $ciphering, $this->token(), $options, $decryption_iv);
        endif;
        return $data;
    }

    private function token(){ return '123'; }

}
