@extends('master')

@section('menu')
@include('adminmenu')
@endsection

@section('content')

<div class="box">

<div class="row">
    <div class="col-md-12">

        <br />
        <h3 align="center">User Data</h3>
        <br />
        session id is {{Session::get('user_id')}}
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <div align="right">
            <a href="{{route('users.create')}}" class="btn btn-primary">Add</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            @foreach($users as $s)
            <tr>
                <td>{{$s['name']}}</td>
                <td>{{$s['email']}}</td>
                <td>{{$s['role']}}</td>
                <td><a href="{{route('users.edit',$s['id'])}}" class="btn btn-success">Edit</a></td>
                <td>
                    <form method="post" class="delete_form" action="{{route('users.destroy',$s['id'])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

    </div>
</div>

</div>

<script>
$(document).ready(function(){
    $('.delete_form').on('submit',function(){
        if(confirm('Are you sure want to delete it??'))
        {
            return true;
        }
        else
        {
            return false;
        }
    });
});
</script>

@endsection