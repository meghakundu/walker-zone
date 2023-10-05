<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\enroute;

class RegisterController extends Controller
{
    //
    public function show()
    {   
        $enroutes_list = enroute::select('id','name')->get();
        return view('auth.register',compact('enroutes_list'));
    }
    public function register(RegisterRequest $request) 
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
