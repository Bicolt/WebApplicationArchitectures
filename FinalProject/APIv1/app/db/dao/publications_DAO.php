<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * publications DAO
 */

include_once 'db/dao/base_DAO.php';

class PublicationsDAO extends BaseDAO
{
  /**
  * Overiding parent's constructor
  */
  function __construct($dbManager)
  {
    parent::__construct($dbManager);
  }

  public function getPublications()
  {
    $db = $this->getDBManager();
    $stmt = $db->prepareQuery("SELECT * FROM `publication` ;");

    $db->executeQuery($stmt);
    $result = $db->fetchQuery($stmt);

    return $result;
  }

  public function getPublicationById($id)
  {
    $result = null;
    if(!is_null($id)){
      $db = $this->getDBManager();
      $stmt = $db->prepareQuery("SELECT * FROM `publication` WHERE id = $id;");

      $db->executeQuery($stmt);
      $result = $db->fetchQuery($stmt);
    }
    return $result;
  }

  public function getPublicationByName($name)
  {
    $result = null;
    if(!is_null($name)){
      $name = addslashes($name);
      $db = $this->getDBManager();
      $stmt = $db->prepareQuery("SELECT * FROM `publication` WHERE authors LIKE '%$name%' OR title LIKE '%$name%';");

      $db->executeQuery($stmt);
      $result = $db->fetchQuery($stmt);
    }
    return $result;
  }

  public function createNewPublication($tab)
  {
    $result = null;
    $title = $tab['title'];
    $authors = $tab['authors'];
    $year = $tab['year'];
    $proceeding = $tab['proceeding'];

    $db = $this->getDBManager();
    $stmt = $db->prepareQuery("INSERT INTO `publication` (`id`, `title`, `authors`, `year`, `proceeding`) VALUES (NULL, '$title', '$authors', $year, '$proceeding');");

    $success = $db->executeQuery($stmt);

    if($success){
      $result = array("success" => "OK");
    }

    return $result;
  }
 /* SQL injection pbs
  public function getPublicationsContaining($str)
  {
    $str =
    $query = "SELECT * FROM `publications` WHERE publications.authors LIKE '". $str ."'";
    $query .=  "ORDER BY publications.authors;";

    $db = $this->getDBManager();
    $result = $db->executeQuery($query);

    return $result;
  }*/
}
?>
