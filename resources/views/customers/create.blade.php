@extends('layouts.app')

@section('content')
<div class="container">

	<h2>新しい顧客の登録</h2>
	
	<form>
		@include('customers._form')
		<input type="submit" class="btn btn-primary" value="登録">
	</form>
</div>
@endsection
