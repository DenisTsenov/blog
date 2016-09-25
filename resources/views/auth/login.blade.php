@extends('main') 

@section('title', '| Login')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open() !!}
        
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
            
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control')) }}
            
            {{ Form::checkbox('remember') }} {{ Form::label('remember', 'Remember me') }}
            
            {{ Form::submit('Login', array('class' => 'btn btn-success btn-block form-spacing-top')) }}
            
            <p><a href="{{ url('password/reset') }}">Forgot  Password?</a></p>
            
            
        {!! Form::close() !!}
    </div>
</div>
@endsection