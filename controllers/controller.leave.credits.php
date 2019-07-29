<?php

/**
 * Controller for Percentage Module
 */

require_once '../models/Config.php';
require_once '../models/LeaveCredits.php';

$config = new Config();


/**
 * If adding of department has been set
 */
if (isset($_POST['addLeaveCredits'])) {

	$employee = $config->checkInput($_POST['employee']);
	$sickleave = $config->checkInput($_POST['sickleave']);
	$vacationleave = $config->checkInput($_POST['vacationleave']);

	if (empty($employee)) {

		echo json_encode(array("error_employee" => "Employee is required."));

	}

	if (empty($sickleave)) {

		echo json_encode(array("error_sickleave" => "Sick Leave is required."));

	}

	if (empty($vacationleave)) {

		echo json_encode(array("error_vacationleave" => "Vacation Leave is required."));

	}

	if (!empty($employee) && !empty($sickleave) && !empty($vacationleave)) {

		$sickleave = $sickleave * 24;
		$vacationleave = $vacationleave * 24;

		$addLeaveCredits = new leaveCredits();
		if ($addLeaveCredits->addLeaveCredits($vacationleave, $employee, $sickleave)){
			echo json_encode(array("success" => "Added Successfully!"));
		}
	}

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

	$department_id = $config->checkInput($_POST['department_id']);
	$department_name = $config->checkInput($_POST['department_name']);

	if (empty($department_name)) {

		echo json_encode(array("error" => "Department Name is required."));

	} else {

		$update_department_name = new Department();
		if ($update_department_name->updateDepartment($department_id, $department_name)){
			echo json_encode(array("success" => "Successfully changed to $department_name!"));
		}

	}

}
/**
 * End of updating of department
 */