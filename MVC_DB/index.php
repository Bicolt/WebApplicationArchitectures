<?php
	/** @author Nicolas Benning
	 * @example MVC
	 */

	if(!empty($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 'home_page';
	}
	
	include_once "models/model_$page.php";
	include_once "controllers/controller_$page.php";
	include_once "views/view_$page.php";
	// init of MVC Components
	$modelOBJ = new Model();
	if (!empty($_GET['action'])){
		$controllerOBJ = new Controller( $modelOBJ, $_GET['action']);
	} else {
		$controllerOBJ = new Controller( $modelOBJ );
	}
	$viewOBJ = new View($controllerOBJ, $modelOBJ);
	

	
	echo $viewOBJ->output ();
?>