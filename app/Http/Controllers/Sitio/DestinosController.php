<?php

namespace App\Http\Controllers\Sitio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DestinosController extends Controller
{
    public function destinos()
    {
        // $query = DB::table( 'destinos' ) -> get();  
        // dd( $query ); se llama a toda la tabla 

        // $query = DB::table( 'destinos' ) 
        //         -> select ( 'id', 'titulo' ) 
        //         -> get();  
        // dd( $query ); se llama el id y el titulo del destino nada más
        
        // $query = DB::table( 'destinos' ) 
        //         -> select ( 'id', 'titulo' )
        //         -> where ( 'id', '=', '9' )
        //         -> get();
        // dd( $query ); se le ponen condiciones

        $query = DB::table( 'destinos' ) 
                -> select ( 'id', 'titulo' )
                -> where ( 'email', 'LIKE', '%gmail%' )
                -> whereIn ( 'id', [1,2,3,4,5] )
                -> whereBetween ( 'precio', [30000,70000] )
                -> get();
        dd( $query );
    }
}
