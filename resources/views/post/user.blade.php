@extends('layouts.app')

@section('content')
    @include('delete')
    <div class="container">
        <div class="row col-md-8 col-md-offset-2">
            @include('alerts')
            <h2>My Posts</h2>
            @foreach ($posts as $post)
                <div class="col-sm-12 post">
                    @if(empty($post->image))
                        <img src="/images/default.png" class="col-sm-2">
                    @else
                        <img src="/images/{{$post->image}}" class="col-sm-2">
                    @endif
                    <p class="col-sm-3">{{$post->title}}</p>
                    <p class="col-sm-3">{{$post->desk}}</p>
                    <a href="/post/{{$post->id}}/edit" class="btn btn-primary col-sm-2">Edit</a>
                    <a type="button" class="btn btn-danger delete-post col-sm-2" data-id="{{$post->id}}" data-toggle="modal" data-target="#delete">Delete</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection