<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'status' => 'required|in:paid,unpaid',
           'company_id' => 'required|integer|exists:companies,id',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ];
    }


        
    }