@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
         <h1> Edit Restaurant </h1>
        <h2> {!! \App\Restaurant::find($id)->name !!}</h2>
         <p> Fields marked * are required </p>
            <div class="col-md-4">
             {!! Form::model(\App\Restaurant::class,['route'=>'edit']) !!}
             {!! Form::hidden('restaurant_id',$id)!!}
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
