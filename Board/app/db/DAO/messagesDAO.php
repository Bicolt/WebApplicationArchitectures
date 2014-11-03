<?php
/**
 * @author Nicolas Benning
 * definition of the messages DAO
 */
include 'dao.php';
class messagesDAO extends baseDAO {
	
	function messagesDAO($dbMng) {
		parent::BaseDAO( $dbMng );
	}
	
	function getMessages() {
		$sqlQuery = "SELECT * ";
		$sqlQuery .= "FROM board ";
		$sqlQuery .= "ORDER BY board.author;";
		
		$result = $this->getDbManager()->executeSelectQuery( $sqlQuery );
		
		return $result;
	}
	
	function insertNewMessage($email, $title, $content) {
		$sqlQuery = "INSERT INTO board(id, author, title, content) ";
		$sqlQuery .= "VALUES(NULL,'$email','$title','$content')";
		
		$result = $this->getDbManager()->executeQuery( $sqlQuery );
		
		return $result;
	}
}

?>