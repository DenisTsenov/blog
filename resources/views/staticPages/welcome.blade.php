@extends('main')

@section('tltle', '| Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Hello, and welcome to my  blog!</h1>
                <p class="lead">This is  my laravel test project.</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular  posts</a></p>
            </div>
        </div>
    </div><!-- end of header . row -->
    <div class="row">
        <div class="col-md-8">
            
            @foreach($posts as $post)
            
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? '...' : '' }}</p>
                <a  href="{{ route('blog.single',$post->slug ) }}" class="btn btn-primary">read more</a>
            </div>
            
            <hr/>
            
            @endforeach
            
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>

    </div>
</div><!-- end of . container -->
@endsection