<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request, $bookId)
    {
        $comment            = new Comment();
        $comment->book_id   = $bookId;
        $comment->user_id   = $request->user_id;
        $comment->content   = $request->content;
        $comment->save();
    }

    public function addSubComment(Request $request, $bookId, $parentId)
    {
        $comment = new Comment();
        $comment->book_id   = $bookId;
        $comment->user_id   = $request->user_id;
        $comment->parent_id   = $parentId;
        $comment->content   = $request->content;
        $comment->save();
    }
}
