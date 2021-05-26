@extends('layouts.app')


@section('content')
    <ul>
        @foreach($posts as $post)
            <div class="image-container">
              <!-- <img src="/images/{{$post->path}}" height="100" alt=""> -->
              <img src="{{$post->path}}" height="100" alt="">   <!-- use this if you have a 'getPathAttribute' accessor, no need ot call 'getPathAttribute' function in Post.php, it automatically add the prefix path to the image name when calling the data from database -->
            </div>
            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
@endsection





<!--
$posts is sent through PostController - index function
here route('posts.show', $post->id) in a-tag redirect to posts/{$id} when we click the $post->title
-->



<!-- https://laravelcollective.com/docs/6.x/html -->
