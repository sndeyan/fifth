@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-md-8 col-md-offset-2">
            @include('alerts')
            <h2>Add Post</h2>
            @include('post.form')
        </div>
    </div>
@endsection