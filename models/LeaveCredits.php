<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class LeaveCredits extends Config {

	public $error = false;

	public function __construct() {

		$this->conn = new Config();

	}

	/**
	 * Public function for adding of percentage
	 * @param string $department_name string
	 * @return $stmt
	 */
	public function addLeaveCredits($vacationleave, $employee, $sickleave) {

		try {

			$check = $this->conn->runQuery("SELECT *
											FROM leavecreditstbl
											WHERE employeeID=:employee
											LIMIT 1");

			$check->execute(array(":employee" => $employee));
			$row = $check->fetch(PDO::FETCH_ASSOC);

			if ($row['employeeID'] == $employee) {

				if (($row['vacationLeave'] + $vacationleave) > 168 ) {
					$this->error = true;
					echo json_encode(array("error_vacationleave" => "Maximum vacation leave limit reached."));
				} 

				if (($row['sickLeave'] + $sickleave) > 168 ) {
					$this->error = true;
					echo json_encode(array("error_sickleave" => "Maximum sick leave limit reached."));
				}

			} else {

				if ($this->error == false ) {

					$stmt = $this->conn->runQuery("INSERT INTO leavecreditstbl (
													employeeID,
													vacationLeave,
													sickLeave
												) VALUES (
												:employeeID,
												:vacationleave,
												:sickleave
												)");
					$stmt->bindparam(":employeeID", $employee);				
					$stmt->bindparam(":vacationleave", $vacationleave);
					$stmt->bindparam(":sickleave", $sickleave);

					$stmt->execute();
					return $stmt;

				}

			}
			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

		return false;

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