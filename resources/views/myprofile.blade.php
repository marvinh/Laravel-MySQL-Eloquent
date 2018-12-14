
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
            <h1> My Pofile </h1>
            @if(session('message'))
                    <div class="alert alert-success">
                    <strong>{{ session('message') }}</strong>
                    </div>
            @endif
            <div class="col-md-4">
                <p> Name: {{$user->name}} </p>
                <p> Email: {{$user->email}} </p>
                <p> Registration Date: {{$user->created_at}} </p>
            </div>
            <div class="col-md-8">
                {!! Form::open(['url' => 'profile/create']) !!}
                {!! method_field('GET') !!}
                {!! Form::submit('Change Password',['class' => 'btn btn-large btn-primary'])  !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
