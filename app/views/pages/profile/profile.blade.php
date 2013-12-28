@extends('layouts.master') 
@section('content')
<section id="profile">
	<h1 class="page-header">Meine &Uuml;bungen</h1>
	<div class="main-content">
		<div class="col-md-2 sidebar">
			<label for="username">Benutzername</label>
			<p class="username" id="username">{{Auth::user()['username']}}</p>
		</div>
		<div class="col-md-10 content-container">
			<div class="container">
				<?php if(isset($exercises)):?>
	
		<table class="datatable" id="previouse-exercices">
					<thead>
						<tr>
							<th>#</th>
							<th>&Uuml;bung</th>
							<th>Fortschritt</th>
						</tr>
					</thead>
					<tbody>
			<?php $i = 1; foreach($exercises as $exercise):?>
			<tr>
							<td>{{ $i }}</td>
							<td>{{$exercise->name }}</td>
							<td>{{$exercise->name }}</td>
						</tr>
			
			<?php $i++; endforeach;?>
			</tbody>
		</table>
		<?php endif; ?>
	</div>
		</div>
	</div>

</section>
@stop
