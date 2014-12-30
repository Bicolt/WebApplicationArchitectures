<?php
/**
* @author Thomas Laurence
* @example Basci DAO object
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
