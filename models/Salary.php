<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Salary extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	/**
	 * Public function for adding of position
	 * @param string $position_name string
	 * @return $stmt
	 */
	public function addSalary($amount, $position_name) {

		try {

			$check = $this->conn->runQuery("SELECT amount, position_id
											FROM salary_tbl
											WHERE position_id=:position_id
											LIMIT 1");
			$check->execute(array(":position_id" => $position_name));
			$row = $check->fetch(PDO::FETCH_ASSOC);

			if ($row['position_id'] == $position_name && $row['amount'] == $amount) {
				echo json_encode(array("error_amount" => "No changes has been made.",
										"error_position" => "No changes has been made."));
			} else {

				$status = 1;

				$stmt = $this->conn->runQuery("INSERT INTO salary_tbl (
												position_id,
												amount,
												status
											) VALUES (
											:position_id,
											:amount,
											:status
											)");
				$stmt->bindparam(":amount", $amount);
				$stmt->bindparam(":position_id", $position_name);
				$stmt->bindparam(":status", $status);

				$stmt->execute();
				return $stmt;

			}
			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

	}

	/**
	 * Public function for archiving of salary
	 * @param  string
	 * @return $stmt
	 */
	public function archiveSalary($salary_id) {

		$status = 0;
		try {
			$stmt = $this->conn->runQuery("UPDATE salary_tbl SET status=:status WHERE salary_id=:id");
			$stmt->bindparam(':status', $status);
			$stmt->bindparam('id', $salary_id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	/**
	 * public function for updating of salary
	 * @param  string
	 * @return $stmt
	 * */
	public function updateSalary($salary_id, $position_id, $amount) {

		try {

			
			$stmt = $this->conn->runQuery("UPDATE salary_tbl
											SET position_id=:position_id,
											amount=:amount
											WHERE salary_id=:salary_id");
			$stmt->bindparam(":amount", $amount);
			$stmt->bindparam(":position_id", $position_id);
			$stmt->bindparam(":salary_id", $salary_id);

			$stmt->execute();
			return $stmt;

			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();	
		}

	}	

}