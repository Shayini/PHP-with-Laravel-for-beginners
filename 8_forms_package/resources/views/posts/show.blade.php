@extends('layouts.app')


@section('content')
    <h1><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></h1>
@endsection

<!-- $posts is sent through PostController - show function -->



<!-- https://laravelcollective.com/docs/6.x/html -->
