@extends('main') 

@section('title', '| Show.')

@section('content')
<div class="row">
    <div class="col-md-8">
        <img src="{{ asset('images/' . $post->image ) }}" height="400" width="700" class="img-circle img-thumbnail"/>
<h1>{{ $post->title }}</h1>
<p class="lead">
    {!! $post->body !!}
    <hr/>
    <div class="tags" > 
        @foreach($post->tags as $tag)
        <span class="label label-info">{{ $tag->name }}</span>
        @endforeach
    </div>
    <div id="backend-comments">
        <h2>Comments <small>{{ $post->comments()->count(). ' total' }}</small></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th class="th"></th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($post->comments as $comment)
                <tr>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->comment}}</td>
                    <td><a href="{{ route('comments.edit', $comment->id) }}" class="btn  btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</p>
</div>
    <div class="col-md-4">
        <div class="well">
            
            <dl class="dl-vertical">
                <dt>Slug:</dt>
                <dd><a href="{{ route('blog.single', $post->slug)  }}">{{ route('blog.single', $post->slug) }}</a></dd>
            </dl>
            
            <dl class="dl-vertical">
                <dt>Category:</dt>
                <dd>{{ $post->category->name }}</dd>
            </dl>
            
            <dl class="dl-vertical">
                <dt>Create At:</dt>
                <dd>{{ date('M / j, Y H:i', strtotime($post->created_at)) }}</dd>
            </dl>
            
            <dl class="dl-vertical">
                <dt>Last Updated:</dt>
                <dd>{{ date('M / j, Y H:i', strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr/>
            <div class="row">
            <div class="col-sm-6">
                {!! Html::linkRoute('posts.edit', 'Edit', array($post->id),
                array('class' => 'btn btn-primary btn-block')) !!}
            </div>
                
            <div class="col-sm-6">
                {!! Form::open(array('route' => array('posts.destroy', $post->id), 'method' => 'DELETE')) !!}
                
                    {!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) !!}
                
                {!! Form::close()!!}
            </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    {{ Html::linkRoute('posts.index', '<< See All Posts',
                    array(), array('class' => 'btn btn-default btn-block btn-h1')) }}
                </div>
                
            </div>
            
        </div>
    </div>
</div>


@endsection