<?php

namespace App\Http\Controllers;

use App\Models\VariasiPakaianModel;
use App\Models\SizeModel;
use App\Models\JenisPakaianModel;
use App\Models\BahanPrintPakaianModel;
use App\Models\WarnaPakaianModel;
use App\Models\LuasDaerahPrintModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class VariasiPakaian extends Controller
{
    public function all( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        if ( !empty( $request->input( 'delete' ) ) ) {
          foreach( $request->input( 'delete' ) as $delete ) {
            $this->delete( $delete );
          }
        }
        
        return redirect()->route( 'variasiPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        
        $data[ 'no' ] = 1;
        $data[ 'variasiPakaianAll' ] = VariasiPakaianModel::all();
        
        foreach( $data[ 'variasiPakaianAll' ] as $variasi_pakaian ) {
          $get_size = SizeModel::find( $variasi_pakaian->size );
          $variasi_pakaian->size = $get_size->nama_referensi;
                
          $get_jenis_pakaian = JenisPakaianModel::find( $variasi_pakaian->jenis_pakaian );
          $variasi_pakaian->jenis_pakaian = $get_jenis_pakaian->nama;
                
          $get_bahan_print_pakaian = BahanPrintPakaianModel::find( $variasi_pakaian->bahan_print_pakaian );
          $variasi_pakaian->bahan_print_pakaian = $get_bahan_print_pakaian->nama;
                
          $get_warna_pakaian = WarnaPakaianModel::find( $variasi_pakaian->warna_pakaian );
          $variasi_pakaian->warna_pakaian = $get_warna_pakaian->nama;
                
          $get_luas_daerah_print = LuasDaerahPrintModel::find( $variasi_pakaian->luas_daerah_print );
          $variasi_pakaian->luas_daerah_print = $get_luas_daerah_print->nama_referensi;
        }
        if ( View::exists( 'admin_panel/all/semuaVariasiPakaian' ) ) {
          return view( 'admin_panel/all/semuaVariasiPakaian', $data );
        } 
      }
    }
    
    public function create( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        $insert[ 'size' ] = $request->input( 'size' );
        $insert[ 'jenis_pakaian' ] = $request->input( 'jenis_pakaian' );
        $insert[ 'bahan_print_pakaian' ] = $request->input( 'bahan_print_pakaian' );
        $insert[ 'warna_pakaian' ] = $request->input( 'warna_pakaian' );
        $insert[ 'luas_daerah_print' ] = $request->input( 'luas_daerah_print' );
        $insert[ 'aktif' ] = $request->input( 'aktif' );
            
        $variasi_pakaian_insert = new VariasiPakaianModel();
        $variasi_pakaian_insert->size = $insert[ 'size' ];
        $variasi_pakaian_insert->jenis_pakaian = $insert[ 'jenis_pakaian' ];
        $variasi_pakaian_insert->bahan_print_pakaian = $insert[ 'bahan_print_pakaian' ];
        $variasi_pakaian_insert->warna_pakaian = $insert[ 'warna_pakaian' ];
        $variasi_pakaian_insert->luas_daerah_print = $insert[ 'luas_daerah_print' ];
        $variasi_pakaian_insert->aktif = $insert[ 'aktif' ];

        $variasi_pakaian_insert->save();
            
        return redirect()->route( 'variasiPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        if ( View::exists( 'admin_panel/add/tambahVariasiPakaian' ) ) {
          $data[ 'sizeModel' ] = SizeModel::all();
          $data[ 'jenisPakaianModel' ] = JenisPakaianModel::all();
          $data[ 'bahanPrintPakaianModel' ] = BahanPrintPakaianModel::all();
          $data[ 'warnaPakaianModel' ] = WarnaPakaianModel::all();
          $data[ 'luasDaerahPrintModel' ] = LuasDaerahPrintModel::all();
                
          return view( 'admin_panel/add/tambahVariasiPakaian', $data );
        }
      }      
    }

    public function edit( Request $request, $id ) {
       // post have not
      if ( $request->isMethod( 'post' ) ) {
        $variasi_pakaian_update = VariasiPakaianModel::find( $id );
        $variasi_pakaian_update->size = $request->input( 'size' );
        $variasi_pakaian_update->jenis_pakaian = $request->input( 'jenis_pakaian' );
        $variasi_pakaian_update->bahan_print_pakaian = $request->input( 'bahan_print_pakaian' );
        $variasi_pakaian_update->warna_pakaian = $request->input( 'warna_pakaian' );
        $variasi_pakaian_update->luas_daerah_print = $request->input ( 'luas_daerah_print' );
        $variasi_pakaian_update->aktif = $request->input( 'aktif' );
        
        $variasi_pakaian_update->save();
            
        return redirect()->route( 'variasiPakaian.all' );
      }
      else if ( $request->isMethod( 'get' ) ) {
        $get[ 'retrieve' ] = VariasiPakaianModel::find( $id );
            
        $get[ 'sizeModel' ] = SizeModel::all();
        $get[ 'jenisPakaianModel' ] = JenisPakaianModel::all();
        $get[ 'bahanPrintPakaianModel' ] = BahanPrintPakaianModel::all();
        $get[ 'warnaPakaianModel' ] = WarnaPakaianModel::all();
        $get[ 'luasDaerahPrintModel' ] = LuasDaerahPrintModel::all();
  
        if ( View::exists( 'admin_panel/edit/editVariasiPakaian' ) ) {
          return view( 'admin_panel/edit/editVariasiPakaian', $get );
        }
      }
    }
    
    public function delete( $id ) {
        
        $variasi_pakaian_model = VariasiPakaianModel::find( $id );
        $variasi_pakaian_model->delete();
    } 
}
