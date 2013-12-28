@extends("layouts.master") 
@section("content") 
<br>
<p>In dieser Kategorie gibt es {{ $count }} Woerte.</p>
<br>
Du hast bereits ... davon probiert,
<br>
<a href="{{URL::to("/comparisons/latest") }}"><button class="btn btn-default">Die neuesten Woerter</button></a>
<br>
<br>
<a href="{{URL::to("/comparisons/wrong") }}"><button class="btn btn-default">Die falsch beantworteten Woerter</button></a>

@stop
