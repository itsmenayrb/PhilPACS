<?php

/**
 * Controller for Department Module
 */

require_once '../models/Config.php';
require_once '../models/Event.php';

$config = new Config();

<<<<<<< HEAD
=======
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
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7

if (isset($_POST['addEvent'])) {
	$title = $config->checkInput($_POST['title']);
	$description = $config->checkInput($_POST['description']);
	$start = $config->checkInput($_POST['start']);
	$end = $config->checkInput($_POST['end']);

	$addEvent = new Event();
	$addEvent->addEvent($title, $description, $start, $end);
<<<<<<< HEAD
}

if (isset($_POST['updateEventOnResize'])) {
	$id = $config->checkInput($_POST['id']);
	$title = $config->checkInput($_POST['title']);
	$start = $config->checkInput($_POST['start']);
	$end = $config->checkInput($_POST['end']);	

	$updateEventOnResize = new Event();
	$updateEventOnResize->updateEventOnResize($id, $title, $start, $end);
}

if (isset($_POST['updateEventOnDrop'])) {
	$id = $config->checkInput($_POST['id']);
	$title = $config->checkInput($_POST['title']);
	$start = $config->checkInput($_POST['start']);
	$end = $config->checkInput($_POST['end']);	

	$updateEventOnDrop = new Event();
	$updateEventOnDrop->updateEventOnDrop($id, $title, $start, $end);
}

if (isset($_POST['updateEvent'])) {
	$id = $config->checkInput($_POST['edit_id']);
	$title = $config->checkInput($_POST['edit_title']);	
	$description = $config->checkInput($_POST['edit_description']);	
	$updateEvent = new Event();
	$updateEvent->updateEvent($id, $title, $description);
}

if (isset($_POST['removeEvent'])) {
	$id = $config->checkInput($_POST['edit_id']);
	$removeEvent = new Event();
	$removeEvent->removeEvent($id);
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
}