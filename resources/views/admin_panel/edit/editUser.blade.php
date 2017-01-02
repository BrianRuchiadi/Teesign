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
                                <td> Nama </td>
                                <td> <input type="text" name="name" required value="{{ $retrieveBaseUser->name }}">
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td> <input type="email" name="email" required value="{{ $retrieveBaseUser->email }}"></td>
                            </tr>
                            <tr>
                                <td> Alamat </td>
                                <td> <textarea name="alamat">{{ $retrieveBaseUser->alamat }} 
                                     </textarea></td>
                            </tr>
                            <tr>
                                <td> Provinsi </td>
                                <td> <select name="provinsi">
                                        <option value="Aceh" @if( $retrieveBaseUser->provinsi == "Aceh") selected @endif> Aceh </option>
                                        <option value="Bali" @if( $retrieveBaseUser->provinsi == "Bali") selected @endif> Bali </option>
                                        <option value="Banten" @if( $retrieveBaseUser->provinsi == "Banten") selected @endif> Banten </option>
                                        <option value="Bengkulu" @if( $retrieveBaseUser->provinsi == "Bengkulu") selected @endif> Bengkulu </option>
                                        <option value="Gorontalo" @if( $retrieveBaseUser->provinsi == "Gorontalo") selected @endif> Gorontalo </option>
                                        <option value="Jakarta" @if( $retrieveBaseUser->provinsi == "Jakarta") selected @endif> Jakarta </option>
                                        <option value="Jambi" @if( $retrieveBaseUser->provinsi == "Jambi") selected @endif> Jambi </option>
                                        <option value="Jawa Barat" @if( $retrieveBaseUser->provinsi == "Jawa Barat") selected @endif> Jawa Barat </option>
                                        <option value="Jawa Tengah" @if( $retrieveBaseUser->provinsi == "Jawa Tengah") selected @endif> Jawa Tengah </option>
                                        <option value="Jawa Timur" @if( $retrieveBaseUser->provinsi == "Jawa Timur") selected @endif> Jawa Timur </option>
                                        <option value="Kalimantan Barat" @if( $retrieveBaseUser->provinsi == "Kalimantan Barat") selected @endif> Kalimantan Barat </option>
                                        <option value="Kalimantan Selatan" @if( $retrieveBaseUser->provinsi == "Kalimantan Selatan") selected @endif> Kalimantan Selatan </option>
                                        <option value="Kalimantan Tengah" @if( $retrieveBaseUser->provinsi == "Kalimantan Tengah") selected @endif> Kalimantan Tengah </option>
                                        <option value="Kalimantan Timur" @if( $retrieveBaseUser->provinsi == "Kalimantan Timur") selected @endif> Kalimantan Timur </option>
                                        <option value="Kalimantan Utara" @if( $retrieveBaseUser->provinsi == "Kalimantan Utara") selected @endif> Kalimantan Utara </option>
                                        <option value="Kepulauan Bangka Belitung" @if( $retrieveBaseUser->provinsi == "Kepulauan Bangka Belitung") selected @endif> Kepulauan Bangka Belitung </option>
                                        <option value="Kepulauan Riau" @if( $retrieveBaseUser->provinsi == "Kepulauan Riau") selected @endif> Kepulauan Riau </option>
                                        <option value="Lampung" @if( $retrieveBaseUser->provinsi == "Lampung") selected @endif> Lampung </option>
                                        <option value="Maluku" @if( $retrieveBaseUser->provinsi == "Maluku") selected @endif> Maluku </option>
                                        <option value="Maluku Utara" @if( $retrieveBaseUser->provinsi == "Maluku Utara") selected @endif> Maluku Utara </option>
                                        <option value="Nusa Tenggara Barat" @if( $retrieveBaseUser->provinsi == "Nusa Tenggara Barat") selected @endif> Nusa Tenggara Barat </option>
                                        <option value="Nusa Tenggara Timur" @if( $retrieveBaseUser->provinsi == "Nusa Tenggara Timur") selected @endif> Nusa Tenggara Timur </option>
                                        <option value="Papua" @if( $retrieveBaseUser->provinsi == "Papua") selected @endif> Papua </option>
                                        <option value="Papua Barat" @if( $retrieveBaseUser->provinsi == "Papua Barat") selected @endif> Papua Barat </option>
                                        <option value="Riau" @if( $retrieveBaseUser->provinsi == "Riau") selected @endif> Riau </option>
                                        <option value="Sulawesi Barat" @if( $retrieveBaseUser->provinsi == "Sulawesi Barat") selected @endif> Sulawesi Barat </option>
                                        <option value="Sulawesi Selatan" @if( $retrieveBaseUser->provinsi == "Sulawesi Selatan") selected @endif> Sulawesi Selatan </option>
                                        <option value="Sulawesi Tengah" @if( $retrieveBaseUser->provinsi == "Sulawesi Tengah") selected @endif> Sulawesi Tengah </option>
                                        <option value="Sulawesi Tenggara" @if( $retrieveBaseUser->provinsi == "Sulawesi Tenggara") selected @endif> Sulawesi Tenggara </option>
                                        <option value="Sulawesi Utara" @if( $retrieveBaseUser->provinsi == "Sulawesi Utara") selected @endif> Sulawesi Utara </option>
                                        <option value="Sumatera Barat" @if( $retrieveBaseUser->provinsi == "Sumatera Barat") selected @endif> Sumatera Barat </option>
                                        <option value="Sumatera Selatan" @if( $retrieveBaseUser->provinsi == "Sumatera Selatan") selected @endif> Sumatera Selatan </option>
                                        <option value="Sumatera Utara" @if( $retrieveBaseUser->provinsi == "Sumatera Utara") selected @endif> Sumatera Utara </option>
                                        <option value="Yogyakarta" @if( $retrieveBaseUser->provinsi == "Yogyakarta") selected @endif> Yogyakarta </option>
                                    </select> </td>
                            </tr>
                            <tr>
                                <td> Status </td>
                                <td> <select name="aktif"> 
                                        <option value="1" @if( $retrieveBaseUser->aktif == 1 ) selected @endif > Aktif </option>
                                        <option value="0" @if( $retrieveBaseUser->aktif == 0 ) selected @endif > Tidak aktif </option> </td>
                            </tr>
                            @if( $designerExists )
                            <input type="hidden" name="designer" value="1">
                            <tr>
                                <td> Laki Laki </td>
                                <td> <select name="laki_laki">
                                        <option value="1" @if( $retrieveDesignerUser->first()->laki_laki == 1) selected @endif> Laki Laki </option>
                                        <option value="0" @if( $retrieveDesignerUser->first()->laki_laki == 0) selected @endif> Perempuan </option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td> Tanggal Lahir </td>
                                <td> <input type="date" name="tanggal_lahir" value="{{ $retrieveDesignerUser->first()->tanggal_lahir }}"> </td>
                            </tr>
                            <tr>
                                <td> Nomor Handphone </td>
                                <td> <input type="text" name="no_contact" value="{{ $retrieveDesignerUser->first()->no_contact }}"> </td>
                            </tr>
                            @endif
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

