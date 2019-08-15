<?php

/**
 * Controller for Salary Code Module
 */

require_once '../models/Config.php';
require_once '../models/SalaryCode.php';

$config = new Config();

if (isset($_POST['add_salary_code'])) {
	$salary_code = $config->checkInput($_POST['salary_code']);
	$basicSalary = $config->checkInput($_POST['basicSalary']);
	$description = $config->checkInput($_POST['description']);

	if (empty($salary_code)) {
		echo json_encode(array("error_salary_code" => "Salary Code is required."));
	}

	if (empty($basicSalary)) {
		echo json_encode(array("error_basicSalary" => "Basic Salary is required."));
	}

	if (!empty($salary_code) && !empty($basicSalary)) {
		$add_salary_code = new SalaryCode();
		if ($add_salary_code->add_salary_code($salary_code, $basicSalary, $description)){
			echo json_encode(array("success" => "Success!"));
		}
	}
}

if (isset($_POST['update_salary_code'])) {
	$id = $config->checkInput($_POST['id']);
	$salary_code = $config->checkInput($_POST['salary_code']);
	$basicSalary = $config->checkInput($_POST['basicSalary']);
	$description = $config->checkInput($_POST['description']);

	if (empty($salary_code)) {
		echo json_encode(array("error_salary_code" => "Salary Code is required."));
	}

	if (empty($basicSalary)) {
		echo json_encode(array("error_basicSalary" => "Basic Salary is required."));
	}

	if (!empty($salary_code) && !empty($basicSalary)) {
		$update_salary_code = new SalaryCode();
		if ($update_salary_code->update_salary_code($id, $salary_code, $basicSalary, $description)){
			echo json_encode(array("success" => "Success!"));
		}
	}
}

if (isset($_POST['archive_salary_code'])) {

	$id = $config->checkInput($_POST['id']);

	$archive_salary_code = new SalaryCode();
	if ($archive_salary_code->archive_salary_code($id)) {
		echo json_encode(array("success" => "Salary Code has been archived successfully!"));
	}

}

if (isset($_POST['restore_salary_code'])) {

	$id = $config->checkInput($_POST['id']);

	$restore_salary_code = new SalaryCode();
	if ($restore_salary_code->restore_salary_code($id)) {
		echo json_encode(array("success" => "Salary Code has been restored successfully!"));
	}

}