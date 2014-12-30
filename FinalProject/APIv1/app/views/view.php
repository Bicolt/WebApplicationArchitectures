<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * View component
 */
class View {
  private $model, $controller, $app;

  public function __construct($controller, $model, $app)
  {
    $this->controller = $controller;
    $this->model = $model;
    $this->app = $app;
  }

  public function output()
  {
    $ret = $this->model->outputArray;
    if (array_key_exists('code', $ret)) {
      $this->app->response->status($ret['code']);
    }
    $body = json_encode($ret);
    $this->app->response->write($body);
  }
}

?>