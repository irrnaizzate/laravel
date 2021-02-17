<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <script src="https://ajax.googleapis.com/ajax/libs/query/3.2.1/jquery.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    </head>
    <body>

        <div class="container box">
            
            <br />
            <h3 align="center">Login</h3>
            <br />

            <div id="alert"></div>

            <form id="login_form" method="POST" action="javascript:void(0)">
                {{csrf_field()}}

                <label>Email</label>
                <div class="form-group">
                    <input type="email" name="email" class="form-control">
                </div>

                <label>Password</label>
                <div class="form-group">
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" id="btn_submit" name="login" class="btn btn-primary" value="Login">
                </div>

            </form>

        </div>

    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#btn_submit').click(function(e){
    e.preventDefault();
   
    var d = $('#login_form').serialize();
    console.log(d);

    /* Submit form data using ajax*/
    $.ajax({
        url: "{{ url('api/login')}}",
        type: 'POST',
        data: d,
        success: function(response)
        {

            console.log(response);
            if(response.status==200)
            {

                set_session(response.user_id,response.role);

                if(response.role=='admin')
                {
                    window.location='users';
                }
                if(response.role=='user')
                {
                    window.location='todo?user_id='+response.user_id;
                }
            }
            else
            {
                $("#alert").html('<div class="alert alert-danger"><strong>'+response.message+'</strong></div>');
                setTimeout(function(){ $("#alert").html(''); window.location='login'; }, 3000);
            }
            
        }
    });
      
   });
   
});

function set_session(id,role)
{
    $.ajax({
        url:"{{ url('api/sess')}}",
        type:"GET",
        data:{"user_id":id, "role":role},
        success:function(results){

            console.log(results.message);

        }
    });
}

</script>
