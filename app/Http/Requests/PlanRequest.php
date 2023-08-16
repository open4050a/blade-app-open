<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PlanRequest extends FormRequest
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
            'id' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'birthday' => 'required|date_format:Y-m-d',
            'gender' => 'required|in:0,1',
            'tel1' => 'required|regex:/^[0-9]+$/|max_digits:4',
            'tel2' => 'required|regex:/^[0-9]+$/|max_digits:4',
            'tel3' => 'required|regex:/^[0-9]+$/|max_digits:4',
            'checkbox' => 'required',
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id.required' => 'プランを取得できませんでした。再度実施して下さい。',
            'start_date.required' => '利用開始日を入力してください。',
            'start_date.date_format' => '利用開始日を正しい形式で入力してください。',
            'birthday.required' => '誕生日を入力してください。',
            'birthday.date_format' => '誕生日を正しい形式で入力してください。',
            'gender.required' => '性別を選択してください。',
            'gender.in' => '正しい項目を選択してください。',
            'tel1.required' => '電話番号1: 電話番号を入力してください。',
            'tel1.regex' => '電話番号1: 半角数字を入力してください。',
            'tel1.max_digits' => '電話番号1: 4桁以内で入力してください。',
            'tel2.required' => '電話番号2: 電話番号を入力してください。',
            'tel2.regex' => '電話番号2: 半角数字を入力してください。',
            'tel2.max_digits' => '電話番号2: 4桁以内で入力してください。',
            'tel3.required' => '電話番号3: 電話番号を入力してください。',
            'tel3.regex' => '電話番号3: 半角数字を入力してください。',
            'tel3.max_digits' => '電話番号3: 4桁以内で入力してください。',
            'checkbox.required' => '同意されていません。',
        ];
    }
}
