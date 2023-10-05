@extends('layouts.app-master')

@section('content')
<div class="bg-light p-5 rounded">  
      <!--begin::Card-->
      @if (session('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
      </div>
      @endif
<form method="POST" action="/store-reviews">
    @csrf
    <input type="hidden" name="enroute_id" value="{{$enrouteId->enroute_id}}"/>
   <textarea placeholder="Write your review" name="message" cols="50" rows="5"></textarea>
     <br><br>
    <input type="submit" name="submit" value="Add reviews"/>
    <br><br>
</form>
<br>
<h3>Other reviews</h3>
<ul>
    @foreach($other_reviews as $review)
    <li>{{$review['enrouteData']['name']}}
        <br>
        "{{$review->message}}" 
         @if($review['userData']!=null) by {{$review['userData']['name']}}
        @endif
        <form action="{{ route('like.post', $review['id']) }}" method="post">
        @csrf
        <button style="border:0;background:transparent"><i class="fa fa-thumbs-up"></i>{{ $review->likeCount }}</button>
        </form>
    </li>
    @endforeach
</ul>
<h5>Referral Link:</h5> <a href="/referral_link/{{strtolower($enrouteName)}}/{{$ref_code}}">{{$ref_code}}</a>
<br>
<a href="/"><i class="fa fa-arrow-left"></i></a>
</div>
@endsection