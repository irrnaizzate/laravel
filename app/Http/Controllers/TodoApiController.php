<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo_lists;

class TodoApiController extends Controller
{
    
    public function index()
    {
        return response()
                ->json([
                    'todo'=>todo_lists::where('user_id','=',$_GET['user_id'])->get(),
                    'status'=>200,
                    'message'=>'Todo list is succesfully retrieved'
                ]);
    }

    
    public function store()
    {
        request()->validate([
            'body' => 'required',
            'is_complete' => 'required',
            'user_id' => 'required'
        ]);

        $success = todo_lists::create([
            'body'=> request('body'),
            'is_complete'=> request('is_complete'),
            'user_id'=> request('user_id')]);

    
        return response()
                ->json([ 
                    'success' => $success,
                    'status'=>200,
                    'message'=>'Todo list is successfully added'
                ]);     
    }


    public function update($todo)
    {
        request()->validate([
            'body' => 'required',
            'is_complete' => 'required',
            'user_id' => 'required'
        ]);
    
        $success = $todo->update([
            'body'=> request('body'),
            'is_complete'=> request('is_complete'),
            'user_id'=> request('user_id')
        ]);
    
        return response()
                ->json([ 
                    'success' => $success,
                    'status'=>200,
                    'message'=>'Todo list is successfully updated'
                ]);
    }


    public function destroy($id)
    {
        $todo = todo_lists::find($id);
        $success = $todo->delete();

        return response()
                ->json([ 
                'success' => $success,
                'status'=>200,
                'message'=>'Todo list is successfully deleted'
        ]);
    }
}
