<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\enroute;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RazorPayController extends Controller
{
    //
    public function index()
    {    $enrouteId = User::select('enroute_id')->where('id',Auth::user()->id)->first();
        $enroute_details = enroute::select('charges','name')->where('id',$enrouteId->enroute_id)->first();
        return view('razorpayView',compact('enroute_details'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
        }
          
        //Session::put('success', 'Payment successful');
        return redirect("/")->with('success','Payment successful');
    }

}
