<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|string|max:1000|min:3',
            'price' => 'required|numeric|min:1|max:100000',
            'vat' => 'required|numeric|min:1|max:10000',
            'date_of_create' => 'sometimes|string',
        ];
    }


    public function messages()
    {
        return [
            // Product Name
            'product_name.required' => 'The product name is required.',
            'product_name.max' => 'The product name must not exceed 1000 characters.',
            'product_name.min' => 'The product name must be at least 3 characters.',
            'product_name.string' => 'The product name must be a valid text string.',

            // Price
            'price.required' => 'The price is required.',
            'price.max' => 'The price may not exceed 100,000.',
            'price.min' => 'The price must be at least 1.',
            'price.numeric' => 'The price must be a valid number.',

            // VAT
            'vat.required' => 'The VAT is required.',
            'vat.max' => 'The VAT may not exceed 100,000.',
            'vat.min' => 'The VAT must be at least 1.',
            'vat.numeric' => 'The VAT must be a valid number.',

            // Date of Create
            'date_of_create.date' => 'The date of create must be a valid date format.',
        ];

    }

}