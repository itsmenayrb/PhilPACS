<?php

/**
 * Controller for Department Module
 */

require_once '../models/Config.php';
require_once '../models/Payroll.php';

$config = new Config();

if (isset($_POST['savePayrollBtn'])) {
	$contributions = $_POST['contribution'];

	if (empty($contributions)) {
		echo json_encode(array("error_empty" => "Please select at least one contribution."));
	} else {
		$savePayroll = new Payroll();
		for ($i=0; $i<count($contributions); $i++) {
			$savePayroll->savePayroll();
		}
	}
}