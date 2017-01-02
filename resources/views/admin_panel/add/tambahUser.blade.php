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
            $( document ).ready( function() {
                $( '.designer_register' ).hide();
                
                $( '#user_type_register' ).change( function() { 
                  if( $( '#user_type_register' ).val() === 'designer' ) {
                     $( '.designer_register' ).show();
                     
                  } else if( $( '#user_type_register').val() === 'pembeli') { 
                     $( '.designer_register' ).hide();
                     
                  }
                  
                });
            });
            
           
        </script>
        
    </head>
    <body>
        <div class="wrapper">
            <!-- This part is reusable -->
            @include('adminMainHeader')
            
            <!-- End of the reusable part -->
            <div class="content wrapper">
                <div class="sub header">
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('users.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete">DELETE</div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('users.all','DISPLAY') }}</div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <form method="POST">
                        <table>
                            <tr>
                                <td> User Type </td>
                                <td> <select name="user_type" id="user_type_register">
                                        <option value="pembeli"> Pembeli </option>
                                        <option value="designer"> Designer </option>
                                    </select> </td>
                            </tr>
                            <tr>               
                                <td> Username </td>
                                <td> <input type="text" name="name" id="name_register" required>
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td> <input type="email" name="email" id="email_register" required> </td>
                            </tr>
                            <tr>
                                <td> Password </td>
                                <td> <input type="password" name="password" id="password_register" required> </td>
                            </tr>
                            <tr>
                                <td> Alamat </td>
                                <td> <textarea name="alamat" cols="40" rows="20" id="alamat_register"></textarea></td>
                            </tr>
                            <tr>
                                <td> Provinsi </td>
                                <td><select name="provinsi" id="provinsi_register">
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
                           
                            <!-- bagian bawah adalah untuk designer -->
                            <tr class="designer_register">
                                <td> Jenis Kelamin </td>
                                <td> <select name="laki_laki" id="laki_laki_register"> 
                                        <option value="1"> Laki Laki </option>
                                        <option value="0"> Perempuan </option>
                                    </select></td>               
                            </tr>
                            <tr class="designer_register">
                                <td> Tanggal lahir </td>
                                <td> <input type="date" name="tanggal_lahir" id="tanggal_lahir_register"> </td>     
                            </tr>
                            <tr class="designer_register">
                                <td> Nomor Handphone </td>
                                <td> <input type="text" name="no_contact" id="no_contact_register"> </td>
                            </tr>
                           <!-- bagian designer sampai sini -->
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

