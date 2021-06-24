@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

    <!-- <form method="post" action="/admin/users"> -->
    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminUsersController@store']) !!}    <!-- Opening A Form -->

        <div class="form-group">
            <!-- <input type="text" name="title" placeholder="Enter title"> -->
            {!! Form::label('name', 'Name:') !!}    <!-- Generating A Label Element, 'name' - value for 'for' attribute, Name - label name -->
            {!! Form::text('name', null, ['class'=>'form-control']) !!}    <!-- Generating A text Input, name - value for 'name' attribute, default value is null, 'form-control' - value for 'class' attribute -->
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', array(1 => 'Active', 0 => 'Not Active'), 0, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <!-- <input type="submit" name="submit"> -->
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}   <!-- Generating A Submit Button, 'Create User - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
        </div>

    <!-- </form> -->
    {!! Form::close() !!}
@stop
