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
	
// 	if (!empty($_GET['action'])) {
// 		if (method_exists($controllerOBJ, $_GET['action'])) {
// 			$controllerOBJ->{$_GET['action']}();
// 		} else {
// 			echo "SA EXIST PA " . $_GET['action'] . " LOL";
// 		}	
// 	}
// 	echo $viewOBJ->output ();
?>