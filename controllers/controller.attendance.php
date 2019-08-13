<?php

/**
 * Controller for Employee Module
 */

require_once '../models/Config.php';
require_once '../models/Attendance.php';

$config = new Config();

if (isset($_POST['hiddenHashedFile'])) {
	$firstName = $config->checkInput($_POST['firstName']);
	$lastName = $config->checkInput($_POST['lastName']);
	$hashedFile = $config->checkInput($_POST['hiddenHashedFile']);
	$attendanceID = $_POST['hiddenAttendanceID'];
	$EMTimein = $_POST['EMTimein'];
	$EMTimeout = $_POST['EMTimeout'];
	$EATimein = $_POST['EATimein'];
	$EATimeout = $_POST['EATimeout'];

	$first = [];
	$second = [];
	$totalMinutes = [];

	$updateAttendanceRecord = new Attendance();

	for ($i=0; $i<count($attendanceID); $i++) {

		$first[] = computeTotalOfMinutes($EMTimein[$i], $EMTimeout[$i]);
		$second[] = computeTotalOfMinutes($EATimein[$i], $EATimeout[$i]);
		$totalMinutes[] = $first[$i] + $second[$i];
		$updateAttendanceRecord->resetAttendance($attendanceID[$i]);
		$updateAttendanceRecord->updateAttendanceRecord($hashedFile, $attendanceID[$i], $EMTimein[$i], $EMTimeout[$i], $EATimein[$i], $EATimeout[$i], $totalMinutes[$i]);
		// $updateAttendanceRecord->populateAttendance($firstName, $lastName, $hashedFile);
	}
	echo json_encode('great');
	// var_dump($totalMinutes);
	// var_dump($attendanceID);
}

if (isset($_POST['saveAttendanceForPending'])) {
	$id = $config->checkInput($_POST['id']);
	$saveAttendanceForPending = new Attendance();
	$saveAttendanceForPending->saveAttendanceForPending($id);
}

if (isset($_POST['sendToPayroll'])) {
	$id = $config->checkInput($_POST['id']);
	$sendToPayroll = new Attendance();
	$sendToPayroll->sendToPayroll($id);
}

if (isset($_POST['removeAttendance'])) {
	$id = $config->checkInput($_POST['id']);
	$removeAttendance = new Attendance();
	$removeAttendance->removeAttendance($id);
}

function computeTotalOfMinutes($time_in, $time_out) {
	$time_inA = strtotime($time_in);
	$time_outA = strtotime($time_out);

	$total = round(abs($time_outA - $time_inA)/60, 2);	
	return $total;
}