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

		$importPagibig = new Pagibig();
		$importPagibig->deletePagibigMatrix();

		fgetcsv($file_data);
		while ($column = fgetcsv($file_data)) {
			
			// $rangeOfCompensationFromBelow = explode('Below', $column[0])[0];
			
			$monthlyCompensationFrom = $config->checkInput($column[0]);
			$monthlyCompensationTo = $config->checkInput($column[1]);
			$employeeShare = $config->checkInput($column[2]);
			$employerShare = $config->checkInput($column[3]);

		
			// if ($rangeOfCompensationFromBelow == 'Below') {
			// 	$rangeOfCompensationFrom = 0;
			// }


			$importPagibig->importPagibig($monthlyCompensationFrom, $monthlyCompensationTo, $employeeShare, $employerShare);
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
