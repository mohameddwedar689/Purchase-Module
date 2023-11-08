<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
  
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name'=>'required|max:255',
            'description'=>'required',
            'category'=>'required|max:100',
            'price'=>'required|numeric',
            'stock_quantity'=>'required|numeric'
        ];
    }
    public function messages()
    {
        return[

        ];
    }
}