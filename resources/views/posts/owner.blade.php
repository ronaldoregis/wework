@extends('layouts.app')

@section('content')
    <h1 class="text-center">Posts</h1>
    <div class="text-center">
        <form method="post" action="/posts">
            <input type="text" name="title" placeholder="Enter title"><br>
            <input type="text" name="body" placeholder="Enter the Post"><br>
            {{csrf_field()}}
            <input type="submit" name="submit">
        </form>
    </div>
    <hr>
    @if($posts)
        <div class="text-center">
            @foreach($posts as $post)
                {{$post->title}}<br>
                {{$post->body}}<br><hr>
            @endforeach
        </div>
    @endif
@stop