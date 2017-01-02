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
                                <td> Harga Baru </td>
                                <td> <input type="number" min="10000" max="2000000" step="0.01" name="harga_dasar" required value="{{ $retrieve->harga_dasar_pakaian }}">
                            </tr>
                            <tr>
                                {{ csrf_field() }}
                                <td colspan="2"><input type="submit" value="submit"></td>
                            </tr>
                            <tr colspan="2">
                                <table>
                                    <tr>
                                        <td colspan="2" style="text-align : center; font-weight: bold"> History Update Harga </td>
                                    </tr>   
                                    <tr>
                                        <td> Tanggal Update </td>
                                        <td> Harga </td>
                                    </tr>
                                    @foreach($retrieveAll as $retrieveAll)
                                    <tr>
                                        <td> {{ $retrieveAll->updated_at }} </td>
                                        <td> {{ $retrieveAll->harga_dasar }} </td>
                                    </tr>
                                    @endforeach
                                </table>
                                
                            </tr>

                           
                        </table>
                        
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>

