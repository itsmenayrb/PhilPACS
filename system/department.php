<?php
    require_once '../models/Config.php';
    $config = new Config();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" /> -->
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Setting Up :: Department</title>
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
                
                  <div class="page-header">
                    <h1 class="page-title">
                      Department
                    </h1>
                    <div class="page-subtitle">
                      <?php
                        $status = 1;
                        $stmt = $config->runQuery("SELECT COUNT(*) AS departmentCount FROM departmenttbl WHERE status=:status");
                        $stmt->execute(array(":status" => $status));
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo $row['departmentCount'] . " active department/s."
                      ?>
                    </div>
                  </div>
                  <!-- /page-header -->
                  
                  <button type="button" class="float-right btn btn-lime mb-3"  data-toggle="modal" data-target="#addDepartmentModal"><i class="fe fe-layers mr-2"></i>Add Department</button>
                  

                  <div class="clearfix"></div>

                  <div class="row row-cards">

                    <div class="col-lg-12">
                      <div class="card">
                        <div class="dimmer active">
                          <div id='archive-loader'></div>
                          <div id='archive-dimmer-content'>
                          <div class="table-responsive">

                            <table class="table card-table table-vcenter text-nowrap datatable" id="departmentTable">
                              <thead>
                                <tr>
                                  <th class="w-1">Salary Code</th>
                                  <th>Department</th>
                                  <th>Status</th>
                                  <th class="w-1 text-center"><i class="fe fe-settings"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $status = 1;
                                      $stmt = $config->runQuery("SELECT departmenttbl.departmentID, departmenttbl.departmentName,
                                                                    IF (departmenttbl.status = 1, 'Active', 'Archived') as status,
                                                                    salarycodetbl.salaryCode
                                                                 FROM departmenttbl
                                                                 INNER JOIN salarycodetbl ON departmenttbl.salaryCodeID = salarycodetbl.salaryCodeID
                                                                 WHERE departmenttbl.status=:status");
                                      $stmt->execute(array(":status" => $status));

                                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                          $department_id = $row['departmentID'];
                                          $salary_code = $row['salaryCode'];
                                          $department_name = $row['departmentName'];
                                          $status = $row['status'];

                                          ?>
                                          <tr>
                                              <td><?=$salary_code;?></td>
                                              <td><?=$department_name;?></td>
                                              <td><?=$status;?></td>
                                              <td class="text-center">
                                                  <button type="button" data-toggle="modal" data-target="#updateDepartmentModal" class="btn btn-info updateDepartmentBtnModal" data-id="<?=$department_id;?>" data-name="<?=$department_name;?>">
                                                      <i class="fe fe-edit-2"></i>
                                                  </button>
                                                  <button type="button" class="btn btn-danger archiveDepartmentBtn" data-id="<?=$department_id;?>" data-name="<?=$department_name;?>">
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
                                $('#departmentTable').DataTable();
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

    <?php include '../includes/department/modal.add.department.php'; ?>
    <?php include '../includes/department/modal.update.department.php'; ?>

    <script type="text/javascript" src="../ajax/ajax.department.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>