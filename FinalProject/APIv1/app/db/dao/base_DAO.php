<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * Basic DAO - Maybe useless?
 */
class BaseDAO
{

  private $dbManager = null;

  function __construct($dbManager)
  {
    $this->dbManager = $dbManager;
  }

  public function getDBManager()
  {
    return $this->dbManager;
  }
}
?>
