@extends('layouts.app')

@section('title', '見積の変更')

@section('content')
<div class="container">
	<h2>見積の変更</h2>

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

	<form method="POST" action="{{ route('estimates.update', ['id' => $estimate->id]) }}">
		@csrf
		@method('patch')
		@include('estimates._form')

		<input type="submit" class="btn btn-primary" value="更新">
	</form>
</div>
@endsection
