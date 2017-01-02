<?php

namespace App\Http\Controllers;

use App\Models\LuasDaerahPrintModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class LuasDaerahPrint extends Controller
{
    public function all ( Request $request ) {
      $method = $request->method();
        
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }
        
        return redirect()->route( 'luasDaerahPrint.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'luasDaerahPrintAll' ] = LuasDaerahPrintModel::all();
       
        if ( View::exists( 'admin_panel/all/semuaLuasDaerahPrint' ) ) {
          return view( 'admin_panel/all/semuaLuasDaerahPrint', $data );
        } 
      }
    }

    public function create( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'nama_referensi' ] = $request->input( 'nama_referensi' );
        $insert[ 'nama_tampil' ] = $request->input( 'nama_tampil' );
        $insert[ 'panjang' ] = $request->input( 'panjang' );
        $insert[ 'lebar' ] = $request->input( 'lebar' );
            
        $luas_daerah_print_insert = new LuasDaerahPrintModel();
        $luas_daerah_print_insert->nama_referensi = $insert[ 'nama_referensi' ];
        $luas_daerah_print_insert->nama_tampil = $insert[ 'nama_tampil' ];
        $luas_daerah_print_insert->panjang = $insert[ 'panjang' ];
        $luas_daerah_print_insert->lebar = $insert[ 'lebar' ];

        $luas_daerah_print_insert->save();
            
        return redirect()->route( 'luasDaerahPrint.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if (View::exists( 'admin_panel/add/tambahLuasDaerahPrint' ) ) {
          return view( 'admin_panel/add/tambahLuasDaerahPrint' );
        }
      }      
    }
    
    public function edit( Request $request, $id ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $luas_daerah_print_update = LuasDaerahPrintModel::find( $id );
        $luas_daerah_print_update->nama_referensi = $request->input( 'nama_referensi' );
        $luas_daerah_print_update->nama_tampil = $request->input( 'nama_tampil' );
        $luas_daerah_print_update->panjang = $request->input( 'panjang' );
        $luas_daerah_print_update->lebar = $request->input( 'lebar' );
        $luas_daerah_print_update->save();
            
        return redirect()->route( 'luasDaerahPrint.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = LuasDaerahPrintModel::find( $id );
           
        if ( View::exists( 'admin_panel/edit/editLuasDaerahPrint' ) ) {
          return view( 'admin_panel/edit/editLuasDaerahPrint', $get );
        }
      }
    }  
    
    public function delete( $id ) {
        
      $luas_daerah_print_model = LuasDaerahPrintModel::find( $id );
      $luas_daerah_print_model->delete();
    }
}
