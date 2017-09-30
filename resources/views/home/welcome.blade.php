@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Welcome {{ Auth::user()->first_name .' '. Auth::user()->last_name }}</h1></div>
                    <div class="panel-body">
                        <h3> Create your Posts</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection