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
        <div id='log_in'><a href={{route("login")}}>log in</div>
        <div id='new_user'><a href={{route("users.create")}}>Create new user</div>
    </div>

    <form action="{{route('logout')}}" method="POST">
        @csrf
        <div id=inputButton>
            <button type="submit">logout</button>
        </div>
    </form>

    <ul>
        <li><a href={{route("posts.index")}}>Posts</a></li>
        <li><a href={{route("posts.create")}}>Toevoegen</a></li>
        <li><a href={{route("posts.weeklyUpdate")}}>Email</a></li>
    </ul>
    <hr>


    Choose Selection
    <select name="topic_id" id="topicSelect">
        <option value="">Select option...</option>
        @foreach ($topics as $key => $topic)
        <option value="{{ $key+1 }}"> {{ $topic->topic }}</option>
        @endforeach
    </select>
    <hr>

    <div id='contentWrapper'>
        @foreach ($posts as $key => $post)
        <div id='titlebar'>
            <div id='user'> {{ $post->user->name }} </div>
            <div id='title'><a href={{route("posts.show", $post->id)}}> {{ $post->title }}</a></div>
            <div id='creation_date'> {{ $post->created_at}}</div>
            <div id='active'> {{ $post->active}}</div>
        </div>

        <div id='content'> {{$post->content}}</div>

        @foreach ($imgs as $key => $img)
        @if ($img->post_id == $post->id)
        <img src="{{asset('storage/uploads/'.$img->name)}}">
        @endif
        @endforeach
        <hr>
        @endforeach
    </div>

    <script src='/js/app.js'></script>

</body>

</html>

<!-- https://www.positronx.io/laravel-file-upload-with-validation/ -->