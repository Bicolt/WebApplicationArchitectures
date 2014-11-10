<form id='insertNewMessage' class="form-horizontal" role="form"
	method='get' action='index.php'>

	<input id='action' type='hidden' name='action' value='insertNewMessageFromInteractiveForm' />

	<div class="control-group">
		<label for='fAuthorEmail' class="control-label">Email</label>
		<div class="controls">
			<input id='fAuthorEmail' type='email' name='fAuthorEmail'
				maxlength='50' required placeholder="Enter email"
				class="form-control" />
		</div>
	</div>
	<div class="control-group">
		<label for='fMessageTitle' class="col-sm-2 control-label"> Title </label>
		<div class="controls">
			<input id='fMessageTitle' type='text' name='fMessageTitle'
				maxlength='100' required placeholder="Enter title"
				class="form-control" />
		</div>
	</div>
	<div class="control-group">
		<label for='fMessageContent' class="col-sm-2 control-label"> Content
		</label>
		<div class="controls">
			<textarea rows='2' id='fMessageContent' name='fMessageContent'
				maxlength='1000' required placeholder="Enter content"
				class="form-control" cols=""> </textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>
