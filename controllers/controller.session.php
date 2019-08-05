<?php

/**
 * Controller for Department Module
 */

require_once '../models/Config.php';
require_once '../models/Session.php';

$config = new Config();

if (isset($_POST['login'])) {
	$username = $config->checkInput($_POST['username']);
	$password = $config->checkInput($_POST['password']);

	if (empty($username) || empty($password)) {
		echo "empty";
	} else {
		$login = new Session();
		$login->login($username, $password);
	}
}

if (isset($_POST['passwordAction'])) {
	$id = $config->checkInput($_POST['hiddenIDSession']);
	$password = $config->checkInput($_POST['passwordAction']);
	$checkPassword = new Session();
	$checkPassword->checkPassword($id, $password);
}