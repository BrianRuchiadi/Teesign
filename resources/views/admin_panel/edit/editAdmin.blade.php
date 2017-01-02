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
                                <td> <input type="text" name="name" required value="{{ $retrieve->name }}"> </td>
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td> <input type="email" name="email" required value="{{ $retrieve->email }}"> </td>
                            </tr>
                            <tr>
                                <td> Password </td>
                                <td> <input type="password" name="password" required value="{{ $retrieve->password }}"> </td>
                            </tr>

                            <tr>
                                <td> Alamat </td>
                                <td> <textarea name="alamat"> {{ $retrieve->alamat }} </textarea> </td>           
                            </tr>
                            <tr> 
                                <td> Provinsi </td>
                                <td> <select name="provinsi">
                                        <option value="Aceh" @if( $retrieve->provinsi == "Aceh") selected @endif> Aceh </option>
                                        <option value="Bali" @if( $retrieve->provinsi == "Bali") selected @endif> Bali </option>
                                        <option value="Banten" @if( $retrieve->provinsi == "Banten") selected @endif> Banten </option>
                                        <option value="Bengkulu" @if( $retrieve->provinsi == "Bengkulu") selected @endif> Bengkulu </option>
                                        <option value="Gorontalo" @if( $retrieve->provinsi == "Gorontalo") selected @endif> Gorontalo </option>
                                        <option value="Jakarta" @if( $retrieve->provinsi == "Jakarta") selected @endif> Jakarta </option>
                                        <option value="Jambi" @if( $retrieve->provinsi == "Jambi") selected @endif> Jambi </option>
                                        <option value="Jawa Barat" @if( $retrieve->provinsi == "Jawa Barat") selected @endif> Jawa Barat </option>
                                        <option value="Jawa Tengah" @if( $retrieve->provinsi == "Jawa Tengah") selected @endif> Jawa Tengah </option>
                                        <option value="Jawa Timur" @if( $retrieve->provinsi == "Jawa Timur") selected @endif> Jawa Timur </option>
                                        <option value="Kalimantan Barat" @if( $retrieve->provinsi == "Kalimantan Barat") selected @endif> Kalimantan Barat </option>
                                        <option value="Kalimantan Selatan" @if( $retrieve->provinsi == "Kalimantan Selatan") selected @endif> Kalimantan Selatan </option>
                                        <option value="Kalimantan Tengah" @if( $retrieve->provinsi == "Kalimantan Tengah") selected @endif> Kalimantan Tengah </option>
                                        <option value="Kalimantan Timur" @if( $retrieve->provinsi == "Kalimantan Timur") selected @endif> Kalimantan Timur </option>
                                        <option value="Kalimantan Utara" @if( $retrieve->provinsi == "Kalimantan Utara") selected @endif> Kalimantan Utara </option>
                                        <option value="Kepulauan Bangka Belitung" @if( $retrieve->provinsi == "Kepulauan Bangka Belitung") selected @endif> Kepulauan Bangka Belitung </option>
                                        <option value="Kepulauan Riau" @if( $retrieve->provinsi == "Kepulauan Riau") selected @endif> Kepulauan Riau </option>
                                        <option value="Lampung" @if( $retrieve->provinsi == "Lampung") selected @endif> Lampung </option>
                                        <option value="Maluku" @if( $retrieve->provinsi == "Maluku") selected @endif> Maluku </option>
                                        <option value="Maluku Utara" @if( $retrieve->provinsi == "Maluku Utara") selected @endif> Maluku Utara </option>
                                        <option value="Nusa Tenggara Barat" @if( $retrieve->provinsi == "Nusa Tenggara Barat") selected @endif> Nusa Tenggara Barat </option>
                                        <option value="Nusa Tenggara Timur" @if( $retrieve->provinsi == "Nusa Tenggara Timur") selected @endif> Nusa Tenggara Timur </option>
                                        <option value="Papua" @if( $retrieve->provinsi == "Papua") selected @endif> Papua </option>
                                        <option value="Papua Barat" @if( $retrieve->provinsi == "Papua Barat") selected @endif> Papua Barat </option>
                                        <option value="Riau" @if( $retrieve->provinsi == "Riau") selected @endif> Riau </option>
                                        <option value="Sulawesi Barat" @if( $retrieve->provinsi == "Sulawesi Barat") selected @endif> Sulawesi Barat </option>
                                        <option value="Sulawesi Selatan" @if( $retrieve->provinsi == "Sulawesi Selatan") selected @endif> Sulawesi Selatan </option>
                                        <option value="Sulawesi Tengah" @if( $retrieve->provinsi == "Sulawesi Tengah") selected @endif> Sulawesi Tengah </option>
                                        <option value="Sulawesi Tenggara" @if( $retrieve->provinsi == "Sulawesi Tenggara") selected @endif> Sulawesi Tenggara </option>
                                        <option value="Sulawesi Utara" @if( $retrieve->provinsi == "Sulawesi Utara") selected @endif> Sulawesi Utara </option>
                                        <option value="Sumatera Barat" @if( $retrieve->provinsi == "Sumatera Barat") selected @endif> Sumatera Barat </option>
                                        <option value="Sumatera Selatan" @if( $retrieve->provinsi == "Sumatera Selatan") selected @endif> Sumatera Selatan </option>
                                        <option value="Sumatera Utara" @if( $retrieve->provinsi == "Sumatera Utara") selected @endif> Sumatera Utara </option>
                                        <option value="Yogyakarta" @if( $retrieve->provinsi == "Yogyakarta") selected @endif> Yogyakarta </option>
                                    </select> </td>
                            </tr>
                            <tr>
                                <td> Status </td>
                                <td> <select name="aktif">
                                        <option value="0" @if( $retrieve->aktif == 1) selected @endif > Tidak Aktif </option>
                                        <option value="1" @if( $retrieve->aktif == 1) selected @endif > Aktif </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Otoritas </td>
                                <td> <select name="otoritas_admins">
                                        @foreach( $retrieveOtoritasAdmin as $otoritasAdmin )
                                        <option value="{{ $otoritasAdmin->id }}"> {{ $otoritasAdmin->nama }} </option>
                                        @endforeach
                                    </select> </td>
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

