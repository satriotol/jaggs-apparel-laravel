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
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required',
            'email'             => 'required|email',
            'address'           => 'required',
            'number'            => 'required',
            'transaction_total' => 'required|integer',
            'transaction_details'   => 'required|array',
            'transaction_details.*' => 'integer|exists:product_sizes,id',
            'province'              => 'required',
            'city'                  => 'required',
            'courier'               => 'required',
            'courier_price'         => 'required'
        ];
    }
}
