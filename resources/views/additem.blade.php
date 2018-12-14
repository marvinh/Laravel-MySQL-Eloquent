@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
         <h1> Add Item </h1>
        <h2> {!! \App\Restaurant::find($id)->name !!}</h2>
         <p> Fields marked * are required.</p>
          @if(session('message'))
            <div class="alert alert-danger">
            <strong>{{ session('message') }}</strong>
            </div>
                
            @endif
            <div class="col-md-4">
            {!! Form::open(['route'=>'addtomenu']) !!}
            {!! Form::hidden('restaurant_id',$id) !!}
            <p> * Item Name </p>
            {!! Form::text('name') !!}
            <p> Description (optional) </p>
            {!! Form::textarea('desc') !!}
            <p> * Item Price $ </p>
            {!! Form::number('price') !!}
             <br/>
            <br/>
            {!! Form::submit('Submit Item',['class'=>'btn btn-lg btn-primary']) !!}
            {!! Form::close() !!}
           
            </div>
        </div>
    </div>
@endsection
