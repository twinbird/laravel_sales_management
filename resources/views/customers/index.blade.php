@extends('layouts.app')

@section('title', '顧客情報の管理')

@section('content')
<div class="container">
	<h2>顧客情報の管理</h2>

	<div class="row float-right">
		<a class="btn btn-primary mb-2" href="{{ url('/customers/create') }}">新しい顧客を登録</a>
	</div>

	<div class="col-sm-5">
		<form class="form-inline" action="{{ route('customers.index') }}" method="GET">
			<div class="form-group">
				<input type="text" name="search_word" value="{{ $search_word }}" class="form-control form-control-sm" placeholder="検索ワードをここに入力">
			</div>
			<input type="submit" value="検索" class="btn btn-primary btn-sm">
		</form>
	</div>

	<table class="table table-sm">
		<tr>
			<th>顧客名</th>
			<th>住所</th>
			<th>TEL</th>
			<th>FAX</th>
			<th></th>
			<th></th>
		</tr>
		@foreach($customers as $customer)
		<tr>
			<td><a href="{{ route('customers.show', ['id' => $customer->id]) }}">{{ $customer->name }}</a></td>
			<td>{{ $customer->address1 }}</td>
			<td>{{ $customer->tel }}</td>
			<td>{{ $customer->fax }}</td>
			<td><a href="{{ route('customers.edit', ['id' => $customer->id]) }}" class="btn btn-info">編集</a></td>
			<td>
				<form method="POST" action="{{ route('customers.destroy', ['id' => $customer->id]) }}">
					@csrf
					@method('delete')
					<input type="submit" value="削除" onclick="return confirm('削除してよろしいですか?')" class="btn btn-danger" />
				</form>
			</td>
		</tr>
		@endforeach
	</table>

	{{ $customers->links() }}
</div>
@endsection
