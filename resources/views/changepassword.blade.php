
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1> Change Password </h1>
                @if(session('message'))
                    <div class="alert alert-danger">
                    <strong>{{ session('message') }}</strong>
                    </div>
                @endif
                {!! Form::open(['route' => ['profile.update',Auth::user()->id] , 'method'=>'PUT'] )!!}
                 
                <p> Enter New Password</p>
                {!! Form::password('password_1')!!}
                <p> Confirm New Password</p>
                {!! Form::password('password_2')!!}
                <br/>
                <br/>
                {!! Form::submit('Change Password')!!}
                {!!Form::close()!!}

                
            </div>
        </div>
    </div>
@endsection
