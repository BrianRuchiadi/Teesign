<!DOCTYPE html>
<html>
    <head>
        <title> Teesign Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        {{ HTML::style('css/adminSite.css') }}
    
        <!-- style below represents fonts -->
        <style>
        </style>
    
        <!-- script below represents javascript -->
        <script>
            $( document ).ready( function(){
              $( '#submit_button' ).hide();
              
              $( '#variasi_pakaian' ).keyup( function(){ 
                var input = this.value;
                
                $.ajax({
                  type : "post",
                  url : "/search/variasi-pakaian",
                  data : {
                    "_token" : "{{ csrf_token() }}" ,
                    "input" : input
                  },
                  datatype : "json",
                  success : function( data ){
                    if( data.id ){
                        $( '.search.output' ).html( 'Data ditemukan' );
                        $( '.search.output' ).css( 'color', 'green' );
                        $( '#submit_button' ).show();
                    }
                    else{
                        $( '.search.output' ).html( 'Data tidak ditemukan' );
                        $( '.search.output' ).css( 'color', 'red' );
                        $( '#submit_button' ).hide();
                    }
                  },
                  
                  error : function( data ){
                    alert( 'an error has occured' );
                  }
                });
              });
            }) ;
            
        </script>
        
    </head>
    <body>
        <div class="wrapper">
            <!-- This part is reusable -->
            @include('adminMainHeader')
            
            <!-- End of the reusable part -->
            <div class="content wrapper">
                <div class="sub header">
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('hargaDasarPakaian.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete">DELETE</div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('hargaDasarPakaian.all','DISPLAY') }}</div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <form method="POST">
                         
                        <table>
                            <tr>               
                                <td> ID </td>
                                <td> <input type="number" name="variasi_pakaian" required placeholder="cari dengan id variasi pakaian" id="variasi_pakaian"><br>
                                    <div class="search output"></div>
                            </tr>
                            <tr>
                                <td> Harga Dasar </td>
                                <td><input type="number" name="harga_dasar" min="10000" max="9999999" step="0.01"></td>
                            </tr>
                            <tr>
                                {{ csrf_field() }}
                                <td colspan="2"><input type="submit" value="submit" id="submit_button"></td>
                            </tr>
                           
                        </table>
                        
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>

