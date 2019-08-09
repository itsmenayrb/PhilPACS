<?php
    require_once '../models/Config.php';
    $config = new Config();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Human Resources :: Attendance Management</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext"> -->

    <?php include '../includes/plugins.php'; ?>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
  </head>
  <body class="">

        <div class="page">

          <div class="flex-fill">
            <?php include '../includes/header.php'; ?>

            <div class="my-3 my-md-5">
              <div class="container">

                <?php if (!isset($_GET['id']) && !isset($_GET['fname']) && !isset($_GET['lname'])) : ?>

                  <div class="page-header">
                    <h1 class="page-title">
                      Attendance Management
                    </h1>
                    
                  </div>
                  <!-- /page-header -->
                  <div class="clearfix"></div>
                    <div class="dimmer active">
                      <div id="loader"></div>
                      <div id="dimmer-content">
                        <div class="card" style="height: 30vh; border-radius: 15px;">
                          <div class="card-body">
                            <div class="wrapper">
                              <div class="drop">
                                <div class="cont">
                                  <i class="fe fe-upload-cloud"></i>
                                  <div class="tit">
                                    Drag and Drop CSV File
                                  </div>
                                  <div class="desc">or</div>
                                  <div class="browse">
                                    Click here to Import
                                  </div>
                                </div>
                                <form method="post" enctype="multipart/form-data" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="uploadAttendanceForm">
                                  <input type="file" id="file" name="file" accept=".csv" />
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                  <div class="row row-cards">

                    <div class="col-lg-12">
                      <div class="card">
                          <div class="table-responsive">

                            <table class="table card-table table-vcenter table-hover text-center table-bordered table-hover text-nowrap datatable" id="importAttendance">
                              <thead>
                                <tr>
                                    <th colspan="2">Date Period</th>
                                    <th colspan="2"></th>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th width="20%">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    try {
                                        $result = $config->runQuery("SELECT
                                                                      MIN(Edate) AS datePeriodFrom,
                                                                      MAX(Edate) AS datePeriodTo,
                                                                      CASE WHEN status = 0
                                                                           THEN 'Unprocessed'
                                                                           WHEN status = 1
                                                                           THEN 'Processed'
                                                                           ELSE 'Pending'
                                                                      END AS status,
                                                                      hashedFile
                                                                    FROM attendancetbl
                                                                    GROUP BY hashedFile");

                                        $result->execute();

                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                          $datePeriodFrom = strtotime($row['datePeriodFrom']);
                                          $datePeriodTo = strtotime($row['datePeriodTo']);
                                          $status = $row['status'];

                                          ?>
                                            <tr class="attendance-link" data-href="./attendance.php?id=<?=$row['hashedFile'];?>" style="cursor: pointer;">
                                              <td><?=date('F j, Y', $datePeriodFrom);?></td>
                                              <td><?=date('F j, Y', $datePeriodTo);?></td>
                                              <td>
                                                  <?php if ($status == 'Unprocessed') { ?>
                                                    <span class="badge badge-danger px-4 py-2"><?=$status;?></span>
                                                  <?php } else if ($status == 'Processed') { ?>
                                                    <span class="badge badge-success px-4 py-2"><?=$status;?></span>
                                                  <?php } else { ?>
                                                    <span class="badge badge-warning px-4 py-2"><?=$status;?></span>
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
                                $('#importAttendance').DataTable();

                                $('.attendance-link').on('click', function(e) {
                                  e.preventDefault();
                                  window.location = $(this).data('href');
                                });

                              });
                            </script>
                        </div> <!-- /table-responsive -->
                      </div> <!-- /card -->

                    </div>
                    <!-- /lg-12 -->
                  </div> <!-- /row -->

                <?php endif ?>

                <?php if (isset($_GET['id']) && !isset($_GET['fname']) && !isset($_GET['lname'])) : ?>
                  <?php include '../includes/attendance/view.attendance.php'; ?>
                <?php endif ?>

                <?php if (isset($_GET['id']) && isset($_GET['fname']) && isset($_GET['lname'])) : ?>
                  <?php include '../includes/attendance/personal.attendance.php'; ?>
                <?php endif ?>

              </div>
              <!-- /container -->
            </div>
            <!-- my-3 -->
          </div>
          <!-- flex-fill -->
        </div> <!-- /page -->
        <?php include '../includes/footer.php'; ?>

    <?php include '../includes/attendance/modal.view.attendance.php'; ?>
    <?php include '../includes/modal.password.php'; ?>
    <script type="text/javascript" src="../ajax/ajax.import.attendance.js"></script>
    <script type="text/javascript" src="../ajax/ajax.attendance.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>