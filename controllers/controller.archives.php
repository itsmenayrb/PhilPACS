<?php

/**
 * Controller for Department Module
 */

require_once '../models/Config.php';
require_once '../models/Archives.php';

$config = new Config();


if (isset($_POST['restoreEmployee'])) {
	$personalID = $config->checkInput($_POST['id']);
	$restoreEmployee = new Archives();
	$restoreEmployee->restoreEmployee($personalID);	
}