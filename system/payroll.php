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

                <?php if (!isset($_GET['id'])) : ?>

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
                          <div class="table-responsive">
                            <table class="table card-table table-vcenter table-hover text-center table-bordered table-hover text-nowrap datatable" id="payrollPeriodTable">
                              <thead>
                                <tr>
                                  <th colspan="2">Payroll Period</th>
                                  <th width="10%"></th>
                                </tr>
                                <tr>
                                  <th width="45%">From</th>
                                  <th width="45%">To</th>
                                  <th width="10%">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    try {
                                        $status = 1;
                                        $result = $config->runQuery("SELECT
                                                                      MIN(Edate) AS datePeriodFrom,
                                                                      MAX(Edate) AS datePeriodTo,
                                                                      hashedFile
                                                                    FROM attendancetbl
                                                                    WHERE status=:status
                                                                    GROUP BY hashedFile");

                                        $result->execute(array(":status" => $status));

                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                          $datePeriodFrom = strtotime($row['datePeriodFrom']);
                                          $datePeriodTo = strtotime($row['datePeriodTo']);
                                          $payrollStatus = 'Unprocessed';
                                          ?>
                                            <tr class="payroll-link" data-href="./payroll.php?id=<?=$row['hashedFile'];?>" style="cursor: pointer;">
                                              <td><?=date('F j, Y', $datePeriodFrom);?></td>
                                              <td><?=date('F j, Y', $datePeriodTo);?></td>
                                              <td>
                                                  <?php if ($payrollStatus == 'Unprocessed') { ?>
                                                    <span class="badge badge-danger px-4 py-2"><?=$payrollStatus;?></span>
                                                  <?php } else if ($payrollStatus == 'Processed') { ?>
                                                    <span class="badge badge-success px-4 py-2"><?=$payrollStatus;?></span>
                                                  <?php } else { ?>
                                                    <span class="badge badge-warning px-4 py-2"><?=$payrollStatus;?></span>
                                                  <?php } ?>
                                              </td>
                                            </tr>
                                          <?php 
                                        }
                                    }catch (PDOException $e) {
                                        echo "Connection Error: " . $e->getMessage();
                                    }
                                  ?>
                              </tbody>
                            </table>
                            <script type="text/javascript">
                              require(['datatables', 'jquery'], function(datatable, $) {
                                $('#payrollPeriodTable').DataTable();

                                $('.payroll-link').on('click', function(e) {
                                  e.preventDefault();
                                  window.location = $(this).data('href');
                                });

                              });
                            </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif ?>

                <?php if (isset($_GET['id'])) : ?>
                  <?php include '../includes/payroll/view.payroll.php'; ?>
                <?php endif ?>

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