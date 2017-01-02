<?php

namespace App\Http\Controllers;

use App\Models\JenisUserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class JenisUser extends Controller
{
    public function all( Request $request ) {
    
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }
        
        return redirect()->route( 'jenisUser.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'jenisUserAll' ] = JenisUserModel::all();
       
        if ( View::exists( 'admin_panel/all/semuaJenisUser' ) ) {
          return view( 'admin_panel/all/semuaJenisUser', $data );
        } 
      }
    }
    
    public function create( Request $request ) {

      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'jenis' ] = $request->input( 'jenis' );
        $insert[ 'keterangan' ] = $request->input( 'keterangan' );
        $insert[ 'aktif' ] = $request->input( 'aktif' );
            
        $jenis_user_insert = new JenisUserModel();
        $jenis_user_insert->jenis = $insert[ 'jenis' ];
        $jenis_user_insert->keterangan = $insert[ 'keterangan' ];
        $jenis_user_insert->aktif = $insert[ 'aktif' ];
            
        $jenis_user_insert->save();
            
        return redirect()->route( 'jenisUser.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if ( View::exists( 'admin_panel/add/tambahJenisUser' ) ) {
          return view( 'admin_panel/add/tambahJenisUser' );
        }
      }      
    }
    
    public function edit( Request $request, $id ) {
      
      if ( $request->isMethod( 'post' ) ) {
        $jenis_user_update = JenisUserModel::find( $id );
        $jenis_user_update->jenis = $request->input( 'jenis' );
        $jenis_user_update->keterangan = $request->input( 'keterangan' );
        $jenis_user_update->aktif = $request->input( 'aktif' );
        $jenis_user_update->save();
            
        return redirect()->route( 'jenisUser.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = JenisUserModel::find( $id );
            
        if ( View::exists( 'admin_panel/edit/editJenisUser' ) ) {
          return view( 'admin_panel/edit/editJenisUser', $get );
        }
      }
    }
    
    public function delete( $id ) {
        
      $jenis_user_model = JenisUserModel::find( $id );
      $jenis_user_model->delete();
    }
}
