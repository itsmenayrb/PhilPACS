<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Archives extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	public function restoreEmployee($personalID) {
		$status = 1;
		try {
			$stmt = $this->conn->runQuery("UPDATE personaldetailstbl
											SET status=:status
											WHERE personalID=:personalID");
			$stmt->bindparam(":personalID", $personalID);
			$stmt->bindparam(":status", $status);
			$stmt->execute();
			return $stmt;			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}
}