<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:products,name',
            'details' => 'required|string|max:255',
            'price' => 'required|integer',
            'sex_id' => 'required|integer|exists:sexes,id',
            'category_ids' => 'required|array|exists:categories,id',
            'featured' => 'nullable|integer|in:1',
            'description' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'sex_id' => 'sex',
            'category_ids' => 'categories',
        ];
    }

}
