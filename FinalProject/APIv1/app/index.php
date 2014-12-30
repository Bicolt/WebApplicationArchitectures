<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * index file - contains the routing for the API
 */

/**
 * Load Slim framework
 */
require_once "../Slim/Slim.php";
Slim\Slim::registerAutoloader();

/**
 * Instantiate a slim app
 */
$app = new Slim\Slim(array('debug' => true));

include_once("conf/config.inc.php");
include_once("models/model.php");
include_once("controllers/controller.php");
include_once("views/view.php");

$pagesArray = [1 => 'students', 2 => 'lecturers', 3 => 'nationalities', 4 => 'tasks', 5 => 'courses', 6 => 'questionnaire'];

/**
 * Create the slim app routes
 */

$app->get('/questionnaire/search', function () use ($app) {
    $page = 'questionnaire';
    $action = ACTION_SEARCH;
    $parameters = ['student' => $app->request()->params('student_id'),
        'nationality' => $app->request()->params('nationality_id'),
        'lecturer' => $app->request()->params('lecturer_id'),
        'course' => $app->request()->params('course_id'),
        'task' => $app->request()->params('task_id')];
    handleAction($app, $page, $action, $parameters);
});

$app->get('/:page(/:id)', function ($page, $id = null) use ($app, $pagesArray) {
    if (!array_search($page, $pagesArray)) {
        $page = null;
    }
    $parameters = array();
    if (!is_null($id)) {
        $parameters['id'] = $id;
        $action = ACTION_GET_BY_ID;
    } else {
        $action = ACTION_GET_ALL;
    }
    handleAction($app, $page, $action, $parameters);
});

$app->post('/:page', function ($page) use ($app, $pagesArray) {
    if (!array_search($page, $pagesArray)) {
        $page = null;
    }
    $action = ACTION_ADD;
    $parameters['json'] = $app->request->getBody();
    handleAction($app, $page, $action, $parameters);
});

$app->put('/:page/:id', function ($page, $id) use ($app, $pagesArray) {
    if (!array_search($page, $pagesArray)) {
        $page = null;
    }
    $action = ACTION_UPDATE;
    $parameters['id'] = $id;
    $parameters['json'] = $app->request->getBody();
    handleAction($app, $page, $action, $parameters);
});

$app->delete('/:page/:id', function ($page, $id) use ($app, $pagesArray) {
    if (!array_search($page, $pagesArray)) {
        $page = null;
    }
    $action = ACTION_DELETE;
    $parameters['id'] = $id;
    handleAction($app, $page, $action, $parameters);
});

// Common function to handle the previous routes
function handleAction($app, $page = null, $action = null, $parameters = null)
{
    $model = new Model(); // common model
    $controller = new Controller($model, $app, $page, $action, $parameters); // common controller with different actions defined by the codes provided
    $view = new View($controller, $model, $app); // common view
    $view->output(); // this returns the response to the requesting client
}

// set up common headers for every response
$app->response()->header("Content-Type","application/json; charset=utf-8");

// Run the slim framework. This will execute one of the requested routes (API)
$app->run();
?>
