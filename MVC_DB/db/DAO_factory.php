<?php
/**
 * @author Nicolas Benning
 * Class to manage the DBManager
 */
include_once 'simple_db_mysql_manager.php';
class DAO_Factory {
	private $dbManager;
	function getDBManager() {
		if ($this->dbManager == null)
			throw new Exception ( "No persistence storage link" );
		
		return $this->dbManager;
	}
	
	/**
	 * initialize DB resources (connection to DB)
	 */
	function initDBResources() {
		$this->dbManager = new DBManager ();
		$this->dbManager->openConnection ();
	}
	
	/**
	 * release/destroy DB Resources (close the db link)
	 */
	function clearDBResources() {
		if ($this->dbManager != null) {
			$this->dbManager->closeConnection ();
		}
	}
	
	/**
	 * 
	 * @return publications Database Access Object
	 */
	function getPublicationsDAO(){
		include_once 'DAO/publicationsDAO.php';
		return new publicationsDAO($this->getDBManager());
	}
}

?>