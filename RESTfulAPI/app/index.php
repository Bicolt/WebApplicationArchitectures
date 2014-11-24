<?php
/**
 * step 1: require the slim framework
 */
require_once '../Slim/Slim.php';
Slim\Slim::registerAutoloader ();

/**
 * step 2: instantiate a slim application
 */
$app = new Slim\Slim ( array (
		'debug' => true 
) );

/**
 * step 3: define the slim application routes
 */

include_once "models/model_publications.php";
include_once "controllers/controller_publications.php";
include_once "views/view_publications.php";
$modelOBJ = new Model();

$app->get ( "/publications(/:id)", function ($id = NULL) use($app) {
	if ($id != NULL) {
		$controllerOBJ = new Controller( $modelOBJ, "getPublication", $id);
	} else {
		$controllerOBJ = new Controller( $modelOBJ, "getAllPublications", NULL);
	}
} );

$app->get ( "/publications/search/:query", function ($query) use($app) {
	echo "get search";
} );

$app->post ( "/publications", function () use($app) {
	echo "post";
} );

$app->put ( "/publications/:id", function ($id) use($app) {
	echo "put";
} );

$app->delete ( "/publications/:id", function ($id) use($app) {
	echo "delete";
} );

$app->notFound ( function () use($app) {
	echo '{"error message" : "requested page does not exist"}';
} );

$app->run ();

$viewOBJ = new View($controllerOBJ, $modelOBJ);
echo $viewOBJ->output ();

?>