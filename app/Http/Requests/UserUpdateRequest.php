<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class UserUpdateRequest extends FormRequest
    {

    public function authorize()
        {

        return TRUE;

        }

    // ------------------------------------------------------------

    public function rules()
        {
        return
            [

            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'

            ];

        }

    }
