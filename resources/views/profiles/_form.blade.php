<div class="form-group">
	<label for="company_name">会社名</label>
	<input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $profile->company_name) }}">
</div>

<div class="form-group">
	<label for="postal_code">郵便番号</label>
	<input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $profile->postal_code) }}">
</div>

<div class="form-group">
	<label for="address1">住所1</label>
	<input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1', $profile->address1) }}">
</div>

<div class="form-group">
	<label for="address2">住所2</label>
	<input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2', $profile->address2) }}">
</div>

<div class="form-group">
	<label for="tel">TEL</label>
	<input type="phone" class="form-control" id="tel" name="tel" value="{{ old('tel', $profile->tel) }}">
</div>

<div class="form-group">
	<label for="fax">FAX</label>
	<input type="phone" class="form-control" id="fax" name="fax" value="{{ old('fax', $profile->fax) }}">
</div>

