<?php

/** @author Nicolas Benning
 * @example MVC
 */

include_once ("db/simple_db_mysql_manager.php");

class Model {
	public $publications;
	
	public function __construct() {
		
		$dbManager = new DBManager();
		$dbManager->openConnection();
		
		$query = 'SELECT * FROM publications';
		$this->publications = $dbManager->executeQuery($query);
		
		$dbManager->closeConnection();
	}
}

?>