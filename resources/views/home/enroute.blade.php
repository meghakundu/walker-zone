@extends('layouts.app-master')

@section('content')
<div class="enroute-container">
    <div class="row">
            <div class="col">
            <form method="POST" id="myForm" action="/finish-route">
            @csrf
            @method('PUT')            
            <input type="hidden" name="id" value="{{$enrouteId->enroute_id}}"/>
            </form>
            <ul id="progress-bar" class="progressbar">
                <li class="active">{{$route_pts->starting_point}}</li>
                @foreach($milestones as $item)
                <li>{{$item->name}}</li>
                @endforeach
                <li onclick="myForm.submit();">{{$route_pts->end_point}}
                </li>
            </ul>
            </div>
        </div>
        </div>
        <div class="btn-container">
        <a href="/" class="btn">Home</a>
        <button class="btn" id="Next">Next</button>
        <button class="btn" id="Back">Back</button>
       
        <!-- <button class="btn" id="Reset">Reset</button> -->
        </div>
        <script>
        var progressBar = {
        Bar : $('#progress-bar'),
        Reset : function(){
            if (this.Bar){
            this.Bar.find('li').removeClass('active'); 
            }
        },
        Next: function(){
            $('#progress-bar li:not(.active):first').addClass('active');
        },
        Back: function(){
            $('#progress-bar li.active:last').removeClass('active');
        }
        }

        progressBar.Reset();

        ////
        $("#Next").on('click', function(){
        progressBar.Next();
        })
        $("#Back").on('click', function(){
        progressBar.Back();
        })
        $("#Reset").on('click', function(){
        progressBar.Reset();
        })
        </script>
@endsection