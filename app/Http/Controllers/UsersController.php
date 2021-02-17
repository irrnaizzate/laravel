<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = users::all()->toArray();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role'  => 'required'
        ]);

        //insert data into table
        $users = new users([
            'name'  =>  $request->get('name'),
            'email'  =>  $request->get('email'),
            'password'  =>  $request->get('password'),
            'role'  =>  $request->get('role'),
        ]);
        $users->save();

        //redirect with message
        return redirect()->route('users.index')->with('success','User is successfully added!');
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
        $users = users::find($id)->toArray();
        return view('users.edit', compact('users', 'id'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role'  => 'required'
        ]);

        $users = users::find($id);

        //update data into table
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = $request->get('password');
        $users->role = $request->get('role');
        $users->save();

        //redirect with message
        return redirect()->route('users.index')->with('success','User is successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = users::find($id);

        //delete data from table
        $users->delete();

        //redirect with message
        return redirect()->route('users.index')->with('success','Successfully deleted!');

    }
}
