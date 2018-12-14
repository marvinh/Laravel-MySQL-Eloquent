
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container">
     @if(session('message'))
        <div class="alert alert-success">
        <strong>{{ session('message') }}</strong>
        </div>
    @endif
     <table class="table">
    <thead>
      <tr>
        <th>Display Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach(\App\User::with('role')->get() as $u)
        @if($u->id != Auth::user()->id)
        <tr>
        <td> {{ $u->name }}</td>
        <td> {{ $u->email }} </td>
        <td>
        @if($u->role_id == 1)
            {!! Form::open(['url'=>'/demote/'.$u->id,'method'=>'GET']) !!}
            {!! Form::submit('Demote',['class'=>'btn btn-lg btn-danger'])!!}
            {!! Form::close()!!}
        @else
            {!! Form::open(['url'=>'/promote/'.$u->id,'method'=>'GET']) !!}
            {!! Form::submit('Promote',['class'=>'btn btn-lg btn-success'])!!}
            {!! Form::close()!!}
        @endif
        </td>
      </tr>
      @endif
    @endforeach
    </tbody>
    </table>
    </div>
@endsection
