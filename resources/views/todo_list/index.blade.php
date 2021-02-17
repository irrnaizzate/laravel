@extends('master')

@if(isset($_GET['user_id']))

@section('menu')
@include('usermenu')
@endsection

@endif

@if(!isset($_GET['user_id']))

@section('menu')
@include('adminmenu')
@endsection

@endif

@section('content')

<div class="box">

<div class="row">
    <div class="col-md-12">

        <br />
        <h3 align="center">Todo List</h3>
        <br />

        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <div align="right">
            <a href="{{route('todo.create')}}" class="btn btn-primary">Add</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>List</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php $stts=array('0'=>'Todo','1'=>'Complete'); ?>
            @foreach($todo as $s)
            <tr>
                <td>{{$s['user_id']}}</td>
                <td>{{$s['body']}}</td>
                <td>{{$stts[$s['is_complete']]}}</td>
                <td><a href="{{route('todo.edit',$s['id'])}}" class="btn btn-success">Edit</a></td>
                <td>
                    <form method="post" class="delete_form" action="{{route('todo.destroy',$s['id'])}}">
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