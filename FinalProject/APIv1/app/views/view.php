<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * View component
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
    $returnString = $this->model->jsonString;

    return $returnString;
  }
}

?>
