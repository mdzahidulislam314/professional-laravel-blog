<?php

namespace App\Http\Controllers\User;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts;
        // $comments =  Auth::user()->comments;
        return view('user.comment',compact('posts','comments'));
    }

    public function destroy($id)
    {
        $comment=Comment::findOrFail($id)->delete();
        if ($comment->post->user->id == Auth::id())
        {
            $comment->delete();
            return redirect()->back()->with('success','Comment Successfully Deleted!');

        } else {
        
            return redirect()->back()->with('error','You are not authorized to delete this comment!');
        }
        
        return redirect()->back();
    
    }
}
