@extends('layouts.app')

@section('content')
    <h1 class="text-center">Posts</h1>

    <div class="container">
        {!! Form::open(['files'=>true]) !!}
            <div class="form-group row">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <div class="col-sm-6 center-block">
                        {!! Form::label('title', 'Post Title', ['class'=>'col-sm-2 col-form-label control-label']) !!}
                        {!! Form::text('title', null, ['class'=>'form-control', 'name'=>'title', 'required'=>'required', 'placeholder'=>'Post Title']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group row {{ $errors->has('body') ? ' has-error' : '' }}">
                <div class="col-sm-8 center-block">
                    {!! Form::label('body', 'Post Message', ['class'=>'col-sm-2 col-form-label control-label']) !!}
                    {!! Form::text('body', null, ['class'=>'form-control', 'name'=>'body', 'required'=>'required', 'placeholder'=>'Post Message']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 center-block">
                    {!! Form::file('file', ['class'=>'form-control', 'name'=>'file']) !!}
                </div>
            </div>

            {{csrf_field()}}

            <div class="from-group text-center">
                {!! Form::submit('Publish', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <hr>
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