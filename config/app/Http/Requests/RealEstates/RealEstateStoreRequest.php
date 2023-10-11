<?php

namespace App\Http\Requests\RealEstates;

use Illuminate\Foundation\Http\FormRequest;

class RealEstateStoreRequest extends FormRequest
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
            'status' => ['required', 'string'],
            'address' => ['required', 'string'],
            'user_id' => ['required'],
            'license_number' => ['required','unique:real_estates,license_number'],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن عنوان الزامی است',
            'status.required' => 'وارد کردن نوع ملک الزامی است',
            'address.required' => 'وارد کردن آدرس الزامی است',
            'user_id.required' => 'انتخاب مدیر الزامی است',
            'license_number.required' => 'وارد کردن شماره مجوز الزامی است',
            'license_number.unique' => 'این شماره مجوز قبلا ثبت شده است',
            'map.required' => 'لطفا موقعیت جغرافیایی مشاور املاک خود را مشخص نمائید',
        ];
    }
}
