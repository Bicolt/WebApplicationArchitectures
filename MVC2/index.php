<?php
	/** @author Nicolas Benning
	 * @example MVC
	 */
	include 'model.php';
	include 'view.php';
	include 'controller.php';
	
	// init of MVC Components
	$modelOBJ = new Model();
	$controllerOBJ = new Controller( $modelOBJ );
	$viewOBJ = new View($controllerOBJ, $modelOBJ);
	
	echo $viewOBJ->output ();
?>