<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::latest()->paginate(3);
        return view('welcome',compact('categories','tags','posts'));
    }


}
