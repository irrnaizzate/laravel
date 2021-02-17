<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class UsersApiController extends Controller
{
   
    public function index()
    {
        return users::all();
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
    
        $success = users::create([
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> request('password'),
            'role'=> request('role')
        ]);

        return response()
                ->json([ 
                    'success' => $success,
                    'status'=>200,
                    'message'=>'User is successfully added'
                ]); 
    }

    public function update($users)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
    
        $success = $users->update([
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> request('password'),
            'role'=> request('role')
        ]);
    
        return response()
                ->json([ 
                    'success' => $success,
                    'status'=>200,
                    'message'=>'User is successfully updated'
                ]);
    }

    public function destroy($id)
    {
        $users = users::find($id);
        $success = $users->delete();

        return response()
                ->json([ 
                'success' => $success,
                'status'=>200,
                'message'=>'User is successfully deleted'
        ]);
    }
}
