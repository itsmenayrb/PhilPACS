<?php
    require_once '../models/attendance.inc.php';
    $config = new attendance();

    if (isset($_POST['submit'])) {
     $config->import($_FILES['file']['tmp_name']);
 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" /> -->
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Human Resources :: Attendanca View Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <?php include '../includes/plugins.php'; ?>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

  </head>
  <body class="">
    <div class="dimmer active">
      <div id="loader"></div>
        <div id="dimmer-content">
        <div class="page">

          <div class="flex-fill">
            <?php include '../includes/header.php'; ?>

            <div class="my-3 my-md-5">
              <div class="container">


                  <div class="page-header">
                    <h1 class="page-title">
                      Attendance Management
                    </h1>
                    <div class="page-subtitle">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="./attendance.php">Attendance</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="./attendanceview.php">View total hours</a></li>
                        <li class="breadcrumb-item"><a href="./viewAllattendance.php">History of attendance</a></li>
                      </ol>
                    </div>

                  </div>
                  <!-- /page-header -->


                  <div class="clearfix"></div>

                  <div class="row row-cards">

                    <!-- <div class="col-lg-4">
                      <form class="card">
                        <div class="card-header">
                          <h3 class="card-title">Filter</h3>
                        </div>
                        <div class="card-body">

                          <div class="form-group">
                            <div class="form-label">By Department</div>
                            <select class="custom-select form-control">
                              <option value="" selected>Select a department.</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <div class="form-label"></div>
                            <select class="custom-select form-control">
                              <option value=""></option>
                            </select>
                          </div>

                        </div>
                        <div class="card-footer text-right">
                          <button type="submit" class="btn btn-teal">Search</button>
                        </div>
                      </form>
                    </div> -->
                    <!-- /lg-4 -->

                    <div class="col-lg-12">
                      <div class="card">
                        <div class="table-responsive">

                          <table class="table card-table table-vcenter text-nowrap datatable" id="attendanceviewTable">
                            <thead>
                              <tr>
                                <th>Frist name</th>
                                <th>Last name</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Total hours</th>
                                <th></th>
                              </tr>
                          </thead>
                                    <?php
                                      $config->viewEmployeeDetails();
                                     ?>
                          </table>
                          <script type="text/javascript">
                            require(['datatables', 'jquery'], function(datatable, $) {
                              $('.datatable').DataTable();
                            });
                          </script>
                          <script type="text/javascript">
                            require(['datatables', 'jquery'], function(datatable, $) {
                              $('.datatable1').DataTable();
                            });
                          </script>
                        </div>

                    </div>
                    <!-- /lg-8 -->

                  </div>
                  <!-- /row row-cards -->

              </div>
              <!-- /container -->
            </div>
            <!-- my-3 -->
          </div>
          <!-- flex-fill -->
        </div> <!-- /page -->
        <div class="modal fade" id="viewAllAttendance" tabindex="-1" role="dialog" aria-labelledby="displayrequestForm"  data-backdrop="static" data-keyboard="false">
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
                  <div class="modal-body" id="attendanceview">
                  </div>
                </div><!-- /.modal-content -->
              </div> <!-- /.modal-dialog -->
            </div>


        <!--modal of generateAll-->
        <?php include '../includes/footer.php'; ?>
      </div>
    </div>

    <script type="text/javascript" src="../ajax/ajax.view.attendance.js"></script>
    <script type="text/javascript" src="../ajax/ajax.manage.employees.js"></script>
  </body>
</html>
