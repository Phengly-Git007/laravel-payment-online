<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => ['required','string'],
            'phone' => ['required','string'],
            'address1' => ['required','string'],
            'address2' => ['required','string'],
            'city' => ['required','string'],
            'country' => ['required','string'],
            'pincode' => ['required','string'],
        ];
    }
}
