@extends('layouts.app')

@section('content')
<div class="container">
	<h2>商品の登録</h2>

	<!-- エラーメッセージ -->
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif
	
	<form method="POST" action="{{ route('products.store') }}">
		@csrf
		@include('products._form')

		<input type="submit" class="btn btn-primary" value="登録">
	</form>
</div>
@endsection
