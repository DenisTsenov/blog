@extends('main')
@section('tltle', '| Contact')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Contact me.</h1>
            <hr/>
            <form action="{{ url('contact')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control" type="text">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control" type="text">
                </div>

                <div class="form-group">
                    <label name="mesage">Mesage:</label>
                    <textarea id="mesage" name="mesage" class="form-control" type="text" placeholder="Type your message hire....."></textarea>

                </div>
                <input type="submit" value="Send message" class="btn btn-success"/>
            </form>

        </div>
    </div><!-- end of header . row -->
</div>
@endsection