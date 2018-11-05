<div class="row">
	<div class="form-group col-md-6 row">
		<label for="title" class="col-sm-3 col-form-label">件名</label>
		<div class="col-sm-9">
			<input type="text" name="title" value="{{ old('title', $estimate->title) }}" id="title" class="form-control form-control-sm">
		</div>
	</div>
	<div class="form-group col-md-6 row">
		<label for="estimate_no" class="col-sm-3 col-form-label">見積番号</label>
		<div class="col-sm-9">
			<input type="text" name="estimate_no" value="{{ old('estimate_no', $estimate->estimate_no) }}" id="estimate_no" class="form-control form-control-sm" disabled>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6 row">
		<label for="customer_id" class="col-sm-3 col-form-label">顧客</label>
		<div class="col-sm-9">
			<select class="form-control form-control-sm" name="customer_id" id="customer_id">
				@foreach ($customers as $customer)
				<option value="{{ $customer->id }}">{{ $customer->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group col-md-6 row">
		<label for="issue_date" class="col-sm-3 col-form-label">発行日</label>
		<div class="col-sm-5">
			<input type="date" name="issue_date" value="{{ old('issue_date', $estimate->issue_date ? $estimate->issue_date->toDateString() : '') }}" id="issue_date" class="form-control form-control-sm">
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6 row">
		<label for="due_date" class="col-sm-3 col-form-label">納期</label>
		<div class="col-sm-5">
			<input type="date" name="due_date" value="{{ old('due_date', $estimate->due_date) }}" id="due_date" class="form-control form-control-sm">
		</div>
	</div>
	<div class="form-group col-md-6 row">
		<label for="payment_term" class="col-sm-3 col-form-label">支払条件</label>
		<div class="col-sm-9">
			<input type="text" name="payment_term" value="{{ old('payment_term', $estimate->payment_term) }}" id="payment_term" class="form-control form-control-sm">
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6 row">
		<label for="effective_date" class="col-sm-3 col-form-label">見積有効期限</label>
		<div class="col-sm-5">
			<input type="date" name="effective_date" value="{{ old('effective_date', $estimate->effective_date) }}" id="effective_date" class="form-control form-control-sm">
		</div>
	</div>
	<div class="form-group col-md-6 row">
		<div class="col-sm-4 btn-group-toggle row" data-toggle="buttons">
			<input type="hidden" name="submitted_flag" name="submitted_flag" value="0">
			<label for="submitted_flag" class="btn btn-outline-success @if(old('submitted_flag', $estimate->submitted_flag) == '1') active @endif"><input type="checkbox" name="submitted_flag" value="1" @if(old('submitted_flag', $estimate->submitted_flag) == '1') checked="checked" @endif id="submitted_flag">提出済み</label>
		</div>
	</div>
</div>

<table class="table table-sm">
	<thead>
		<tr class="row normal-weight-th-row">
			<th class="col-md-3">商品</th>
			<th class="col-md-3">商品名</th>
			<th class="col-md-1">数量</th>
			<th class="col-md-2">単価</th>
			<th class="col-md-2">金額</th>
			<th class="col-md-1"></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($estimate_details as $detail)
		<tr class="row">
			<td class="col-md-3 normal-weight-th">
				<!-- id -->
				<input type="hidden" name="details[{{ $detail->id }}][id]" id="details[{{ $detail->id }}][id]" value="{{ $detail->id }}">
				<!-- product_id -->
				<select name="details[{{ $detail->id }}][product_id]" id="product_id[{{ $detail->id }}][product_id]" class="form-control form-control-sm">
					<option></option>
					@foreach ($products as $product)
					<option value="{{ $product->id }}" {{ $detail->product_id === $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
					@endforeach
				</select>
			</td>
			<td class="col-md-3">
				<!-- product_name -->
				<input type="text"
						name="details[{{ $detail->id }}][product_name]"
						value="{{ old('details.' . $detail->id . '.product_name', $detail->product_name) }}"
						id="details[{{ $detail->id }}][product_name]"
						class="form-control form-control-sm">
			</td>
			<td class="col-md-1">
				<!-- quantity -->
				<input type="number"
						name="details[{{ $detail->id }}][quantity]"
						value="{{ old('details.' . $detail->id . '.quantity', $detail->quantity) }}"
						id="details[{{ $detail->id }}][quantity]"
						class="form-control form-control-sm">
			</td>
			<td class="col-md-2">
				<!-- unit_price -->
				<input type="number"
						name="details[{{ $detail->id }}][unit_price]"
						value="{{ old('details.' . $detail->id . '.unit_price', $detail->unit_price) }}"
						id="details[{{ $detail->id }}][unit_price]"
						class="form-control form-control-sm"
						step="0.001">
			</td>
			<td class="col-md-2">
				<!-- price -->
				<input type="number"
						name="details[{{ $detail->id }}][price]"
						value="{{ old('details.' . $detail->id . '.price', $detail->price) }}"
						id="details[{{ $detail->id }}][price]"
						class="form-control form-control-sm"
						step="0.001">
			</td>
			<td class="col-md-1">
				<!-- delete link -->
				<a class="btn btn-danger btn-sm">削除</a>
				<!-- delete flag -->
				<input type="hidden" name="details[{{ $detail->id }}][is_delete]" value="{{ old('details.' . $detail->id . '.is_delete') }}">
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="row">
	<label for="remarks">備考</label>
	<div class="form-group col-md-12">
		<textarea name="remarks" id="remarks" class="form-control" rows="5">{{ old('remarks', $estimate->remarks) }}</textarea>
	</div>
</div>
