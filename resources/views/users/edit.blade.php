@extends('master')

@section('menu')
@include('adminmenu')
@endsection

@section('content')

<div class="box">

<div class="row">
    <div class="col-md-12">

        <br />
        <h3 align="center">Edit User</h3>
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

        <form method="post" action="{{route('users.update',$id)}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">

            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{$users['name']}}">
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control"  value="{{$users['email']}}">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control"  value="{{$users['password']}}">
            </div>

            
            <div class="form-group">
                <select class="form-control" name="role">
                    <option value="">Select Role</option>
                    <option {{ ($users['role'] == 'admin') ? 'selected' : '' }} value="admin">Admin</option>
                    <option {{ ($users['role'] == 'user') ? 'selected' : '' }} value="user">User</option>
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