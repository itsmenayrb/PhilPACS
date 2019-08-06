<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Employee extends Config {

	public $salary;

	public function __construct() {

		$this->conn = new Config();

	}

	public function getSalary($position_id) {

		try {
			$stmt = $this->conn->runQuery("SELECT * FROM positiontbl WHERE positionID=:position_id LIMIT 1");
			$stmt->execute(array(":position_id" => $position_id));
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$this->salary = $row['basicSalary'];
				$this->salary = number_format($this->salary, 2);
			}	
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

		echo json_encode($this->salary);

	}

	public function addEmployeeInfo($profilePicture, $firstname, $middlename, $lastname, $gender, $contact_number, $email, $birthday, $age) {

		try {
			$status = 1;

			$query = $this->conn->runQuery("SELECT firstName, lastName, email
											FROM personaldetailstbl");
			$query->execute();
			$row = $query->fetch(PDO::FETCH_ASSOC);
			
			if ($row['firstName'] == $firstname && $row['lastName'] == $lastname) {
				$error = "There's already a record for $firstname $lastname";
				echo "employee_exist";
			} else {
				if ($row['email'] == $email) {
					$error = "Email is already use.";
					echo "email_exist";
				} else {
					$stmt = $this->conn->runQuery("INSERT INTO personaldetailstbl (
											firstName,
											middleName,
											lastName,
											contactNumber,
											email,
											gender,
											birthday,
											age,
											photo,
											status)
											VALUES (
											:firstname,
											:middlename,
											:lastname,
											:contact_number,
											:email,
											:gender,
											:birthday,
											:age,
											:profilePicture,
											:status
											)");
					$stmt->bindparam(":profilePicture", $profilePicture);
					$stmt->bindparam(":firstname", $firstname);
					$stmt->bindparam(":middlename", $middlename);
					$stmt->bindparam(":lastname", $lastname);
					$stmt->bindparam(":contact_number", $contact_number);
					$stmt->bindparam(":email", $email);
					$stmt->bindparam(":gender", $gender);
					$stmt->bindparam(":birthday", $birthday);
					$stmt->bindparam(":age", $age);
					$stmt->bindparam(":status", $status);

					$stmt->execute();

					return $stmt;
				}
			}
			

		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

		return false;

	}

	public function addEmployeeAddress($house_number, $block, $lot, $street, $subdivision, $barangay, $city, $province, $country, $zipcode) {

		try {

			$stmt = $this->conn->runQuery("INSERT INTO addresstbl (
											houseNumber,
											block,
											lot,
											street,
											subdivision,
											barangay,
											city,
											province,
											country,
											zipcode)
											VALUES (
											:houseNumber,
											:block,
											:lot,
											:street,
											:subdivision,
											:barangay,
											:city,
											:province,
											:country,
											:zipcode)");
			$stmt->bindparam(":houseNumber", $house_number);
			$stmt->bindparam(":block", $block);
			$stmt->bindparam(":lot", $lot);
			$stmt->bindparam(":street", $street);
			$stmt->bindparam(":subdivision", $subdivision);
			$stmt->bindparam(":barangay", $barangay);
			$stmt->bindparam(":city", $city);
			$stmt->bindparam(":province", $province);
			$stmt->bindparam(":country", $country);
			$stmt->bindparam(":zipcode", $zipcode);

			$stmt->execute();

			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function addEmploymentInfo($date_hired, $position, $status) {

		try {
			$stmt = $this->conn->runQuery("INSERT INTO employeetbl (
											positionID,
											jobStatus,
											dateHired
											)
											VALUES (
											:positionID,
											:jobStatus,
											:dateHired
											)");
			$stmt->bindparam(":positionID", $position);
			$stmt->bindparam(":jobStatus", $status);
			$stmt->bindparam(":dateHired", $date_hired);

			$stmt->execute();

			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function addBenefitNumber($sss, $philhealth_number, $pagibig_number, $tin) {

		try {
			$stmt = $this->conn->runQuery("INSERT INTO benefitnumberstbl (
											sssNumber,
											philhealthNumber,
											pagibigNumber,
											taxIdentificationNumber
											)
											VALUES (
											:sss,
											:philhealth,
											:pagibig,
											:tin
											)");
			$stmt->bindparam(":sss", $sss);
			$stmt->bindparam(":philhealth", $philhealth_number);
			$stmt->bindparam(":pagibig", $pagibig_number);
			$stmt->bindparam(":tin", $tin);

			$stmt->execute();

			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function addBankAccount($bank_account) {

		try {
			$stmt = $this->conn->runQuery("INSERT INTO bankaccounttbl (
											bankAccountNumber
											)
											VALUES (
											:bankAccountNumber
											)");
			$stmt->bindparam(":bankAccountNumber", $bank_account);
			$stmt->execute();

			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function createAccount($personalID, $accountType, $username, $password) {
		$dateCreated = date('Y-m-d');
		$status = 1;
		try {
			$check = $this->conn->runQuery("SELECT username FROM accountstbl WHERE username=:username LIMIT 1");
			$check->execute(array(":username" => $username));
			$row = $check->fetch(PDO::FETCH_ASSOC);
			if ($row['username'] == $username) {
				echo json_encode(array("username_exist" => "Username is already use."));
			} else {
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				$stmt = $this->conn->runQuery("INSERT INTO accountstbl (
													personalID,
													accountType,
													username,
													password,
													dateCreated,
													status
												) VALUES (
													:personalID,
													:accountType,
													:username,
													:password,
													:dateCreated,
													:status
												)");
				$stmt->bindparam(":personalID", $personalID);
				$stmt->bindparam(":accountType", $accountType);
				$stmt->bindparam(":username", $username);
				$stmt->bindparam(":password", $hashedPassword);
				$stmt->bindparam(":dateCreated", $dateCreated);
				$stmt->bindparam(":status", $status);
				$stmt->execute();
				return $stmt;
			}
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function deactivateAccount($personalID) {
		$status = 0;
		try {
			$stmt = $this->conn->runQuery("UPDATE accountstbl
											SET status=:status
											WHERE personalID=:personalID");
			$stmt->bindparam(":personalID", $personalID);
			$stmt->bindparam(":status", $status);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function reactivateAccount($personalID) {
		$status = 1;
		try {
			$stmt = $this->conn->runQuery("UPDATE accountstbl
											SET status=:status
											WHERE personalID=:personalID");
			$stmt->bindparam(":personalID", $personalID);
			$stmt->bindparam(":status", $status);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function updateAccount($personalID, $accountType, $password) {
		try {
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$stmt = $this->conn->runQuery("UPDATE accountstbl
											SET accountType=:accountType,
												password=:password
											WHERE personalID=:personalID");
			$stmt->bindparam(":personalID", $personalID);
			$stmt->bindparam(":accountType", $accountType);
			$stmt->bindparam(":password", $hashedPassword);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}	

	public function updateEmployeeProfile($path, $id , $firstname, $middlename, $lastname, $gender, $contact_number, $email, $birthday, $age, $house_number, $block, $lot, $street, $subdivision, $barangay, $city, $province, $country, $zipcode, $sss, $philhealth_number, $pagibig_number, $tin, $bank_account, $date_hired, $position, $status) {

		try {

			if ($path == "") {
				$getUrl = $this->conn->runQuery("SELECT photo FROM personaldetailstbl WHERE personalID=:id LIMIT 1");
				$getUrl->execute(array(":id"=>$id));
				$row = $getUrl->fetch(PDO::FETCH_ASSOC);
				$path = $row['photo'];
			}

			$stmt = $this->conn->runQuery("UPDATE personaldetailstbl
										   INNER JOIN addresstbl ON personaldetailstbl.personalID = addresstbl.addressID
										   INNER JOIN benefitnumberstbl ON addresstbl.addressID = benefitnumberstbl.benefitID
										   INNER JOIN bankaccounttbl ON benefitnumberstbl.benefitID = bankaccounttbl.bankAccountID
										   INNER JOIN employeetbl ON bankaccounttbl.bankAccountID = employeetbl.employeeID
										   SET personaldetailstbl.photo=:profilePicture, personaldetailstbl.firstName=:firstName, personaldetailstbl.middleName=:middleName, personaldetailstbl.lastName=:lastName,
										   	   personaldetailstbl.contactNumber=:contactNumber, personaldetailstbl.email=:email, personaldetailstbl.gender=:gender,
										   	   personaldetailstbl.birthday=:birthday, personaldetailstbl.age=:age,
										   	   addresstbl.houseNumber=:houseNumber, addresstbl.block=:block, addresstbl.lot=:lot, addresstbl.street=:street,
										   	   addresstbl.subdivision=:subdivision, addresstbl.barangay=:barangay, addresstbl.city=:city,
										   	   addresstbl.province=:province, addresstbl.country=:country, addresstbl.zipcode=:zipcode,
										   	   benefitnumberstbl.sssNumber=:sssNumber, benefitnumberstbl.philhealthNumber=:philhealthNumber, benefitnumberstbl.pagibigNumber=:pagibigNumber, benefitnumberstbl.taxIdentificationNumber=:taxIdentificationNumber,
										   	   bankaccounttbl.bankAccountNumber=:bankAccountNumber,
										   	   employeetbl.dateHired=:dateHired, employeetbl.positionID=:positionID, employeetbl.jobStatus=:jobStatus
										   WHERE personaldetailstbl.personalID=:personalID");
			$stmt->bindparam(":personalID", $id);
			$stmt->bindparam(":profilePicture", $path);
			$stmt->bindparam(":firstName", $firstname);
			$stmt->bindparam(":middleName", $middlename);
			$stmt->bindparam(":lastName", $lastname);
			$stmt->bindparam(":gender", $gender);
			$stmt->bindparam(":contactNumber", $contact_number);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":birthday", $birthday);
			$stmt->bindparam(":age", $age);

			$stmt->bindparam(":houseNumber", $house_number);
			$stmt->bindparam(":block", $block);
			$stmt->bindparam(":lot", $lot);
			$stmt->bindparam(":street", $street);
			$stmt->bindparam(":subdivision", $subdivision);
			$stmt->bindparam(":barangay", $barangay);
			$stmt->bindparam(":city", $city);
			$stmt->bindparam(":province", $province);
			$stmt->bindparam(":country", $country);
			$stmt->bindparam(":zipcode", $zipcode);

			$stmt->bindparam(":sssNumber", $sss);
			$stmt->bindparam(":philhealthNumber", $philhealth_number);
			$stmt->bindparam(":pagibigNumber", $pagibig_number);
			$stmt->bindparam(":taxIdentificationNumber", $tin);
			$stmt->bindparam(":bankAccountNumber", $bank_account);

			$stmt->bindparam(":dateHired", $date_hired);
			$stmt->bindparam(":positionID", $position);
			$stmt->bindparam(":jobStatus", $status);

			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}

	}

	public function removeEmployee($personalID) {
		$status = 0;
		try {
			$stmt = $this->conn->runQuery("UPDATE personaldetailstbl
											SET status=:status
											WHERE personalID=:personalID");
			$stmt->bindparam(":personalID", $personalID);
			$stmt->bindparam(":status", $status);
			$stmt->execute();
			return $stmt;			
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function changeDP($personalID, $profilePicture) {
		try {
			$stmt = $this->conn->runQuery("UPDATE personaldetailstbl SET photo=:profilePicture WHERE personalID=:personalID");
			$stmt->bindparam(':profilePicture', $profilePicture);
			$stmt->bindparam(':personalID', $personalID);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function checkEmail($email) {
		try {
			$stmt = $this->conn->runQuery("SELECT email FROM personaldetailstbl WHERE email=:email LIMIT 1");
			$stmt->execute(array(":email" => $email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($email == $row['email']) {
				echo "error";
			} else {
				echo "success";
			}
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}