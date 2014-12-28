<?php
/**
 * @author MrWormy
 */

class View {
  private $model;
  private $controller;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function output()
  {
    $jsonString = $this->model->jsonString;

    return $jsonString;
  }
}

?>
