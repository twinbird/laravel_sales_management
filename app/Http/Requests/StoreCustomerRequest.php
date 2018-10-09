<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
			'name' => 'required|max:80',
			'address1' => 'max:80',
			'address2' => 'max:80',
			'tel' => 'max:13',
			'fax' => 'max:13',
			'payment_term' => 'required|max:30',
        ];
    }

	public function messages() {
		return [
			'name.required' => '顧客名は必ず入力してください',
			'name.max' => '顧客名は80文字以内で入力してください',
			'address1.max' => '住所1は80文字以内で入力してください',
			'address2.max' => '住所2は80文字以内で入力してください',
			'tel.max' => 'TELは13文字以内で入力してください',
			'fax.max' => 'FAXは13文字以内で入力してください',
			'payment_term.required' => '支払条件は必ず入力してください',
			'payment_term.max' => '支払条件は30文字以内で入力してください',
		];
	}
}
