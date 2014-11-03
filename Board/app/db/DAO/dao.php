<?php
/**
 * @author Nicolas Benning
 * basic DAO object
 */

class BaseDAO {
	public $dbManager = null;
	
	function __construct($dbmanagerOBJ){
		$this->dbManager = $dbmanagerOBJ;
	}
	
	function getDBManager(){
		return $this->dbManager;
	}
}

?>