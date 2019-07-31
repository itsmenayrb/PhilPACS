<?php
    require_once '../models/attendance.inc.php';
    $config = new attendance();

    if (isset($_POST['submit'])) {
     $config->import($_FILES['file']['tmp_name']);
 }
?>
<?php
 if (isset($_POST['generate'])) {

   $dateFrom = $_POST['DateFrom'];
   $dateTo = $_POST['DateTo'];

   $config->generateAll($dateFrom,$dateTo);
 }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" /> -->
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Human Resources :: Attendance Management</title>
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
                                  <li class="breadcrumb-item active" aria-current="page"><a href="./attendance.php">Attendance</a></li>
                                  <li class="breadcrumb-item "><a href="./attendanceview.php">View total hours</a></li>
                      </ol>
                    </div>

                  </div>
                  <!-- /page-header -->

                  <div class="float-right">
                    <div class="input-group mb-3">
                      <div class="input-group-append">
                                  <form method="post" enctype="multipart/form-data">
                                    <label for="file-upload" name="file" class="btn btn-primary mb-3">
                                      <i class="fa fa-cloud-upload"></i> Upload
                                        </label>
                                        <input id="file-upload" type="file" name="file"/>
                                    <button class="btn btn-success mb-3" name="submit" type="submit" required/>
                                        <i class="fa fa-plus"></i>
                                        Submit
                                    </button>
                                  </form>


                      </div>
                    </div>
                  </div>
                  <div class="float-left">
                    <div class="input-group mb-3">
                      <div class="input-group-append">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#generateAll">
                            <i class="fa fa-plus"></i>
                            Generate all
                        </button>
                      </div>
                    </div>
                  </div>

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

                          <table class="table card-table table-vcenter text-nowrap datatable" id="attendanceTable">
                            <thead>
                              <tr>
                                <th>first Name</th>
                                <th>Last Name</th>
                                <th>Date</th>
                                <th>Time in</th>
                                <th>Time out</th>
                                <th>Time in</th>
                                <th>Time out</th>
                                <th>Total hours</th>
                              </tr>
                            </thead>

                            <?php
                                $config->viewEmployeeAttendance();
                             ?>
                          </table>
                          <script type="text/javascript">
                            require(['datatables', 'jquery'], function(datatable, $) {
                              $('.datatable').DataTable();
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

        <!--modal of generateAll-->
        <?php include '../includes/attendance/modal.generateall.php' ?>
        <?php include '../includes/footer.php'; ?>
      </div>
    </div>


    <script type="text/javascript" src="../ajax/ajax.manage.employees.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>
