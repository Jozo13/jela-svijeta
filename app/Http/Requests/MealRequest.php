<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
            'page' => 'required|integer|min:1',
            'per_page' => 'required|integer|min:1',
            'lang' => 'required|string',
            'category' => 'integer',
            'tags' => 'string',
            'with' => 'string',
            'diff_time' => 'integer',
        ];
    }
}
