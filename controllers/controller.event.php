<?php

/**
 * Controller for Department Module
 */

require_once '../models/Config.php';
require_once '../models/Event.php';

$config = new Config();

if (isset($_GET['load']) && $_GET['load'] == 'true') {
	$data = array();
	$stmt = $config->runQuery("SELECT * FROM eventstbl ORDER BY startDate DESC");
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $row) {
		$data[] = array(
			'title' => $row['title'],
			'description' => $row['description'],
			'startDate' => $row['startDate'],
			'endDate' => $row['endDate'] 
		);
	}
	echo json_encode($data);
}

if (isset($_POST['addEvent'])) {
	$title = $config->checkInput($_POST['title']);
	$description = $config->checkInput($_POST['description']);
	$start = $config->checkInput($_POST['start']);
	$end = $config->checkInput($_POST['end']);

	$addEvent = new Event();
	$addEvent->addEvent($title, $description, $start, $end);
}