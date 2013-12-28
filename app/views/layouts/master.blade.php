<!DOCTYPE html>
<html>
	@include('includes.head')
</head>
<body>
	<header> @include('includes.navigation') </header>
		<div class="container content">@yield('content')</div>
	<footer> @include('includes.footer') </footer>
</body>
</html>

<!-- 
<body>
	@if(Session::has('flash_notice'))
	<div id="flash_notice" class="alert alert-warning">{{
		Session::get('flash_notice') }}</div>
	@endif
<html>
<head>-->