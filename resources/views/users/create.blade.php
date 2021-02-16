<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <h1>Users: Create User</h1>

    <ul>
        <li><a href={{route("posts.index")}}>Posts</a></li>
    </ul>

    <form action="/users" method="POST">
        @csrf

        fullname
        <input type="text" name="name" value="{{ old('name')}}"><br>
        @if ($errors->has('name'))
        <div class="error">{{ $errors->first('title') }}</div>
        @endif
        email
        <input type="text" name="email" value="{{ old('email')}}"><br>
        @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
        @endif
        password
        <input type="text" name="password" value=""><br>
        @if ($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
        @endif
        <div id=inputButton>
            <button type="submit">button</button>
        </div>
    </form>

</body>

</html>