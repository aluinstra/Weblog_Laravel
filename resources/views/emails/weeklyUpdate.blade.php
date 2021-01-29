@component('mail::message')
<!-- # Introduction -->
# {{ $details['title'] }}

The body of your message.

@foreach ($details['lastWeekPosts'] as $key => $post)
<div id='titlebar'>
    <div id='user'> {{ $post->user->name }} </div>
    <div id='title'><a href={{route("posts.show", $post->id)}}> {{ $post->title }}</a></div>
    <div id='creation_date'> {{ $post->created_at}}</div>
    <div id='active'> {{ $post->active}}</div>
</div>

<div id='content'> {{$post->content}}</div>
<hr>
@endforeach

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent