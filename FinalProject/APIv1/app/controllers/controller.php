<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * Controller component
 */

class Controller {
  private $model;
  public function __construct($model, $action=null, $a=null, $b=null)
  {
    $this->model = $model;

    if($action != null){
      switch ($action) {
        case 'GetPublications':
          $model->preparePublications();
          break;
        case 'GetPublication':
          $model->preparePublicationById($a);
          break;
        case 'SearchPublication':
          $model->preparePublicationByName($a);
          break;
        case 'CreatePublication':
          $model->createPublication($a);
          break;
        case 'UpdatePublication':
          $model->updatePublication($a,$b);
          break;
        case 'DeletePublication':
          $model->deletePublication($a);
          break;
        default:
          break;
      }
    }
  }
}
?>
