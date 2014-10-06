<?php

/** @author Nicolas Benning
 * @example MVC
 */

class View {
	
	private $controller;
	private $model;

	public function __construct($controller, $model) {
		$this->controller = $controller;
		$this->model = $model;
	}
	
	public function output() {
		$personnalIntro = $this->model->personnalIntro;
		include_once($this->model->template);
	}
}


?>