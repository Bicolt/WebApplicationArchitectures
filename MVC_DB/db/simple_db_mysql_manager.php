<?php

class DBManager{
	private $db_link;
	private $hostname;
	private $username;
	private $password;
	private $dbname;
	
	function __construct(){
		include_once '../conf/config.inc.php';
		$this->hostname = DB_HOST;
		$this->username = DB_USER;
		$this->password = DB_PASS;
		$this->dbname = DB_NAME;
	}
	
	function openConnection() {
		$this->db_link = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
	}
	
	function closeConnection() {
		if (! empty($this->db_link))
			$this->db_link->close();
	}
	
	function executeQuery($query) {
		if (! empty($this->db_link))
			$result = mysqli_query($this->db_link, $query);
		
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$rows[] = $row;
		}
		
		return $rows;
	}
}

?>