<?php

/** @author Nicolas Benning
 * @example MVC
 */

class view {
	
	private $controller;
	private $model;

	public function __construct($controller, $model) {
		$this->controller = $controller;
		$this->model = $model;
	}
	
	public function output() {
		$data = "<p>" . $this->model->str . "</p>";
		include_once($this->model->template);
	}
}


?>