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
            <div class="login box">
                <form method="post">
                <table class="login">
                    <tr>
                        <td> Email </td>
                        <td> <input type="email" name="email" required> </td>        
                    </tr>
                    <tr>
                        <td> Password </td>
                        <td> <input type="password" name="password" required> </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Log In"></td>
                    </tr>
                    
                    {{ csrf_field() }}
                </table>
                </form>
            </div>
        </div>
    </body>
</html>