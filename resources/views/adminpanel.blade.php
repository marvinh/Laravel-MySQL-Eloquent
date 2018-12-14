
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
            <h1> Admin Panel </h1>
                <br/>
                <br/>
                <br/>
             <div class="col-md-4">
            </div>
            <div class="col-md-2">
             {!! Form::open(['url' => '/addrestaurant','method'=>'GET']) !!}
            {!! Form::submit('Add Restaurant',['class'=>'btn btn-lg btn-info']) !!}
            {!! Form::close() !!} 
            </div>
            <div class="col-md-2">
            {!! Form::open(['route' => 'userpanel','method'=>'GET']) !!}
            {!! Form::submit('Users Panel',['class'=>'btn btn-lg btn-info']) !!}
            {!! Form::close() !!} 
            </div>
            
        </div>
    </div>
@endsection
