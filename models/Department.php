<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Department extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	/**
	 * Public function for adding of department
	 * @param string $department_name string
	 * @return $stmt
	 */
	public function addDepartment($department_name) {

		try {

			$check = $this->conn->runQuery("SELECT departmentName
											FROM departmenttbl
											WHERE departmentName=:department_name
											LIMIT 1");
			$check->execute(array(":department_name" => $department_name));
			$row = $check->fetch(PDO::FETCH_ASSOC);

			if ($row['departmentName'] == $department_name) {
				echo json_encode(array("error_department_name" => "$department_name is already exist."));
			} else {

				$status = 1;

				$stmt = $this->conn->runQuery("INSERT INTO departmenttbl (
												departmentName,
												status
											) VALUES (
											:department_name,
											:status
											)");
				$stmt->bindparam(":department_name", $department_name);
				$stmt->bindparam(":status", $status);

				$stmt->execute();
				return $stmt;

			}
			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

	}

	/**
	 * Public function for archiving of department
	 * @param  string
	 * @return $stmt
	 */
	public function archiveDepartment($department_id) {

		$status = 0;
		try {
			$stmt = $this->conn->runQuery("UPDATE departmenttbl SET status=:status WHERE departmentID=:id");
			$stmt->bindparam(':status', $status);
			$stmt->bindparam('id', $department_id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	/**
	 * public function for updating of department
	 * @param  string
	 * @return $stmt
	 * */
	public function updateDepartment($department_id, $department_name) {

		try {

			$check = $this->conn->runQuery("SELECT departmentName
											FROM departmenttbl
											WHERE departmentName=:department_name
											LIMIT 1");
			$check->execute(array(":department_name" => $department_name));
			$row = $check->fetch(PDO::FETCH_ASSOC);

			if ($row['departmentName'] == $department_name) {
				echo json_encode(array("error" => "$department_name is already exist. Ignoring changes..."));
			} else {

				$stmt = $this->conn->runQuery("UPDATE departmenttbl
												SET departmentName=:department_name
												WHERE departmentID=:department_id");
				$stmt->bindparam(":department_name", $department_name);
				$stmt->bindparam(":department_id", $department_id);

				$stmt->execute();
				return $stmt;

			}
			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

	}	

}