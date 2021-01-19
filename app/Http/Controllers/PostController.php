<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Topic;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $topics = Topic::get();

        return view('posts.index', compact('posts', 'topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::get();

        // dd($topics);

        return view('posts.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create(request()->validate([
            'name' => ['required', 'min:4'],
            'email' =>  ['required', 'min:4'],
            'password' => ['required', 'min:4'],
        ]));

        return redirect()->route('groceries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $replies = Reply::where('post_id', $id)->orderBy('created_at', 'ASC')->get();

        // dd($replies);

        return view('posts.show', compact('post', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $topics = Topic::get();

        return view('posts.edit', compact('post', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request);
        $post->update(request()->validate([
            'topic_id' => ['required', 'numeric', 'min:0'],
            'title' => ['required', 'min:2'],
            'active' => ['required', 'boolean'],
            'content' => ['required', 'min:2']
        ]));

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        Reply::where('post_id', $id)->destroy();

        return redirect('/');
    }

    public function topic(Topic $topic)
    {
        // dd($topic);

        // $posts = Post::where($topic)->get();


        return view('posts.index');
    }
}
