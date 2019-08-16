<?php
if (isset($_POST['SubmitRequest'])) {
$RequestType = $_POST['RequestType'];
$lastName = $_POST['lastName'];
$TypeRequest = $_POST['TypeRequest'];
$DateFrom = $_POST['DateFrom'];
$DateTo = $_POST['DateTo'];
$Reason = $_POST['Reason'];

      $requestt->RequestFrom($RequestType, $lastName, $TypeRequest, $DateFrom, $DateTo, $Reason);
}

// Approved Request
if (isset($_POST['Approved'])) {
$requestID = $_POST['requestID'];
$requestt->ApprovedList($requestID);
}
// Declined Request
if (isset($_POST['Declined'])) {
$requestID = $_POST['requestID'];
$requestt->DeclinedList($requestID);
}

 ?>
