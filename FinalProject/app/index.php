<?php
/**
 * Load Slim framework
 */
require_once "../Slim/Slim.php";
Slim\Slim::registerAutoloader();

/**
 * Instantiate a slim app
 */
$app = new Slim\Slim(array('debug' => true));

include_once("models/model.php");
include_once("controllers/controller.php");
include_once("views/view.php");

/**
 * Create the slim app route
 */

/*$app->map('/welcome/user/:username', function($username) use ($app){
  echo "Welcome $username";
})->via('GET,'POST');
*/

$app->get('/publications(/:id)', function($id = null) use ($app){
  if (!is_null($id)) {
    $action = 'GetPublication';
  } else {
    $action = 'GetPublications';
  }
  handleAction($app, $action, $id);
});

$app->get('/:table(/:id)', function($table, $id = null) use ($app){
	if (!is_null($id)) {
		$action = 'GetPublication';
	} else {
		$action = 'GetPublications';
	}
	handleAction($app, $action, $id);
});

$app->get('/publications/search/:query', function($query = null) use ($app){
  if (!is_null($query)) {
    $action = 'SearchPublication';
  } else {
    $action = null;
  }
  handleAction($app, $action, $query);
});

$app->post('/publications', function() use ($app){
  //$body = file_get_contents('php://input');
  $body = $app->request->getBody();
  if (!is_null($body) && !empty($body)) {
    $action = 'CreatePublication';
  } else {
    $action = null;
  }
  handleAction($app, $action, $body);
});

$app->put('/publications/:id', function($id) use ($app){
  if (!is_null($id)) {
    $body = $app->request->getBody();
    if (!is_null($body) && !empty($body)) {
      $action = 'UpdatePublication';
    } else {
      $action = null;
    }
  } else {
    $action = null;
  }
  handleAction($app, $action, $body, $id);
});

$app->delete('/publications/:id', function($id) use ($app){
  if (!is_null($id)) {
    $action = 'DeletePublication';
  } else {
    $action = null;
  }
  handleAction($app, $action, $id);
});

$app->notFound(function() use ($app)
{
  handleAction($app);
});

/*$model = new Model() ;
$controller = new Controller( $model , $action , $a , $b ) ;
$view = new View( $controller , $model ) ;*/

function handleAction($app, $action = null, $a = null, $b = null)
{
  if (is_null($action)) {
    $app->response()->status(404);
  } else {
    $model = new Model();
    $controller = new Controller($model, $action, $a, $b);
    $view = new View($model);
    $ret = $view->output();
    $app->response()['Content-Type'] = 'application/json';
    $app->response()->body($ret);
  }

}

$app->run();

?>
