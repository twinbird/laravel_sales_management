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
		<div class="col-sm-9">
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
		<div class="col-sm-4 btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-outline-secondary"><input type="checkbox">納期別途相談</label>
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
