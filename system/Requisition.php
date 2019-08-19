<?php
  require '../models/requisition.inc.php';

    $requestt = new Request();
    $result = $requestt->viewRequestForm();
    // Submit request Form to databas
?>  <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <?php
                $config = new Config();
                $config->isnot_loggedin();
            ?>
            <!DOCTYPE html>
            <html lang="en" dir="ltr">
              <head>
                <?php include '../includes/meta.php'; ?>
                <!-- <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
                <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" /> -->
                <!-- Generated: 2019-04-04 16:55:45 +0200 -->
                <title>Human Resources :: Employee Management</title>
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
                                  Requisition Management
                                </h1>

                              </div>
                              <!-- /page-header -->
                              <!-- Adding Requisition -->
                              <div class="float-right">
                                <div class="input-group mb-2">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-lime"  data-toggle="modal" data-target="#addAbsentModal"><i class="fe fe-user-plus mr-2"></i>Request From</button>
                                    </div>
                                </div>
                              </div>
                              <!-- /Requisition -->

                  <div class="clearfix"></div>
                    <div class="dimmer active">
                        <div id="loader"></div>
                          <div id='archive-loader'></div>
                            <div id='archive-dimmer-content'>
                              <div class="row row-cards">
                                <div class="col-lg-12">
                                  <div class="card">

                                    <div class="table-responsive">
                                      <?php include '../includes/Requisition/requisition.php'; ?>
                                    </div>
                              <!-- /row row-cards -->

                              <!-- datatable of requisition/ ajax to display -->
                            </div>
                          </div>
                        </div>
                        <!-- /lg-8 -->
                      </div>
                    </div>
                          <!-- modal for request form and display approved and declined -->

                          <div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalTitle" id="viewModal" data-backdrop="static" data-keyboard="false">
                              <div class="modal-dialog modal-lg mw-100 w-75" role="document" >
                                <center>
                                <div class="modal-content" style="width: 100%!important">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="">View Form</h4>
                                    <button class="btn btn-danger float-right" type="button" data-dismiss="modal">
                                          <i class="fa fa-times"></i> Cancel
                                      </button>
                                      <!-- <div class="clearfix"></div> -->
                                  </div>
                                        <div class="modal-body" id="displayRequestForm">

                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                              </div> <!-- /.modal-dialog -->


                          </div>
                          <!-- /container -->
                        </div>
                        <!-- my-3 -->
                      </div>
                      <!-- flex-fill -->
                    </div> <!-- /page -->
                    <?php include '../includes/footer.php'; ?>
                  </div>
                </div>
                <?php include '../includes/Requisition/modal.view.requisition.php'; ?>
                <?php include '../includes/Requisition/modal.requisition.php'; ?>

                <script type="text/javascript" src="../ajax/ajax.requestFrom.js"></script>
                <script type="text/javascript">
                  function reload() {
                    location.reload();
                  }
                </script>
              </body>
            </html>
