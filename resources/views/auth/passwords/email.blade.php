@extends('main')

@section('tltle', '| Forgot my password')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center text-capitalize">Reset password!</div>
            <div class="panel-body">
                
                @if(session('status'))
                
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                
                @endif
                
                {!! Form::open(array('url' => 'password/email', 'method' => 'POST'))!!}
                
                {{ Form::label('email', 'Enter your Email') }}
                {{ Form::email('email', null, array('class' => 'form-control')) }}
                
                {{ Form::submit('Reset', array('class' => 'btn btn-success btn-block form-spacing-top'))}}
                
                {!! Form::close()!!}
            </div>
        </div>
    </div>
    
</div>

@endsection
