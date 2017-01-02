<?php

namespace App\Http\Controllers;

use App\Models\HargaDasarPakaianModel;
use App\Models\VariasiPakaianModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class HargaDasarPakaian extends Controller
{
    public function all( Request $request ) {
      
      $max_id = [];
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }

        return redirect()->route( 'hargaDasarPakaian.all' );    
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $query = DB::select('SELECT MAX(id) AS id FROM harga_dasar_pakaian GROUP BY variasi_pakaian');
 
        foreach ( $query as $output ) {
          array_push( $max_id, $output->id );
        }
        
        $data['hargaDasarPakaianAll'] = HargaDasarPakaianModel::find( $max_id );
        
        if ( View::exists( 'admin_panel/all/semuaHargaDasarPakaian' ) ) {
          return view( 'admin_panel/all/semuaHargaDasarPakaian', $data );
        } 
      }
    }
  
    public function create( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'variasi_pakaian' ] = $request->input( 'variasi_pakaian' );
        $insert[ 'harga_dasar' ] = $request->input( 'harga_dasar' );
            
        $variasi_pakaian_insert = new HargaDasarPakaianModel();
        $variasi_pakaian_insert->variasi_pakaian = $insert[ 'variasi_pakaian' ];
        $variasi_pakaian_insert->harga_dasar = $insert[ 'harga_dasar' ];
        
        $variasi_pakaian_insert->save();
            
        return redirect()->route( 'hargaDasarPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if ( View::exists( 'admin_panel/add/tambahHargaDasarPakaian' ) ) {
          return view( 'admin_panel/add/tambahHargaDasarPakaian' );
        }
      }      
    } 
    
    public function edit( Request $request, $variasi_pakaian_id ) {
      
      $max_id = HargaDasarPakaianModel::where( 'variasi_pakaian' , $variasi_pakaian_id )->max( 'id' );
        
      $get[ 'retrieve' ] = HargaDasarPakaianModel::find( $max_id );
      $get[ 'retrieveAll' ] = HargaDasarPakaianModel::where( 'variasi_pakaian', $variasi_pakaian_id )->get();
           
      if ( $request->isMethod( 'post' ) ) {
        
        $variasi_pakaian_insert = new HargaDasarPakaianModel();
        
        $variasi_pakaian_insert->variasi_pakaian = $variasi_pakaian_id;
        $variasi_pakaian_insert->harga_dasar = $request->input( 'harga_dasar' );
        
        if ( $get['retrieve']['harga_dasar'] != $variasi_pakaian_insert->harga_dasar ) {          
          $variasi_pakaian_insert->save();
        }

        return redirect()->route( 'hargaDasarPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
       
        if ( View::exists( 'admin_panel/edit/editHargaDasarPakaian' ) ) {
          return view( 'admin_panel/edit/editHargaDasarPakaian', $get );
        }
      }
    }
}
