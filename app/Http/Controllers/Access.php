<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class Access extends Controller
{
  public function admin_login( Request $request ) {
    
    if ( $request->isMethod( 'post' ) ) {
        
      if (Auth::attempt( ['email'=> $request->input( 'email' ), 'password' => $request->input( 'password' ), 'aktif' => 1] ) ) {
        die(' Access granted ');
      }
      die(' Access Denied');
    }
    else if ( $request->isMethod( 'get' ) ) {
      
      if ( View::exists( 'admin_panel/access/admin_login' ) ) {
        return view( 'admin_panel/access/admin_login' ); 
      }
    }
  }
}
