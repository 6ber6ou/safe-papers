<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePaperRequest extends FormRequest
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

            'description' => 'required',
            'category' => 'required',
            'file' => 'required|image|mimes:jpeg,bmp,png'

            ];

        }

    }
