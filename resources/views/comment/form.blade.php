@if(isset($comment))
    {{ Form::model($comment, array('method' => 'PUT','route' => array('commentUpdate', $comment->id), 'files' => true)) }}
@else
    {{ Form::open(['url' => ['comment'], 'method' => 'POST', 'files' => true]) }}
@endif
<div class="col-sm-12 form-group">
    <div class="col-sm-6">
        {{Form::label('text', 'Comment Text:', ['class' => 'control-label col-sm-12'])}}
        {{Form::textarea('text', null, ['class' => 'col-sm-12 form-control', 'rows' => 5])}}
        @if ($errors->has('name'))
            <span class="help-block">
	                <strong>{{ $errors->first('name') }}</strong>
	            </span>
        @endif
    </div>
    <div class="col-sm-6">
        {{Form::label('post', 'Comment Post:', ['class' => 'control-label col-sm-12'])}}
        <select name="post_id" class="col-sm-12 form-control" id="post">
            @foreach ($posts as $post)
                <option value="{{$post->id}}">{{$post->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 btn-cont">
        <div class="col-sm-12">
            @if(isset($comment))
                {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
            @else
                {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
            @endif
        </div>
    </div>
</div>

{{ Form::close() }}