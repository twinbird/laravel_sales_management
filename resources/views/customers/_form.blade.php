		<div class="form-group">
			<label for="name">顧客名:</label>
			<input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="株式会社Laravel" value="{{ old('name', $customer->name) }}">
		</div>
		<div class="form-group">
			<label for="address1">住所1:</label>
			<input type="text" class="form-control form-control-sm" id="address1" name="address1" placeholder="東京都xxx" value="{{ old('address1', $customer->address1) }}">
		</div>
		<div class="form-group">
			<label for="address2">住所2:</label>
			<input type="text" class="form-control form-control-sm" id="address2" name="address2" placeholder="yyyビル2F" value="{{ old('address2', $customer->address2) }}">
		</div>
		<div class="form-group">
			<label for="tel">TEL:</label>
			<input type="phone" class="form-control form-control-sm" id="tel" name="tel" placeholder="03-0000-0000" value="{{ old('tel', $customer->tel) }}">
		</div>
		<div class="form-group">
			<label for="fax">FAX:</label>
			<input type="phone" class="form-control form-control-sm" id="fax" name="fax" placeholder="03-0000-0000" value="{{ old('fax', $customer->fax) }}">
		</div>
		<div class="form-group">
			<label for="payment_term">支払条件:</label>
			<input type="text" class="form-control form-control-sm" id="payment_term" name="payment_term" placeholder="月末締め翌々月10日払い" value="{{ old('payment_term', $customer->payment_term) }}">
		</div>

