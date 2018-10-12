@extends('layouts.app')

@section('content')
<div class="container">
	<h2>商品情報の編集</h2>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<form method="POST" action="{{ route('products.update', $product->id) }}">
		@csrf
		@method('patch')
		@include('products._form')

		<input type="submit" class="btn btn-primary" value="更新">
	</form>
</div>
@endsection
