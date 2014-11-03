<?php

/** @author Nicolas Benning
 */
include_once './conf/config.inc.php';
include_once './db/DAO_factory.php';
include_once 'validation_functions.php';

class Model {
	
	private $DAO_Factory, $messagesDAO, $validation;
	
	public $appTitle, $template, $messageList, $errorMessageSimpleForm, $errorMessageInteractiveForm;
	
	public function __construct() {
		$this->DAO_Factory = new DAO_Factory ();
		$this->DAO_Factory->initDBResources ();
		$this->messagesDAO = $this->DAO_Factory->getMessagesDAO ();
		$this->template = "./templates/template_board.php";
		$this->validation = new validation_functions();
		$this->appTitle = APP_NAME;
	}
	
	public function prepareMessagesList() {
		$results = $this->messagesDAO->getMessages();
		$this->messageList = "";
		foreach ( $results as $row )
			$this->messageList .= "<li > <strong >" . $row["author"] . ": </ strong >" . $row ["title"] . "<blockquote >" . $row ["content"] . " </ blockquote > </li >";
		$this->messageList = "<ul >" . $this->messageList . " </ul >";
	}
	
	public function areMessageFormParametersValid($email, $title, $content) {
		if (empty ( $email ) || empty ( $title ) || empty ( $content ))
			return (false);
		
		if ($this->validation->isEmailValid ( $email ) && $this->validation->isLengthStringValid ( $title, MESSAGE_FORM_MAX_TITLE_LENGTH ) && $this->validation->isLengthStringValid ( $content, MESSAGE_FORM_MAX_CONTENT_LENGTH ))
			return (true);
		return (false);
	}
	
	public function insertNewMessage($email, $title, $content) {
		// this function assumes parameters have been validated
		$this->messagesDAO->insertNewMessage ( $email, $title, $content );
	}
	
	public function setUpErrorMessage($formType) {
		$errorDiv = "<div class = 'alert alert - error'>" . MESSAGE_FORM_ERRORS_STR . " </div >";
		if ($formType == MESSAGE_FORM_SIMPLE)
			$this->errorMessageSimpleForm = $errorDiv;
		else if ($formType == MESSAGE_FORM_INTERACTIVE)
			$this->errorMessageInteractiveForm = $errorDiv;
	}
	
	public function __destruct() {
		$this->DAO_Factory->clearDBResources();
	}
}

?>