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
    $this->app->response->write($this->model->outputString);
  }
}

?>