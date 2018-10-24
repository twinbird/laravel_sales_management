<div class="row">
	<div class="form-group col-md-6 row">
		<label for="title" class="col-sm-3 col-form-label">件名</label>
		<div class="col-sm-9">
			<input type="text" id="title" class="form-control form-control-sm">
		</div>
	</div>
	<div class="form-group col-md-6 row">
		<label for="estimate_no" class="col-sm-3 col-form-label">見積番号</label>
		<div class="col-sm-9">
			<input type="text" id="estimate_no" class="form-control form-control-sm" disabled>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6 row">
		<label for="customer_id" class="col-sm-3 col-form-label">顧客</label>
		<div class="col-sm-9">
			<select class="form-control form-control-sm">
				<option></option>
			</select>
		</div>
	</div>
	<div class="form-group col-md-6 row">
		<label for="issue_date" class="col-sm-3 col-form-label">発行日</label>
		<div class="col-sm-5">
			<input type="date" id="issue_date" class="form-control form-control-sm">
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6 row">
		<label for="due_date" class="col-sm-3 col-form-label">納期</label>
		<div class="col-sm-5">
			<input type="date" id="due_date" class="form-control form-control-sm">
		</div>
	</div>
	<div class="form-group col-md-6 row">
		<label for="payment_term" class="col-sm-3 col-form-label">支払条件</label>
		<div class="col-sm-9">
			<input type="text" id="payment_term" class="form-control form-control-sm">
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6 row">
		<label for="effective_date" class="col-sm-3 col-form-label">見積有効期限</label>
		<div class="col-sm-5">
			<input type="date" id="effective_date" class="form-control form-control-sm">
		</div>
	</div>
	<div class="form-group col-md-6 row">
		<div class="col-sm-4 btn-group-toggle row" data-toggle="buttons">
			<label class="btn btn-outline-success"><input type="checkbox">提出済み</label>
		</div>
	</div>
</div>

<table class="table table-sm">
	<tr class="row normal-weight-th-row">
		<th class="col-md-3">商品</th>
		<th class="col-md-3">商品名</th>
		<th class="col-md-1">数量</th>
		<th class="col-md-2">単価</th>
		<th class="col-md-2">金額</th>
		<th class="col-md-1"></th>
	</tr>
	<tr class="row">
		<td class="col-md-3 normal-weight-th">
			<select class="form-control form-control-sm">
				<option></option>
			</select>
		</td>
		<td class="col-md-3"><input type="text" class="form-control form-control-sm"></td>
		<td class="col-md-1"><input type="number" class="form-control form-control-sm"></td>
		<td class="col-md-2"><input type="number" class="form-control form-control-sm" step="0.001"></td>
		<td class="col-md-2"><input type="number" class="form-control form-control-sm" step="0.001"></td>
		<td class="col-md-1"><a class="btn btn-danger btn-sm">削除</a></td>
	</tr>
</table>

<div class="row">
	<label for="remarks">備考</label>
	<div class="form-group col-md-12">
		<textarea id="remarks" class="form-control" rows="5"></textarea>
	</div>
</div>
