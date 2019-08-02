<?php

/**
 * Controller for Employee Module
 */

require_once '../models/Config.php';
require_once '../models/Employee.php';

$config = new Config();
$error = false;

/**
 * Dynamically get the salary when
 * changing of position on creating of account
 */
if (isset($_POST['getSalary'])) {
	$position_id = $config->checkInput($_POST['id']);
	$get_salary = new Employee();
	$get_salary->getSalary($position_id);
}

/**
 * Adding of employee
 */
if (isset($_POST['firstname'])) {

	$path = "";
	
	//Personal
	$firstname = $config->checkInput($_POST['firstname']);
	$middlename = $config->checkInput($_POST['middlename']);
	$lastname = $config->checkInput($_POST['lastname']);
	$gender = $config->checkInput($_POST['gender']);
	$contact_number = $config->checkInput($_POST['contact_number']);
	$email = $config->checkInput($_POST['email']);
	$birthday = $config->checkInput($_POST['birthday']);
	$age = $config->checkInput($_POST['age']);

	//Address
	$house_number = $config->checkInput($_POST['house_number']);
	$block = $config->checkInput($_POST['block']);
	$lot = $config->checkInput($_POST['lot']);
	$street = $config->checkInput($_POST['street']);
	$subdivision = $config->checkInput($_POST['subdivision']);
	$barangay = $config->checkInput($_POST['barangay']);
	$city = $config->checkInput($_POST['city']);
	$province = $config->checkInput($_POST['province']);
	$country = $config->checkInput($_POST['country']);
	$zipcode = $config->checkInput($_POST['zipcode']);


	//Employment
	$date_hired = $config->checkInput($_POST['date_hired']);
	$position = $config->checkInput($_POST['position']);
	$status = $config->checkInput($_POST['status']);

	//Other info
	$sss = $config->checkInput($_POST['SSS_number']);
	$philhealth_number = $config->checkInput($_POST['philhealth_number']);
	$pagibig_number = $config->checkInput($_POST['PAGIBIG_number']);
	$tin = $config->checkInput($_POST['tin']);
	$bank_account = $config->checkInput($_POST['bank_account']);

	//////////////////////////////////////////////////////////////////////////////
	//Validations/////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////
	// $contact_number = str_replace('-', '', $contact_number);

	$birthday = date('Y-m-d', strtotime($birthday));

	if ($house_number != "") {
		$house_number = "House #" . $house_number;
	}

	if ($block != "") {
		$block = "Block " . $block;
	}

	if ($lot != "") {
		$lot = "Lot " . $lot;
	}

	if ($street != "") {
		$street = $street . " St.";
	}

	$date_hired = date('Y-m-d', strtotime($date_hired));

	if (checkName($firstname) == false) {
		$error = true;
		echo "invalid_firstname";
	}

	if ($middlename != "") {
		if (checkName($middlename) == false) {
			$error = true;
			echo "invalid_middlename";
		}
	}

	if (checkName($lastname) == false) {
		$error = true;
		echo "invalid_lastname";
	}

	
	if (!empty($_FILES['profilePicture']['name'])) {
		$check = getimagesize($_FILES['profilePicture']['tmp_name']);
		if ($check !== false) {
			$valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG');
	        $path = '../uploads/';

	        $img = $_FILES['profilePicture']['name'];
	        $temporary = $_FILES['profilePicture']['tmp_name'];

	        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	        $final_image = rand(1000, 1000000) . $img;

	        if (in_array($ext, $valid_extensions))
	        {
	            $path = $path.strtolower($final_image);

	            if(move_uploaded_file($temporary, $path)) {
	            	$error = false;
	            }

	        } else {
	        	$error = true;
	            echo json_encode(array("invalid_image" => 'Invalid Image File.'));
	        }
		} else {
			$path = "";
		}
	}

	if ($error == false){
		$addEmployee = new Employee();
		if($addEmployee->addEmployeeInfo($path, $firstname, $middlename, $lastname, $gender, $contact_number, $email, $birthday, $age)){
			if ($addEmployee->addEmployeeAddress($house_number, $block, $lot, $street, $subdivision, $barangay, $city, $province, $country, $zipcode)) {
				if($addEmployee->addEmploymentInfo($date_hired, $position, $status)) {
					if($addEmployee->addBenefitNumber($sss, $philhealth_number, $pagibig_number, $tin)){
						if($addEmployee->addBankAccount($bank_account)){
							echo "success";
							return true;
						}
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	return false;

}

// //Displaying of employee profile in a modal
// if (isset($_POST['displayEmployeeProfile'])) {
// 	$personalID = $config->checkInput($_POST['viewID']);
// 	$viewEmployeeDetails = new Employee();
// 	$viewEmployeeDetails->viewEmployeeDetails($personalID);
// }

// //Display of account if user has one.
// if (isset($_POST['displayExistingAccount'])) {
// 	$personalID = $config->checkInput($_POST['viewID']);
// 	$viewAccountDetails = new Employee();
// 	$viewAccountDetails->viewAccountDetails($personalID);
// }

//creating of account for maker or authorizer
if (isset($_POST['createAccount'])) {

	$personalID = $config->checkInput($_POST['id']);
	$accountType = $config->checkInput($_POST['accountType']);
	$username = $config->checkInput($_POST['username']);
	$password = $config->checkInput($_POST['password']);
	$rpassword = $config->checkInput($_POST['rpassword']);

	if (empty($username)) {
		$error = true;
		echo json_encode(array("empty_username" => "Username is required.")); 
	}

	if (empty($password)) {
		$error = true;
		echo json_encode(array("empty_password" => "Password is required.")); 
	}

	if (empty($rpassword)) {
		$error = true;
		echo json_encode(array("empty_rpassword" => "Please re-type your password.")); 
	}

	if ($password != $rpassword) {
		$error = true;
		echo json_encode(array("error_password" => "Password did not match.")); 
	}

	if ($error == false) {
		$createAccount = new Employee();
		if ($createAccount->createAccount($personalID, $accountType, $username, $password)) {
			echo json_encode(array("success" => "Account created successfully!"));
			return true;
		}
	}

	return false;

}

//Resetting of password
if (isset($_POST['reset_password'])) {

	$personalID = $config->checkInput($_POST['hiddenPersonalIDResetPassword']);
	$accountType = $config->checkInput($_POST['reset_accountType']);
	$password = $config->checkInput($_POST['reset_password']);
	$rpassword = $config->checkInput($_POST['reset_rpassword']);


	if (empty($password)) {
		$error = true;
		echo json_encode(array("empty_password" => "Password is required.")); 
	}

	if (empty($rpassword)) {
		$error = true;
		echo json_encode(array("empty_rpassword" => "Please re-type your password.")); 
	}

	if ($password != $rpassword) {
		$error = true;
		echo json_encode(array("error_password" => "Password did not match.")); 
	}

	if ($error == false) {
		$updateAccount = new Employee();
		if ($updateAccount->updateAccount($personalID, $accountType, $password)) {
			echo json_encode(array("success" => "Account updated successfully!"));
			return true;
		}
	}

	return false;

}

//Resetting of password
if (isset($_POST['reset_password'])) {

	$personalID = $config->checkInput($_POST['hiddenPersonalIDResetPassword']);
	$accountType = $config->checkInput($_POST['reset_accountType']);
	$password = $config->checkInput($_POST['reset_password']);
	$rpassword = $config->checkInput($_POST['reset_rpassword']);


	if (empty($password)) {
		$error = true;
		echo json_encode(array("empty_password" => "Password is required.")); 
	}

	if (empty($rpassword)) {
		$error = true;
		echo json_encode(array("empty_rpassword" => "Please re-type your password.")); 
	}

	if ($password != $rpassword) {
		$error = true;
		echo json_encode(array("error_password" => "Password did not match.")); 
	}

	if ($error == false) {
		$updateAccount = new Employee();
		if ($updateAccount->updateAccount($personalID, $accountType, $password)) {
			echo json_encode(array("success" => "Account updated successfully!"));
			return true;
		}
	}

	return false;

}

//Deactivating of account
if (isset($_POST['deactivateAccount'])) {
	$personalID = $config->checkInput($_POST['id']);
	$deactivateAccount = new Employee();
	$deactivateAccount->deactivateAccount($personalID);
}

//Reactivating of account
if (isset($_POST['reactivateAccount'])) {
	$personalID = $config->checkInput($_POST['id']);
	$reactivateAccount = new Employee();
	$reactivateAccount->reactivateAccount($personalID);
}

//display personal info in a form to edit
if (isset($_POST['viewEditPersonalDetails'])) {
	$personalID = $config->checkInput($_POST['id']);
	$viewEditPersonalDetails = new Employee();
	$viewEditPersonalDetails->viewEditPersonalDetails($personalID);
}

//edit personal info
if (isset($_POST['edit_firstname'])) {
	
	$path = "";
	//Personal
	$id = $config->checkInput($_POST['hiddenEditEmployeeID']);
	$firstname = $config->checkInput($_POST['edit_firstname']);
	$middlename = $config->checkInput($_POST['edit_middlename']);
	$lastname = $config->checkInput($_POST['edit_lastname']);
	$gender = $config->checkInput($_POST['edit_gender']);
	$contact_number = $config->checkInput($_POST['edit_contact_number']);
	$email = $config->checkInput($_POST['edit_email']);
	$birthday = $config->checkInput($_POST['edit_birthday']);
	$age = $config->checkInput($_POST['edit_age']);

	//Address
	$house_number = $config->checkInput($_POST['edit_house_number']);
	$block = $config->checkInput($_POST['edit_block']);
	$lot = $config->checkInput($_POST['edit_lot']);
	$street = $config->checkInput($_POST['edit_street']);
	$subdivision = $config->checkInput($_POST['edit_subdivision']);
	$barangay = $config->checkInput($_POST['edit_barangay']);
	$city = $config->checkInput($_POST['edit_city']);
	$province = $config->checkInput($_POST['edit_province']);
	$country = $config->checkInput($_POST['edit_country']);
	$zipcode = $config->checkInput($_POST['edit_zipcode']);

	//Employment
	$date_hired = $config->checkInput($_POST['edit_date_hired']);
	$position = $config->checkInput($_POST['edit_position']);
	$status = $config->checkInput($_POST['edit_status']);

	//Other info
	$sss = $config->checkInput($_POST['edit_SSS_number']);
	$philhealth_number = $config->checkInput($_POST['edit_philhealth_number']);
	$pagibig_number = $config->checkInput($_POST['edit_PAGIBIG_number']);
	$tin = $config->checkInput($_POST['edit_tin']);
	$bank_account = $config->checkInput($_POST['edit_bank_account']);

	$birthday = date('Y-m-d', strtotime($birthday));

	if ($house_number != "") {
		$house_number = "House #" . $house_number;
	}

	if ($block != "") {
		$block = "Block " . $block;
	}

	if ($lot != "") {
		$lot = "Lot " . $lot;
	}

	if ($street != "") {
		$street = $street . " St.";
	}

	if (checkName($firstname) == false) {
		$error = true;
		echo json_encode(array("invalid_firstname" => "Invalid First Name"));
	}

	if ($middlename != "") {
		if (checkName($middlename) == false) {
			$error = true;
			echo json_encode(array("invalid_middlename" => "Invalid Middle Name"));
		}
	}

	if (checkName($lastname) == false) {
		$error = true;
		echo json_encode(array("invalid_lastname" => "Invalid Last Name"));
	}

	$date_hired = date('Y-m-d', strtotime($date_hired));

	if (!empty($_FILES['edit_profilePicture']['name'])) {
		$check = getimagesize($_FILES['edit_profilePicture']['tmp_name']);
		if ($check !== false) {
			$valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG');
	        $path = '../uploads/';

	        $img = $_FILES['edit_profilePicture']['name'];
	        $temporary = $_FILES['edit_profilePicture']['tmp_name'];

	        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	        $final_image = rand(1000, 1000000) . $img;

	        if (in_array($ext, $valid_extensions))
	        {
	            $path = $path.strtolower($final_image);

	            if(move_uploaded_file($temporary, $path)) {
	            	$error = false;
	            }

	        } else {
	        	$error = true;
	            echo json_encode(array("invalid_image" => 'Invalid Image File.'));
	        }
		} else {
			$path = "";
		}
	}

	if ($error == false){
		$updateEmployeeProfile = new Employee();
		if($updateEmployeeProfile->updateEmployeeProfile($path, $id , $firstname, $middlename, $lastname, $gender, $contact_number, $email, $birthday, $age, $house_number, $block, $lot, $street, $subdivision, $barangay, $city, $province, $country, $zipcode, $sss, $philhealth_number, $pagibig_number, $tin, $bank_account, $date_hired, $position, $status)){
			echo json_encode(array("success" => "Profile Updated Successfully!"));
			return true;
		} else {
			return false;
		}
	}

	return false;

}

//removing of employee
if (isset($_POST['removeEmployee'])) {
	$personalID = $config->checkInput($_POST['id']);
	$removeEmployee = new Employee();
	$removeEmployee->removeEmployee($personalID);	
}


function checkName($name) {
	if(preg_match("/^[a-zA-z\s]+$/", $name)) {
		return true;
	}
	return false;
}