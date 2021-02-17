@extends('master')

@section('menu')
@include('usermenu')
@endsection

@section('content')

<div class="box">

<div class="row">
    <div class="col-md-12">

        <br />
        <h3 align="center">Edit ToDo List</h3>
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

        <form method="post" action="{{route('todo.update',$id)}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">

        <div class="form-group">
                <textarea name="body" class="form-control">{{$todo['body']}}</textarea>
            </div>

            <div class="form-group">
                <select class="form-control" name="is_complete">
                    <option value="">Select Status</option>
                    <option {{ ($todo['is_complete'] == '0') ? 'selected' : '' }} value="0">ToDo</option>
                    <option {{ ($todo['is_complete'] == '1') ? 'selected' : '' }} value="1">Complete</option>
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{$todo['user_id']}}">

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

        </form>

    </div>
</div>

</div>

@endsection