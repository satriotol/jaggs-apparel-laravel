<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'price' => 'required|integer',
            'name' => 'required',
            'weight' => 'required|numeric',
            'is_sale' => 'required',
            'new_price' => 'nullable',
            'description' => 'required',
            'category_id' => 'required',
        ];
    }
}
