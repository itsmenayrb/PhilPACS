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
    <title>Accounting :: Payroll</title>
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
                      Payroll
                    </h1>
                  </div>
                  <!-- /page-header -->

                  <div class="clearfix"></div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" style="width: 80%; margin: 0 auto;">

                            <div class="row">
                              <label class="form-label col-sm-4 col-xs-12 align-self-center">Payroll Period: </label>
                              <div class="col-md-4 mb-1">
                                <div class="form-group">
                                  <small class="form-text text-muted">From</small>
                                  <input type="text" class="form-control disabled" disabled />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <small class="form-text text-muted">To</small>                                
                                  <input type="text" class="form-control disabled" disabled/>
                                </div>
                              </div>
                            </div>

                            <hr class="bg-gray" width="70%">

                            <div class="row">
                              <label class="form-label col-sm-4 col-xs-12 align-self-center">Employees: </label>
                              <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable table-hover table-bordered" id="payrollTable">
                                  <thead>
                                    <tr>
                                      <th width="20%">Employee ID</th>
                                      <th width="65%">Full Name</th>
                                      <th>Total No. of Hours</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <td>A0001</td>
                                    <td>Balaga Bryan</td>
                                    <td>60</td>
                                  </tbody>
                                </table>
                                <script type="text/javascript">
                                  require(['datatables', 'jquery', 'sweetalert'], function(datatable, $, Swal) {
                                    $('#payrollTable').DataTable();
                                  });
                                </script>
                              </div>
                            </div>

                            <hr class="bg-gray">

                            <div class="row">
                              <div class="form-label col-sm-3 col-xs-12">Contributions: </div>
                              <div class="form-group col-sm-9">
                                <div>
                                  <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="example-inline-checkbox1" value="option1" checked>
                                    <span class="custom-control-label">SSS</span>
                                  </label>
                                  <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="example-inline-checkbox2" value="option2">
                                    <span class="custom-control-label">PhilHealth</span>
                                  </label>
                                  <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="example-inline-checkbox3" value="option3">
                                    <span class="custom-control-label">Pag-ibig</span>
                                  </label>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="form-label col-sm-3 col-xs-12">Less: </div>
                              <div class="form-group col-sm-9">
                                <div>
                                  <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="example-inline-checkbox2" value="option2">
                                    <span class="custom-control-label">Tax</span>
                                  </label>
                                </div>
                              </div>
                            </div>

                            <hr class="bg-gray" width="70%">

                            <div class="text-center">
                              <button class="btn btn-green btn-lg" type="submit">Generate Payroll</button>
                            </div>

                          </form>
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

    <script type="text/javascript" src="../ajax/ajax.payroll.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>