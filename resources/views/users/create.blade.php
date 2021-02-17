@extends('master')

@section('menu')
@include('adminmenu')
@endsection

@section('content')

<div class="box">

<div class="row">
    <div class="col-md-12">

        <br />
        <h3 align="center">Add User</h3>
        <br />

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{url('users')}}">
            {{csrf_field()}}

            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>

            <div class="form-group">
                <select class="form-control" name="role">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

        </form>

    </div>
</div>

</div>

@endsection