@extends('layouts.app')


@section('content')
    <ul>
        @foreach($posts as $post)       
            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
@endsection





{{-- 
$posts is sent through PostController - index function 
here route('posts.show', $post->id) in a-tag redirect to posts/{$id} when we click the $post->title
--}}
