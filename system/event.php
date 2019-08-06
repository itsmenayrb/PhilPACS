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
<<<<<<< HEAD
=======
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

                  <!-- <div class="row">
                    <div class="col-md-12 text-center">
                      <button class="btn btn-green" type="button"><i class="fe fe-calendar"></i> Create Event</button>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-sm-6 col-lg-3">
                      <div class="card">
                        <div class="card-status bg-green"></div>
                        <div class="card-body text-center">
                          <div class="card-category">August 28, 2019</div>
                          <div class="display-3 my-4">Seminar</div>
                          <ul class="list-unstyled leading-loose">
                            <li><strong>3</strong> Employee/s</li>
                            <li><i class="fe fe-check text-success mr-2" aria-hidden="true"></i> AI</li>
                            <li><i class="fe fe-check text-success mr-2" aria-hidden="true"></i> Web Development</li>
                            <li><i class="fe fe-check text-success mr-2" aria-hidden="true"></i> Web Security</li>
                            <li><i class="fe fe-check text-success mr-2" aria-hidden="true"></i> Ionic</li>
                          </ul>
                          <div class="text-center mt-6">
                            <a href="#" class="btn btn-green btn-block">Pending</a>
                          </div>
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
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
<<<<<<< HEAD
                  </div>
=======
                  </div> -->
                  <!-- /row row-cards -->
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
                      
              </div>
              <!-- /container -->
            </div>
            <!-- my-3 -->
          </div>
          <!-- flex-fill -->
        </div> <!-- /page -->
        <?php include '../includes/footer.php'; ?>
        <?php include '../includes/event/modal.add.event.php'; ?>
<<<<<<< HEAD
        <?php include '../includes/event/modal.edit.event.php'; ?>
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7

    <script type="text/javascript" src="../ajax/ajax.event.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>