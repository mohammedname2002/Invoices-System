<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'trn' => 'nullable',
            'address' => 'nullable|string',
            'discount' => 'required|numeric|min:0|max:100',
        ];
    }


        public function messages()
        {
            return [
                'name.string' => 'The name must be a valid text string.',
                'name.max' => 'The name may not be greater than 255 characters.',
                'discount.numeric' => 'The discount must be a valid number.',
                'discount.min' => 'The discount cannot be less than 0.',
                'discount.max' => 'The discount cannot exceed 100.',
            ];


        }
    }
