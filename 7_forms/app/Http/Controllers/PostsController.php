<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
        $posts = Post::all();           // get all data sent to /posts
        return view('posts.index', compact('posts'));   // posts.index - file in resources/views/posts/index.blade.php
        // compact('posts') - attach the data in $posts to the view. so we can access this data inside resources/views/posts/index.blade.php
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');    // posts.create - file in resources/views/posts/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();     //returns all submitted data in form
        // return $request->get('title');     //returns the 'title' input in form
        // return $request->title;     //returns the 'title' input in form

        // add to database method 1
        Post::create($request->all());

        // // add to database method 2
        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($request->all());

        // // add to database method 3
        // $post = new Post;
        // $post->title = $request->title;
        // $post->save()

        // get what is in the index function. chech the route list by 'php artisan route:list', to get data URI=/post, Name=posts.index
        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));   // posts.show - file in resources/views/posts/show.blade.php
        // compact('post') - attach the data in $post to the view. so we can access this data inside resources/views/posts/show.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));   // posts.edit - file in resources/views/posts/edit.blade.php
        // compact('post') - attach the data in $post to the view. so we can access this data inside resources/views/posts/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        // get what is in the index function. chech the route list by 'php artisan route:list', to get data URI=/post, Name=posts.index
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = Post::findOrFail($id);
        // $post->delete();
        // or
        $post = Post::whereId($id)->delete();

        return redirect('/posts');
    }


    // public function contact()
    // {
    //     $people = ['Thaksha', 'Shayini', 'Kapil'];
    //     return view('contact', compact('people'));
    // }
    //
    // public function show_post($id, $name, $pass)
    // {
    //     // return view('post')->with('id', $id);
    //     return view('post', compact('id', 'name', 'pass'));
    // }
}
