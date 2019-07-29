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
if (isset($_POST['add_department_name'])) {

	$department_name = $config->checkInput($_POST['department_name']);

	if (empty($department_name)) {

		echo json_encode(array("error" => "Department Name is required."));

	} else {

		$add_department_name = new Department();
		if ($add_department_name->addDepartment($department_name)){
			echo json_encode(array("success" => "$department_name Added Successfully!"));
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