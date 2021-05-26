@extends('layouts.app')


@section('content')

    <h1>Create Post</h1>

    <form method="post" action="/posts">
        <input type="text" name="title" placeholder="Enter title">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        {{-- Or you can use @csrf --}}
        {{-- Laravel automatically generates a CSRF token for each active user session managed by the application.
        This token is used to verify that the authenticated user is the person actually making the requests to the 
        application. Since this token is stored in the user session and changes each time the session is regenerated, 
        a malicious application is unable to access it. --}}

        <input type="submit" name="submit">
    </form>
@endsection