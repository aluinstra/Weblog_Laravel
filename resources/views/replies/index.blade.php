<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>

    <h1>Replies Index</h1>


    @foreach ($replies as $key => $reply)
    <div id='titlebar'>
        <div id='user'> {{ $reply->user->name }} </div>
        <div id='title'><a href={{route("replies.show", $reply->id)}}> {{ optional($reply->post)->title }} </a></div>
        <div id='creation_date'> {{ $reply->created_at}}</div>
    </div>

    <div id='content'> {{$reply->content}}</div>
    <hr>
    @endforeach

</body>

</html>