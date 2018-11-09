@extends('layouts.app')

@section('title', '')

@section('content')
<div class="container">
	<div class="row">
		<input type="button" id="print-btn" class="btn btn-sm btn-success" value="印刷">
	</div>

	<div class="row-mt-1"></div>

	<div class="row">
		<iframe id="estimate-report-frame" src="{{ route('estimates.report', ['id' => $id]) }}">
		</iframe>
	</div>
</div>
@endsection
