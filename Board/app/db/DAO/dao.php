<?php
/**
 * @author Nicolas Benning
 * basic DAO object
 */

class baseDAO {
	private $dbManager = null;
	
	function __construct($dbManagerOBJ){
		$this->dbManager = $dbManagerOBJ;
	}
	
	function getDBManager(){
		return $this->dbManager;
	}
}



?>