<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForumPostCommentRequest;
use App\Models\Forum\ForumPost;
use App\Models\Forum\ForumPostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumPostCommentController extends Controller
{
    public function store(ForumPost $forumPost, StoreForumPostCommentRequest $request) {
        $comment = new ForumPostComment;
        $comment->forum_post_id = $forumPost->id;
        $comment->user_id = Auth::user()->id;
        $comment->body = $request->body;

        $comment->save();

        return redirect(route('forum.post.show', ['forumPost' => $forumPost->id]));
    }
}
