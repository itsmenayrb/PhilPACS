<?php

/**
 * Controller for Employee Module
 */

          require_once '../models/Config.php';

          $config = new Config();


          if (!empty($_FILES['file']['name'])) {

            $filename = $_FILES['file']['name'];
            $destination = '../Document/' . $filename;

            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            $file = $_FILES['file']['tmp_name'];
            $size = $_FILES['file']['size'];

            if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
                echo "invalid";
            }
            elseif ($_FILES['file']['size'] > 5000000) { // file shouldn't be larger than 1Megabyte
                echo "invalid";
            }
            elseif (file_exists($destination)) {
                echo "exist";
            }
          	else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
          $download = 0;
          $stmt = $config->runQuery("INSERT INTO documentstbl (
                          documentName,
                          documentSize,
                          downloadsList
                          ) VALUES (
                          :documentName,
                          :documentSize,
                          :downloadList
                        )");
          $stmt->bindparam(':documentName', $filename);
          $stmt->bindparam(':documentSize', $size);
          $stmt->bindparam(':downloadList', $download);
          $stmt->execute();
          echo "success";
          return $stmt;
        } else {
            echo "invalidformat";
              }
            }
          }
           else {
          	// $output = 'File should not be empty.';
          	// echo json_encode(array("error_empty" => $output));
          	echo "empty";
          }
