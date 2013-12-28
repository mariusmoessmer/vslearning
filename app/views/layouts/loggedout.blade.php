<!DOCTYPE html>
<html>
<head>
	@include("includes.head")
</head>
<body>
	<header> @include('includes.navigation') </header>
		<div class="container">@yield('content')</div>
	<footer> @include('includes.footer') </footer>
</body>

</html>