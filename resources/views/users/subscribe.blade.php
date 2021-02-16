<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Users: Subscription</h1>

    <form action="{{route('users.checkout', $user)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="checkbox" id="premium_content" name="premium_content" value=1>
        <label for="premium_content"> I want to subscribe to premium -- 4.99 euro a month</label><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>