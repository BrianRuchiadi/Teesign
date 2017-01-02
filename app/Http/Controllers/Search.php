<?php

namespace App\Http\Controllers;

use App\Models\HargaDasarPakaianModel;
use App\Models\VariasiPakaianModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Routing\Redirector;

class Search extends Controller
{
    public function VariasiPakaian( Request $request ) {
        
        if ( $request->isMethod('post') ) {
          $variasi_pakaian_model = VariasiPakaianModel::find( $request->input( 'input' ) );
          
          return response() -> json( $variasi_pakaian_model );
        }
    }
}