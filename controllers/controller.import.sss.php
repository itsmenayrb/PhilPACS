<?php

/**
 * Controller for Employee Module
 */

require_once '../models/Config.php';
require_once '../models/Imports.php';

$config = new Config();

if (!empty($_FILES['file']['name'])) {
	$output = '';
	$allowed_ext = array('csv');
	$tmp = explode(".", $_FILES['file']['name']);
	$extension = end($tmp);
	if (in_array($extension, $allowed_ext)) {
		$file_data = fopen($_FILES['file']['tmp_name'], 'r');

		$importSSS = new SSS();
		$importSSS->deleteSSSMatrix();

		fgetcsv($file_data);
		fgetcsv($file_data);
		fgetcsv($file_data);
		
		while ($column = fgetcsv($file_data)) {
			
			// $rangeOfCompensationFromBelow = explode('Below', $column[0])[0];
			$rangeOfCompensationFrom = explode('-', $column[0])[0];
			$rangeOfCompensationTo = explode('-', $column[0])[1];

			$monthlySalaryCredit = $config->checkInput($column[1]);
			$socialSecurityEmployer = $config->checkInput($column[2]);
			$socialSecurityEmployee = $config->checkInput($column[3]);
			$socialSecurityTotal = $config->checkInput($column[4]);
			$employeeCompensationEmployer = $config->checkInput($column[5]);
			$totalContributionEmployer = $config->checkInput($column[6]);
			$totalContributionEmployee = $config->checkInput($column[7]);
			$totalContributions = $config->checkInput($column[8]);

			// if ($rangeOfCompensationFromBelow == 'Below') {
			// 	$rangeOfCompensationFrom = 0;
			// }

			$importSSS->importSSS($rangeOfCompensationFrom, $rangeOfCompensationTo, $monthlySalaryCredit, $socialSecurityEmployer, $socialSecurityEmployee, $socialSecurityTotal, $employeeCompensationEmployer, $totalContributionEmployer, $totalContributionEmployee, $totalContributions);
			// print_r($rangeOfCompensationFrom . "<br>");
		}
		// $output = 'File uploaded successfully!';
		// echo json_encode(array("success" => $output));
		echo "success";
	} else {
		// $output = 'Invalid file format.';
		// echo json_encode(array("error_file" => $output));
		echo "invalid";
	}
} else {
	// $output = 'File should not be empty.';
	// echo json_encode(array("error_empty" => $output));
	echo "empty";
}