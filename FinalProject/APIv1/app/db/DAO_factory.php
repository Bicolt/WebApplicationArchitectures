<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * DAO factory for DB connection
 */

include_once 'mysql_PDO_db_manager.php';

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

  public function getCommonDAO()
  {
    include_once 'dao/common_DAO.php';
    return new commonDAO($this->getDBManager());
  }
}

?>
