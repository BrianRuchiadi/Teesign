<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Models\DesignersModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class Users extends Controller
{
  public function all( Request $request ) {
    
    if ( $request->isMethod( 'get' ) ) {
      if ( View::exists( 'admin_panel/all/semuaUsers' ) ) {
        return view( 'admin_panel/all/semuaUsers' );
      } 
    }
  }
  
  public function base_all( Request $request ) {
    
    if ( $request->isMethod( 'post' ) ) {
     
      if ( !empty( $request->input( 'delete' ) ) ) {
          
        foreach( $request->input( 'delete' ) as $delete ) {
            
          $this->delete( $delete );  
        }
        
        return redirect()->route( 'users.all' );
      }
      
    }
    else if ( $request->isMethod( 'get' ) ) {
        
      if ( View::exists( 'admin_panel/all/semuaBaseUsers' ) ) {
          
        $data[ 'no' ] = 1;
        $data[ 'baseUsersAll' ] = UsersModel::all();
        
        return view( 'admin_panel/all/semuaBaseUsers' , $data);
      }
    }
  }
  
  public function designer_all( Request $request ) {
    
    if ( $request->isMethod( 'post' ) ) {
        
      if ( !empty( $request->input( 'delete' ) ) ) {
          
        foreach( $request->input( 'delete' ) as $delete ) {
            
          $this->delete( $delete );  
        }
        
        return redirect()->route( 'users.all' );
      }
      

    }
    else if ( $request->isMethod( 'get' ) ) {
       
      if ( View::exists( 'admin_panel/all/semuaDesignersUsers' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'designersUsersAll' ] = DesignersModel::all();
        
        return view( 'admin_panel/all/semuaDesignersUsers' , $data );
        
      }
    }
  }

  public function create( Request $request ) {
        
    if ( $request->isMethod( 'post' ) ) {
      
      $password = $request->input( 'password' );
      $password = Hash::make( $password );
  
      $user_insert = new UsersModel();
      
      $user_insert->name = $request->input( 'name' );
      $user_insert->email = $request->input( 'email' );
      $user_insert->password = $password;
      $user_insert->alamat = $request->input( 'alamat' );
      $user_insert->provinsi = $request->input( 'provinsi' );
     
      $user_insert->save();
      
      if ( $request->input('user_type') == "designer" ) {
        
        $designer_insert = new DesignersModel();
        
        $designer_insert->laki_laki = $request->input( 'laki_laki' );
        $designer_insert->tanggal_lahir = $request->input( 'tanggal_lahir' );
        $designer_insert->no_contact = $request->input( 'no_contact' );
        $designer_insert->users = $user_insert->id;
        
        $designer_insert->save();
      }

      return redirect()->route( 'users.all' );
    }
    else if ( $request->isMethod( 'get' ) ) {
      if ( View::exists( 'admin_panel/add/tambahUser' ) ) {
        return view( 'admin_panel/add/tambahUser' );
      }
    }      
  }
  
  public function edit( Request $request , $id ) {
      
    if ( $request->isMethod( 'post' ) ) {
        
      if ( $request->input( 'designer' ) == 1 ) {
        
        $designer_model = DesignersModel::where( 'users', $id )->get();
        $designer_model->first()->laki_laki = $request->input( 'laki_laki' );
        $designer_model->first()->tanggal_lahir = $request->input( 'tanggal_lahir' );
        $designer_model->first()->no_contact = $request->input( 'no_contact' );
        
        $designer_model->first()->save();
      }
      
      $base_user_model = UsersModel::find( $id );
      
      $base_user_model->name = $request->input( 'name' );
      $base_user_model->email = $request->input( 'email' );
      $base_user_model->alamat = $request->input( 'alamat' );
      $base_user_model->provinsi = $request->input( 'provinsi' );
      $base_user_model->aktif = $request->input( 'aktif' );
      
      $base_user_model->save();
      
      return redirect()->route( 'users.all' );
      
    }
    else if ( $request->isMethod( 'get' ) ) {
        
      $data[ 'designerExists' ] = false;
        
      if ( View::exists('admin_panel/edit/editUser') ) {
            
        $base_user_model = UsersModel::find( $id );
        $designer_model = DesignersModel::where( 'users', $id )->count();
            
        if ( $designer_model == 1 ) {
          
          $data[ 'designerExists' ] = true;
          $data[ 'retrieveDesignerUser' ] = DesignersModel::where( 'users' , $id )->get();        
        }
        
        $data[ 'retrieveBaseUser' ] = $base_user_model;
         
        return view( 'admin_panel/edit/editUser' , $data );
      }
    }
  }
  
  public function delete( $id ) {
    
    $designer_exists = DesignersModel::where( 'users', $id )->count();
    
    if ( $designer_exists == 1 ) {
        
      $designer_model = DesignersModel::where( 'users', $id )->get();
      $designer_model->first()->delete();
    }
    
    $user_model = UsersModel::find( $id );
    $user_model->delete();
  }
  
  /*
   // Below is the function to verify user from login
   * Both Auth And Hash can be used
   
  public function check_password( $password ) {
      $get_user_instance = UsersModel::find(2);
      
      $check = Auth::attempt(['email' => 'ruchiadibrian@yahoo.com', 'password' => '1234']);
      //$check = Hash::check($password , $get_user_instance->password);
      die(var_dump($check));
      
  }
 
   * 
   */
}
