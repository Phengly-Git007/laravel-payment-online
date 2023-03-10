<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' =>['required','string'],
            'slug' =>['required','string'],
            'image' =>['nullable','image'],
            'category_id' =>['required','string'],
            'quantity' =>['required','string'],
            'original_price' =>['required','string'],
            'selling_price' =>['required','string'],
            'status' =>['required','boolean'],
            'trending' =>['required','boolean'],
            'short_description' =>['required','string','max:150'],
            'description' =>['required','string','max:500'],
        ];
    }
}
