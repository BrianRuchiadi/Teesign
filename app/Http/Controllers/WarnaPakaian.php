<?php

namespace App\Http\Controllers;

use App\Models\WarnaPakaianModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class WarnaPakaian extends Controller
{
    public function all( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete) {
            $this->delete( $delete );
          }
        }
        
          return redirect()->route( 'warnaPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'warnaPakaianAll' ] = WarnaPakaianModel::all();
       
        if ( View::exists( 'admin_panel/all/semuaWarnaPakaian' ) ) {
          return view( 'admin_panel/all/semuaWarnaPakaian', $data );
        } 
      }
    }
    
    public function create( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'nama' ] = $request->input('nama');
        $insert[ 'warna_1' ] = "#" . $request->input( 'warna_1' );
        $insert[ 'warna_2' ] = "#" . $request->input( 'warna_2' );
        $insert[ 'warna_3' ] = "#" . $request->input( 'warna_3' );
        $insert[ 'aktif' ] = $request->input( 'aktif' );
            
        if ($insert['warna_1'] == '#FFFFFF' && $insert['warna_2'] = '#FFFFFF'){
          $insert['warna_2'] = '';
          $insert['warna_3'] = '';
        }
            
            
        $warna_pakaian_insert = new WarnaPakaianModel();
        $warna_pakaian_insert->nama = $insert[ 'nama' ];
        $warna_pakaian_insert->warna_1 = $insert[ 'warna_1' ];
        $warna_pakaian_insert->warna_2 = $insert[ 'warna_2' ];
        $warna_pakaian_insert->warna_3 = $insert[ 'warna_3' ];  
        $warna_pakaian_insert->aktif = $insert[ 'aktif' ];

        $warna_pakaian_insert->save();
            
        return redirect()->route( 'warnaPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if ( View::exists( 'admin_panel/add/tambahWarnaPakaian' ) ) {
          return view( 'admin_panel/add/tambahWarnaPakaian' );
        }
      }      
    }
    
    public function edit( Request $request, $id ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $warna_pakaian_update = WarnaPakaianModel::find( $id );
        $warna_pakaian_update->nama = $request->input( 'nama' );
        $warna_pakaian_update->warna_1 = "#" . $request->input( 'warna_1' );
        $warna_pakaian_update->warna_2 = "#" . $request->input( 'warna_2' );
        $warna_pakaian_update->warna_3 = "#" . $request->input( 'warna_3' );
        $warna_pakaian_update->aktif = $request->input( 'aktif' );
            
        if ( $warna_pakaian_update->warna_1 == '#FFFFFF' && $warna_pakaian_update->warna_2 = '#FFFFFF' ) {
          $warna_pakaian_update->warna_2 = '';
          $warna_pakaian_update->warna_3 = '';
        }
            
        $warna_pakaian_update->save();
            
        return redirect()->route( 'warnaPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = WarnaPakaianModel::find( $id );
           
        if ( View::exists( 'admin_panel/edit/editWarnaPakaian' ) ) {
          return view( 'admin_panel/edit/editWarnaPakaian', $get );
        }
      }
    }
    
    public function delete( $id ){
        
      $warna_pakaian_model = WarnaPakaianModel::find( $id );
      $warna_pakaian_model->delete();
    }
}
