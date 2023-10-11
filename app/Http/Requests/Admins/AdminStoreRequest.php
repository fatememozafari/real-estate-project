<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminStoreRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'mobile' => ['required', 'numeric','unique:admins,mobile'],
            'email' => ['required','email','unique:admins,email'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],
            'status' => ['required', Rule::in(['active','in-active'])],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'وارد کردن نام الزامی است',
            'last_name.required' => 'وارد کردن نام خانوادگی الزامی است',
            'mobile.required' => 'وارد کردن شماره همراه الزامی است',
            'email.required' => 'وارد کردن پست الکترونیکی الزامی است',
            'password.required' => 'وارد کردن رمز عبور الزامی است',
            'password_confirmation.required' => 'وارد کردن رمز عبور الزامی است',
            'status.required' => 'انتخاب وضعیت الزامی است',
            'email.email' => 'ایمیل با فرمت معتبر وارد کنید',
            'email.unique' => 'این ایمیل قبلا ثبت شده است',
            'mobile.unique' => 'این شماره قبلا ثبت شده است',
            'mobile.numeric' => 'فقط عدد مجاز است',
            'password.confirmed' => 'رمز عبور با تکرار آن مطابقت ندارد',

        ];
    }
}
