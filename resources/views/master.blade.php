<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Firesell Task</title>

        <script src="https://ajax.googleapis.com/ajax/libs/query/3.2.1/jquery.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    </head>
    <body>

    @yield('menu')

        <div class="container">
            @yield('content')
        </div>
        
    </body>
</html>
<script>
    function logout()
    {
        $.ajax({
        url:"{{ url('api/logout')}}",
        type:"GET",
        success:function(results){

            console.log(results.message);
            window.location="login";

        }
    });
    }
</script>
