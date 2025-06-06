<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id'        => 'required',
            'product_quantity'  => 'required',
            'price'             => 'required',
            'sale_price'        => 'required',
            'product_images'    => 'required',
        ];
    }
}
