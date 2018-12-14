@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
         <h1> Add Operating Hours </h1>
            <h2> {!! \App\Restaurant::find($id)->name !!} </h2>
            <div class="col-md-4">
            {!! Form::open(['route'=>'hour']) !!}
            {!! Form::hidden('id',$id) !!}
            <p> Select day </p>
            {!! Form::select('day_id',[1=>"Sunday",
                                        2=>"Monday",
                                        3=>"Tuesday",
                                        4=>"Wednesday",
                                        5=>"Thursday",
                                        6=>"Friday",
                                        7=>"Saturday",
                                        ]) !!}
          
             <p> Input Opening Time </p>
             <input type="time" name="opening">
              <p> Input Closing Time </p>
             <input type="time" name="closing">
            <br/>
            <br/>
            {!! Form::submit('Submit Operating Hours',['class'=>'btn btn-lg btn-primary'])!!}
             {!! Form::close()!!}
            </div>
        </div>
    </div>
@endsection
