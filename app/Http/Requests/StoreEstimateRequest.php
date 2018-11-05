<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstimateRequest extends FormRequest
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
			'title' => 'required|max:80',
			'issue_date' => 'required|date',
			'due_date' => 'nullable|date',
			'effective_date' => 'required|date',
			'payment_term' => 'required|max:80',
			'customer_id' => 'required',
			'submitted_flag' => 'required',
			'details.*.product_name' => 'required|max:100',
			'details.*.quantity' => 'required|numeric|min:1|max:99999',
			'details.*.unit_price' => 'required|numeric|min:-99999|max:99999',
			'details.*.price' => 'required|numeric|min:-99999|max:99999',
        ];
    }

	/**
	 * エラーメッセージ
	 *
	 * @var array
	 **/
	public function messages()
	{
		return [
			'title.required' => '件名は必ず入力してください',
			'title.max' => '件名は80文字以内で入力してください',
			'issue_date.required' => '発行日は必ず入力してください',
			'issue_date.date' => '発行日は日付で入力してください',
			'due_date.date' => '納期は日付で入力してください',
			'effective_date.required' => '見積有効期限は必ず入力してください',
			'effective_date.date' => '見積有効期限は日付で入力してください',
			'payment_term.required' => '支払条件は必ず入力してください',
			'payment_term.max' => '支払条件は80文字以内で入力してください',
			'customer_id.required' => '顧客は必ず入力してください',
			'submitted_flag.required' => '提出済みかどうかは必ず選択してください',
			'details.*.product_name.required' => '商品名は必ず入力してください',
			'details.*.product_name.max' => '商品名は100文字以内で入力してください',
			'details.*.quantity.required' => '数量は必ず入力してください',
			'details.*.quantity.min' => '数量は1以上で入力してください',
			'details.*.quantity.max' => '数量は99999以内で入力してください',
			'details.*.quantity.numeric' => '数量は数値で入力してください',
			'details.*.unit_price.required' => '単価は必ず入力してください',
			'details.*.unit_price.min' => '単価は-99999以上で入力してください',
			'details.*.unit_price.max' => '単価は99999以内で入力してください',
			'details.*.unit_price.numeric' => '単価は数値で入力してください',
			'details.*.price.required' => '金額は必ず入力してください',
			'details.*.price.min' => '金額は-99999以上で入力してください',
			'details.*.price.max' => '金額は99999以内で入力してください',
			'details.*.price.numeric' => '金額は数値で入力してください',
		];
	}
}
