<?php

namespace App\Http\Controllers;

use App\Models\SizeModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class Size extends Controller
{
    public function all( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }
        
        return redirect()->route( 'size.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'sizeAll' ] = SizeModel::all();
       
        if ( View::exists( 'admin_panel/all/semuaSize' ) ) {
          return view( 'admin_panel/all/semuaSize', $data );
        } 
      }
    }
    
    public function create( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'nama_referensi' ] = $request->input( 'nama_referensi' );
        $insert[ 'nama_tampil' ] = $request->input( 'nama_tampil' );
        $insert[ 'panjang' ] = $request->input( 'panjang' );
        $insert[ 'lebar' ] = $request->input( 'lebar' );
            
        $size_insert = new SizeModel();
        $size_insert->nama_referensi = $insert[ 'nama_referensi' ];
        $size_insert->nama_tampil = $insert[ 'nama_tampil' ];
        $size_insert->panjang = $insert[ 'panjang' ];
        $size_insert->lebar = $insert[ 'lebar' ];

        $size_insert->save();
            
        return redirect()->route( 'size.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if ( View::exists( 'admin_panel/add/tambahSize' ) ) {
          return view( 'admin_panel/add/tambahSize' );
        }
      }      
    }
    
    public function edit( Request $request, $id ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $size_update = SizeModel::find( $id );
        $size_update->nama_referensi = $request->input( 'nama_referensi' );
        $size_update->nama_tampil = $request->input( 'nama_tampil' );
        $size_update->panjang = $request->input( 'panjang' );
        $size_update->lebar = $request->input( 'lebar' );
        $size_update->save();
            
        return redirect()->route( 'size.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = SizeModel::find( $id );
           
        if ( View::exists( 'admin_panel/edit/editSize' ) ) {
          return view( 'admin_panel/edit/editSize', $get );
        }
      }
    }  
    
    public function delete( $id ) {
        
        $size_model = SizeModel::find( $id );
        $size_model->delete();
    }
    
}
