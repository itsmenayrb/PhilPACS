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
	public function addPosition($department_name, $position_name, $code) {

		try {

			$check = $this->conn->runQuery("SELECT positionName, departmentName, salaryCode
											FROM positiontbl
											WHERE positionName=:position_name
											LIMIT 1");
			$check->execute(array(":position_name" => $position_name));
			$row = $check->fetch(PDO::FETCH_ASSOC);

			if ($row['positionName'] == $position_name && $row['departmentName'] == $department_name) {
				echo json_encode(array("error_position" => "$position_name is already exist on the same department."));
			} else {

				$status = 1;
				$stmt = $this->conn->runQuery("INSERT INTO positiontbl (
												departmentName,
												positionName,
												salaryCode,
												status
											) VALUES (
											:department_name,
											:position_name,
											:salaryCode,
											:status
											)");
				$stmt->bindparam(":department_name", $department_name);
				$stmt->bindparam(":position_name", $position_name);
				$stmt->bindparam(":salaryCode", $code);
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
	public function updatePosition($position_id, $position_name, $department_name, $code) {

		try {

			$check = $this->conn->runQuery("SELECT positionName, departmentName, salaryCode
											FROM positiontbl
											WHERE positionID=:position_id
											LIMIT 1");
			$check->execute(array(":position_id" => $position_id));
			$row = $check->fetch(PDO::FETCH_ASSOC);

			if ($row['positionName'] == $position_name && $row['departmentName'] == $department_name  && $row['salaryCode'] == $code) {
				echo json_encode(array("error_position" => "Nothing has been changed.",
										"error_department" => "Nothing has been changed.",
										"error_code" => "Nothing has been changed."));
			} else {

				$stmt = $this->conn->runQuery("UPDATE positiontbl
												SET positionName=:position_name,
												departmentName=:department_name,
												salaryCode=:code
												WHERE positionID=:position_id");
				$stmt->bindparam(":department_name", $department_name);
				$stmt->bindparam(":position_id", $position_id);
				$stmt->bindparam(":position_name", $position_name);
				$stmt->bindparam(":code", $code);	
				$stmt->execute();
				return $stmt;

			}
			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

	}

	public function displaySalaryCode($department_name) {
		try {
			$stmt = $this->conn->runQuery("SELECT salaryCodeID
											 FROM departmenttbl WHERE departmentName=:departmentName");
			$stmt->execute(array(":departmentName" => $department_name));
			?>
			<option value="" selected></option>
			<?php
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$salaryCodeID = $row['salaryCodeID'];
				$populate = $this->conn->runQuery("SELECT * FROM salarycodetbl WHERE salaryCodeID=:salaryCodeID");
				$populate->execute(array(":salaryCodeID" => $salaryCodeID));
				while ($result = $populate->fetch(PDO::FETCH_ASSOC)) {
					?>
					<option value="<?=$result['salaryCodeID'];?>"><?=$result['salaryCode'];?></option>
					<?php
				}
			}
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function displayBasicSalary($salary_code) {
		try {
			$stmt = $this->conn->runQuery("SELECT basicSalary
											 FROM salarycodetbl WHERE salaryCodeID=:salaryCodeID");
			$stmt->execute(array(":salaryCodeID" => $salary_code));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			echo json_encode($row['basicSalary']);
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	//restore
	public function restorePosition($position_id) {

		$status = 1;
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

}