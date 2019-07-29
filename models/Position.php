<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Position extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	/**
	 * Public function for adding of position
	 * @param string $position_name string
	 * @return $stmt
	 */
	public function addPosition($department_name, $position_name, $amount, $code) {

		try {

			$check = $this->conn->runQuery("SELECT positionName, departmentID, basicSalary, code
											FROM positiontbl
											WHERE positionName=:position_name
											LIMIT 1");
			$check->execute(array(":position_name" => $position_name));
			$row = $check->fetch(PDO::FETCH_ASSOC);

			if ($row['positionName'] == $position_name && $row['departmentID'] == $department_name) {
				echo json_encode(array("error_position" => "$position_name is already exist on the same department."));
			} else {

				$status = 1;

				$stmt = $this->conn->runQuery("INSERT INTO positiontbl (
												departmentID,
												positionName,
												basicSalary,
												code,
												status
											) VALUES (
											:department_name,
											:position_name,
											:basic_salary,
											:code,
											:status
											)");
				$stmt->bindparam(":department_name", $department_name);
				$stmt->bindparam(":position_name", $position_name);
				$stmt->bindparam(":basic_salary", $amount);
				$stmt->bindparam(":code", $code);
				$stmt->bindparam(":status", $status);

				$stmt->execute();
				return $stmt;

			}
			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

	}

	/**
	 * Public function for archiving of position
	 * @param  string
	 * @return $stmt
	 */
	public function archivePosition($position_id) {

		$status = 0;
		try {
			$stmt = $this->conn->runQuery("UPDATE positiontbl SET status=:status WHERE positionID=:id");
			$stmt->bindparam(':status', $status);
			$stmt->bindparam('id', $position_id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	/**
	 * public function for updating of position
	 * @param  string
	 * @return $stmt
	 * */
	public function updatePosition($position_id, $position_name, $department_name, $amount, $code) {

		try {

			$check = $this->conn->runQuery("SELECT departmentID, positionName, basicSalary, code
											FROM positiontbl
											WHERE positionID=:position_id
											LIMIT 1");
			$check->execute(array(":position_id" => $position_id));
			$row = $check->fetch(PDO::FETCH_ASSOC);

			if ($row['positionName'] == $position_name && $row['departmentID'] == $department_name && $row['basicSalary'] == $amount && $row['code'] == $code) {
				echo json_encode(array("error_position" => "Nothing has been changed.",
										"error_department" => "Nothing has been changed.",
										"error_amount" => "Nothing has been changed.",
										"error_code" => "Nothing has been changed."));
			} else {

				$stmt = $this->conn->runQuery("UPDATE positiontbl
												SET positionName=:position_name,
												departmentID=:department_id,
												basicSalary=:amount,
												code=:code
												WHERE positionID=:position_id");
				$stmt->bindparam(":department_id", $department_name);
				$stmt->bindparam(":position_id", $position_id);
				$stmt->bindparam(":position_name", $position_name);
				$stmt->bindparam(":amount", $amount);
				$stmt->bindparam(":code", $code);	
				$stmt->execute();
				return $stmt;

			}
			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

	}	

}