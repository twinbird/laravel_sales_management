@extends('layouts.app')

@section('content')
<div class="container">
	<h2>商品の管理</h2>

	<div class="row float-right">
		<a href="{{ route('products.create') }}" class="btn btn-primary mb-2">新しい商品の登録</a>
	</div>

	<table class="table">
		<tr>
			<th>商品名</th>
			<th>標準単価</th>
			<th></th>
			<th></th>
		</tr>
		@foreach($products as $product)
		<tr>
			<td>{{ $product->name }}</td>
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
