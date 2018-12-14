
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1> My Reviews </h1>
                @foreach($reviews as $r)
                    @if($r->user_id == Auth::user()->id)
                    <a href= {{ url('restaurantdetail/'.$r->restaurant->id) }} > {{$r->restaurant->name}}</a>
                    <br/>
                    <p> Rating: {{$r->rating }} </p>
                    <p> {{ $r->tagline }}<p>
                    <p> {{ $r->review }}<p>
                    <p> Submitted: {{ $r->created_at }} <p>
                    <br/>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
