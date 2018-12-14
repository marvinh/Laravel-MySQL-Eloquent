
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
            <h1> Review </h1>
            <p> Fields marked * are required </p>
             @if(session('message'))
            <div class="alert alert-danger">
            <strong>{{ session('message') }}</strong>
            </div>
                
            @endif
            <div class="col-4">
                <p> {{ $r->name }} </p>
                {!! Form::model(\App\Review::class, ['route'=>'review.store']) !!}
                {!! Form::hidden('restaurant_id', $r->id) !!}
                <p> * Rating </p>
                {!! Form::select('rating',[1,2,3,4,5]) !!}
                <p> * Title </p>
                {!! Form::text('tagline') !!}
                <p> * Review </p>
                {!! Form::textarea('review') !!} 
                <br/>
                <br/>
                {!! Form::submit('Submit Review',['class'=>'btn btn-primary']) !!}
                {!!Form::close()!!}
            </div>
           
                
        </div>
    </div>
@endsection
