@extends('layouts.app')

@section('content')
<div class="container">
	<h2>ユーザ設定</h2>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<form method="POST" action="{{ route('profiles.update', $profile->id) }}">
		@csrf
		@method('patch')
		@include('profiles._form')

		<input type="submit" class="btn btn-primary" value="更新">
	</form>
</div>
@endsection

