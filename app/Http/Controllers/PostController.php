<?php

namespace App\Http\Controllers;

use App\Mail\WeeklyUpdate;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\File;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user());

        if (Auth::user() != null) {
            $imgs = File::all();
            // dd($imgs);
            $posts = Post::orderBy('created_at', 'DESC')->get();
            $topics = Topic::get();

            return view('posts.index', compact('posts', 'imgs', 'topics'));
        } else {
            $imgs = File::all();
            $posts = Post::where('premium_content', '=', 0)->orderBy('created_at', 'DESC')->get();

            return view('posts.index', compact('posts', 'imgs'));
        }
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
        // dd($request);
        $validated = request()->validate([
            'topic_id' => ['required'],
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:10'],
            'premium_content' => ['required' => false]
        ]);

        $validated['user_id'] = Auth::user()->id;

        // dd($validated);
        Post::create($validated);

        return redirect()->route('posts.index');
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
        dd($post->id);
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
        // dd($id);
        Reply::where('post_id', $id)->delete();
        Post::destroy($id);

        return redirect()->route('posts.index');
    }

    /**
     * Show the posts by topic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function topic(Request $request)
    {

        $topic_id = $request->topic_id;
        $posts = Post::where('topic_id', $topic_id)->get();
        $topic = Topic::where('id', $topic_id)->first('topic');

        $imgs = File::all();
        // dd($topic);

        return view('posts.topic', compact('posts', 'imgs'), ["topic" => $topic]);
    }

    /**
     * Send last week messages to user email.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function emailUpdate(Request $request)
    {
        $myEmail = 'aatmaninfotech@gmail.com';

        $lastWeekPosts = Post::whereBetween('created_at', [
            Carbon::parse('last monday')->startOfDay(),
            Carbon::parse('next friday')->endOfDay(),
        ])->get();

        // dd($lastWeekPosts);

        $details = [
            'title' => 'Last Week Posts',
            'lastWeekPosts' => $lastWeekPosts
        ];

        Mail::to($myEmail)->send(new WeeklyUpdate($details));

        // dd("Mail Send Successfully");
        return redirect('post.index');
    }
}
