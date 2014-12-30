<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * Controller component
 */

include_once 'models/model.php';
include_once 'conf/config.inc.php';

class Controller {
  private $model;
  public function __construct(Model $model, $app, $page, $action, $parameters)
  {
    $this->model = $model;

    if (!is_null($page)) {
      switch ($action) {
        case ACTION_GET_ALL:
          $model->getAll($page);
          break;
        case ACTION_GET_BY_ID:
          $model->getById($page,$parameters['id']);
          break;
        case ACTION_ADD:
          $model->addNewElement($page,$parameters['json']);
          break;
        case ACTION_UPDATE:
          $model->updateElement($page,$parameters['json']);
          break;
        case ACTION_DELETE:
          $model->deleteElement($page,$parameters['id']);
          break;
        case ACTION_SEARCH:
          if ($page != 'questionnaire') {
            $model->reportError(HTTPSTATUS_NOTALLOWED, $page);
          } else {
            $model->searchQuestionnaire($parameters);
          }
          break;
        default:
          $model->reportError(HTTPSTATUS_BADREQUEST);
      }
    } else {
      $model->reportError(HTTPSTATUS_NOTFOUND);
    }
  }
}
?>
