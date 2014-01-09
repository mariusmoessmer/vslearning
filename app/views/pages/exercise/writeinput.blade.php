@extends("layouts.master") 
@section("content")

<h2>{{ $title or ""}}</h2>
<?php foreach($words as $word):?>
<!-- TODO: show little icon/mark for solved ones -->

@if($word->solved)
	<div class="word row" style="border-color:green">
@else
	<div class="word row">
@endif

<h3>{{$word->word}}</h3>
	<button class="expander">Expand</button>
	<div class="word-expander" style="display: none">
		<form action="{{URL::to("/comparisons/$word->id/check")}}"> 
			<input type="hidden" style="display: none" value="{{$word->id}}" name="id" /> 
			<label for="comperativ">Comperativ</label>
			<input name="comperativ" type="text" id="comperativ"><br> 
			<label	for="superlative">superlative</label> <input name="superlative"	type="text" id="superlative"><br>
			<button type="button" class="btn btn-default" onclick="checkAnswer(this.form);return false;">Check</button>
		</form>
	</div>
</div>
<?php endforeach;?>

<script type="text/javascript">

function checkAnswer(form){
	$.ajax({
		  type: "POST",
		  url: $(form).attr("action"),
		  data: $(form).serializeArray(),
		  success: function(response) {
				  
		    	if(response.success === true){
					$(form).closest(".word-expander").toggle();
					$(form).closest(".row").css("border-color","green");
		    	}else{
					$(form).closest(".row").css("border-color","red");
				}
		    },
		    error: function(jqXHR, textStatus, errorThrown) {
				$(form).closest(".row").css("border-color","red");
		        console.log(textStatus); 
		    },
		});
}

$(document).ready(function() {
	$(".expander").click(function(){
		$(this).next(".word-expander").toggle();
	});
});
</script>

@stop
