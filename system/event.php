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
                            <ul class="nav nav-pills flex-column flex-sm-row card-header-pills">
                              <li class="nav-item pt-3">
                                <a class="nav-link active h4 p-4" href="#pills-calendar" data-toggle="pill" role="tab" aria-controls="pills-calendar" aria-selected="true" id="pills-calendar-tab">
                                  <i class="fe fe-calendar mr-2"></i>Calendar
                                </a>
                              </li>

                              <li class="nav-item pt-3">
                                <a class="nav-link h4 p-4" href="#pills-list" data-toggle="pill" role="tab" aria-controls="pills-list" aria-selected="false" id="pills-list-tab">
                                  <i class="fe fe-list mr-2"></i> Lists
                                </a>
                              </li>

                            </ul>
                          </div>
                        
                        <div class="card-body tab-content" id="pills-event-content">
                          <div class="tab-pane fade show active" id="pills-calendar" role="tabpanel" aria-labelledby="pills-calendar-tab">
                            <div id="calendar"></div>
                          </div>

                          <div class="tab-pane fade" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                            <div id="list_of_events"></div>
                          </div>

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