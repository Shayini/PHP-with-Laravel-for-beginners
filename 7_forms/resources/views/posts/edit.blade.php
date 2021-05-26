@extends('layouts.app')


@section('content')

    <h1>Edit Post</h1>

    <form method="post" action="/posts/{{$post->id}}">
    
    {{-- to update data the form method must be 'PUT'. but normally form methods are POST & GET.
    to solve this problem we use this bellow input. --}}
        <input type="hidden" name="_method" value="PUT">

        
        
        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        {{-- Or you can use @csrf --}}
        {{-- Laravel automatically generates a CSRF token for each active user session managed by the application.
        This token is used to verify that the authenticated user is the person actually making the requests to the 
        application. Since this token is stored in the user session and changes each time the session is regenerated, 
        a malicious application is unable to access it. --}}

        <input type="submit" name="UPDATE">
    </form>




    <form method="post" action="/posts/{{$post->id}}">
        <input type="hidden" name="_method" value="DELETE">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <input type="submit" value="DELETE">
    </form>




@endsection


{{-- 
Here value="{{$post->title}}" gets the value received from PostController-edit function and display it.
When submitting the data it will sent to posts/{$id} - check the php artisan route:list for update.
--}}