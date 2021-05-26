@extends('layouts.app')


@section('content')

    <h1>Edit Post</h1>

    <!-- <form method="post" action="/posts/{{$post->id}}"> -->
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\PostsController@update', $post->id]]) !!}    <!-- Opening A Model Form, '$post' - model value -->
    <!-- when you generate a form element, like a text input, the model's value matching the field's name will automatically
    be set as the field value. So, for example, for a text input named email, the user model's email attribute would be set as the value. -->


        <!-- <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}"> -->
        {!! Form::label('title', 'Title:') !!}    <!-- Generating A Label Element, title - value for 'for' attribute, Title - label name -->
        {!! Form::text('title', null, ['class'=>'form-control']) !!}    <!-- Generating A text Input, title - value for 'name' attribute, default value is null, 'form-control' - value for 'class' attribute -->


        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
        <!-- Or you can use @csrf -->
        <!-- Laravel automatically generates a CSRF token for each active user session managed by the application.
        This token is used to verify that the authenticated user is the person actually making the requests to the
        application. Since this token is stored in the user session and changes each time the session is regenerated,
        a malicious application is unable to access it. -->

        <!-- <input type="submit" name="UPDATE"> -->
        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}   <!-- Generating A Submit Button, 'Create Pos't - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->

    <!-- </form> -->
    {!! Form::close() !!}




    <!-- <form method="post" action="/posts/{{$post->id}}"> -->
    {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\PostsController@destroy', $post->id]]) !!}    <!-- Opening A Form -->

        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->

        <!-- <input type="submit" value="DELETE"> -->
        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}   <!-- Generating A Submit Button, 'Create Pos't - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->

    <!-- </form> -->
    {!! Form::close() !!}




@endsection


<!--
When submitting the data it will sent to posts/{$id} - check the php artisan route:list for update.
-->



<!-- https://laravelcollective.com/docs/6.x/html -->
