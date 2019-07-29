<?php
    require_once '../models/Config.php';
    $config = new Config();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Accounting :: Payroll History</title>
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
                      Payroll History
                    </h1>
                  </div>
                  <!-- /page-header -->
                  
                  <div class="clearfix"></div>


                  <div class="row row-cards">

                    <div class="col-lg-12">
                      <div class="card">
                        <div class="table-responsive">
                          <table class="table card-table table-bordered table-hover table-sm text-nowrap table-outline" id="payrollHistoryTable">
                            <thead>
                              <tr>
                                <th colspan="2" class="text-center">Date Period</th>
                                <th></th>
                                <th></th>
                              </tr>
                              <tr>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Date Processed</th>
                                <th class="w-1"><i class="fe fe-settings"></i></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>7/1</td>
                                <td>7/15</td>
                                <td>7/25</td>
                                <td class="text-center">
                                  <button class="btn btn-primary" type="button"><i class="fe fe-eye"></i></button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <script type="text/javascript">
                              require(['datatables', 'jquery'], function(datatable, $) {
                                $('#payrollHistoryTable').DataTable();
                              });
                          </script>
                        </div>
                      </div>
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
        <?php include '../includes/footer.php'; ?>

    <script type="text/javascript" src="../ajax/ajax.payroll.history.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>