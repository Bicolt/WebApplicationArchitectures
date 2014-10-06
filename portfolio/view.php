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
		return "<p><a href='index.php?action=clicked'>" . $this->model->str . "</a></p>";
	}
}


?>