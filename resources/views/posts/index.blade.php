@extends('layouts.app')

@section('content')
    <h1 class="text-center">Posts</h1>

    @if($posts)
        <div class="text-center">
            @foreach($posts as $post)
                <h3>{{$post->title}}</h3><br>
                {{$post->body}}<br>
                <div class="image-container">
                    <img height="100" src="images/{{$post->path}}" alt="">
                </div>
            @endforeach
        </div>
    @endif
@stop