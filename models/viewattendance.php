<?php
    require 'attendance.inc.php';
    $config = new Config();

    if(isset($_POST['viewattendanceForm'])){
        $lastName = $config->checkInput($_POST['lastName']);
        $request = new Attendance();
        $request->viewattendance($lastName);
    }
