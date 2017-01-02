<?php

namespace App\Http\Controllers;

use App\Models\JenisPoinModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class JenisPoin extends Controller
{
    public function all( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }
        
        return redirect()->route( 'jenisPoin.all' );       
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'jenisPoinAll' ] = JenisPoinModel::all();
       
        if ( View::exists( 'admin_panel/all/semuaJenisPoin' ) ) {
          return view( 'admin_panel/all/semuaJenisPoin', $data );
        } 
      }
    }
    
    public function create( Request $request ) {
 
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'kategori_poin' ] = $request->input( 'kategori_poin' );
        $insert[ 'penambahan' ] = $request->input( 'penambahan' );
       
        $jenis_poin_insert = new JenisPoinModel();
        $jenis_poin_insert->kategori_poin = $insert[ 'kategori_poin' ];
        $jenis_poin_insert->penambahan = $insert[ 'penambahan' ];
         
        $jenis_poin_insert->save();
            
        return redirect()->route( 'jenisPoin.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if ( View::exists( 'admin_panel/add/tambahJenisPoin' ) ) {
          return view( 'admin_panel/add/tambahJenisPoin' );
        }
      }      
    }
    
    public function edit( Request $request, $id ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $jenis_poin_update = JenisPoinModel::find( $id );
        $jenis_poin_update->kategori_poin = $request->input( 'kategori_poin' );
        $jenis_poin_update->penambahan = $request->input( 'penambahan' );
        $jenis_poin_update->save();
            
        return redirect()->route( 'jenisPoin.all');
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = JenisPoinModel::find( $id );
           
        if ( View::exists( 'admin_panel/edit/editjenisPoin' ) ) {
          return view( 'admin_panel/edit/editJenisPoin', $get );
        }
      }
    }
    
    public function delete( $id ) {
        
      $jenis_poin_model = JenisPoinModel::find( $id );
      $jenis_poin_model->delete();
    }
}
