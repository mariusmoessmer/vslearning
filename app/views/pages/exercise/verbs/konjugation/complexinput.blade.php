@extends("layouts.master") 
@section("content")

<h2>{{ $title or ""}}</h2>
<?php foreach($words as $word):?>

<div class="word row">

	<h3>{{$word->word}}</h3>
	<button class="expander">Expand</button>
	<div class="word-expander" style="display: none">
		<form action="{{URL::to("/konjugations/$word->id/check")}}"> 
		<input type="hidden" style="display: none" value="{{$word->id}}" name="id" /> 
		
		<label for="ich">Ich</label>
		<input name="ich" type="text" id="ich"><br> 
		
		<label for="comperativ">Du</label>
		<input name="du" type="text" id="ich"><br> 
		
		<label for="comperativ">Er/Sie?es</label>
		<input name="er" type="text" id="ich"><br> 
		
		<label for="comperativ">Wir</label>
		<input name="wir" type="text" id="ich"><br> 
		
		<label for="comperativ">Ihr</label>
		<input name="ihr" type="text" id="ich"><br> 
		
		<label for="comperativ">Sie</label>
		<input name="sie" type="text" id="ich"><br> 
		
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