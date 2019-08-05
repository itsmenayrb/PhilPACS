<?php
    require_once '../models/Config.php';
    $config = new Config();
    $config->isnot_loggedin();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <link rel="icon" href="../assets/logo/Logo.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/logo/Logo.png" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Human Resources :: Position</title>
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
                      Position
                    </h1>
                    <div class="page-subtitle">
                      <?php
                        $status = 1;
                        $stmt = $config->runQuery("SELECT COUNT(*) AS positionCount FROM positiontbl WHERE status=:status");
                        $stmt->execute(array(":status" => $status));
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo $row['positionCount'] . " active position/s."
                      ?>
                    </div>
                  </div>
                  <!-- /page-header -->
                  
                  <button type="button" class="float-right btn btn-lime mb-3"  data-toggle="modal" data-target="#addPositionModal"><i class="fe fe-layers mr-2"></i>Add Position</button>
                  

                  <div class="clearfix"></div>

                  <div class="row row-cards">

                    <div class="col-lg-12">
                      <div class="card">
                        <div class="dimmer active">
                          <div id='archive-loader'></div>
                          <div id='archive-dimmer-content'>
                          <div class="table-responsive">

                            <table class="table card-table table-vcenter text-nowrap datatable" id="positionTable">
                              <thead>
                                <tr>
                                  <th>Department</th>
                                  <th>Position Code</th>
                                  <th>Position</th>
                                  <th>Basic Salary</th>
                                  <th>Status</th>
                                  <th class="w-1 text-center"><i class="fe fe-settings"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $status = 1;
                                      $stmt = $config->runQuery("SELECT positiontbl.positionID, positiontbl.positionName, IF (positiontbl.status = 1, 'Active', 'Archived') AS status, positiontbl.basicSalary, positiontbl.code, departmenttbl.departmentName FROM positiontbl INNER JOIN departmenttbl ON positiontbl.departmentID = departmenttbl.departmentID WHERE positiontbl.status=:status");

                                      $stmt->execute(array(":status" => $status));
                                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                          $code = $row['code'];
                                          $position_id = $row['positionID'];
                                          $position_name = $row['positionName'];
                                          $department_name = $row['departmentName'];
                                          $status = $row['status'];
                                          $basicSalary = $row['basicSalary'];
                                          $basicSalary = number_format($basicSalary, 2);

                                          ?>
                                          <tr>
                                              <td><?=$department_name;?></td>
                                              <td><?=$code;?></td>
                                              <td><?=$position_name;?></td>
                                              <td><?=$basicSalary;?></td>
                                              <td><?=$status;?></td>
                                              <td class="text-center">
                                                  <button type="button" data-toggle="modal" data-target="#updatePositionModal" class="btn btn-info updatePositionBtnModal" data-id="<?=$position_id;?>" data-name="<?=$position_name;?>" data-salary="<?=$basicSalary;?>">
                                                      <i class="fe fe-edit-2"></i>
                                                  </button>
                                                  <button type="button" class="btn btn-danger archivePositionBtn" data-id="<?=$position_id;?>" data-name="<?=$position_name;?>">
                                                      <i class="fe fe-x"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                          <?php
                                      }
                                  ?>
                              </tbody>
                            </table>
                            <script type="text/javascript">
                              require(['datatables', 'jquery'], function(datatable, $) {
                                $('#positionTable').DataTable();
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

    <?php include '../includes/position/modal.add.position.php'; ?>
    <?php include '../includes/position/modal.update.position.php'; ?>

    <script type="text/javascript" src="../ajax/ajax.position.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>