<?php

/**
 * Controller for Employee Module
 */

require_once '../models/Config.php';
require_once '../models/Attendance.php';

$config = new Config();


if (isset($_POST['populateAttendance'])) {
	$hashedFile = $config->checkInput($_POST['hashedFile']);
	$firstName = $config->checkInput($_POST['firstName']);
	$lastName = $config->checkInput($_POST['lastName']);
	$populateAttendance = new Attendance();
	$populateAttendance->populateAttendance($firstName, $lastName, $hashedFile);
}
