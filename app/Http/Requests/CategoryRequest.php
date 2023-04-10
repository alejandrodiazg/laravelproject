<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        $slug = request()->isMethod('PUT') ? "required|unique:articles,slug, {$this->categories->id}" : 'required|unique:categories';
        $image = request()->isMethod('PUT') ? 'nullable|mimes:jpg, png, jpeg' . $this->id : 'required:image';

        return [
           'name' => "required|unique:categories,name, {$this->categories->id}|min:3|max:255",
           'slug' => $slug,
           'image' => $image,
           'status' => 'required|boolean',
        ];
    }
}
