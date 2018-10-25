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
		];
	}
}
