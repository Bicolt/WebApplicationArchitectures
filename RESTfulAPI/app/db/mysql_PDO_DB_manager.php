<?php
/**
 * @author Nicolas Benning
 * Class to manage the connection to the database
 */

include_once 'conf/config.inc.php';
class mysql_PDO_DB_manager {
	private $pdo;
	private $hostname;
	private $username;
	private $password;
	private $dbname;
	
	function __construct() {
		
		$this->hostname = DB_HOST;
		$this->username = DB_USER;
		$this->password = DB_PASS;
		$this->dbname = DB_NAME;
	}
	
	function openConnection() {
		try {
		$this->pdo = new PDO( "mysql:host=$this->hostname;dbname=$this->dbname",
				"$this->username", "$this->password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		} catch (PDOException $e) {
			echo "Failed to get DB handle:" . $e->getMessage() . "\n";
			exit();
		}
	}
	
	function prepareQuery($queryStr){
		return $this->pdo->prepare($queryStr);
	}
	
	function executeQuery($queryOBJ){
		$queryOBJ->execute();
	}
	
	function fetchResults($queryOBJ){
		return ($queryOBJ->fetchAll());
	}
	
	function closeConnection() {
		unset ($this->pdo);
	}
}

?>