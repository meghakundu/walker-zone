@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">  
        <a href="/register" class="btn btn-primary">Register</a>
        <h5>Your route for refferal:</h5> {{$enroute_details->name}}     
    <p>-{{$enroute_details->description}}</p>
        <h6>Your starting point:</h6>{{$enroute_details->starting_point}}
        <h6>Your end point:</h6>{{$enroute_details->end_point}}
        <h6>Avg. Steps Count:</h6>{{$enroute_details->steps_count}}<br>
       
    </div>
    
@endsection
