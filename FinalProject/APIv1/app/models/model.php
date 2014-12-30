<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * Model component
 */

include_once("db/DAO_factory.php");

class Model {
  private $DAOFactory = null;
  public $jsonString = null;

  function __construct()
  {
    $this->DAOFactory = new DAO_factory();
    $this->DAOFactory->initDBResources();
    $this->publicationDAO = $this->DAOFactory->getPublicationDAO();
  }

  public function preparePublications()
  {
    $pubsDAO = $this->publicationDAO;
    $res = $pubsDAO->getPublications();

    $this->jsonString = json_encode($res);
  }

  public function preparePublicationById($id)
  {
    $pubsDAO = $this->publicationDAO;
    $res = $pubsDAO->getPublicationById($id);

    $this->jsonString = json_encode($res);
  }

  public function preparePublicationByName($name)
  {
    $pubsDAO = $this->publicationDAO;
    $res = $pubsDAO->getPublicationByName($name);

    $this->jsonString = json_encode($res);
  }

  public function CreatePublication($publicationString)
  {
    $tab = json_decode($publicationString, true);
    if(array_key_exists('title', $tab) && array_key_exists('authors', $tab) && array_key_exists('year', $tab) && array_key_exists('proceeding', $tab)){
      $pubsDAO = $this->publicationDAO;
      $res = $pubsDAO->CreateNewPublication($tab);

      $this->jsonString = json_encode($res);
    } else {
      $this->jsonString = '';
    }
  }

  function __destruct()
  {
    $this->DAOFactory->clearDBResources();
  }
}

?>
