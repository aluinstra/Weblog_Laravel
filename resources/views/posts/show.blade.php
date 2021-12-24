<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>

<body>

    <h1>Posts: Show Post</h1>

    <ul>
        <li><a href={{route("posts.index")}}>Posts</a></li>
    </ul>


    <div id='titlebar'> ID {{ $post->id }}
        <div id='user'> {{ $post->user->name }} </div>
        <div id='title'> {{ $post->title }} </div>
        <div id='creation_date'> {{ $post->created_at}}</div>
        <div id='active'> {{ $post->active}}</div>
    </div>

    <div id='content'> {{$post->content}}</div>

    <div id=buttonWrapper>
        <div style="display:inline-block;">
            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method='POST'>
                @csrf
                @method ('DELETE')
                <button class="btn" type='submit' data-toggle="buttons">Delete &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </form>
        </div>

        <div style="display:inline-block;">
            <form action="{{ route('posts.edit', ['post' => $post->id]) }}" method='GET'>
                @csrf
                <button class="btn" id="add_ingredient" type='submit' data-toggle="buttons">Change &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
    <hr>


    @foreach ($replies as $key => $reply)
    <div id='titlebar'>
        <div id='user'> {{ $reply->user->name }} </div>
        <div id='title'><a href={{$url=route("replies.show", $reply->id)}}> {{ $reply->post->title }} </a></div>
        <div id='creation_date'> {{ $reply->created_at}}</div>

    </div>
    <div id='content'> {{$reply->content}}</div>
    <hr>
    @endforeach

    <form action="{{ route('post.reply', ['post' => $post->id]) }}" method='GET'>
        Reply
        <button class="btn" type='submit' data-toggle="buttons">Reply &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
    </form>

</body>

</html>