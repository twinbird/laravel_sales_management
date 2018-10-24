		<div class="form-group">
			<label for="name">商品名:</label>
			<input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="商品A" value="{{ old('name', $product->name) }}">
		</div>

		<div class="form-group">
			<label for="standard_price">標準単価</label>
			<input type="number" class="form-control form-control-sm" id="standard_price" name="standard_price" value="{{ old('standard_price', $product->standard_price) }}">
		</div>
