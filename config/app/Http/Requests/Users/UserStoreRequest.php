<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'mobile' => ['required', 'numeric','unique:users,mobile'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','confirmed'],
            'status' => ['required', Rule::in(['active','in-active'])],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام الزامی است',
            'mobile.required' => 'وارد کردن شماره همراه الزامی است',
            'email.required' => 'وارد کردن پست الکترونیکی الزامی است',
            'password.required' => 'وارد کردن رمز عبور الزامی است',
            'password.confirmed' => 'رمز عبور با تکرار آن مطابقت ندارد',
            'status.required' => 'انتخاب وضعیت الزامی است',
            'email.email' => 'ایمیل با فرمت معتبر وارد کنید',
            'email.unique' => 'این ایمیل قبلا ثبت شده است',
            'mobile.unique' => 'این شماره قبلا ثبت شده است',
            'mobile.numeric' => 'فقط عدد مجاز است',

        ];
    }
}
