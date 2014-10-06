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
		$motto = $this->model->motto;
		$personnalIntro_box = $this->model->personnalIntro;
		$publications_box = $this->model->publications;
		include_once($this->model->template);
	}
}


?>