<?php
    require_once '../models/Config.php';
    $config = new Config();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" /> -->
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <?php include '../includes/plugins.php'; ?>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    
  </head>
  <body class="">
    <div class="page">

      <div class="flex-fill">
        <?php include '../includes/header.php'; ?>

        <div class="my-3 my-md-5">
          <div class="container">
            
              <div class="page-header">
                <h1 class="page-title">
                  Dashboard
                </h1>
                
              </div>
              <!-- /page-header -->
              
             

          </div>
          <!-- /container -->
        </div>
        <!-- my-3 -->
      </div>
      <!-- flex-fill -->
    </div>

    <?php include '../includes/footer.php'; ?>
  </body>
</html>