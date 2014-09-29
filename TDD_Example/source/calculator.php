<?php
class Calculator {
	/**
	 * add two numbers
	 *
	 * @param int $number1
	 *        	First number
	 * @param int $number2
	 *        	Second number
	 *        	
	 */
	public function add($number1, $number2) {
		if (is_numeric ( $number1 ) && is_numeric ( $number2 )) {
			return ($number1 + $number2);
		} else
			return false;
	}
	public function substract($number1, $number2) {
		if (is_numeric ( $number1 ) && is_numeric ( $number2 )) {
			return ($number1 - $number2);
		} else
			return false;
	}
	public function multiply($number1, $number2) {
		if (is_numeric ( $number1 ) && is_numeric ( $number2 )) {
			return ($number1 * $number2);
		} else
			return false;
	}
	public function divide($number1, $number2) {
		if (is_numeric ( $number1 ) && is_numeric ( $number2 ) && ($number2 != 0)) {
			return ($number1 / $number2);
		} else
			return false;
	}
}
?>