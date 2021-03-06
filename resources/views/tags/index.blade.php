@extends('main') 

@section('title', '| All Tags')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                       
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show', $tag->id)}}">{{ $tag->name }}</a></td>
                        
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
    </div><!-- end  of  col-md-8 . -->
    <div class="col-md-3">
        
        <div class="well">
            
            {!! Form::open(array('route' => 'tags.store', 'method' => 'POST')) !!}
            
            <h1>New  Tag</h1>
            
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                
                {{ Form::submit('Create New Tag', array('class' => 'btn btn-success btn-block form-spacing-top')) }}
                
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection