<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
			'standard_price' => 'required|min:0|max:9999999999.999',
        ];
    }

	public function messages() {
		return [
			'name.required' => '商品名は必ず入力してください',
			'name.max' => '商品名は80文字以内で入力してください',
			'standard_price.required' => '標準単価は必ず入力してください',
			'standard_price.min' => '標準単価は0以上で入力してください',
			'standard_price.max' => '標準単価は9999999999.999以内で入力してください',
		];
	}

}
