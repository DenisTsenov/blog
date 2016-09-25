@extends('main')
@section('title', '| Delte comment')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>DELETE THIS COMMENT?</h1>
        <p><strong>Name:</strong>{{ $comment->name }}</p>
        <p><strong>Email:</strong>{{ $comment->email }}</p>
        <p><strong>Comment</strong>{{ $comment->comment }}</p>
        
        {{ Form::open(array('route' => array('comments.destroy', $comment->id), 'method' => 'DELETE')) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-lg btn-blok btn-danger')) }}
        {{ Form::close() }}
    </div>
</div>

@endsection