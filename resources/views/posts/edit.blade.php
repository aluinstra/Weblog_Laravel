<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>

    <h1>Posts: Edit Post</h1>

    <ul>
        <li><a href={{route("posts.show", $post->id)}}>Show Post</a></li>
    </ul>

    <form action="/posts/{{$post->id}}" method="POST" onsubmit="return SubmitForm(['title', 'active', 'content'])">
        @csrf
        @method('PUT')
        <div id="user" name="name"> {{ $post->user->name }} </div>

        <div id="current_topic" name="current_topic" onclick="showSelect()"> {{ $post->topic->topic }} </div>

        <select name="topic_id" id="topic" hidden>
            @foreach ($topics as $key => $topic)
            <option value="{{ $key+1 }}" {{ ( $post->topic->topic == $topic->topic) ? 'selected' : ' '}}> {{ $topic->topic }}</option>
            @endforeach
        </select>

        <input type="hidden" id="hidden-title-input" name="title" value="" />
        <div id="title" contenteditable="true"> {{ $post->title }} </div>

        <div id="created_at"> {{ $post->created_at }}</div>

        <input type="hidden" id="hidden-active-input" name="active" value="" />
        <div id="active" contenteditable="true"> {{ $post->active }}</div>

        <input type="hidden" id="hidden-content-input" name="content" value="" />
        <div id="content" contenteditable="true"> {{ $post->content }}</div>
        <hr>

        <div id="inputButton">
            <button type="submit">Submit</button>
        </div>

    </form>

    <div id="uploadIMG">
        <button type="button" onclick="window.location='{{route("file-upload", $post->id)}}'">Upload IMG</button>
    </div>

    <script src='/js/app.js'></script>

</body>

</html>

<!-- https://www.atnsolutions.com/questions/42/use-contenteditable-div-in-a-form-instead-of-textarea-help -->

<!-- ['title', 'active', 'content'] -->

<!-- https://laracasts.com/discuss/channels/laravel/set-selected-option-in-dynamically-created-drop-down-menu -->

<!-- https://stackoverflow.com/questions/38428324/setting-selected-option-in-laravel-form -->