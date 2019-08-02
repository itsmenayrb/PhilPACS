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
			$status = 1;
			$stmt = $this->conn->runQuery("INSERT INTO eventstbl (
										   		title,
										   		description,
										   		startDate,
										   		endDate,
										   		status
										   ) VALUES (
										   		:title,
										   		:description,
										   		:startDate,
										   		:endDate,
										   		:status
										   )");
			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":description", $description);
			$stmt->bindparam(":startDate", $startDate);
			$stmt->bindparam(":endDate", $endDate);
			$stmt->bindparam(":status", $status);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function updateEventOnResize($id, $title, $start, $end) {
		try {
			$stmt = $this->conn->runQuery("UPDATE eventstbl SET title=:title, startDate=:startDate, endDate=:endDate WHERE eventID=:id");
			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":startDate", $start);
			$stmt->bindparam(":endDate", $end);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function updateEventOnDrop($id, $title, $start, $end) {
		try {
			$stmt = $this->conn->runQuery("UPDATE eventstbl SET title=:title, startDate=:startDate, endDate=:endDate WHERE eventID=:id");
			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":startDate", $start);
			$stmt->bindparam(":endDate", $end);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function updateEvent($id, $title, $description) {
		try {
			$stmt = $this->conn->runQuery("UPDATE eventstbl SET title=:title, description=:description WHERE eventID=:id");
			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":description", $description);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function removeEvent($id) {
		try {
			$status = 0;
			$stmt = $this->conn->runQuery("UPDATE eventstbl SET status=:status WHERE eventID=:id");
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":status", $status);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}