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
                <form method="POST">
                <div class="sub header">
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('hargaDasarPakaian.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete"><input type="submit" value="DELETE"></div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('hargaDasarPakaian.all','DISPLAY') }}></div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <table>
                            <tr>
                                <td> No </td>
                                <td> ID </td>
                                <td> Update terakhir </td>
                                <td> Harga Dasar </td>
                                <td> Update </td>
                            </tr>
                            @foreach($hargaDasarPakaianAll as $hargaDasarPakaian)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $hargaDasarPakaian->variasi_pakaian }} </td>
                                <td> {{ $hargaDasarPakaian->updated_at }} </td>    
                                <td> RP. {{ $hargaDasarPakaian->harga_dasar }} </td>
                                <td> {{ HTML::linkRoute( 'hargaDasarPakaian.edit', 'EDIT',  $hargaDasarPakaian->variasi_pakaian ) }} </td>
                                {{ csrf_field() }}
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                </form>
            </div>
            
        </div>
    </body>
</html>

