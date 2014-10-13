<?php

/** @author Nicolas Benning
 * @example MVC
 */

class Model {
	public $motto;
	public $personnalIntro;
	public $publications;
	
	public $template;
	public function __construct() {
		$this->motto = "This is my motto!";
		$this->personnalIntro = "Description of myself";
		$this->publications = "<ul>
					<li>Nothing</li>
					<li>Rien</li>
					<li>Nada</li>
				</u>";
		$this->template = "templates/template_home_page.php";
	}
}

?>