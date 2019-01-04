@extends('layouts.admin');

@section('content')

    <h1>Edit User:</h1>
<div class="row">
    <div class="col-sm-3">

        <img style="width:400px;height: 400px;" src="{{$user->photo ? URL::asset($user->photo->file):'https://via.placeholder.com/200x100'}}" alt="User Photo" class="img-thumbnail img-responsive ">
    </div>

    <div class="col-sm-9">

    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id',[''=>'Choose Options']+$roles,null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Photo:') !!}
        {!! Form::file('photo_id',['class'=>'form-control ']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete User',['class'=>'btn btn-danger  ']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>
    @include('includes.form_error')


@endsection