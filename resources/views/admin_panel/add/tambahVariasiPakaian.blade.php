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
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('variasiPakaian.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete">DELETE</div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('variasiPakaian.all','DISPLAY') }}</div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <form method="POST">
                        <table>
                            <tr>               
                                <td> Size </td>
                                <td> <select name="size" required>
                                        @foreach($sizeModel as $size)
                                        <option value="{{ $size->id }}">{{ $size->nama_referensi }}</option>
                                        @endforeach
                                    </select></td>
                            </tr>
                            <tr>
                                <td> Jenis Pakaian </td>
                                <td> <select name="jenis_pakaian" required>
                                        @foreach($jenisPakaianModel as $jenisPakaian)
                                        <option value="{{ $jenisPakaian->id }}">{{ $jenisPakaian->nama }}</option>
                                        @endforeach
                                    </select></td>
                                </td>
                            </tr>
                            <tr>
                                <td> Bahan Print Pakaian </td>
                                <td> <select name="bahan_print_pakaian" required>
                                        @foreach($bahanPrintPakaianModel as $bahanPrintPakaian)
                                        <option value="{{ $bahanPrintPakaian->id }}">{{ $bahanPrintPakaian->nama }} </option>
                                        @endforeach
                                    </select> </td>
                            </tr>
                            <tr>
                                <td> Warna Pakaian </td>
                                <td> <select name="warna_pakaian">
                                        @foreach($warnaPakaianModel as $warnaPakaian)
                                        <option value="{{ $warnaPakaian->id }}">{{ $warnaPakaian->nama }}</option>
                                        @endforeach
                                    </select></td>
                            </tr>
                            <tr>
                                <td> Luas Daerah Print </td>
                                <td> <select name="luas_daerah_print">
                                        @foreach($luasDaerahPrintModel as $luasDaerahPrint)
                                        <option value="{{ $luasDaerahPrint->id }}">{{ $luasDaerahPrint->nama_referensi }}</option>
                                        @endforeach
                                    </select>
                            </tr>
                            <tr>
                                <td> Status </td>
                                <td> <select name="aktif">
                                        <option value="0" selected> Tidak aktif </option>
                                        <option value="1" > Aktif </option>
                                    </select></td>
                            </tr>
                           
                            <tr>
                                {{ csrf_field() }}
                                <td colspan="2"><input type="submit" value="submit"></td>
                            </tr>
                           
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>

