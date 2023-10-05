<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name'=> 'required|string',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'walking_pace'=> 'required|string',
            'age'=> 'required|integer',
            'gender'=> 'required|string',
            'past_illness'=> 'required|string',
            'address' => 'required|string',
            'enroute_id' => 'required|integer',
            'city' => 'required|string',
            'walking_status'=>'required',
        ];
    }
}
