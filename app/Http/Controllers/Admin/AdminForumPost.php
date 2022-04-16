<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreForumPostRequest;
use App\Http\Requests\UpdateForumPostRequest;
use App\Models\Forum\ForumPost;

class AdminForumPost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.forum');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForumPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function show(ForumPost $forumPost)
    {
        //
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
