<html>
	@include('includes.head')
</head>
<body>
	<header> @include('includes.navigation') </header>
		<div class="container content">@yield('content')</div>
	<footer> @include('includes.footer') </footer>
</body>

<!-- ************** libs ***************** -->
{{HTML::script("assets/js/lib/jquery-2.0.3.js") }}
{{HTML::script("assets/js/lib/bootstrap.min.js") }}
{{HTML::script("assets/js/lib/jquery.bootstrap.wizard.js") }}
{{HTML::script("assets/js/lib/underscore.js") }}
{{HTML::script("assets/js/lib/backbone.js") }}

<!-- ************** exerciselist ***************** -->
{{HTML::script("assets/js/routers/router.js") }}
{{HTML::script("assets/js/models/exercise.js") }}
{{HTML::script("assets/js/collections/exercises.js") }}
{{HTML::script("assets/js/views/exercises.js") }}
{{HTML::script("assets/js/views/exercisesapp.js") }}
{{HTML::script("assets/js/exercisesapp.js") }}

<!-- ************** exercisetest ***************** -->
{{HTML::script("assets/js/models/exercisetest.js") }}
{{HTML::script("assets/js/models/task.js") }}
{{HTML::script("assets/js/views/testapp.js") }}
{{HTML::script("assets/js/views/testconfirmview.js") }}
{{HTML::script("assets/js/views/tensetestview.js") }}
{{HTML::script("assets/js/views/wizardview.js") }}
{{HTML::script("assets/js/testapp.js") }}

</html>