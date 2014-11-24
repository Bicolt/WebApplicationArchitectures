<?php

/** @author Nicolas Benning
 * @example MVC
*/
class Controller {
	private $model;
	public function __construct($model, $action = NULL, $param = NULL) {
		$this->model = $model;
		
		if ($action != NULL) {
			switch ($action) {
				case "getAllPublications" :
					$this->model->getPublicationsArray ();
					break;
				case "getPublication" :
					$this->model->getPublicationById($param);
					break;
				case "getSearch" :
					break;
				case "post" :
					break;
				case "put" :
					break;
				case "delete" :
					break;
				default :
					break;
			}
		}
	}
}