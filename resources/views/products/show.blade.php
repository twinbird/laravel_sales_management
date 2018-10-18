@extends('layouts.app')

@section('content')
<div class="container">
	<h2>{{ $product->name }}</h2>

	<dl>
		<dt>商品名</dt>
		<dd>{{ $product->name }}</dd>
		<dt>標準単価</dt>
		<dd>{{ $product->standard_price }}</dd>
	</dl>
</div>
@endsection
