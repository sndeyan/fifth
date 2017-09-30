@extends('layouts.app')

@section('content')
    @include('delete')
    <div class="container">
        <div class="row col-md-8 col-md-offset-2">
            @include('alerts')
            <h2>My Comments</h2>

            @foreach ($comments as $comment)
                <div class="col-sm-12">
                    @if(empty($post->image))
                        <img src="/images/default.png" class="col-sm-2">
                    @else
                        <img src="/images/{{$post->image}}" class="col-sm-2">
                    @endif


                            <h5 class="col-sm-6">{{$comment->text}}</h5>
                    <a href="/comment/{{$comment->id}}/edit" class="btn btn-primary col-sm-2">Edit</a>
                    <a type="button" class="btn btn-danger delete-post col-sm-2" data-id="{{$comment->id}}" data-toggle="modal" data-target="#delete">Delete</a>
                </div>
            @endforeach




        </div>
    </div>
@endsection