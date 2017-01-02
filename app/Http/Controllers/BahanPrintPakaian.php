<?php

namespace App\Http\Controllers;

use App\Models\BahanPrintPakaianModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;


class BahanPrintPakaian extends Controller
{
    public function all( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }
        
        return redirect()->route( 'bahanPrintPakaian.all' ); 
      }
      else if( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'bahanPrintPakaianAll' ] = BahanPrintPakaianModel::all();
       
        if ( View::exists( 'admin_panel/all/semuaBahanPrintPakaian' ) ) {
          return view( 'admin_panel/all/semuaBahanPrintPakaian', $data );
        } 
      }
    }
    
    public function create( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'nama' ] = $request->input( 'nama' );
        $insert[ 'keterangan' ] = $request->input( 'keterangan' );
        $insert[ 'aktif' ] = $request->input( 'aktif' );
            
        $bahan_print_pakaian_insert = new BahanPrintPakaianModel();
        $bahan_print_pakaian_insert->nama = $insert[ 'nama' ];
        $bahan_print_pakaian_insert->keterangan = $insert[ 'keterangan' ];
        $bahan_print_pakaian_insert->aktif = $insert[ 'aktif' ];
            
        $bahan_print_pakaian_insert->save();
            
        return redirect()->route( 'bahanPrintPakaian.all' );
        
      } 
      else if ( $request->isMethod( 'get' ) ) {
        if( View::exists( 'admin_panel/add/tambahBahanPrintPakaian' ) ) {
          return view( 'admin_panel/add/tambahBahanPrintPakaian' );
        }
      }      
    }
    
    public function edit( Request $request, $id ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $bahan_print_pakaian_update = BahanPrintPakaianModel::find( $id );
        
        $bahan_print_pakaian_update->nama = $request->input( 'nama' );
        $bahan_print_pakaian_update->keterangan = $request->input( 'keterangan' );
        $bahan_print_pakaian_update->aktif = $request->input( 'aktif' );
        
        $bahan_print_pakaian_update->save();
            
        return redirect()->route( 'bahanPrintPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = BahanPrintPakaianModel::find( $id );
           
        if ( View::exists( 'admin_panel/edit/editBahanPrintPakaian' ) ) {
          return view( 'admin_panel/edit/editBahanPrintPakaian', $get );
        }
      }
    }
    
    public function delete( $id ) {
        
      $bahan_print_pakaian_model = BahanPrintPakaianModel::find( $id );
      $bahan_print_pakaian_model->delete();
    }
}
