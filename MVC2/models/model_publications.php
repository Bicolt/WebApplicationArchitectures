<?php

/** @author Nicolas Benning
 * @example MVC
 */

class Model {
	public $publications;
	
	public $template;
	public function __construct() {
		$this->publications = "<ul>
					<li>Nothing</li>
					<li>Rien</li>
					<li>Nada</li>
				</u>";
		$this->template = "templates/template_publications.php";
	}
}

?>