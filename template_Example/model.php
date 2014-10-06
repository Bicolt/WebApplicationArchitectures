<?php

/** @author Nicolas Benning
 * @example MVC
 */

class Model {
	public $str;
	public $template;
	public function __construct() {
		$this->str = "Hello World!";
		$this->template = "template.php";
	}
}

?>