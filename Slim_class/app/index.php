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
$app->map("/welcome/user/:username(/:surname)", function ($username, $surname=NULL) use ($app){
	echo "Welcome " . $username . " " . $surname . "<br>";
})->via('GET', 'POST');

$app->notFound(function() use ($app){
	echo '{"error message" : "requested page does not exist"}';
});

$app->run();
?>