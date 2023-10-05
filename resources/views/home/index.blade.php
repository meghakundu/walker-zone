@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">  
        @auth
        @include('layouts.header')
        <h1>Dashboard</h1>
        <p class="lead">Only walkers can access this section.</p>
        <div class="qr-block">{!! QrCode::size(100)->generate("https://walkerzone.me/razorpay-payment") !!}
          <span>Pay using RazorPay</span>
        </div>
        <p>Your registered city is {{$userDetails['city']}}</p>
        <h5>Your chosen route:</h5> {{$userDetails['enrouteData']['name']}}     
    <p>-{{$userDetails['enrouteData']['description']}}</p>
    <div class="openBtn">
      <button class="btn btn-sm btn-info" onclick="openForm()"><strong>Change Route</strong></button>
    </div>
    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form action="/update-route" class="formContainer" method="POST">
            @csrf
            @method('PUT')
          <h4>Wish to change</h4>
          <select name="enroute_id" class="enroute_select_div">
            @foreach($enrouteList as $enrouteItem)
            <option value="{{$enrouteItem->id}}">{{$enrouteItem->name}}</option>
            @endforeach
          </select>
         <button type="submit" class="btn btn-sm">Change</button>
          <button type="button" class="btn btn-sm cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>   
        <h6>Your starting point:</h6>{{$userDetails['enrouteData']['starting_point']}}
        <h6>Your end point:</h6>{{$userDetails['enrouteData']['end_point']}}
        <h6>Avg. Steps Count:</h6>{{$userDetails['enrouteData']['steps_count']}}<br><br>
        <a href="/start-route" class="btn btn-primary" onclick="return confirm('Paid before start?');">Start Walk</a>
        <h6>Status:</h6>@if($userDetails['walking_status']==0) Not yet started @else Completed @endif
        <br>
        @if($userDetails['walking_status']==1) 
        <a href="/add-promotions"><i class="fa fa-arrow-right"></i></a>
        @endif
        <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script> 
        @endauth

        @guest
        <div>
            <a href="/login" class="btn btn-primary">Login</a>
            <a href="/register" class="btn btn-info">Register</a>
        </div>
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
    
@endsection
