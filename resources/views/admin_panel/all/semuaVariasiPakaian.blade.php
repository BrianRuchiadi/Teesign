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
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('variasiPakaian.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete"><input type="submit" value="DELETE"></div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('variasiPakaian.all','DISPLAY') }}></div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <table>
                            <tr>
                                <td> No </td>
                                <td> Size </td>
                                <td> Jenis Pakaian </td>
                                <td> Bahan Print Pakaian </td>
                                <td> Warna Pakaian </td>
                                <td> Luas Daerah Print </td>
                                <td> Status </td>
                                <td> Edit </td>
                                <td> Delete </td>
                            </tr>
                            @foreach($variasiPakaianAll as $variasiPakaian)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $variasiPakaian->size }} </td>
                                <td> {{ $variasiPakaian->jenis_pakaian }} </td>
                                <td> {{ $variasiPakaian->bahan_print_pakaian }} </td>
                                <td> {{ $variasiPakaian->warna_pakaian }} </td>
                                <td> {{ $variasiPakaian->luas_daerah_print }} </td>
                                <td> {{ $variasiPakaian->aktif }} </td>
                                <td> {{ HTML::linkRoute('variasiPakaian.edit', 'EDIT',  $variasiPakaian->id) }} </td>
                                <td> <input type="checkbox" name="delete[]" value="{{ $variasiPakaian->id }}"> </td>
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
