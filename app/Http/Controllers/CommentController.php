<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Successfully Done!');
    }
}
