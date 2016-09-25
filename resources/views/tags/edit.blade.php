@extends('main')
@section('title', "| Edit Tag")
@section('content')

    {{ Form::model($tag, array('route' => ['tags.update', $tag->id], 'method' => 'PUT')) }}

    {{ Form::label('name', 'Title')}}
    {{ Form::text('name', null, array('class' => 'form-control'))}}
    
    {{ Form::submit('Save Changes', array('class' => 'form-spacing-top btn btn-success'))}}
    
    {{ Form::close() }}
@endsection