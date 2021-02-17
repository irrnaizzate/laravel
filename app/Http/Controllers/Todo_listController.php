<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo_lists;

class Todo_listController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=isset($_GET['user_id']) ? $_GET['user_id'] : 0;

        if($id!=0)
        {
            $todo = todo_lists::where('user_id','=',$id)->get()->toArray();
        }
        else
        {
            $todo = todo_lists::all()->toArray();
        }
        
        return view('todo_list.index', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo_list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'body' => 'required',
            'is_complete' => 'required',
        ]);

        //insert data into table
        $todo = new todo_lists([
            'body'  =>  $request->get('body'),
            'is_complete'  =>  $request->get('is_complete'),
            'user_id'  =>  $request->get('user_id'),
        ]);
        $todo->save();

        //redirect with message
        return redirect()->route('todo.index')->with('success','Todo list is successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = todo_lists::find($id)->toArray();
        return view('todo_list.edit', compact('todo', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request,[
            'body' => 'required',
            'is_complete' => 'required',
        ]);

        $todo = todo_lists::find($id);

        //update data into table
        $todo->body = $request->get('body');
        $todo->is_complete = $request->get('is_complete');
        $todo->user_id = $request->get('user_id');
        $todo->save();

        //redirect with message
        return redirect()->route('todo.index')->with('success','Todo list is successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = todo_lists::find($id);

        //delete data from table
        $todo->delete();

        //redirect with message
        return redirect()->route('todo.index')->with('success','Successfully deleted!');

    }
}
