<?php

/**
 * Controller for Employee Module
 */

require_once '../models/Config.php';
require_once '../models/Imports.php';

$config = new Config();


if (!empty($_FILES['file']['name'])) {
	$output = 0;
	$allowed_ext = array('csv');
	$tmp = explode(".", $_FILES['file']['name']);
	$extension = end($tmp);
	if (in_array($extension, $allowed_ext)) {
		$file_data = fopen($_FILES['file']['tmp_name'], 'r');

		$importPhilhealth = new Philhealth();
		$importPhilhealth->deletePhilhealthMatrix();

		fgetcsv($file_data);
		while ($column = fgetcsv($file_data)) {
			
			// $rangeOfCompensationFromBelow = explode('Below', $column[0])[0];
			
			$basicSalaryFrom = $config->checkInput($column[0]);
			$basicSalaryTo = $config->checkInput($column[1]);
			$monthlyPremiumFrom = $config->checkInput($column[2]);
			$monthlyPremiumTo = $config->checkInput($column[3]);
			$personalShareFrom = $config->checkInput($column[4]);
			$personalShareTo = $config->checkInput($column[5]);
			$employerShareFrom = $config->checkInput($column[6]);
			$employerShareTo = $config->checkInput($column[7]);

			// if ($rangeOfCompensationFromBelow == 'Below') {
			// 	$rangeOfCompensationFrom = 0;
			// }

			$importPhilhealth->importPhilhealth($basicSalaryFrom, $basicSalaryTo, $monthlyPremiumFrom, $monthlyPremiumTo, $personalShareFrom, $personalShareTo, $employerShareFrom, $employerShareTo);
			// print_r($rangeOfCompensationFrom . "<br>");
		}
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
