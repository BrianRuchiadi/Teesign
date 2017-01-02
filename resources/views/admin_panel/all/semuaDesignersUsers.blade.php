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
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('users.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete"><input type="submit" value="DELETE"></div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('users.all','DISPLAY') }}></div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                         <table>
                            <tr>
                                <td> No </td>
                                <td> Nama  </td>
                                <td> Email </td>
                                <td> Alamat </td>
                                <td> Provinsi </td>
                                
                                <td> Jenis Kelamin </td>
                                <td> Tanggal Lahir </td>
                                <td> Poin </td>
                                <td> Nilai Popularitas </td>
                                <td> Rating </td>
                                <td> No contact </td>
                                <td> Status </td>
                                <td> Edit </td>
                                <td> Delete </td>
                            </tr>
                            @foreach($designersUsersAll as $designersUsers)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $designersUsers->users()->first()->name }} </td>
                                <td> {{ $designersUsers->users()->first()->email }} </td>
                                <td> {{ $designersUsers->users()->first()->alamat }} </td>
                                <td> {{ $designersUsers->users()->first()->provinsi }} </td>
                                <td> @if( $designersUsers->laki_laki == 1 ) 
                                        Laki Laki
                                     @else 
                                        Perempuan
                                     @endif </td>
                                <td> {{ date('jS F Y', strtotime($designersUsers->tanggal_lahir)) }} </td>
                                <td> {{ $designersUsers->poin }} </td>
                                <td> {{ $designersUsers->nilai_popularitas }} </td>
                                <td> {{ $designersUsers->rating }} </td>
                                <td> {{ $designersUsers->no_contact }} </td> 
                                <td> {{ $designersUsers->users()->first()->aktif }} </td>
                                <td> {{ HTML::linkRoute('users.edit', 'EDIT',  $designersUsers->users) }} </td>
                                <td> <input type="checkbox" name="delete[]" value="{{ $designersUsers->users }}"> </td>
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
