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
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('luasDaerahPrint.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete"><input type="submit" value="DELETE"></div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('luasDaerahPrint.all','DISPLAY') }}></div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <table>
                            <tr>
                                <td> No </td>
                                <td> Nama Referensi </td>
                                <td> Nama Tampil </td>
                                <td> Panjang </td>
                                <td> Lebar </td>
                                <td> Edit </td>
                                <td> Delete </td>
                            </tr>
                            @foreach($luasDaerahPrintAll as $luasDaerahPrint)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $luasDaerahPrint->nama_referensi }} </td>
                                <td> {{ $luasDaerahPrint->nama_tampil }} </td>
                                <td> {{ $luasDaerahPrint->panjang }} </td>
                                <td> {{ $luasDaerahPrint->lebar }} </td>
                                <td> {{ HTML::linkRoute('luasDaerahPrint.edit', 'EDIT',  $luasDaerahPrint->id) }} </td>
                                <td> <input type="checkbox" name="delete[]" value="{{ $luasDaerahPrint->id }}"> </td>
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
