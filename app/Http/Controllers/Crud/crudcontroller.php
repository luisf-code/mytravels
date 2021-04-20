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
        $query = new destinos();
        $query -> titulo = $request ->txtdestinos;
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
        //
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
        //
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
