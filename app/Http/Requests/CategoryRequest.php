<?php

namespace App\Http\Requests;

use App\Enums\Status;
use App\Models\Category;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'name'               => ['required', 'string','max:255'],
            'status'             => ['required', Rule::enum(Status::class)],
            'parent_category_id' => ['nullable', 'integer', Rule::exists(Category::class, 'id')],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
           'slug' => Str::slug($this->name),
        ]);
    }
}
