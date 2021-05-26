<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       // $posts = Post::all();                         // get all data sent to /posts
       // $posts = Post::latest()->get();                  // get latest data on top sent to /posts
       // $posts = Post::orderBy('id', 'desc')->get();     // get data in descending order
       // $posts = Post::orderBy('id', 'asc')->get();     // get data in ascending order
       $posts = Post::olderFirst();                  // call the 'scopeOlderFirst' function in Post.php
       return view('posts.index', compact('posts'));    // posts.index - file in resources/views/posts/index.blade.php
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
    public function store(CreatePostRequest $request)   // use App\Http\Requests\CreatePostRequest;
    {
        $input = $request->all();

        if($file = $request->file('file')){       // check whether a file is uploaded
          $name = $file->getClientOriginalName();

          // move the file to the 'images' location, it will create the 'images' folder if it does not exist
          $file->move('images', $name);

          $input['path'] = $name;   // 'path' - column name in posts table, creating a path element in $input
        }

        /* here we have created a new column 'path',
        laravel will not allow us to edit that column unless we give it permission,
        so add 'path' in the $fillable in Post.php */
        Post::create($input);




        // access the file input
        // $file =  $request->file('file');    // 'file' - value for the name attribute of Form::file() in create.blade.php
        // echo $file->getClientOriginalName();    // get the original name of the file
        // echo '<br>';
        // echo $file->getSize();    // get the size of the file



        // return $request->all();     //returns all submitted data in form
        // return $request->get('title');     //returns the 'title' input in form
        // return $request->title;     //returns the 'title' input in form


        // validation - use this if you use Request insted of CreatePostRequest in 'public function store(CreatePostRequest $request)'
        // $this->validate($request, [
        //   'title' => 'required',
        //   // 'content'=>'required'
        // ]);



        // add to database method 1
        // Post::create($request->all());

        // // add to database method 2
        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($request->all());

        // // add to database method 3
        // $post = new Post;
        // $post->title = $request->title;
        // $post->save()

        // get what is in the index function. chech the route list by 'php artisan route:list', to get data URI=/post, Name=posts.index
        // return redirect('/posts');

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
