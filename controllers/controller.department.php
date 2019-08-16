<?php

/**
 * Controller for Department Module
 */

require_once '../models/Config.php';
require_once '../models/Department.php';

$config = new Config();


/**
 * If adding of department has been set
 */
if (isset($_POST['department_name']) && !isset($_POST['update_department_name'])) {

	$department_name = $config->checkInput($_POST['department_name']);
	$salary_code = $_POST['salary_code'];
	$i = 0;

	if (empty($department_name)) {

		echo json_encode(array("error_department_name" => "Department Name is required."));

	}

	if (checkDepartment($department_name) == false) {

		echo json_encode(array("error_department_name" => "Invalid Department Name."));

	}

	if (empty($salary_code)) {

		echo json_encode(array("error_salary_code" => "Salary Code is required."));

	}

	if (!empty($department_name) && !empty($salary_code)) {

		if ($add_department_name = new Department()) {
			for ($i=0; $i<count($salary_code); $i++) {
				$add_department_name->addDepartment($department_name, $salary_code[$i]);
			}

			echo json_encode(array("success" => "$department_name Added Successfully!"));
		}

	}
	// var_dump($department_name);
	// var_dump($salary_code);

}
/**
 * End of adding of department
 */

/**
 * If archiving of department has been set
 */
if (isset($_POST['archive_department'])) {

	$department_id = $config->checkInput($_POST['department_id']);

	$archive = new Department();
	if ($archive->archiveDepartment($department_id)) {
		echo json_encode(array("success" => "Department Archived Successfully!"));
	}

}
/**
 * End of archiving of department
 */

/**
 * If updating of department has been set
 */
if (isset($_POST['update_department_name'])) {

	$department_id = $config->checkInput($_POST['hiddenDepartmentName']);
	$department_name = $config->checkInput($_POST['update_department_name']);
	$salary_code = $_POST['update_salary_code'];

	if (empty($department_name)) {

		echo json_encode(array("error_department_name" => "Department Name is required."));

	} 

	if (empty($salary_code)) {

		echo json_encode(array("error_salary_code" => "Salary Code is required."));

	}

	if (!empty($department_name) && !empty($salary_code)) {

		if ($update_department_name = new Department()) {
			$update_department_name->updateDepartment($department_id);
			for ($i=0; $i<count($salary_code); $i++) {
				$update_department_name->addDepartment($department_name, $salary_code[$i]);
			}
			echo json_encode(array("success" => "Success!"));
		}

	}

}
/**
 * End of updating of department
 */

//restore
if (isset($_POST['restore_department'])) {

	$department_id = $config->checkInput($_POST['id']);

	$archive = new Department();
	if ($archive->restoreDepartment($department_id)) {
		echo json_encode(array("success" => "Department Restored Successfully!"));
	}

}

if (isset($_POST['populate_checked_salary_code'])) {
	$salary_code = $config->checkInput($_POST['salary_code']);
	$populate_checked_salary_code = new Department();
	// $salary_codes = str_split($salary_code);
	// for ($i=0; $i<count($salary_codes); $i++) {
		$populate_checked_salary_code->populate_checked_salary_code($salary_code);
	// }
}

function checkDepartment($name) {
	if(preg_match("/^[a-zA-z\s]+$/", $name)) {
		return true;
	} else {
		return false;
	}
}