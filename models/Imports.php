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

//Tax

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

}

//Attendance
class Attendance extends Imports {

	public function importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout, $totalMinutes, $hashedFile) {

		try {
			$status = 0;
			$stmt = $this->conn->runQuery("INSERT INTO attendancetbl (
											firstName,
											lastName,
											Edate,
											EMTimein,
											EMTimeout,
											EATimein,
											EATimeout,
											totalMinutes,
											status,
											hashedFile
										  ) VALUES (
											:firstName,
											:lastName,
											:Edate,
											:EMTimein,
											:EMTimeout,
											:EATimein,
											:EATimeout,
											:totalMinutes,
											:status,
											:hashedFile
										)");
			$stmt->bindparam(':firstName', $firstName);
			$stmt->bindparam(':lastName', $lastName);
			$stmt->bindparam(':Edate', $Edate);
			$stmt->bindparam(':EMTimein', $EMTimein);
			$stmt->bindparam(':EMTimeout', $EMTimeout);
			$stmt->bindparam(':EATimein', $EATimein);
			$stmt->bindparam(':EATimeout', $EATimeout);
			$stmt->bindparam(':totalMinutes', $totalMinutes);
			$stmt->bindparam(':status', $status);
			$stmt->bindparam(':hashedFile', $hashedFile);
			$stmt->execute();
			return $stmt;

		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function checkAttendanceIfExist($hashedFile) {
		try {
			$checkFile = $this->conn->runQuery("SELECT hashedFile FROM attendancetbl WHERE hashedFile=:hashedFile LIMIT 1");
			$checkFile->execute(array(":hashedFile" => $hashedFile));
			$row = $checkFile->fetch(PDO::FETCH_ASSOC);
			if ($checkFile->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}