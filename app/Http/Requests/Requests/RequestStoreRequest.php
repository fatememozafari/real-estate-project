<?php

namespace App\Http\Requests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreRequest extends FormRequest
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
            'user_id' => ['required'],
            'expired_at' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'وارد کردن نام کاربر الزامی است',
            'expired_at.required' => 'وارد کردن تاریخ انقضا الزامی است',
        ];
    }
}
