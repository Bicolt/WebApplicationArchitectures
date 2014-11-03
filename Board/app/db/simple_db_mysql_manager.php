<?php
/**
 * @author Nicolas Benning
 * Class to manage the connection to the database
 */
class DBManager {
	private $db_link;
	private $hostname;
	private $username;
	private $password;
	private $dbname;
	
	function __construct() {
		include_once 'conf/config.inc.php';
		$this->hostname = DB_HOST;
		$this->username = DB_USER;
		$this->password = DB_PASS;
		$this->dbname = DB_NAME;
	}
	
	function openConnection() {
		$this->db_link = mysqli_connect ( $this->hostname, $this->username, $this->password, $this->dbname )
		or die("Cannot connect to the DB");
	}
	
	function closeConnection() {
		if (! empty ( $this->db_link ))
			$this->db_link->close ();
	}
	
	function executeQuery($query) {
		$result;
		
		if (! empty ( $this->db_link ))
			mysqli_set_charset ( $this->db_link , "utf8" );
			$result = mysqli_query ( $this->db_link, $query ) or die("Cannot execute query");
		
		$rows = array();
		while ( $row = $result->fetch_array ( MYSQLI_ASSOC ) ) {
			$rows [] = $row;
		}
		
		return $rows;
	}
}

?>