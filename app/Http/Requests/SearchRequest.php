<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'keyword' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'keyword.required' => 'キーワードを入力して下さい。',
            'keyword.string' => '文字列で入力して下さい。',
            'keyword.max' => '255文字以内で入力して下さい。',
        ];
    }
}
