<?php
/**
* @author Nicolas Benning
* example email valisation tests
*/
require_once ('../simpletest/autorun.php');
class emailRegularExpressionTests extends UnitTestCase {
	private $validation;
	public function setUp() {
		require_once ('../app/models/validation_functions.php');
		$this->validation = new validation_functions ();
	}
	public function testEmptyAndValidEmails() {
		$this->assertFalse ( $this->validation->isEmailValid ( "" ) );
		$this->assertTrue ( $this->validation->isEmailValid ( "luca.longo@dit.ie" ) );
		$this->assertTrue ( $this->validation->isEmailValid ( "luca_1.2.3_longo@dit.ie" ) );
		$this->assertTrue ( $this->validation->isEmailValid ( "mr.luca.longo@dit.ie" ) );
	}
	public function testStrangeSymbolsInEmailsAndDots() {
		$this->assertFalse ( $this->validation->isEmailValid ( "luca.longo@@dit.ie" ) );
		$this->assertFalse ( $this->validation->isEmailValid ( "luca.\$longo@dit.ie" ) );
		$this->assertFalse ( $this->validation->isEmailValid ( "luca..longo@dit.ie" ) );
		$this->assertFalse ( $this->validation->isEmailValid ( ".luca.longo@dit.ie" ) );
		$this->assertFalse ( $this->validation->isEmailValid ( "luca.longo@.dit.ie" ) );
		$this->assertFalse ( $this->validation->isEmailValid ( "luca.longo@dit..ie" ) );
	}
	public function testDomainEmailParts() {
		$this->assertFalse ( $this->validation->isEmailValid ( "luca.longo@dit.ieeee " ) );
		$this->assertTrue ( $this->validation->isEmailValid ( "luca.longo@dit.co.uk" ) );
		$this->assertFalse ( $this->validation->isEmailValid ( "luca.longo@dit.com4" ) );
		$this->assertTrue ( $this->validation->isEmailValid ( "luca.longo@dit.aa.aa.aa.aa" ) );
	}
	public function testBeginningPartOfEmails() {
		$this->assertFalse ( $this->validation->isEmailValid ( "ˆluca.longo@dit.ie" ) );
		$this->assertFalse ( $this->validation->isEmailValid ( "*luca.longo@dit.ie" ) );
		$this->assertTrue ( $this->validation->isEmailValid ( "_luca.longo@dit.ie" ) );
	}
	public function tearDown() {
		$this->validation = null;
	}
}
?>