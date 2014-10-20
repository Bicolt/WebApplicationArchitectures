<?php
/**
 * @author Nicolas Benning
 * Class for publications DAO
 */

include 'baseDAO.php';

class publicationsDAO extends baseDAO {
	
	/*
	 * overriding parent's constructor
	 */
	function __construct($dbManager){
		parent::__construct($dbManager);
	}
	
	function getPublications(){
		$sql = "SELECT * FROM publications ORDER BY publications.authors";
		
		$db = $this->getDBManager();
		$resultset = $db->executeQuery($sql);
		
		return $resultset;
	}
	
	function getPublicationsContaining($str){
		$sql = "SELECT * FROM publications WHERE publications.authors LIKE '" . $str . "'";
		$sql .= "ORDER BY publications.authors";
		$db = $this->getDBManager();
		$resultset = $bd->executeQuery($sql);
		return $resultset;
	}
	
	function getPublications2(){
		
	}
}

?>