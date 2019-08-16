<?php
<<<<<<< HEAD
<<<<<<< HEAD
require '../models/requisition.inc.php';

$requestt = new Request();
$result = $requestt->viewRequestForm();

if (isset($_POST['SubmitRequest'])) {
$RequestType = $_POST['RequestType'];
$lastName = $_POST['lastName'];
$Request = $_POST['Request'];
$DateFrom = $_POST['DateFrom'];
$DateTo = $_POST['DateTo'];
$Reason = $_POST['Reason'];

$requestt->RequestFrom($RequestType, $lastName, $Request, $DateFrom, $DateTo, $Reason);
}

?>
<?php
$requestt = new Request();
if (isset($_POST['Approved'])) {
  $requestID = $_POST['requestID'];
  $requestt->ApprovedList($requestID);
}
if (isset($_POST['Declined'])) {
  $requestID = $_POST['requestID'];
  $requestt->DeclinedList($requestID);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" /> -->
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Human Resources :: Requistion Management</title>
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
                      Requisition Management
                    </h1>
                    <div class="page-subtitle">

                    </div>
                  </div>

                  <!-- /page-header -->

                  <div class="float-right">
                    <div class="input-group mb-3">
                      <div class="input-group-append">
                        <button type="button" class="btn btn-lime"  data-toggle="modal" data-target="#addRequestModal"><i class="fe fe-user-plus mr-2"></i>Add Request Form</button>

                      </div>

                    </div>
                  </div>
                  <?php include '../includes/Requisition/requisition.php'; ?>


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
                          <script type="text/javascript">
                            require(['datatables', 'jquery'], function(datatable, $) {
                              $('.datatable2').DataTable();
                            });
                          </script>
                  <!-- /row row-cards -->
              </div>
              <!-- /container -->
            </div>
            <!-- my-3 -->
          </div>


          <!-- flex-fill -->
        </div> <!-- /page -->
        <div class="modal fade" id="viewRequestForm" tabindex="-1" role="dialog" aria-labelledby="displayrequestForm"  data-backdrop="static" data-keyboard="false">
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
                  <div class="modal-body" id= "displayRequestForm">
                  </div>
                </div><!-- /.modal-content -->
              </div> <!-- /.modal-dialog -->
            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php include '../includes/footer.php'; ?>
        </div>
      </div>
    </div>
    <?php include '../includes/Requisition/modal.requisition.php'; ?>
    <script type="text/javascript" src="../ajax/ajax.requestFrom.js"></script>
    </script>
  </body>
</html>
=======
=======
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
  require '../models/requisition.inc.php';

    $requestt = new Request();
    $result = $requestt->viewRequestForm();
    // Submit request Form to database
      require_once '../controllers/controller.Requisition.php';
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
                                <div class="input-group mb-3">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-lime"  data-toggle="modal" data-target="#addRequestModal"><i class="fe fe-user-plus mr-2"></i>Add Request</button>

                                  </div>
                                </div>
                              </div>
                              <!-- /Requisition -->

                              <div class="clearfix"></div>

                              <div class="row row-cards">

                                <div class="col-lg-12">
                                  <div class="card">
                                    <div class="table-responsive">
                                      <?php include '../includes/Requisition/requisition.php'; ?>
                                    </div>

                                </div>
                                <!-- /lg-8 -->
                              </div>
                              <!-- /row row-cards -->
                              <?php include '../includes/Requisition/modal.requisition.php'; ?>
                              <!-- datatable of requisition/ ajax to display -->
                              <script type="text/javascript">
                                require(['datatables', 'jquery', 'sweetalert'], function(datatable, $, Swal) {
                                  $('.datatable').DataTable();

                                  $('.employee-link').on('click',function(e){
                                        e.preventDefault();
                                        var reqID = $(this).data('id');
                                        $.ajax({
                                        type: 'post',
                                        url:'../controllers/Request.inc.php',
                                        data:
                                        {
                                            reqID:reqID,
                                            displayRequestForm: 1
                                          },
                                        success: function(response)
                                        {
                                          $('#displayRequestForm').html(response);
                                        }
                                     });
                                    });
                                });
                              </script>
                              <!-- /end of ajax -->



                          </div>
                          <!-- modal for request form and display approved and declined -->

                          <div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalTitle" id="viewRequestModal" data-backdrop="static" data-keyboard="false">
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
                                        <div class="modal-body" id= "displayRequestForm">

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

                <script type="text/javascript" src="../ajax/ajax.manage.employees.js"></script>
                <script type="text/javascript">
                  function reload() {
                    location.reload();
                  }
                </script>
              </body>
            </html>
<<<<<<< HEAD
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
=======
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
