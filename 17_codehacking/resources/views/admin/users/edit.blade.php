@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>

    <!-- <form method="post" action="/admin/users"> -->
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminUsersController@update', $user->id], 'files' => true]) !!}    <!-- Opening A Form -->

        <div class="col-sm-3">
                <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
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
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <!-- <input type="submit" name="submit"> -->
                {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}   <!-- Generating A Submit Button, 'Create User - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
            </div>
        </div>

    <!-- </form> -->
    {!! Form::close() !!}

    @include('includes.form_error')
@stop
