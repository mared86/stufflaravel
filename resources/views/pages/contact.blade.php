@extends('main')
@section('title','| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>contact me</h1>
            <hr>
            <form action="">
                <!--- Email Field --->
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', old( 'email'), ['class' => 'form-control','placeholder' => 'Email']) !!}
                </div>
                
                <!--- Subject Field --->
                <div class="form-group">
                    {!! Form::label('subject', 'Subject:') !!}
                    {!! Form::text('subject', old( 'subject'), ['class' => 'form-control','placeholder' => 'Subject']) !!}
                </div>
                
                <!--- Message Field --->
                <div class="form-group">
                    {!! Form::label('message', 'Message:') !!}
                    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                </div>
                <!--- send Message Field --->
                <div class="form-group">
                    {!! Form::submit('Send Message', ['class' => 'btn btn-success']) !!}
                </div>
            </form>
        </div>
    </div>
    <!-- end .row-->
@endsection