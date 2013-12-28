<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('home') }}">Lernsystem</a>
			<ul class="nav navbar-nav">
			<?php if(Auth::user()):?>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="{{ URL::to("courses") }}">Learning</a></li>
					</ul>
				</div>			
			<?php endif;?>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
			<?php if(Auth::user()):?>
				<li>{{ link_to(route('logout'),
					'Abmelden('.Auth::user()->username.')') }}</li>
			<?php endif;?>
			</ul>
		</div>
	</div>
</nav>