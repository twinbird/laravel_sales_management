@extends('layouts.app')

@section('content')
<div class="container">
	<h2>商品の管理</h2>

	<div class="row float-right">
		<a href="{{ route('products.create') }}" class="btn btn-primary mb-2">新しい商品の登録</a>
		<a href="{{ route('products.download_csv') }}" class="btn btn-info mb-2">CSV</a>
	</div>

	<div class="col-sm-5">
		<form class="form-inline" action="" method="GET">
			<div class="form-group">
				<input type="text" name="search_word" value="{{ $search_word }}" class="form-control form-control-sm" placeholder="検索ワードをここに入力">
			</div>
			<input type="submit" value="検索" class="btn btn-primary btn-sm">

			<fieldset class="form-group">
				<dl>
					<dt>標準単価</dt>
					<dd>
						<input type="number" name="search_min_standard_price" value="{{ $search_min_standard_price }}" class="form-control form-control-sm" placeholder="下限" step="0.001">
						～
						<input type="number" name="search_max_standard_price" value="{{ $search_max_standard_price }}" class="form-control form-control-sm" placeholder="上限" step="0.001">
					</dd>
				</dl>
			</fieldset>
		</form>
	</div>

	<table class="table table-sm">
		<tr>
			<th>商品名</th>
			<th>標準単価</th>
			<th></th>
			<th></th>
		</tr>
		@foreach($products as $product)
		<tr>
			<td><a href="{{ route('products.show', ['id' => $product->id]) }}">{{ $product->name }}</a></td>
			<td>{{ $product->standard_price }}</td>
			<td><a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-info">編集</a></td>
			<td>
				<form method="POST" action="{{ route('products.destroy', ['id' => $product->id]) }}">
					@csrf
					@method('delete')
					<input type="submit" value="削除" onClick="return confirm('削除してよろしいですか?')" class="btn btn-danger">
				</form>
			</td>
		</tr>
		@endforeach
	</table>

	{{ $products->links() }}

</div>
@endsection
