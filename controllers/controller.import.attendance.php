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

		$importAttendance = new Attendance();
		$importAttendance->deleteAttendance();

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
			$lastName = $config->checkInput($column[0]);
			$firstName = $config->checkInput($column[1]);
			$Edate = $config->checkInput($column[2]);
			$EMTimein = $config->checkInput($column[3]);
			$EMTimeout = $config->checkInput($column[4]);
			$EATimein = $config->checkInput($column[5]);
			$EATimeout = $config->checkInput($column[6]);
<<<<<<< HEAD
=======

>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
			// if ($rangeOfCompensationFromBelow == 'Below') {
			// 	$rangeOfCompensationFrom = 0;
			// }

<<<<<<< HEAD
			$lastName = str_replace(',', '', $lastName);
			$firstName = str_replace(',', '', $firstName);
			$Edate = str_replace(',', '', $Edate);
			$EMTimein = str_replace(',', '', $EMTimein);
			$EMTimeout = str_replace(',', '', $EMTimeout);
			$EATimein = str_replace(',', '', $EATimein);
			$EATimeout = str_replace(',', '', $EATimeout);

			$importAttendance->importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout);
=======
			$importSSS->importAttendance($lastName, $firstName, $Edate, $EMTimein, $EMTimeout, $EATimein, $EATimeout);
>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
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
