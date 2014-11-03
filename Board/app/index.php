<?php
/** @author Nicolas Benning
	 * setting up relationships between M-V-C 
	 * components - authentication
	 * example
	 */
if (! empty ( $_GET ['action'] ))
	$action = $_GET ['action'];
else
	$action = "";

include "models/Model.php";
include "controllers/Controller.php";
include "views/View.php";

$model = new Model ();
$controller = new Controller ( $model, $action, $_GET );
$view = new View ( $controller, $model );
$view->output ();

?>