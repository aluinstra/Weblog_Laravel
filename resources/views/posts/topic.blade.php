<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{ ucfirst($topic->topic) }}</h1>
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