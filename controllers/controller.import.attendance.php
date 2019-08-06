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
<<<<<<< HEAD
		// $importAttendance->deleteAttendance();

		while ($column = fgetcsv($file_data)) {

=======

		$importAttendance = new Attendance();
		$importAttendance->deleteAttendance();

=======
		$importAttendance->deleteAttendance();

<<<<<<< HEAD
<<<<<<< HEAD
		// fgetcsv($file_data);
		// fgetcsv($file_data);
		// fgetcsv($file_data);

		while ($column = fgetcsv($file_data)) {

			// $rangeOfCompensationFromBelow = explode('Below', $column[0])[0];
=======
		fgetcsv($file_data);
		fgetcsv($file_data);
		fgetcsv($file_data);

		while ($column = fgetcsv($file_data)) {

>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
=======
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
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
<<<<<<< HEAD

			$first = computeTotalOfMinutes($EMTimein, $EMTimeout);
			$second = computeTotalOfMinutes($EATimein, $EATimeout);
			$totalMinutes = $first + $second; 

			$importAttendance->importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout, $totalMinutes, $hashedFile);
=======
=======
<<<<<<< HEAD
=======

>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
			// if ($rangeOfCompensationFromBelow == 'Below') {
			// 	$rangeOfCompensationFrom = 0;
			// }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
			$lastName = str_replace(',', '', $lastName);
			$firstName = str_replace(',', '', $firstName);
			$Edate = str_replace(',', '', $Edate);
			$EMTimein = str_replace(',', '', $EMTimein);
			$EMTimeout = str_replace(',', '', $EMTimeout);
			$EATimein = str_replace(',', '', $EATimein);
			$EATimeout = str_replace(',', '', $EATimeout);

			$importAttendance->importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
			$importSSS->importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout);
>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
=======
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
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
