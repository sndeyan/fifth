@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Posts</h1></div>
                <div class="panel-body">
                    @foreach($posts as $post)
                    <div class="col-sm-12">
                        @if(empty($post->image))
                            <img src="/images/default.png" class="col-sm-2">
                        @else
                            <img src="/images/{{$post->image}}" class="col-sm-2">
                        @endif
                        <h3 class="col-sm-7">{{$post->title}}</h3>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
