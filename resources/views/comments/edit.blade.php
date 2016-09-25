@extends('main')
@section('title', '| Edit comment')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1 class="text-center">Edit Comment</h1>
    {{ Form::model($comment, array('route' => ['comments.update', $comment->id], 'method' => 'PUT')) }}
    
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control', 'disabled' => '')) }}
        
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, array('class' => 'form-control', 'disabled' => '')) }}
        
        {{ Form::label('comment', 'Comment')}}
        {{ Form::textarea('comment', null, array('class' => 'form-control', 'rows' => '5')) }}
        
        {{ Form::submit('Redact Comment', array('class' => 'btn  btn-success btn-block form-spacing-top')) }}
        
    {{ Form::close() }}
    </div>
</div>
@endsection
