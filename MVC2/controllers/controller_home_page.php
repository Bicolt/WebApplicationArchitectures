<?php

/** @author Nicolas Benning
 * @example MVC
*/
class Controller_home_page {
	private $model;
	public function __construct($model, $action = null) {
		$this->model = $model;
		
		if ($action != null) {
			switch ($action) {
				case "PersonalIntroCLick" :
					$this->redirectToPersonalIntroPage ();
					break;
				case "PublicationsClick" :
					$this->redirectToPublicationsPage ();
					break;
				default :
					break;
			}
		}
	}
	public function redirectToPersonalIntroPage() {
	}
	public function redirectToPublicationsPage() {
	}
}