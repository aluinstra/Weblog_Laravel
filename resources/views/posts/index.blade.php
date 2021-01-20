<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>

    <h1>Posts Index</h1>


    <div>
        <div id='log_in'><a href={{$url=route("login")}}>log in</div>
        <div id='new_user'><a href={{$url=route("users.create")}}>Create new user</div>
    </div>

    <ul>
        <li><a href={{$url=route("posts.index")}}>Posts</a></li>
        <li><a href={{$url=route("posts.create")}}>Toevoegen</a></li>
    </ul>
    <hr>

    <form action="/posts/topic" method="POST">
        @csrf
        Choose Selection
        <select name="topic_id" id="topic">
            @foreach ($topics as $key => $topic)
            <option value="{{ $key+1 }}"> {{ $topic->topic }}</option>
            @endforeach
        </select>

        <div id="inputButton">
            <button type="submit">Submit</button>
        </div>
        <hr>
    </form>

    @foreach ($posts as $key => $post)
    <div id='titlebar'>
        <div id='user'> {{ $post->user->name }} </div>
        <div id='title'><a href={{$url=route("posts.show", $post->id)}}> {{ $post->title }}</a></div>
        <div id='creation_date'> {{ $post->created_at}}</div>
        <div id='active'> {{ $post->active}}</div>
    </div>

    <div id='content'> {{$post->content}}</div>
    <hr>
    @endforeach

</body>

</html>