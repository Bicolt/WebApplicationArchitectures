<?php
require_once('../simpletest/autorun.php');
class TestsSuite extends TestSuite {
	function __construct() {
		parent::__construct ();
		$this->addFile('EmailValidationTests.php');
		//$this->addFile('.php');
	}
}
?>