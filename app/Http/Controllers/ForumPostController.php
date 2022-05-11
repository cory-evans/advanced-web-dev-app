<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForumPostRequest;
use App\Http\Requests\UpdateForumPostRequest;
use App\Models\Forum\ForumPost;
use Auth;
use Illuminate\Http\Request;

class ForumPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageNumStr = $request->query('page', '1');
        try {
            $page = intval($pageNumStr);
        } catch (\Throwable $th) {
            $page = 1;
        }

        $amountPerPage = 25;
        $skip = ($amountPerPage * $page) - $amountPerPage;
        return view('forum.index', [
            'posts' => ForumPost::orderBy('created_at')->skip($skip)->take($amountPerPage)->get(),
            'page' => $page
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForumPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumPostRequest $request)
    {
        $post = new ForumPost();
        $post->title = $request->title;
        $post->body = $request->body;

        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect(route('forum.post.show', ['forumPost' => $post]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function show(ForumPost $forumPost)
    {
        return view('forum.post-show', ['post' => $forumPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumPost $forumPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForumPostRequest  $request
     * @param  \App\Models\Forum\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumPostRequest $request, ForumPost $forumPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumPost $forumPost)
    {
        //
    }
}
