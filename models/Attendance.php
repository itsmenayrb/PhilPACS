<?php
/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Attendance extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	public function updateAttendanceRecord($hashedFile, $attendanceID, $EMTimein, $EMTimeout, $EATimein, $EATimeout, $totalMinutes) {
		try {
			$stmt = $this->conn->runQuery("UPDATE attendancetbl
											SET EMTimein=:EMTimein,
												EMTimeout=:EMTimeout,
												EATimein=:EATimein,
												EATimeout=:EATimeout,
												totalMinutes=:totalMinutes
											WHERE attendanceID=:attendanceID");
			$stmt->bindparam(":EMTimein", $EMTimein);
			$stmt->bindparam(":EMTimeout", $EMTimeout);
			$stmt->bindparam(":EATimein", $EATimein);
			$stmt->bindparam(":EATimeout", $EMTimeout);
			$stmt->bindparam(":attendanceID", $attendanceID);
			$stmt->bindparam(":totalMinutes", $totalMinutes);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}
	public function resetAttendance($attendanceID) {
		try {

			$totalMinutes = null;

			$stmt = $this->conn->runQuery("UPDATE attendancetbl
											SET totalMinutes=:totalMinutes
											WHERE attendanceID=:attendanceID");
			$stmt->bindparam(":attendanceID", $attendanceID);
			$stmt->bindparam(":totalMinutes", $totalMinutes);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function saveAttendanceForPending($hashedFile) {
		try {
			$status = 2;
			$stmt = $this->conn->runQuery("UPDATE attendancetbl
											SET status=:status
											WHERE hashedFile=:hashedFile");
			$stmt->bindparam(":status", $status);
			$stmt->bindparam(":hashedFile", $hashedFile);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function sendToPayroll($hashedFile) {
		try {
			$status = 1;
			$stmt = $this->conn->runQuery("UPDATE attendancetbl
											SET status=:status
											WHERE hashedFile=:hashedFile");
			$stmt->bindparam(":status", $status);
			$stmt->bindparam(":hashedFile", $hashedFile);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function removeAttendance($hashedFile) {
		try {
			$stmt = $this->conn->runQuery("DELETE FROM attendancetbl WHERE hashedFile=:hashedFile");
			$stmt->bindparam(":hashedFile", $hashedFile);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}