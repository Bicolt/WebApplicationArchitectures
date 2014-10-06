<?php

/** @author Nicolas Benning
 * @example MVC
*/
class Controller {
	private $model;
	public function __construct($model, $action = null) {
		$this->model = $model;
		
		if ($action != null) {
			switch ($action) {
				case "HomePageClick" :
					$this->redirectToHomePage ();
					break;
				default :
					break;
			}
		}
	}
	
	public function redirectToHomePage() {
		header("location: index.php?page=home_page");
	}
	
}