<?php

require_once '../models/Config.php';
$logout = new Config();

if (isset($_GET['logout']) && $_GET['logout'] == "true") {
	$logout->end_session();
	$logout->redirect("../index.php");
}