<?php

namespace App\Http\Controllers;

use App\Models\OtoritasAdminModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class OtoritasAdmin extends Controller
{
    public function all( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }
        
        return redirect()->route( 'otoritasAdmin.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'otoritasAdminAll' ] = OtoritasAdminModel::all();
       
        if ( View::exists( 'admin_panel/all/semuaOtoritasAdmin' ) ) {
          return view( 'admin_panel/all/semuaOtoritasAdmin', $data );
        } 
      }
    }
    
    public function create( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'nama' ] = $request->input( 'nama' );
        $insert[ 'keterangan' ] = $request->input( 'keterangan' );
        $insert[ 'aktif' ] = $request->input( 'aktif' );
            
        $otoritas_admin_insert = new OtoritasAdminModel();
        $otoritas_admin_insert->nama = $insert[ 'nama' ];
        $otoritas_admin_insert->keterangan = $insert[ 'keterangan' ];
        $otoritas_admin_insert->aktif = $insert[ 'aktif' ];
            
        $otoritas_admin_insert->save();
            
        return redirect()->route( 'otoritasAdmin.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if ( View::exists( 'admin_panel/add/tambahOtoritasAdmin' ) ) {
          return view( 'admin_panel/add/tambahOtoritasAdmin' );
        }
      }      
    }
    
    public function edit( Request $request, $id ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $otoritas_admin_update = OtoritasAdminModel::find( $id );
        $otoritas_admin_update->nama = $request->input( 'nama' );
        $otoritas_admin_update->keterangan = $request->input( 'keterangan' );
        $otoritas_admin_update->aktif = $request->input( 'aktif' );
        $otoritas_admin_update->save();
            
        return redirect()->route( 'otoritasAdmin.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = OtoritasAdminModel::find( $id );
           
        if ( View::exists( 'admin_panel/edit/editOtoritasAdmin' ) ) {
          return view( 'admin_panel/edit/editOtoritasAdmin', $get );
        }
      }
    }
    
    public function delete( $id ) {
      $otoritas_admin_model = OtoritasAdminModel::find( $id );
      $otoritas_admin_model->delete();
    }
}
