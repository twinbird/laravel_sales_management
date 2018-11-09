@extends('layouts.app')

@section('title', '見積の管理')

@section('content')
<div class="container">
	<h2>見積の管理</h2>

	<div class="row float-right">
		<a href="{{ route('estimates.create') }}" class="btn btn-primary mb-2 btn-sm">新しい見積の作成</a>
	</div>

	<div class="col-sm-5">
		<form class="form-inline" action="{{ route('estimates.index') }}" method="GET">
			<div class="form-group">
				<input type="text" name="search_word" value="{{ $search_word }}" class="form-control form-control-sm" placeholder="検索ワードをここに入力">
			</div>
			<input type="submit" value="検索" class="btn btn-primary btn-sm">
		</form>
	</div>

	<table class="table table-sm">
		<tr>
			<th>顧客名</th>
			<th>件名</th>
			<th>金額</th>
			<th>作成日</th>
			<th></th>
			<th></th>
		</tr>
		@foreach($estimates as $estimate)
		<tr>
			<td><a href="{{ route('customers.show', ['id' => $estimate->customer->id]) }}">{{ $estimate->customer_name }}</a></td>
			<td><a href="{{ route('estimates.show', ['id' => $estimate->id]) }}">{{ $estimate->title }}</a></td>
			<td>{{ $estimate->total_price }}</td>
			<td>{{ $estimate->issue_date->format('Y/m/d') }}</td>
			<td><a href="{{ route('estimates.edit', ['id' => $estimate->id]) }}" class="btn btn-info btn-sm">編集</a></td>
			<td>
				<form method="POST" action="{{ route('estimates.destroy', ['id' => $estimate->id]) }}">
					@csrf
					@method('delete')
					<input type="submit" value="削除" onClick="return confirm('削除してよろしいですか?')" class="btn btn-danger btn-sm">
				</form>
			</td>
		</tr>
		@endforeach
	</table>

	{{ $estimates->links() }}

</div>
@endsection
