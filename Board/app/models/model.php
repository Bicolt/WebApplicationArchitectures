<?php

/** @author Nicolas Benning
 * @example MVC
 */

class Model {
	public $str;
	public $author;
	public $template;
	public function __construct() {
		$this->str = "Hello World!";
		$this->author = "Nico";
		$this->template = "template.php";
	}
}

?>