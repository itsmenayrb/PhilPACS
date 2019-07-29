<?php

/**
 * Database Page
 * Do not allow users access this page.
 * Redirect user if user try to access this page via url.
 */

class Database {
	
	private $host = "localhost";
	private $dbname = "philpacs";
	private $username = "root";
	private $password = "";

	protected $conn;

	public function db_connection(){
	
		try {
	
			$this->conn = null;
	
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
			return $this->conn;
	
			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
		
	}

}