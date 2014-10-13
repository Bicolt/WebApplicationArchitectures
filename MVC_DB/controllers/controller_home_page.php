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
				case "PersonnalIntroClick" :
					$this->redirectToPersonnalIntroPage ();
					break;
				case "PublicationsClick" :
					$this->redirectToPublicationsPage ();
					break;
				default :
					break;
			}
		}
	}
	
	public function redirectToPersonnalIntroPage() {
		header("location: index.php?page=personnal_intro");
	}
	
	public function redirectToPublicationsPage() {
		header("location: index.php?page=publications");
	}
}