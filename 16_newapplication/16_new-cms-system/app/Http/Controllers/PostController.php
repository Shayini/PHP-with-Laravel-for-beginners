<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index(){

        // $posts = auth()->user()->posts;         // get only the posts related to the signed in user
        // $posts = Post::all();
        $posts = auth()->user()->posts()->paginate(5);         // get only the posts related to the signed in user, include pagination

        return view('admin.posts.index', ['posts'=>$posts]);
    }


    public function show(Post $post){

        return view('blog-post', ['post'=>$post]);
    }


    public function create(){

        $this->authorize('create', Post::class);      // restrict to create other users post, check create function in PostPolicy.php

        return view('admin.posts.create');
    }


    public function store(){

        $this->authorize('create', Post::class);      // restrict to create other users post, check create function in PostPolicy.php


        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');     // store it in the public/images folder
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post with title was created ' . $inputs['title']);

        // return back();  // return to the same page
        return redirect()->route('post.index');     // redirect to another page
    }


    public function edit(Post $post){

        $this->authorize('view', $post);        // restrict to edit other users post, check view function in PostPolicy.php

        return view('admin.posts.edit', ['post' => $post]);
    }


    public function update(Post $post){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');     // store it in the public/images folder
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];


        $this->authorize('update', $post);      // restrict to update other users post, check update function in PostPolicy.php
        // if(auth()->user()->can('view', $post)){}      // restrict to update other users post, check update function in PostPolicy.php

        // auth()->user()->posts()->save($post);   // update the post with the owner name
        $post->save();                   // update only the post, not the owner name
        // $post->update();                    // update only the post, not the owner name

        session()->flash('post-updated-message', 'Post with title was updated ' . $inputs['title']);

        // return back();
        return redirect()->route('post.index');
    }


    public function destroy(Post $post, Request $request){
        $this->authorize('delete', $post);      // restrict to delete other users post, check delete function in PostPolicy.php

        $post->delete();

        // Session::flash('message', 'Post was deleted');
        // OR
        $request->session()->flash('message', 'Post was deleted');

        return back();
    }
}
