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
                <form method="POST">
                <div class="sub header">
                    <div class="horizontal panel" id="create">{{ HTML::linkRoute('warnaPakaian.create','CREATE') }}</div>
                    <div class="horizontal panel" id="delete"><input type="submit" value="DELETE"></div>
                    <div class="horizontal panel" id="display">{{ HTML::linkRoute('warnaPakaian.all','DISPLAY') }}></div>
                    <div class="horizontal panel" id="search">SEARCH</div>
                </div>
                <div class="content place">
                    <div class="content area">
                        <table>
                            <tr>
                                <td> No </td>
                                <td> Nama </td>
                                <td> Warna 1 </td>
                                <td> Warna 2 </td>
                                <td> Warna 3 </td>
                                <td> Status </td>
                                <td> Edit </td>
                                <td> Delete </td>
                            </tr>
                            @foreach($warnaPakaianAll as $warnaPakaian)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $warnaPakaian->nama }} </td>
                                <td> <div class="column box" style="background-color:{{ $warnaPakaian->warna_1 }};">{{ $warnaPakaian->warna_1 }}</div> </td>
                                <td>@if($warnaPakaian->warna_2 != '')<div class="column box" style="background-color:{{ $warnaPakaian->warna_2 }}">{{ $warnaPakaian->warna_2 }}</div> @endif</td>
                                <td>@if($warnaPakaian->warna_3 != '')<div class="column box" style="background-color:{{ $warnaPakaian->warna_3 }}"> {{ $warnaPakaian->warna_3 }}</div>@endif</td>
                                <td> {{ $warnaPakaian->aktif }} </td>
                                <td> {{ HTML::linkRoute('warnaPakaian.edit', 'EDIT',  $warnaPakaian->id) }} </td>
                                <td> <input type="checkbox" name="delete[]" value="{{ $warnaPakaian->id }}"> </td>
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
