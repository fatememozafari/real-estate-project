<?php

namespace App\Http\Requests\Staffs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffStoreRequest extends FormRequest
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
            'real_estate_id' => ['required'],
            'user_id' => ['required'],
            'status' => ['required', Rule::in(['active','in-active'])],
        ];
    }

    public function messages()
    {
        return [
            'real_estate_id.required' => 'وارد کردن نام املاک الزامی است',
            'user_id.required' => 'انتخاب نام کارمند الزامی است',
            'status.required' => 'انتخاب وضعیت الزامی است',

        ];
    }
}
