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
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('jenisPoin.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete">DELETE</div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('jenisPoin.all','DISPLAY') }}</div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <form method="POST">
                         
                        <table>
                            <tr>               
                                <td> Jenis </td>
                                <td> <input type="text" name="kategori_poin" required value="{{ $retrieve->kategori_poin }}">
                            </tr>
                            <tr>
                                <td> Status </td>
                                <td> <select name="penambahan">
                                        <option value="0" <?php if($retrieve->penambahan == 0){ ?> selected <?php } ?>> Tidak Aktif </option>
                                        <option value="1" <?php if($retrieve->penambahan == 1){ ?> selected <?php } ?>> Aktif </option>
                                    </select>
                                </td>
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

