@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Last Posts</div>

                <div class="panel-body">
                    @if($posts)
                        <div class="text-center">
                            @foreach($posts as $post)
                                <a class="" href="{{ url('/'.$post->name) }}">
                                    <h3>{{$post->name}}</h3>
                                </a><br>
                                {{$post->body}}<br>
                                <div class="image-container">
                                    <img height="100" src="images/{{$post->path}}" alt="">
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
