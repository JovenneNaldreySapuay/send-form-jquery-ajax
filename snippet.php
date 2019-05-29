<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Send Form using jQuery AJAX</title>
</head>
<body>
	
<div class="form-snippet" style="text-align: center;">
	<div id="form-response">
		<img src="subscribed.png" alt="Icon" style="display: none;" id="icon-subscribe" width="100">
		<div id="response_text__success" style="color: #444; text-align: center;"></div>
		<div id="response_text__error"></div>
	</div>

	<form id="form-snippet-1" action="process.php" method="POST">
		<input type="email" name="email" placeholder="Email Address" id="email">

		<button type="submit" id="submitBtn" title="Get Free Sample" value="Get Free Sample" name="submit">GET FREE SAMPLE</button>
	</form>	
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<script>
$("#submitBtn").on("click", formSnippet);

function formSnippet(e) {
	e.preventDefault();
	var $form = $("#form-snippet-1");
	var $formData = $form.serialize();
	
	$.ajax({
		type: $form.attr('method'), 
		url:  $form.attr('action'), 
		data: $formData, 
		dataType: 'json', 
	}).done(function(data) {
		if ( data.success ) {
			$("#icon-subscribe").css({display:"block",margin:"0 auto"});
			$("#response_text__success").html("<h1>"+data.message+"</h1><h2>Your sample issue is on the way!</h2>");
			$("#form-snippet-1,#response_text__error").css("display","none");
		} else {	
			$("#response_text__error").html("<p style='color:red;'>"+data.errors.email +"</p>");
		}
	}).fail(function(err) {
		console.log(err);
	});
}
</script>

</body>
</html>

