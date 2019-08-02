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

		$importTax = new Tax();
		$importTax->deleteTaxMatrix();

		fgetcsv($file_data);
		
		while ($column = fgetcsv($file_data)) {
			
			$compensationLevel = $config->checkInput($column[0]);
			$minimumWithholdingTax = $config->checkInput($column[1]);

			$importTax->importTax($compensationLevel, $minimumWithholdingTax);
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