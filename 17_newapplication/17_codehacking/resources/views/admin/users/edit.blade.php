@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>

    <div class="row">

        <div class="col-sm-3">
                <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            <!-- <form method="post" action="/admin/users"> -->
            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminUsersController@update', $user->id], 'files' => true]) !!}    <!-- Opening A Form -->
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
                    {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}   <!-- Generating A Submit Button, 'Create User - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
                </div>
            <!-- </form> -->
            {!! Form::close() !!}




            {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}    <!-- Opening A Form -->
                    <div class="form-group">
                        {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}   <!-- Generating A Submit Button, 'Delete User - name shown in the button, 'btn btn-danger' - value for 'class' attribute -->
                    </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>
@stop
