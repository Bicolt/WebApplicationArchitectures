<?php
/**
 * @author Nicolas Benning
 * Class to manage the DBManager
 */
include_once 'mysql_PDO_DB_manager.php';

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
		$this->dbManager = new mysql_PDO_DB_manager();
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
	function getMessagesDAO(){
		include_once 'DAO/messagesDAO.php';
		return new messagesDAO($this->getDBManager());
	}
}

?>