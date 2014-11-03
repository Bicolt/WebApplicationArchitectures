<?php
/** @author Nicolas Benning
	 * definition of a View - DAO example
	 */
class View {
	private $model;
	private $controller;
	public function __construct($controller, $model) {
		$this->controller = $controller;
		$this->model = $model;
	}
	public function output() {
		$messageList = $this->model->messageList;
		$errorMessageSimpleForm = $this->model->errorMessageSimpleForm;
		$errorMessageInteractiveForm = $this->model->errorMessageInteractiveForm;
		$appTitle = $this->model->appTitle;
		
		// load the template file
		include_once ($this->model->template);
	}
}
?>