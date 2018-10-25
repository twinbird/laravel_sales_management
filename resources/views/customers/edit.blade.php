@extends('layouts.app')

@section('title', '顧客情報の変更')

@section('content')
<div class="container">

	<h2>顧客情報の変更</h2>
	
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
	
	<form method="POST" action="{{ route('customers.update', $customer->id) }}">
		@csrf
		@method('patch')
		@include('customers._form')

		<input type="submit" class="btn btn-primary" value="更新">
	</form>
</div>
@endsection
