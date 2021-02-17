<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\users;

class UserLoginApiController extends Controller
{

    public function login()
    {
        //$request = request();
        //$token = $request->bearerToken();

        $token = $_POST['_token'];

        $email = $_POST['email'];
        $password = $_POST['password'];

        $list = users::where('email','=',$email)
                ->where('password','=',$password)
                ->first();

        if(isset($list->id))
        {
            return response()
                    ->json([
                        'user_id'=>$list->id,
                        'role'=>$list->role,
                        'token'=>$token,
                        'status'=>200,
                        'message'=>'Access Granted'
                    ]);
        }
        else
        {
            return response()
                    ->json([
                        'status'=>401,
                        'message'=>'Access Denied'
                    ]);
        }

    }

    public function set_sess(Request $request)
    {
        $id = $_GET['user_id'];
        $role = $_GET['role'];

        $i = $request->session()->put('user_id', $id);
        $rl = $request->session()->put('role', $role);

        $r = response()
                    ->json([
                        'message'=>"Successfully set session"
                    ]);

        $query = http_build_query([
            'client_id' => 'client-id',
            'redirect_uri' => 'http://127.0.0.1:8000/login',
            'response_type' => $r,
            'scope' => '',
            'user_id' => $i,
            'role' => $rl
        ]);
    
        return redirect('http://passport-app.com/oauth/authorize?'.$query);
    }


}