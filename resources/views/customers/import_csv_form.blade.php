@extends('layouts.app')

@section('title', 'CSVからのインポート')

@section('content')
<div class="container">
	<h2>CSVからのインポート</h2>

	<!-- エラーメッセージ -->
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			@if (Session::has('error_message'))
				{{ session('error_message') }}
			@endif
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<p>CSVファイルを指定してください。</p>
	<p>CSVの形式は「顧客名,住所1,住所2,TEL,FAX,支払条件」です。</p>

	<form action="{{ route('customers.import_csv') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="file" name="csv_file" accept="text/csv">
		<input type="submit" value="インポート" class="btn btn-sm btn-success">
	</form>
</div>
@endsection
