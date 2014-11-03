<form id='insertNewMessage' method='get' action='index.php'>
	<input id='action' type='hidden' name='action' value='insertNewMessageFromSimpleForm'/> 
	<label for='fAuthorEmail'>Email</label>
	<input id=' fAuthorEmail' type='text' name=' fAuthorEmail' /> 
	<label for='fMessageTitle'>Title</label> 
	<input id=' fMessageTitle' type='text' name='fMessageTitle' />
	<label for=' fMessageContent'>Content</label>
	<textarea rows='2' id='fMessageContent' type='text' name='fMessageContent' cols=""></textarea>

	<div class="form-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>
