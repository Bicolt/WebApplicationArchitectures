<?php

/** @author Nicolas Benning
 * @example MVC
 */

include ("db/DAO_factory.php");

class Model {
	private $DAO_Factory = null;
	public $publications;
	
	public function __construct() {
		$this->DAO_Factory = new DAO_Factory();
		$this->DAO_Factory->initDBResources();
	}
	
	public function getPublicationsArray(){
		$publicationsDAO_OBJ = $this->DAO_Factory->getPublicationsDAO();
		$resultSet = $publicationsDAO_OBJ->getPublications2();
		return $resultSet;
	}
	
	function __destruct() {
		$this->DAO_Factory->clearDBResources();
	}
}

?>