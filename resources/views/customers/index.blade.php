@extends('layouts.app')

@section('content')
<div class="container">
	<h2>顧客情報の管理</h2>

	<a class="btn btn-primary float-right" href="{{ url('/customers/create') }}">新しい顧客を登録</a>

	<table class="table">
		<tr>
			<th>顧客名</th>
			<th>住所</th>
			<th>TEL</th>
			<th>FAX</th>
		</tr>
		@foreach($customers as $customer)
		<tr>
			<td>{{ $customer->name }}</td>
			<td>{{ $customer->address1 }}</td>
			<td>{{ $customer->tel }}</td>
			<td>{{ $customer->fax }}</td>
		</tr>
		@endforeach
	</table>

	{{ $customers->links() }}
</div>
@endsection
