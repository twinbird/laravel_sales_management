@extends('layouts.app')

@section('content')
<div class="container">
	<h2>{{ $customer->name }}</h2>

	<dl>
		<dt>顧客名</dt>
		<dd>{{ $customer->name }}</dd>

		<dt>住所1</dt>
		<dd>{{ $customer->address1 }}</dd>

		<dt>住所2</dt>
		<dd>{{ $customer->address2 }}</dd>

		<dt>TEL</dt>
		<dd>{{ $customer->tel }}</dd>

		<dt>FAX</dt>
		<dd>{{ $customer->fax }}</dd>

		<dt>支払条件</dt>
		<dd>{{ $customer->payment_term }}</dd>
	</dl>
</div>
@endsection
