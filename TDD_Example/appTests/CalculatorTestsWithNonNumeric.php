<?php
/**
* @author luca
* example of a test case Class - Calculator example
*/
require_once ('../simpletest/autorun.php');
class CalculatorTestsWithNonNumeric extends UnitTestCase {
	private $calculator;
	public function setUp() {
		require_once('../source/Calculator.php');
		$this->calculator = new Calculator ();
	}
	public function tearDown() {
		$this->calculator = NULL;
	}
	
	/**
	 * Test to add strings
	 */
	public function testAddStrings() {
		$equals = $this->calculator->add("test1", "test2");
		$this->assertFalse($equals);
		
		$equals = $this->calculator->add(1, "test2");
		$this->assertFalse($equals);
		
		$equals = $this->calculator->add("23", "1");
		$this->assertEqual(24, $equals);
	}
	
	
	/**
	 * Test to add arrays
	 */
	public function testAddArrays() {
		$equals = $this->calculator->add("test1", "test2");
		$this->assertFalse($equals);
	
		$equals = $this->calculator->add(1, "test2");
		$this->assertFalse($equals);
	
		$equals = $this->calculator->add("23", "1");
		$this->assertEqual(24, $equals);
	}
	
}
?>