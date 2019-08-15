<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class SalaryCode extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	public function add_salary_code($salary_code, $basicSalary, $description) {
		try {
			$status = 1;
			$stmt = $this->conn->runQuery("SELECT salaryCode FROM salarycodetbl WHERE salaryCode=:salary_code LIMIT 1");
			$stmt->execute(array(":salary_code" => $salary_code));
			$stmt->fetch(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() > 0) {
				echo json_encode(array("error_salary_code" => "The salary code is already exist."));
			} else {
				$insert = $this->conn->runQuery("INSERT INTO salarycodetbl (
													salaryCode,
													description,
													basicSalary,
													status
												) VALUES (
													:salaryCode,
													:description,
													:basicSalary,
													:status
												)");
				$insert->bindparam(':salaryCode', $salary_code);
				$insert->bindparam(':description', $description);
				$insert->bindparam(':basicSalary', $basicSalary);
				$insert->bindparam(':status', $status);
				$insert->execute();
				return $insert;
			}


		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function update_salary_code($id, $salary_code, $basicSalary, $description) {
		try {

			$stmt = $this->conn->runQuery("UPDATE salarycodetbl SET
												salaryCode=:salaryCode,
												description=:description,
												basicSalary=:basicSalary
											WHERE salaryCodeID=:salaryCodeID");

			$stmt->bindparam(':salaryCode', $salary_code);
			$stmt->bindparam(':description', $description);
			$stmt->bindparam(':basicSalary', $basicSalary);
			$stmt->bindparam(':salaryCodeID', $id);
			$stmt->execute();
			return $stmt;


		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function archive_salary_code($id) {

		try {
			$status = 0;
			$stmt = $this->conn->runQuery("UPDATE salarycodetbl SET status=:status WHERE salaryCodeID=:id");
			$stmt->bindparam(':status', $status);
			$stmt->bindparam(':id', $id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function restore_salary_code($id) {

		try {
			$status = 1;
			$stmt = $this->conn->runQuery("UPDATE salarycodetbl SET status=:status WHERE salaryCodeID=:id");
			$stmt->bindparam(':status', $status);
			$stmt->bindparam(':id', $id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

}