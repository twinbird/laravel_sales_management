<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
			'company_name' => 'required|max:100',
			'postal_code' => 'max:8',
			'address1' => 'max:80',
			'address2' => 'max:80',
			'tel' => 'max:13',
			'fax' => 'max:13',
        ];
    }

	public function messages()
	{
		return [
			'company_name.required' => '会社名は必ず入力してください',
			'company_name.max' => '会社名は100文字までで入力してください',
			'postalcode.max' => '郵便番号はハイフン付き8文字で入力してください',
			'address1.max' => '住所1は80文字以内で入力してください',
			'address2.max' => '住所2は80文字以内で入力してください',
			'tel.max' => 'TELは13文字以内で入力してください',
			'fax.max' => 'FAXは13文字以内で入力してください',
		];
	}

}
