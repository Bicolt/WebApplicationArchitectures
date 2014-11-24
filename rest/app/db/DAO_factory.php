<?php
/**
* @author Thomas Laurence
*/

include_once 'db/mysql_PDO_db_manager.php';

class DAO_factory
{

  private $dbManager = null;

  public function getDBManager()
  {
    if( $this->dbManager == null ) {
      throw new Exception("No persistant storage link");
    }
    return $this->dbManager;
  }

  /**
   * Init db resources
   */
  public function initDBResources()
  {
    $this->dbManager = new Mysql_PDO_db_manager();
    $this->dbManager->openConnection();
  }

  /**
   * Clear db resources (close the link)
   */
  public function clearDBResources()
  {
    if ($this->dbManager != null) {
      $this->dbManager->closeConnection();
    }
  }

  public function getPublicationDAO()
  {
    include_once 'db/dao/publications_DAO.php';
    return new publicationsDAO($this->getDBManager());
  }
}

?>
