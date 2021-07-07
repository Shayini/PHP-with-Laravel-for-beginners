<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class AdminController extends Controller
{
    //
    public function index(){
        $postsCounts = Post::count();
        $categoriesCounts = Category::count();
        $commentsCounts = Comment::count();


        return view('admin.index', compact('postsCounts', 'categoriesCounts', 'commentsCounts'));
    }
}
