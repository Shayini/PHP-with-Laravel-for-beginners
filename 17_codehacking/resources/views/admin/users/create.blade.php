@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

    <!-- <form method="post" action="/posts"> -->
    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminUsersController@store']) !!}    <!-- Opening A Form -->

        <div class="form-group">
            <!-- <input type="text" name="title" placeholder="Enter title"> -->
            {!! Form::label('title', 'Title:') !!}    <!-- Generating A Label Element, 'title' - value for 'for' attribute, Title - label name -->
            {!! Form::text('title', null, ['class'=>'form-control']) !!}    <!-- Generating A text Input, title - value for 'name' attribute, default value is null, 'form-control' - value for 'class' attribute -->
        </div>

        <div class="form-group">
            <!-- <input type="submit" name="submit"> -->
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}   <!-- Generating A Submit Button, 'Create Pos't - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
        </div>

    <!-- </form> -->
    {!! Form::close() !!}
@stop
