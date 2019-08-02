<?php
    require_once '../models/Config.php';
    $config = new Config();
    $config->isnot_loggedin();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Human Resources :: Event Management</title>
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
                      Event Management
                    </h1>
                  </div>
                  <!-- /page-header -->
                  
                  <div class="clearfix"></div>

                    <div class="col-md-12">
                      <div class="card text-white bg-lime mb-1">
                        <div class="card-body p-3">
                           <h6 class="card-title"><i class="fe fe-layers"></i> Add Event</h6>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title"><i class="fe fe-calendar"></i> Calendar</h3>
                        </div>
                        <div class="card-body">
                          <div id="calendar"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                      
              </div>
              <!-- /container -->
            </div>
            <!-- my-3 -->
          </div>
          <!-- flex-fill -->
        </div> <!-- /page -->
        <?php include '../includes/footer.php'; ?>
        <?php include '../includes/event/modal.add.event.php'; ?>
        <?php include '../includes/event/modal.edit.event.php'; ?>

    <script type="text/javascript" src="../ajax/ajax.event.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>