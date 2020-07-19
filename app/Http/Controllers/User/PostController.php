<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
        $posts = Auth::User()->posts()->latest()->get();
        return view('user.posts.index',compact('posts'));
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
        return view('user.posts.create',compact('tags','categories'));
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
        $post->is_approved = false;
        if (isset($request->status)) {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->save();
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
        Alert::success('Successfully Done :)', '');
        return redirect()->route('user.posts.index');
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
        //check for authorize access
        if ($post->user_id != Auth::id())
        {
            Alert::error('Error', 'Access Protected!');
            return redirect()->back();
        }
        return view('user.posts.view',compact('post'));
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
        //check for authorize access
        if ($post->user_id != Auth::id())
        {
            Alert::Error('Error','Access Protected!');
            return redirect()->back();
        }
        $tags = Tag::all();
        $categories = Category::all();

        return view('user.posts.edit',compact('post','tags','categories'));
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
        $post->user_id = Auth::user()->id;
        $post->slug = $slug;
        $post->is_approved = false;
        if (isset($request->status)) {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        Alert::success('Successfully Done :)', '');
        return redirect()->route('user.posts.index');
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
        //check for authorize access
        if ($post->user_id != Auth::id())
        {
            Alert::error('Error', 'Access Protected!');
            return redirect()->back();
        }
        unlink($post->image);
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        return redirect()->back();
    }
}
