@extends('layouts.app')

@section('content')
<div class="container">

	<h2>顧客情報の変更</h2>
	
	<form>
		@include('customers._form')
		<input type="submit" class="btn btn-primary" value="更新">
	</form>
</div>
