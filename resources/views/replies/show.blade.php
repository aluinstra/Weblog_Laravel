<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>

<body>

    <h1>Replies: Show Reply</h1>

    <ul>
        <li><a href={{route("posts.show", $reply->post->id)}}>Go back</a></li>
    </ul>

    <div id='titlebar'>
        <div id='user'> {{ $reply->user->name }} </div>
        <div id='title'> {{ $reply->post->title }} </div>
        <div id='creation_date'> {{ $reply->created_at}}</div>

    </div>
    <div id='content'> {{$reply->content}}</div>

    <div id=buttonWrapper>
        <div style="display:inline-block;">
            <form action="{{ route('replies.destroy', ['reply' => $reply->id]) }}" method='POST'>
                @csrf
                @method ('DELETE')
                <button class="btn" type='submit' data-toggle="buttons">Delete &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </form>
        </div>

        <div style="display:inline-block;">
            <form action="{{ route('replies.edit', ['reply' => $reply->id]) }}" method='GET'>
                @csrf
                <button class="btn" type='submit' data-toggle="buttons">Change &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
    <hr>

</body>


</html>