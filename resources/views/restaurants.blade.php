@extends('layouts.app')

@section('title', 'Page Title')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1> All Restaurants </h1> 
                
                @foreach($restaurants as $key=>$r)
                     <div class="panel panel-default">
                        <div class="panel-heading">
                        <p> Restaurant: {{ $r->name }} </p>
                        <p> Location: {{ $r->city.", ".$r->state }} </p>
                        <p> Rated {{ $ratings[$key] }} out of {{$rating_count[$key]}} reviews!</p>
                        {!! Form::open(['url' => 'restaurantdetail/'.$r->id]) !!}
                        {!! method_field('GET') !!}
                        {!! Form::submit('View Restaurant Details',['item_id'=>$r->id]) !!}
                        {!! Form::close() !!}
                        </div>
                        <div class="panel-body">
                        
                        </div>
                    </div>
                @endforeach
               
               

            </div>
        </div>
    </div>   
@endsection