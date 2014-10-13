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
		$publications_box = "";
		
		foreach ($this->model->publications as $value) {
			$publications_box .= "<li>" . $value['authors'] . ", <em>" . $value['title'] . "</em> ("  . $value['conference'] . ")</li>";
		}
		$publications_box = "<ul>" . $publications_box . "</ul>";
		
		include_once('templates/template_publications.php');
	}
}


?>