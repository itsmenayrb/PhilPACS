<?php

require '../models/requisition.inc.php';

  $requestt = new Request();
  $result = $requestt->viewRequestForm();
$config = new Config();

if (isset($_POST['addrequisition'])) {
$RequestType = $config->checkInput($_POST['request_type']);
$lastName = $config->checkInput($_POST['last_name']);
$TypeRequest = $config->checkInput($_POST['type_request']);
$DateFrom = $config->checkInput($_POST['date_from']);
$DateTo = $config->checkInput($_POST['date_to']);
$Reason = $config->checkInput($_POST['reason']);

        $requestt = new Request();
      if($requestt->RequestFrom($RequestType, $lastName, $TypeRequest, $DateFrom, $DateTo, $Reason)){
      echo json_encode(array("success" => "requisition Added Successfully!"));
    }
}

// Approved Request
if (isset($_POST['approved'])) {
$requestID = $config->checkInput($_POST['requestid']);
$requestt = new Request();
if($requestt->ApprovedList($requestID)){
  echo json_encode(array("success" => "Successful approved!"));
}
}
// Declined Request
if (isset($_POST['declined'])) {
$requestID = $config->checkInput($_POST['requestid']);
$requestt = new Request();
if($requestt->DeclinedList($requestID)){
  echo json_encode(array("success" => "Successful Declined!"));
}
}

 ?>
