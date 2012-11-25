<?php
include 'utilities/utilities_for_models.php';
/**
 * Artikel Model um die vom Artikel Controller angeforderden Daten zu holen
 */
class Index_Model extends Utilities_For_Models {

	/**
	 * Instanz der Datenbankverbindung
	 */
	private $db;

	public function __construct() {
		$this -> db = new MysqlImproved_Driver;
	}




}	
?>