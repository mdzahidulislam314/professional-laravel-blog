<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function details($slug)
    {
        $post = Post::where('slug', $slug)->first();
        
        //view count by session
        $blogKey = 'blog_' . $post->id;
        if (!Session::has($blogKey))
        {
            $post->increment('view_count');
            Session::put($blogKey, 1);
        }

    	$latestPost = Post::latest()->approved()->published()->take(5)->get();
    	
    	return view('post-details',compact('post','latestPost'));
    }


    public function postByCategory($slug)
    {
		 $cat = Category::all();
         $categories = Category::where('slug',$slug)->first();
         $posts = $categories->posts()->approved()->published()->get();
         return view('category-post',compact('categories','posts','cat'));
    }

    public function postByTag($slug)
    {
    	 $cat = Tag::all();
         $tags = Tag::where('slug',$slug)->first();
         $posts = $tags->posts()->approved()->published()->get();
         return view('tag-posts',compact('tags','posts','cat'));
    }
}
