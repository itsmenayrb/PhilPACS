<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Imports extends Config {


	public function __construct() {

		$this->conn = new Config();

	}


}

//SSS
class SSS extends Imports {

	public function importSSS($rangeOfCompensationFrom, $rangeOfCompensationTo, $monthlySalaryCredit, $socialSecurityEmployer, $socialSecurityEmployee, $socialSecurityTotal, $employeeCompensationEmployer, $totalContributionEmployer, $totalContributionEmployee, $totalContributions) {

		try {


			$stmt = $this->conn->runQuery("INSERT INTO sssmatrixtbl (
											rangeOfCompensationFrom,
											rangeOfCompensationTo,
											monthlySalaryCredit,
											socialSecurityEmployer,
											socialSecurityEmployee,
											socialSecurityTotal,
											employeeCompensationEmployer,
											totalContributionEmployer,
											totalContributionEmployee,
											totalContributions
										  ) VALUES (
											:rangeOfCompensationFrom,
											:rangeOfCompensationTo,
											:monthlySalaryCredit,
											:socialSecurityEmployer,
											:socialSecurityEmployee,
											:socialSecurityTotal,
											:employeeCompensationEmployer,
											:totalContributionEmployer,
											:totalContributionEmployee,
											:totalContributions
										)");
			$stmt->bindparam(':rangeOfCompensationFrom', $rangeOfCompensationFrom);
			$stmt->bindparam(':rangeOfCompensationTo', $rangeOfCompensationTo);
			$stmt->bindparam(':monthlySalaryCredit', $monthlySalaryCredit);
			$stmt->bindparam(':socialSecurityEmployer', $socialSecurityEmployer);
			$stmt->bindparam(':socialSecurityEmployee', $socialSecurityEmployee);
			$stmt->bindparam(':socialSecurityTotal', $socialSecurityTotal);
			$stmt->bindparam(':employeeCompensationEmployer', $employeeCompensationEmployer);
			$stmt->bindparam(':totalContributionEmployer', $totalContributionEmployer);
			$stmt->bindparam(':totalContributionEmployee', $totalContributionEmployee);
			$stmt->bindparam(':totalContributions', $totalContributions);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function deleteSSSMatrix() {
		try {
			$stmt = $this->conn->runQuery("TRUNCATE TABLE sssmatrixtbl");
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}

//Philhealth
class Philhealth extends Imports {

	public function importPhilhealth($basicSalaryFrom, $basicSalaryTo, $monthlyPremiumFrom, $monthlyPremiumTo, $personalShareFrom, $personalShareTo, $employerShareFrom, $employerShareTo) {

		try {
			$stmt = $this->conn->runQuery("INSERT INTO philhealthmatrixtbl (
											basicSalaryFrom,
											basicSalaryTo,
											monthlyPremiumFrom,
											monthlyPremiumTo,
											personalShareFrom,
											personalShareTo,
											employerShareFrom,
											employerShareTo
										  ) VALUES (
											:basicSalaryFrom,
											:basicSalaryTo,
											:monthlyPremiumFrom,
											:monthlyPremiumTo,
											:personalShareFrom,
											:personalShareTo,
											:employerShareFrom,
											:employerShareTo
										)");
			$stmt->bindparam(':basicSalaryFrom', $basicSalaryFrom);
			$stmt->bindparam(':basicSalaryTo', $basicSalaryTo);
			$stmt->bindparam(':monthlyPremiumFrom', $monthlyPremiumFrom);
			$stmt->bindparam(':monthlyPremiumTo', $monthlyPremiumTo);
			$stmt->bindparam(':personalShareFrom', $personalShareFrom);
			$stmt->bindparam(':personalShareTo', $personalShareTo);
			$stmt->bindparam(':employerShareFrom', $employerShareFrom);
			$stmt->bindparam(':employerShareTo', $employerShareTo);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function deletePhilhealthMatrix() {
		try {
			$stmt = $this->conn->runQuery("TRUNCATE TABLE philhealthmatrixtbl");
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}

//Pagibig
class Pagibig extends Imports {

	public function importPagibig($monthlyCompensationFrom, $monthlyCompensationTo, $employeeShare, $employerShare) {

		try {
			$stmt = $this->conn->runQuery("INSERT INTO pagibigmatrixtbl (
											monthlyCompensationFrom,
											monthlyCompensationTo,
											employeeShare,
											employerShare
										  ) VALUES (
											:monthlyCompensationFrom,
											:monthlyCompensationTo,
											:employeeShare,
											:employerShare
										)");
			$stmt->bindparam(':monthlyCompensationFrom', $monthlyCompensationFrom);
			$stmt->bindparam(':monthlyCompensationTo', $monthlyCompensationTo);
			$stmt->bindparam(':employeeShare', $employeeShare);
			$stmt->bindparam(':employerShare', $employerShare);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function deletePagibigMatrix() {
		try {
			$stmt = $this->conn->runQuery("TRUNCATE TABLE pagibigmatrixtbl");
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}

<<<<<<< HEAD
//Tax
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
class Tax extends Imports {

	public function importTax($compensationLevel, $minimumWithholdingTax) {

		try {
			$stmt = $this->conn->runQuery("INSERT INTO taxmatrixtbl (
											compensationLevel,
											minimumWithholdingTax
										  ) VALUES (
											:compensationLevel,
											:minimumWithholdingTax
										)");
			$stmt->bindparam(':compensationLevel', $compensationLevel);
			$stmt->bindparam(':minimumWithholdingTax', $minimumWithholdingTax);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function deleteTaxMatrix() {
		try {
			$stmt = $this->conn->runQuery("TRUNCATE TABLE taxmatrixtbl");
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

<<<<<<< HEAD
=======
}
class Attendance extends Imports {

	public function importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout) {

		try {

<<<<<<< HEAD
}

class Tax extends Imports {

	public function importTax($compensationLevel, $minimumWithholdingTax) {

		try {
			$stmt = $this->conn->runQuery("INSERT INTO taxmatrixtbl (
											compensationLevel,
											minimumWithholdingTax
										  ) VALUES (
											:compensationLevel,
											:minimumWithholdingTax
										)");
			$stmt->bindparam(':compensationLevel', $compensationLevel);
			$stmt->bindparam(':minimumWithholdingTax', $minimumWithholdingTax);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function deleteTaxMatrix() {
		try {
			$stmt = $this->conn->runQuery("TRUNCATE TABLE taxmatrixtbl");
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
}
<<<<<<< HEAD

//Attendance
class Attendance extends Imports {

	public function importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout, $totalMinutes, $hashedFile) {
		$status = 0;
		try {
=======
class Attendance extends Imports {

	public function importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout) {

		try {

>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
			$stmt = $this->conn->runQuery("INSERT INTO attendancetbl (
											firstName,
											lastName,
											Edate,
											EMTimein,
											EMTimeout,
											EATimein,
<<<<<<< HEAD
											EATimeout,
											totalMinutes,
											status,
											hashedFile
										  ) VALUES (
											:firstName,
											:lastName,
=======
											EATimeout
										  ) VALUES (
											:lastName,
											:firstName,
<<<<<<< HEAD
=======
=======
			$stmt = $this->conn->runQuery("INSERT INTO attendancetbl (
											firstName,
											lastName,
											Edate,
											EMTimein,
											EMTimeout,
											EATimein,
											EATimeout
										  ) VALUES (
											:lastName,
<<<<<<< HEAD
>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
=======
											:firstName,
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
											:Edate,
											:EMTimein,
											:EMTimeout,
											:EATimein,
<<<<<<< HEAD
											:EATimeout,
											:totalMinutes,
											:status,
											:hashedFile
										)");
			$stmt->bindparam(':firstName', $firstName);
			$stmt->bindparam(':lastName', $lastName);
=======
											:EATimeout
										)");
<<<<<<< HEAD
<<<<<<< HEAD
			$stmt->bindparam(':lastName', $lastName);
			$stmt->bindparam(':firstName', $firstName);
=======
			$stmt->bindparam(':firstName', $firstName);
			$stmt->bindparam(':lastName', $lastName);
>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
=======
			$stmt->bindparam(':lastName', $lastName);
			$stmt->bindparam(':firstName', $firstName);
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
			$stmt->bindparam(':Edate', $Edate);
			$stmt->bindparam(':EMTimein', $EMTimein);
			$stmt->bindparam(':EMTimeout', $EMTimeout);
			$stmt->bindparam(':EATimein', $EATimein);
			$stmt->bindparam(':EATimeout', $EATimeout);
<<<<<<< HEAD
			$stmt->bindparam(':totalMinutes', $totalMinutes);
			$stmt->bindparam(':status', $status);
			$stmt->bindparam(':hashedFile', $hashedFile);
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
<<<<<<< HEAD
<<<<<<< HEAD

	}

=======
	}
>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
=======

	}

<<<<<<< HEAD
<<<<<<< HEAD

}
=======
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
	public function deleteAttendance() {
		try {
			$stmt = $this->conn->runQuery("TRUNCATE TABLE attendancetbl");
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}
<<<<<<< HEAD
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
=======
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
