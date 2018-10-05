@extends('layouts.app')

@section('content')
<div class="container">
	<h2>顧客情報の管理</h2>

	<a class="btn btn-primary float-right" href="{{ url('/customers/create') }}">新しい顧客を登録</a>

	<table class="table">
	</table>
</div>
@endsection
