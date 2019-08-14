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
	public function addDepartment($department_name, $salary_code) {

		try {

			$status = 1;
			$stmt = $this->conn->runQuery("INSERT INTO departmenttbl (
											salaryCodeID,
											departmentName,
											status
										) VALUES (
										:salaryCodeID,
										:department_name,
										:status
										)");
			$stmt->bindparam(":salaryCodeID", $salary_code);
			$stmt->bindparam(":department_name", $department_name);
			$stmt->bindparam(":status", $status);
			$stmt->execute();
			return $stmt;
			
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
			$stmt = $this->conn->runQuery("UPDATE departmenttbl SET status=:status WHERE departmentName=:id");
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
	public function updateDepartment($department_id) {

		try {


				$stmt = $this->conn->runQuery("DELETE FROM departmenttbl WHERE departmentName=:departmentName");
				$stmt->bindparam(":departmentName", $department_id);
				$stmt->execute();
				return $stmt;

			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

	}

	//restore
	public function restoreDepartment($department_id) {

		$status = 1;
		try {
			$stmt = $this->conn->runQuery("UPDATE departmenttbl SET status=:status WHERE departmentName=:id");
			$stmt->bindparam(':status', $status);
			$stmt->bindparam('id', $department_id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

}