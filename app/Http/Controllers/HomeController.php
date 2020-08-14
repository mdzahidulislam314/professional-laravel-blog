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

    	$data = [

			'categories' => Category::all(),
			'tags' => Tag::all(),
			'latestPost' => Post::latest()->approved()->published()->take(5)->get(),
			'posts' => Post::latest()->approved()->published()->paginate(6)
    	];

        return view('welcome',$data);
    }

}
