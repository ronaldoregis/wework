@extends('layouts.app')

@section('content')
    <h1 class="text-center">Posts</h1>

    {{--@if(Auth::check())--}}
        {{--<div class="text-center">--}}
            {{--{{url()->}}--}}
        {{--</div>--}}
    {{--@endif--}}

    @if($posts)
        <div class="text-center">
        @foreach($posts as $post)
        <h3>{{$post->title}}</h3><br>
        {{$post->body}}<br><hr>
        @endforeach
        </div>
    @endif
@stop