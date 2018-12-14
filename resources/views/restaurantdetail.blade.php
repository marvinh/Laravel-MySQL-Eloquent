@extends('layouts.app')

@section('title', 'Page Title')



@section('content')
    <div class="container">
    @if(session('message'))
            <div class="alert alert-success">
            <strong>{{ session('message') }}</strong>
            </div>
                
    @endif
    <div class="row">
         <div class="col">
            <br/>
            <br/>

            @if(Auth::user() != null && Auth::user()->hasRole('reviewer'))
            <div class="col-md-4">
            {!! Form::open(['route'=>['review.show',$restaurant->id],'method'=>'GET']) !!}
            {!! Form::submit('Add Review',['class' => 'btn btn-large btn-primary']) !!}
            {!! Form::close() !!}
            </div>
            @endif
          @if(Auth::user() != null && Auth::user()->hasRole('admin'))
            <div class="col-md-4">
            {!! Form::open(['route'=>['editrest',$restaurant->id],'method'=>'GET']) !!}
            {!! Form::submit('Edit Restaurant',['class' => 'btn btn-large btn-primary']) !!}
            {!! Form::close() !!}
            </div>
            <div class="col-md-4">
            {!! Form::open(['route'=>['additem',$restaurant->id],'method'=>'GET']) !!}
            {!! Form::submit('Add Menu Item',['class' => 'btn btn-large btn-primary']) !!}
            {!! Form::close() !!}
            </div>
            <div>
            {!! Form::open(['route'=>['addhour',$restaurant->id],'method'=>'GET']) !!}
            {!! Form::submit('Add Operating Hours',['class' => 'btn btn-large btn-primary']) !!}
            {!! Form::close() !!}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
            <div class="panel panel-default">
            <div class="panel-heading">
            <h1> Restaurant Details </h1>
            <div>
            <p> {{ $restaurant->name }} </p>
            <p> Location: {{ $restaurant->city.", ".$restaurant->state }} </p>
            <p> Rated {{ $rating }} out of {{ $rating_count }} review(s)!</p>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">
            <h2> Information </h2>
            <p>  Address: {{ $restaurant->street_address .", ".$restaurant->city.", ".$restaurant->state }} </p>
            <p> Website: {{$restaurant->website }} </p>
            </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">
            <h2> Operating Hours </h2>
            @foreach($restaurant->hours as $h)
                <p> {{ $h->day->day }} Open: {{$h->opening}} Close: {{ $h->closing }}</p>
            @endforeach
            </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">
            <h2> Menu </h2>
            @foreach($restaurant->menu as $m)
                <p>  Item Name: {{  $m->name }} </p>
                <p>  Item Description: {{ $m->desc }} </p>
                <p>  Item Price $:{{ $m->price }} </p>
            @endforeach
            </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">
            <h2> Reviews </h2>
            @foreach($restaurant->reviews as $r)
                <p> Rated: {{$r->rating }} </p>
                <p> Name: {{ $r->reviewer->name }}
                <p> by: {{ $r->reviewer->role->name }} </p>
                <p> Tagline: {{$r->tagline}}</p>
                <p> {{ $r->review }}</p>
                <br/>
            @endforeach
            </div>
            </div>
        
        </div>
    </div>   
@endsection