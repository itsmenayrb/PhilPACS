<?php
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

// fetch file to download from database
$sql = "SELECT * FROM documentstbl WHERE documentID= $id";
$stmt = $config->runQuery($sql);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$filepath = '../Document/' . $row['documentName'];

if (file_exists($filepath)) {
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($filepath));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize('../Document/' . $row['documentName']));
readfile('../Document/' . $row['documentName']);

// Now update downloads count
$newCount = $row['downloadsList'] + 1;
$updateQuery = "UPDATE documentstbl SET downloadsList=$newCount WHERE documentID=$id";
$stmt = $config->runQuery($sql);
$result->execute();
exit;
}

}
 ?>
