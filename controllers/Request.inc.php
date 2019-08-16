<?php

    require '../models/requisition.inc.php';
    $config = new Config();

    if(isset($_POST['displayRequestForm'])){
        $requestID = $config->checkInput($_POST['reqID']);
        $request = new Request();
        $request->readForm($requestID);
    }
?>
