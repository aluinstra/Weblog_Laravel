<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>

    <h1>Replies: Edit Reply</h1>

    <nav>
        <ul>
            <li><a href={{route("replies.show", $reply->id)}}>Go Back</a></li>
        </ul>
    </nav>

    <form action="/replies/{{$reply->id}}" method="POST" onsubmit="return SubmitForm(['content'])">
        @csrf
        @method('PUT')
        <div id="user" name="name"> {{ $reply->user->name }} </div>
        <div id="title" name="title"> {{ $reply->post->title }} </div>
        <div id="created_at"> {{ $reply->created_at }}</div>

        <input type="hidden" id="hidden-content-input" name="content" value="" />
        <div id="content" contenteditable="true"> {{ $reply->content }}</div>
        <hr>

        <div id="inputButton">
            <button type="submit">Submit</button>
    </form>

    <script src='/js/app.js'></script>

</body>

</html>