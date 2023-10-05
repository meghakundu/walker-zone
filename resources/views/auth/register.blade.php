@extends('layouts.auth-master')

@section('content')
   <div class="container">
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="age" value="{{ old('age') }}" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Age</label>
            @if ($errors->has('age'))
                <span class="text-danger text-left">{{ $errors->first('age') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
        <label>Enroutes</label>
           <select class="" name="enroute_id">
            @foreach($enroutes_list as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
           </select>
           @if ($errors->has('enroute_id'))
                <span class="text-danger text-left">{{ $errors->first('enroute_id') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
        <label>Walking Pace</label>
           <select class="" name="walking_pace">
            <option value="slow">Slow</option>
            <option value="medium">Medium</option>
            <option value="fast">Fast</option>
           </select>
           @if ($errors->has('walking_pace'))
                <span class="text-danger text-left">{{ $errors->first('walking_pace') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
        <label>Gender</label>
           <input type="radio" class="" name="gender" value="male">Male</input>
           <input type="radio" class="" name="gender" value="female">Female</input>
           @if ($errors->has('gender'))
                <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
            @endif
        </div>
           
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Address</label>
            @if ($errors->has('address'))
                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="past_illness" value="{{ old('past_illness') }}" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Past Illness</label>
            @if ($errors->has('past_illness'))
                <span class="text-danger text-left">{{ $errors->first('past_illness') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">City</label>
            @if ($errors->has('city'))
                <span class="text-danger text-left">{{ $errors->first('city') }}</span>
            @endif
        </div>
        <input type="hidden" name="walking_status" value="0"/>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; {{date('Y')}}</p>
    </form>
</div>
@endsection