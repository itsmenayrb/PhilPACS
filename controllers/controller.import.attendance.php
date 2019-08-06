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
<<<<<<< HEAD
		$hashedFile = md5_file($_FILES['file']['tmp_name']);
		$importAttendance = new Attendance();
		// $importAttendance->deleteAttendance();

		while ($column = fgetcsv($file_data)) {

=======

		$importAttendance = new Attendance();
		$importAttendance->deleteAttendance();

		// fgetcsv($file_data);
		// fgetcsv($file_data);
		// fgetcsv($file_data);

		while ($column = fgetcsv($file_data)) {

			// $rangeOfCompensationFromBelow = explode('Below', $column[0])[0];
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
			$lastName = $config->checkInput($column[0]);
			$firstName = $config->checkInput($column[1]);
			$Edate = $config->checkInput($column[2]);
			$EMTimein = $config->checkInput($column[3]);
			$EMTimeout = $config->checkInput($column[4]);
			$EATimein = $config->checkInput($column[5]);
			$EATimeout = $config->checkInput($column[6]);
<<<<<<< HEAD

			$first = computeTotalOfMinutes($EMTimein, $EMTimeout);
			$second = computeTotalOfMinutes($EATimein, $EATimeout);
			$totalMinutes = $first + $second; 

			$importAttendance->importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout, $totalMinutes, $hashedFile);
=======
			// if ($rangeOfCompensationFromBelow == 'Below') {
			// 	$rangeOfCompensationFrom = 0;
			// }

			$lastName = str_replace(',', '', $lastName);
			$firstName = str_replace(',', '', $firstName);
			$Edate = str_replace(',', '', $Edate);
			$EMTimein = str_replace(',', '', $EMTimein);
			$EMTimeout = str_replace(',', '', $EMTimeout);
			$EATimein = str_replace(',', '', $EATimein);
			$EATimeout = str_replace(',', '', $EATimeout);

			$importAttendance->importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout);
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
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
<<<<<<< HEAD

function computeTotalOfMinutes($time_in, $time_out) {
	$time_in = strtotime($time_in);
	$time_out = strtotime($time_out);

	$total = round(abs($time_out - $time_in)/60, 2);	
	return $total;
}
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
