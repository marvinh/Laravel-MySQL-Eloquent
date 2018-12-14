
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
         <h1> Add Restaurant </h1>
        <p> Fields marked * are required. </p>
         @if(session('message'))
        <div class="alert alert-danger">
        <strong>{{ session('message') }}</strong>
        </div>
        @endif
            <div class="col-md-4">
                {!! Form::model(\App\Restaurant::class,['route'=>'add']) !!}
                <p> * Restaurant Name </p>
                {!! Form::text('name') !!}
                <p> * Street Address </p>
                {!! Form::text('street_address') !!}
                <p> * City </p>
                {!! Form::text('city') !!}
                <p> * State </p>
                {!! Form::text('state') !!}
                <p> Website (optional) </p>
                {!! Form::text('website') !!}
                <br/>
                <br/>
                {!! Form::submit('Submit Restaurant',['class'=>'btn btn-lg btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
