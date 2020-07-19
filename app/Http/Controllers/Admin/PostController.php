<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'editor1' => 'required',
        ]);

        $image = $request->File('image');
        $slug = Str::slug($request->title);
        $imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $directory = './post-image/';
        $image->move($directory, $imageName);
        $imageUrl = $directory . $imageName;

        $post = new Post;
        $post->title = $request->title;
        $post->image = $imageUrl;
        $post->editor1 = $request->editor1;
        $post->user_id = Auth::user()->id;
        $post->slug = $slug;
        $post->is_approved = true;
        if (isset($request->status)) {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->save();
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
        Alert::success('Successfully Done :)', '');
        return redirect()->route('admin.post.index');
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
        return view('admin.post.view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admin.post.edit',compact('post','tags','categories'));
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
        $this->validate($request, [
            'title' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'editor1' => 'required',
        ]);

        $image = $request->File('image');
        $slug = Str::slug($request->title);
        $post = Post::find($id);
        if ($image) {

            unlink($post->image);
            $imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $directory = './post-image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
        }else{
            $imageUrl = $post->image;
        }

        $post->title = $request->title;
        $post->image = $imageUrl;
        $post->editor1 = $request->editor1;
        $post->slug = $slug;
        $post->is_approved = true;
        if ($post->user_id === Auth::id()) {
            $post->user_id = Auth::id();
        }else {
        }
        if (isset($request->status)) {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        Alert::success('Successfully Done :)', '');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        unlink($post->image);
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        return redirect()->back();
    }

    public function pending()
    {
        $posts = Post::where('is_approved',false)->get();
        return view('admin.post.pending',compact('posts'));
    }

    public function approval($id)
    {
        $post = Post::find($id);
        if ($post->is_approved == false)
        {
            $post->is_approved = true;
            $post->save();
            Alert::success('Successfully Done :)', '');
        } else
        {
            Alert::info('This Post Already Approved.', '');
        }
        return redirect()->back();
    }
}
