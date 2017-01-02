<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Models\OtoritasAdminModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class Admins extends Controller
{
  public function all( Request $request ) {
      
    if ( $request->isMethod( 'post' ) ) {
      
      if ( !empty( $request->input( 'delete' ) ) ) {
          
        foreach( $request->input( 'delete' ) as $delete ) {
            
          $this->delete( $delete );
        }  
      }
      
      return redirect()->route( 'admins.all' );
    }
    else if ( $request->isMethod( 'get' ) ) {
      
      $data[ 'no' ] = 1;
      $data[ 'adminsAll' ] = UsersModel::where( 'is_admin' , 1 )->get();
      
      if ( View::exists( 'admin_panel/all/semuaAdmin' ) ) {
        return view( 'admin_panel/all/semuaAdmin', $data );
      }
    }
  }
  
  public function create( Request $request ) {
    
    if ( $request->isMethod( 'post') ) {
        
      $password = $request->input( 'password' );
      $password = Hash::make( $password );
      
      $admin_model = new UsersModel();
      $admin_model->name = $request->input( 'name' );
      $admin_model->email = $request->input( 'email' );
      $admin_model->password = $request->input( 'password' );
      $admin_model->alamat = $request->input( 'alamat' );
      $admin_model->provinsi = $request->input( 'provinsi' );
      $admin_model->aktif = 1;
      $admin_model->is_admin = $request->input( 'is_admin' );
      $admin_model->otoritas_admins = $request->input( 'otoritas_admins' );
      
      $admin_model->save();
      
      return redirect()->route( 'admins.all' );
    }
    else if ( $request->isMethod( 'get' ) ) {
      
      $data[ 'otoritasAdminAll' ] = OtoritasAdminModel::all();
      
      if ( View::exists( 'admin_panel/add/tambahAdmin' ) ) {
        return view( 'admin_panel/add/tambahAdmin' , $data);
      }
    }
  }
  
  public function edit( Request $request , $id ) {
    
    if ( $request->isMethod( 'post') ) {
      
      $password = Hash::make( $request->input( 'password' ) );
        
      $admin_model = UsersModel::find( $id );
      $admin_model->name = $request->input( 'name' );
      $admin_model->email = $request->input( 'email' );
      $admin_model->password = $password;
      $admin_model->alamat = $request->input( 'alamat' );
      $admin_model->provinsi = $request->input( 'provinsi' );
      $admin_model->aktif = $request->input( 'aktif' );
      $admin_model->otoritas_admins = $request->input( 'otoritas_admins' );
      
      $admin_model->save();
      
      return redirect()->route( 'admins.all' );
    }
    else if ( $request->isMethod( 'get' ) ) {
        
      if ( View::exists( 'admin_panel/edit/editAdmin' ) ) {
          
          $data[ 'retrieve' ] = UsersModel::find( $id );
          $data[ 'retrieveOtoritasAdmin' ] = OtoritasAdminModel::all();
          
          return view( 'admin_panel/edit/editAdmin' , $data);
      }
    }
  }
  
  public function delete( $id ) {
    
    $admin_model = UsersModel::find( $id );
    
    if ( $admin_model->is_admin == 1 ) {
      
      $admin_model->delete();
    }
  }
}
