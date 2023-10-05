@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">  
        @auth
        @include('layouts.header')
           @if(session('success'))
             <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
           @endif
           <br><br>          
          <h4>For enrouting "{{$enroute_details->name}}"</h4>
          <div class="card-head">
          <form action="{{ route('razorpay.payment.store') }}" method="POST" >
            @csrf
            <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ env('RAZORPAY_KEY') }}"
            data-amount="{{$enroute_details->charges * 100}}"
            data-buttontext="Pay {{$enroute_details->charges}} INR"
            data-name="TestPayment.com"
            data-description="Rozerpay"
            data-image="https://laraveltuts.com/wp-content/uploads/2022/08/laraveltuts-rounde-logo.png"
            data-prefill.name="name"
            data-prefill.email="email"
            data-theme.color="#ff7529">
            </script>
           </form>
          </div>
    </div>
  @endauth
  @endsection
