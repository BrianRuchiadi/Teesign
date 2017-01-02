<?php

namespace App\Http\Controllers;

use App\Models\JenisPakaianModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class JenisPakaian extends Controller
{
    public function all( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }
        
        return redirect()->route( 'jenisPakaian.all' );    
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'jenisPakaianAll' ] = JenisPakaianModel::all();
       
        if ( View::exists( 'admin_panel/all/semuaJenisPakaian' ) ) {
          return view( 'admin_panel/all/semuaJenisPakaian', $data );
        } 
      }
    }
    
    public function create( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'nama' ] = $request->input( 'nama' );
        $insert[ 'keterangan' ] = $request->input( 'keterangan' );
        $insert[ 'aktif' ] = $request->input( 'aktif' );
            
        $jenis_pakaian_insert = new JenisPakaianModel();
        $jenis_pakaian_insert->nama = $insert[ 'nama' ];
        $jenis_pakaian_insert->keterangan = $insert[ 'keterangan' ];
        $jenis_pakaian_insert->aktif = $insert[ 'aktif' ];
            
        $jenis_pakaian_insert->save();
            
        return redirect()->route( 'jenisPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if ( View::exists( 'admin_panel/add/tambahJenisPakaian' ) ) {
          return view( 'admin_panel/add/tambahJenisPakaian' );
        }
      }      
    }
    
    public function edit( Request $request, $id ) {
      
      if ( $request->isMethod( 'post' ) ) {
        $jenis_pakaian_update = JenisPakaianModel::find( $id );
        $jenis_pakaian_update->nama = $request->input( 'nama' );
        $jenis_pakaian_update->keterangan = $request->input( 'keterangan' );
        $jenis_pakaian_update->aktif = $request->input( 'aktif' );
        
        $jenis_pakaian_update->save();
            
        return redirect()->route( 'jenisPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = JenisPakaianModel::find( $id );
           
        if ( View::exists( 'admin_panel/edit/editJenisPakaian' ) ) {
          return view( 'admin_panel/edit/editJenisPakaian', $get );
        }
      }
    }
    
    public function delete( $id ){
        
      $jenis_pakaian_model = JenisPakaianModel::find( $id );
      $jenis_pakaian_model->delete();
    }
    
}
