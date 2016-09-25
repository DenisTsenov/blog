@extends('main') 
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag ")
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <img src="{{ asset('images/' . $post->image ) }}" height="400" width="700" class="img-circle img-thumbnail"/>
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>
        <hr/>
        <p>Posted in:{{ $post->category->name }}</p>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center comment-title"><span class="glyphicon glyphicon-comment"></span>
            {{ $post->comments()->count() }} Comments</h2>
        @foreach($post->comments as $comment)
        <div class="comment">
            
            <div class="author-info">
                <img src="{{ "https://www.gravatar.com/avatar/"  . md5(strtolower(trim($comment->email)))
                            . "?s=50&d=monsterid"}}" class="author-image"/>
                <div class="author-name">
                    <h4>{{ $comment->name }}</h4>
                    <p class="time">{{ date('M j, Y / H:i', strtotime($comment->created_at)).' h' }}</p>
                </div>
            </div>
            
            <div class="comment-content">
                {{ $comment->comment }}
            </div>
        </div>
        @endforeach
    </div>
</div>
<hr/>
<h3 class="text-center">Add Coment</h3>
<div class="row">
    <div id="comment-form" class="col-md-8 col-md-offset-2">
        {{ Form::open(array('route' => array('comments.store', $post->id), 'method' => 'POST')) }}
        <div class="row">
            <div class="col-md-6">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control'))}}
            </div>
            <div class="col-md-6">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', null, array('class' => 'form-control'))}}
            </div>

            <div class="col-md-12">
                {{ Form::label('comment', 'Comment') }}
                {{ Form::textarea('comment', null, array('class' => 'form-control', 'rows' => '5'))}}

                {{ Form::submit('Comment', array('class' => 'btn  btn-success btn-block form-spacing-top'))}}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
