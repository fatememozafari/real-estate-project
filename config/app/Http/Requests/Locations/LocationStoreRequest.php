<?php

namespace App\Http\Requests\Locations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationStoreRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'type' => ['required', 'string'],
//           'purchase_price'=> ['numeric','require_if:contract,for_sale'],
//           'mortgage'=> ['numeric','require_if:contract,for_rent'],
//           'rent'=> ['numeric','require_if:contract,for_rent'],
            'contract' => ['required', 'string'],
            'address' => ['required', 'string'],
            'status' => ['required', Rule::in(['active','in-active'])],

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'وارد کردن عنوان الزامی است',
            'type.required' => 'وارد کردن نوع ملک الزامی است',
            'purchase_price.numeric' => 'مقدار عددی وارد کنید',
            'mortgage.numeric' => 'مقدار عددی وارد کنید',
            'rent.numeric' => 'مقدار عددی وارد کنید',
            'contract.required' => 'وارد کردن نوع تقاضا الزامی است',
            'address.required' => 'وارد کردن آدرس الزامی است',
            'status.required' => 'انتخاب وضعیت الزامی است',

        ];
    }
}
