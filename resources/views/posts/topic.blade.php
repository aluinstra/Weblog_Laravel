<h1>{{ ucfirst($topic->topic) }}</h1>
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