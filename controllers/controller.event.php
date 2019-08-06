<?php

/**
 * Controller for Department Module
 */

require_once '../models/Config.php';
require_once '../models/Event.php';

$config = new Config();


if (isset($_POST['addEvent'])) {
	$title = $config->checkInput($_POST['title']);
	$description = $config->checkInput($_POST['description']);
	$start = $config->checkInput($_POST['start']);
	$end = $config->checkInput($_POST['end']);

	$addEvent = new Event();
	$addEvent->addEvent($title, $description, $start, $end);
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
}

if (isset($_GET['fetch'])) {
	$link = $config->checkInput($_GET['fetch']);
	switch ($link) {
		case 'events':
			$fetchListOfEvents = new Event();
			$fetchListOfEvents->fetchListOfEvents();
			break;
		
		default:
			# code...
			break;
	}
}