<?php
/**
* @author luca
* example of a test case Class - Calculator example
*/
require_once ('../simpletest/autorun.php');
class CalculatorTests extends UnitTestCase {
	private $calculator;
	public function setUp() {
		require_once('../source/Calculator.php');
		$this->calculator = new Calculator ();
	}
	public function tearDown() {
		$this->calculator = NULL;
	}
	/**
	 * Test to add two numbers
	 */
	public function testAdd() {
		$equals = $this->calculator->add(1, 2);
		$this->assertEqual(3, $equals);
		
		$equals = $this->calculator->add(-1, -2);
		$this->assertEqual(-3, $equals);
		
		$equals = $this->calculator->add(-1, 2);
		$this->assertEqual(1, $equals);
		
		$equals = $this->calculator->add(0, 2);
		$this->assertEqual(2, $equals);
	}
	
	/**
	 * Test to subtract two numbers
	 */
	public function testSubtract() {
		$equals = $this->calculator->substract(2, 1);
		$this->assertEqual(1, $equals);
		
		$equals = $this->calculator->substract(-2, 1);
		$this->assertEqual(-3, $equals);
		
		$equals = $this->calculator->substract(2, -1);
		$this->assertEqual(3, $equals);
		
		$equals = $this->calculator->substract(0, -1);
		$this->assertEqual(1, $equals);
	}
	
	/**
	 * Test to multiply two numbers
	 */
	public function testMultiply() {
		$equals = $this->calculator->multiply(2, 3);
		$this->assertEqual(6, $equals);
		
		$equals = $this->calculator->multiply(0, 3);
		$this->assertEqual(0, $equals);
		
		$equals = $this->calculator->multiply(2, 0);
		$this->assertEqual(0, $equals);
		
		$equals = $this->calculator->multiply(2, -3);
		$this->assertEqual(-6, $equals);
		
		$equals = $this->calculator->multiply(-2, -3);
		$this->assertEqual(6, $equals);
	}
	
	/**
	 * Test to divide two numbers
	 */
	public function testDivide() {
		$equals = $this->calculator->divide(4, 2);
		$this->assertEqual(2, $equals);
		
		$equals = $this->calculator->divide(4, 3);
		$this->assertEqual(4/3, $equals);
		
		$equals = $this->calculator->divide(0, 2);
		$this->assertEqual(0, $equals);
		
		$equals = $this->calculator->divide(4, 0);
		$this->assertFalse($equals);
		
		$equals = $this->calculator->divide(-4, 2);
		$this->assertEqual(-2, $equals);
		
		$equals = $this->calculator->divide(-4, -2);
		$this->assertEqual(2, $equals);
		
		$equals = $this->calculator->divide(4, -2);
		$this->assertEqual(-2, $equals);
	}
}
?>