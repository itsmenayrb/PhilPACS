<?php

/**
 * Controller for Position Module
 */

require_once '../models/Config.php';
require_once '../models/Position.php';

$config = new Config();


/**
 * If adding of position has been set
 */
if (isset($_POST['add_position_name'])) {

	$department_name = $config->checkInput($_POST['department_name']);
	$position_name = $config->checkInput($_POST['position_name']);
	$amount = $config->checkInput($_POST['amount']);
	$code = $config->checkInput($_POST['code']);

	if (empty($department_name)) {
		echo json_encode(array("error_department" => "Department Name is required."));
	}

	if (empty($position_name)) {
		echo json_encode(array("error_position" => "Position Name is required."));
	}

	if (empty($amount)) {
		echo json_encode(array("error_amount" => "Basic Salary is required."));
	}

	if (!is_numeric($amount)) {
		echo json_encode(array("error_amount" => "Invalid amount."));
	}

	if (empty($code)) {
		echo json_encode(array("error_code" => "Position Code is required."));
	}

	if(!empty($position_name) && !empty($department_name) && !empty($amount) && is_numeric($amount) && !empty($code)) {

		$add_position_name = new Position();
		if ($add_position_name->addPosition($department_name, $position_name, $amount, $code)){
			echo json_encode(array("success" => "$position_name Added Successfully!"));
		}

	}
}
/**
 * End of adding of position
 */

/**
 * If archiving of position has been set
 */
if (isset($_POST['archive_position'])) {

	$position_id = $config->checkInput($_POST['position_id']);

	$archive = new Position();
	if ($archive->archivePosition($position_id)) {
		echo json_encode(array("success" => "Position Archived Successfully!"));
	}

}
/**
 * End of archiving of position
 */

/**
 * If updating of position has been set
 */
if (isset($_POST['update_position_name'])) {

	$position_id = $config->checkInput($_POST['position_id']);
	$position_name = $config->checkInput($_POST['position_name']);
	$department_name = $config->checkInput($_POST['department_name']);
	$amount = $config->checkInput($_POST['amount']);
	$code = $config->checkInput($_POST['code']);

	if (empty($department_name)) {

		echo json_encode(array("error_department" => "Department Name is required."));

	}

	if (empty($position_name)) {

		echo json_encode(array("error_position" => "Position Name is required."));

	}

	if (empty($amount)) {

		echo json_encode(array("error_amount" => "Basic Salary is required."));

	}

	if (!is_numeric($amount)) {

		echo json_encode(array("error_amount" => "Invalid amount."));

	}

	if (empty($code)) {
		echo json_encode(array("error_code" => "Position Code is required."));
	}

	if(!empty($position_name) && !empty($department_name) && !empty($amount) && is_numeric($amount) && !empty($code)) {

		$update_position_name = new Position();
		if ($update_position_name->updatePosition($position_id, $position_name, $department_name, $amount, $code)){
			echo json_encode(array("success" => "Updated Successfully!"));
		}

	}


}
/**
 * End of updating of position
 */