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
    <title>Setting Up :: Salary Code</title>
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
                      Salary Code
                    </h1>
                    <div class="page-subtitle">
                      <?php
                        $stmt = $config->runQuery("SELECT COUNT(*) AS salaryCodeCount FROM salarycodetbl");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo $row['salaryCodeCount'] . " active salary code/s."
                      ?>
                    </div>
                  </div>
                  <!-- /page-header -->
                  
                  <button type="button" class="float-right btn btn-lime mb-3"  data-toggle="modal" data-target="#addSalaryCodeModal"><i class="fe fe-layers mr-2"></i>Add Salary Code</button>
                  

                  <div class="clearfix"></div>

                  <div class="row row-cards">

                    <div class="col-lg-12">
                      <div class="card">
                        <div class="dimmer active">
                          <div id='archive-loader'></div>
                          <div id='archive-dimmer-content'>
                          <div class="table-responsive">

                            <table class="table card-table table-vcenter text-nowrap datatable" id="salaryCodeTable">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Salary Code</th>
                                  <th>Description</th>
                                  <th>Basic Salary (Php)</th>
                                  <th>Status</th>
                                  <th class="w-1 text-center"><i class="fe fe-settings"></i></th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $stmt = $config->runQuery("SELECT *, IF (status = 1, 'Active', 'Archived') as status FROM salarycodetbl");
                                      $stmt->execute();
                                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                          $salaryCodeID = $row['salaryCodeID'];
                                          $salaryCode = $row['salaryCode'];
                                          $description = $row['description'];
                                          $basicSalary = $row['basicSalary'];
                                          $status = $row['status'];
                                          $basicSalary2 = number_format($basicSalary, 2);

                                          ?>
                                          <tr>
                                              <td></td>
                                              <td><?=$salaryCode;?></td>
                                              <td><?=$description;?></td>
                                              <td><?=$basicSalary2;?></td>
                                              <td><?=$status;?></td>
                                              <td class="text-center">
                                                <?php if ($status == 'Active') { ?>
                                                  <span data-toggle="tooltip" title="Update">
                                                    <button type="button" data-toggle="modal" data-target="#updateSalaryCodeModal" class="btn btn-info updateSalaryCodeBtnModal" data-id="<?=$salaryCodeID;?>" data-name="<?=$salaryCode;?>" data-description="<?=$description;?>" data-salary="<?=$basicSalary2;?>">
                                                        <i class="fe fe-edit-2"></i>
                                                    </button>
                                                  </span>
                                                  <span data-toggle="tooltip" title="Remove">
                                                    <button type="button" class="btn btn-danger archiveSalaryCodeBtn" data-id="<?=$salaryCodeID;?>" data-name="<?=$salaryCode;?>">
                                                        <i class="fe fe-x"></i>
                                                    </button>
                                                  </span>
                                                <?php } else { ?>
                                                  <span data-toggle="tooltip" title="Restore">
                                                    <button type="button" class="btn btn-lime restoreSalaryCodeBtn" data-id="<?=$salaryCodeID;?>" data-name="<?=$salaryCode;?>">
                                                        <i class="fe fe-refresh-cw"></i>
                                                    </button>
                                                  </span>
                                                <?php } ?>
                                              </td>
                                          </tr>
                                          <?php
                                      }
                                  ?>
                              </tbody>
                            </table>
                            <script type="text/javascript">
                              require(['datatables', 'jquery'], function(datatable, $) {
                                $('#salaryCodeTable').DataTable();
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

    <?php include '../includes/salarycode/modal.add.salary.code.php'; ?>
    <?php include '../includes/salarycode/modal.update.salary.code.php'; ?>

    <script type="text/javascript" src="../ajax/ajax.salary.code.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>