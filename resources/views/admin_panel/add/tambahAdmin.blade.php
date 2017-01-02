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
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('admins.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete">DELETE</div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('admins.all','DISPLAY') }}</div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <form method="POST">
                         
                        <table>
                            <tr>               
                                <td> Nama </td>
                                <td> <input type="text" name="name" required>
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td><input type="email" name="email" required></td>
                            </tr>
                            <tr>
                                <td> Password </td>
                                <td><input type="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td> Alamat </td>
                                <td> <textarea name="alamat"> </textarea> </td>
                            </tr>
                            <tr>
                                <td> Provinsi </td>
                                <td><select name="provinsi">
                                        <option value="Aceh"> Aceh </option>
                                        <option value="Bali"> Bali </option>
                                        <option value="Banten"> Banten </option>
                                        <option value="Bengkulu"> Bengkulu </option>
                                        <option value="Gorontalo"> Gorontalo </option>
                                        <option value="Jakarta"> Jakarta </option>
                                        <option value="Jambi"> Jambi </option>
                                        <option value="Jawa Barat"> Jawa Barat </option>
                                        <option value="Jawa Tengah"> Jawa Tengah </option>
                                        <option value="Jawa Timur"> Jawa Timur </option>
                                        <option value="Kalimantan Barat"> Kalimantan Barat </option>
                                        <option value="Kalimantan Selatan"> Kalimantan Selatan </option>
                                        <option value="Kalimantan Tengah"> Kalimantan Tengah </option>
                                        <option value="Kalimantan Timur"> Kalimantan Timur </option>
                                        <option value="Kalimantan Utara"> Kalimantan Utara </option>
                                        <option value="Kepulauan Bangka Belitung"> Kepulauan Bangka Belitung </option>
                                        <option value="Kepulauan Riau"> Kepulauan Riau </option>
                                        <option value="Lampung"> Lampung </option>
                                        <option value="Maluku"> Maluku </option>
                                        <option value="Maluku Utara"> Maluku Utara </option>
                                        <option value="Nusa Tenggara Barat"> Nusa Tenggara Barat </option>
                                        <option value="Nusa Tenggara Timur"> Nusa Tenggara Timur </option>
                                        <option value="Papua"> Papua </option>
                                        <option value="Papua Barat"> Papua Barat </option>
                                        <option value="Riau"> Riau </option>
                                        <option value="Sulawesi Barat"> Sulawesi Barat </option>
                                        <option value="Sulawesi Selatan"> Sulawesi Selatan </option>
                                        <option value="Sulawesi Tengah"> Sulawesi Tengah </option>
                                        <option value="Sulawesi Tenggara"> Sulawesi Tenggara </option>
                                        <option value="Sulawesi Utara"> Sulawesi Utara </option>
                                        <option value="Sumatera Barat"> Sumatera Barat </option>
                                        <option value="Sumatera Selatan"> Sumatera Selatan </option>
                                        <option value="Sumatera Utara"> Sumatera Utara </option>
                                        <option value="Yogyakarta"> Yogyakarta </option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td> Status </td>
                                <td> <select name="aktif"> 
                                        <option value="1" > Aktif </option>
                                        <option value="0" > Tidak aktif </option>
                            </tr>
                            <tr>
                                <td> Otoritas </td>
                                <td> <select name="otoritas_admins">
                                        @foreach( $otoritasAdminAll as $otoritasAdmin )
                                        <option value="{{ $otoritasAdmin->id }}"> {{ $otoritasAdmin->nama }} </option>
                                        @endforeach
                                    </select> </td>
                            </tr>
                            <input type="hidden" name="is_admin" value="1">
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

