<?php

/** @author Nicolas Benning
 */
class Controller {
	private $model;
	public function __construct($model, $action = null, $parameters) {
		$this->model = $model;
		if ($action != null) {
			switch ($action) {
				case " insertNewMessageFromSimpleForm " :
					$this - insertNewMessageParameters ( $parameters, MESSAGE_FORM_SIMPLE );
					break;
				case " insertNewMessageFromInteractiveForm " :
					$this - insertNewMessageParameters ( $parameters, MESSAGE_FORM_INTERACTIVE );
					break;
				default :
			}
		}
		$this->model->prepareMessagesList ();
	}
	/**
	 *
	 * @param : $parameters
	 *        	- array containing the parameters to be validated
	 */
	public function insertNewMessageParameters($parameters, $formType) {
		$authorEmail = $parameters [" fAuthorEmail "];
		$title = $parameters [" fMessageTitle "];
		$content = $parameters [" fMessageContent "];
		$areParsValid = $this->model->areMessageFormParametersValid ( $authorEmail, $title, $content );
		if ($areParsValid)
			$this->insertNewMessage ( $authorEmail, $title, $content );
		else
			$this->model->setUpErrorMessage ( $formType );
	}
}

?>