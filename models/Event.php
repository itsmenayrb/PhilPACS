<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Event extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	public function addEvent($title, $description, $startDate, $endDate) {
		try {
			$stmt = $this->conn->runQuery("INSERT INTO eventstbl (
										   		title,
										   		description,
										   		startDate,
										   		endDate
										   ) VALUES (
										   		:title,
										   		:description,
										   		:startDate,
										   		:endDate
										   )");
			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":description", $description);
			$stmt->bindparam(":startDate", $startDate);
			$stmt->bindparam(":endDate", $endDate);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}