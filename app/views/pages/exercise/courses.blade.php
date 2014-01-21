@extends("layouts.master") 
@section("content")

<table class="datatable" id="courses-table">
<thead>
	<tr>
		<th><a href="{{URL::to("times")}}">Zeiten</a></th>
		<th><a href="{{URL::to("konjugations")}}">Abwandlungen</a></th>
		<th><a href="{{URL::to("comparisons")}}">Vergleiche</a></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><a href="{{URL::to("times/latest")}}">Neueste</a></td>
		<td><a href="{{URL::to("konjugations/latest")}}">Neueste</a></td>
		<td><a href="{{URL::to("comparisons/latest")}}">Neueste</a></td>
	</tr>
	<tr>
		<td><a href="{{URL::to("times/wrong")}}">Falsch Beantwortete</a></td>
		<td><a href="{{URL::to("konjugations/wrong")}}">Falsch Beantwortete</a></td>
		<td><a href="{{URL::to("comparisons/wrong")}}">Falsch Beantwortete</a></td>
	</tr>

	@if(isset($exercises)) 
	@for ($i = 0; $i < $longest; $i++)
	<tr>
		<td>
			@if(isset($exercises[0][$i])) 
				<a href="{{URL::to("times/latest")}}">{{$exercises[0][$i]->name}}</a>
			@else
				 - 
			@endif
		</td>
		<td>
			@if(isset($exercises[1][$i])) 
				<a href="{{URL::to("times/latest")}}">{{$exercises[1][$i]->name}}</a>
			@else
				- 
			@endif
		</td>
		<td>
			@if(isset($exercises[2][$i])) 
				<a href="{{URL::to("times/latest")}}">{{$exercises[2][$i]->name}}</a>
			@else 
				- 
			@endif
		</td>
	</tr>
	@endfor @endif
</tbody>
</table>


@stop
