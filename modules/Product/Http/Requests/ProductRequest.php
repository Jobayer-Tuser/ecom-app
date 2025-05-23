<?php

namespace Modules\Product\Http\Requests;

use App\Models\Category;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'summary'     => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image'       => ['required', 'array', 'max:2048'],
            'image.*'     => ['mimes:jpg,jpeg,png,pdf'],
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
        ];
    }
}
