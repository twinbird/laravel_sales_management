<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estimates | 見積管理システム</title>
    	<!-- Styles -->
    	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="jumbotron">
			<h1 class="display-4">Estimates</h1>
			<p class="lead">「見積出した?」はもう起きません</p>
			<hr class="my-4">
			<p>このアプリはサンプルです。まずは使ってみましょう。</p>
            <div class="content">
                <div class="links">
            		@if (Route::has('login'))
            		    @auth
            		    @else
            		        <a href="{{ route('login') }}" class="btn btn-success">ログイン</a>
            		        <a href="{{ route('register') }}" class="btn btn-primary">今すぐ登録</a>
            		    @endauth
            		@endif
                </div>
            </div>
        </div>
    </body>
</html>
