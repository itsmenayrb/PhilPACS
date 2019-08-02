<?php

require_once '../Config.php';
$config = new Config();
$status = 1;

$data = array();
$stmt = $config->runQuery("SELECT * FROM eventstbl WHERE status=:status ORDER BY eventID");
$stmt->execute(array(":status" => $status));
$result = $stmt->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["eventID"],
  'title'   => $row["title"],
  'description' => $row['description'],
  'start'   => $row["startDate"],
  'end'   => $row["endDate"],
  'status' => $row['status']
 );
}

echo json_encode($data);

?>
