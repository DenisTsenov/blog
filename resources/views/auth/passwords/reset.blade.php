@extends('main')

@section('tltle', '| Forgot my password')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Reset password!</div>
            <div class="panel-body">
                {!! Form::open(array('url' => 'password/reset', 'method' => 'POST')) !!}
                
                {{ Form::hidden('token', $token)}}
                
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', $email, array('class' => 'form-control')) }}
                
                {{ Form::label('password', 'New Password') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
                
                {{ Form::label('password_confirmation', 'Confirm New Password') }}
                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                
                {{ Form::submit('Reset', array('class' => 'btn btn-success btn-block form-spacing-top'))}}
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
</div>

@endsection
