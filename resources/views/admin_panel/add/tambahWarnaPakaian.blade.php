<!DOCTYPE html>
<html>
    <head>
        <title> Teesign Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jscolor.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jscolor.min.js') }}"></script>
    
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
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('warnaPakaian.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete">DELETE</div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('warnaPakaian.all','DISPLAY') }}</div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <form method="POST">
                        <table>
                            <tr>               
                                <td> Nama </td>
                                <td> <input type="text" name="nama" required>
                            </tr>
                            <tr>
                                <td> Warna 1 </td>
                                <td> <input class="jscolor" name="warna_1" required> </td>
                            </tr>
                            <tr>
                                <td> Warna 2<br><sub>(* Jika tidak ada, set #FFFFFF)</sub> </td>
                                <td> <input class="jscolor" name="warna_2"> </td>
                            </tr>
                            <tr>
                                <td> Warna 3<br><sub>(* Jika tidak ada, set #FFFFFF)</sub> </td>
                                <td> <input class="jscolor" name="warna_3"></td>
                            </tr>
                            <tr>
                                <td> Status </td>
                                <td> <select name="aktif">
                                        <option value="0" selected>Tidak Aktif </option>
                                        <option value="1"> Aktif </option>
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

