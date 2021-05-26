@extends('layouts.app')


@section('content')

    <h1>Create Post</h1>

    <!-- <form method="post" action="/posts"> -->
    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostsController@store', 'files' => true]) !!}    <!-- Opening A Form, "'files' => true" - accept files as input -->

        <div class="form-group">
            <!-- <input type="text" name="title" placeholder="Enter title"> -->
            {!! Form::label('title', 'Title:') !!}    <!-- Generating A Label Element, 'title' - value for 'for' attribute, Title - label name -->
            {!! Form::text('title', null, ['class'=>'form-control']) !!}    <!-- Generating A text Input, title - value for 'name' attribute, default value is null, 'form-control' - value for 'class' attribute -->
        </div>


        <div class="form-group">
            <!-- <input type="text" name="title" placeholder="Enter title"> -->
            {!! Form::file('file', ['class'=>'form-control']) !!}    <!-- Generating A file Input, 'file' - value for 'name' attribute, 'form-control' - value for 'class' attribute -->
        </div>





        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
        <!-- Or you can use @csrf -->
        <!-- Laravel automatically generates a CSRF token for each active user session managed by the application.
        This token is used to verify that the authenticated user is the person actually making the requests to the
        application. Since this token is stored in the user session and changes each time the session is regenerated,
        a malicious application is unable to access it. -->

        <div class="form-group">
            <!-- <input type="submit" name="submit"> -->
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}   <!-- Generating A Submit Button, 'Create Pos't - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
        </div>

    <!-- </form> -->
    {!! Form::close() !!}




<!--
display errors
add following in the web.php
Route::group(['middleware'=>'web'], function(){   // web - available to everyone
  Route::resource('/posts', PostsController::class);
  // run 'php artisan route:list'
});
-->
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif




@endsection



<!-- https://laravelcollective.com/docs/6.x/html -->
