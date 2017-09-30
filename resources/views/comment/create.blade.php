@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-md-8 col-md-offset-2">
            @include('alerts')
            <h2>Add Comment</h2>
            <div class="col-sm-offset-2 col-sm-10">
                @include('comment.form')
            </div>
        </div>
    </div>
@endsection