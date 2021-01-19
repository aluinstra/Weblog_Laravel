<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <h1>Replies: Create Reply</h1>

    <ul>
        <li><a href={{$url=route("replies.index")}}>Posts</a></li>
        <li><a href={{$url=route("replies.create")}}>Toevoegen</a></li>
    </ul>

    <form action="/replies" method="POST">
        @csrf

        Content
        <textarea name="message" rows="10" cols="30" name="content" value="{{ old('content')}}">Please type here..</textarea>
        @if ($errors->has('post'))
        <div class="error">{{ $errors->first('post') }}</div>
        @endif
        <div id=inputButton>
            <button type="submit">button</button>
        </div>
    </form>

</body>

</html>