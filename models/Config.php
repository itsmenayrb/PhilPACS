<?php

require_once 'Database.php';

class Config extends Database {

	protected $conn;

	public function __construct() {

		$database = new Database();
		$this->conn = $database->db_connection();

	}


	/**
	 * Function for Querying
	 * @param  string $sql
	 * @return string $stmt
	 */
	public function runQuery($sql) {
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	/**
	 * Function for Sanitizing data
	 *
	 * @param string $data
	 * @return $data
	 */
	public function checkInput($data) {

		$data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

	}

	/**
	 * Function for redirecting
	 *
	 * @param string $url
	 * @return void
	 */
	public function redirect($url) {

		header("Location: $url");

	}

}