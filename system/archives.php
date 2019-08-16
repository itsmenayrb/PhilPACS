<?php
    require_once '../models/Config.php';
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
    <title>PhilPACS :: Archives</title>
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

                <div class="dimmer active">
                  <div id="loader"></div>
                  <div id="dimmer-content">
                
                      <div class="page-header">
                        <h1 class="page-title">
                          Archives
                        </h1>
                      </div>
                      <!-- /page-header -->
                      

                      <div class="clearfix"></div>

                      <div class="row row-cards">

                        <div class="col-lg-12">
                          <div class="card">
                            <div class="dimmer active">
                              <div id='archive-loader'></div>
                              <div id='archive-dimmer-content'>
                              <div class="table-responsive">

                                <table class="table card-table table-vcenter text-nowrap datatable" id="archivesTable">
                                  <thead>
                                    <tr>
                                      <th class="w-1"></th>
                                      <th>Full Name</th>
                                      <th>Employee ID</th>
                                      <th>Job Position</th>
                                      <th>Department</th>
                                      <th>Basic Salary</th>
                                      <th>Job Status</th>
                                      <th>Date Hired</th>
                                      <th class="w-1"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                           $status = 0;
                                            $stmt = $config->runQuery("SELECT personaldetailstbl.personalID,
                                                                        CONCAT (personaldetailstbl.firstName, ' ', personaldetailstbl.lastName) AS fullname,
                                                                          personaldetailstbl.photo AS profilePicture,
                                                                        CONCAT (salarycodetbl.salaryCode, employeetbl.employeeID) AS employeeNumber,
                                                                        IF (employeetbl.jobStatus = 1, 'Regular', 'Non-Regular') AS jobStatus,
                                                                          employeetbl.dateHired,
                                                                          positiontbl.positionName,
                                                                          salarycodetbl.basicSalary,
                                                                          departmenttbl.departmentName
                                                                       FROM personaldetailstbl
                                                                       INNER JOIN employeetbl
                                                                       ON personaldetailstbl.personalID = employeetbl.employeeID
                                                                       INNER JOIN positiontbl
                                                                       ON employeetbl.positionID = positiontbl.positionID
                                                                       INNER JOIN departmenttbl
                                                                       ON positiontbl.departmentName = departmenttbl.departmentName
                                                                       INNER JOIN salarycodetbl
                                                                       ON positiontbl.salaryCode = salarycodetbl.salaryCodeID
                                                                       WHERE personaldetailstbl.status=:status GROUP BY personaldetailstbl.firstName, personaldetailstbl.lastName");
                                            $stmt->execute(array(":status" => $status));
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                              $personalID = $row['personalID'];
                                              $profilePicture = $row['profilePicture'];
                                              $fullname = $row['fullname'];
                                              $employeeNumber = $row['employeeNumber'];
                                              $status = $row['jobStatus'];
                                              $dateHired = $row['dateHired'];
                                              $position = $row['positionName'];
                                              $basicSalary = $row['basicSalary'];
                                              $department = $row['departmentName'];

                                              $dateHired = date('F j, Y', strtotime($dateHired));
                                              $basicSalary = number_format($basicSalary, 2);
                                              ?>
                                              <tr>
                                                  <td>
                                                      <span class="avatar d-block rounded" style="background-image: url(<?php if ($profilePicture !== "") { ?>'<?=$profilePicture?>' <?php ; } else { ?> ../assets/logo/image_placeholder.png <?php } ?>)"></span>
                                                  </td>
                                                  <td>
                                                      <?=$fullname;?>
                                                  </td>
                                                  <td><?=$employeeNumber;?></td>
                                                  <td><?=$position;?></td>
                                                  <td><?=$department;?></td>
                                                  <td><?=$basicSalary;?></td>
                                                  <td><?=$status;?></td>
                                                  <td><?=$dateHired;?></td>
                                                  <td>
                                                    <button class="btn btn-success restoreBtn" type="button" data-toggle="tooltip" data-placement="right" title="Restore" data-id="<?=$personalID;?>" data-name="<?=$fullname;?>">
                                                      <i class="fe fe-refresh-cw"></i>
                                                    </button>
                                                  </td>
                                              </tr>
                                              <?php
                                          }
                                      ?>
                                  </tbody>
                                </table>
                                <script type="text/javascript">
                                  require(['datatables', 'jquery', 'sweetalert'], function(datatable, $, Swal) {
                                    $('#archivesTable').DataTable();

                                    $('.restoreBtn').on('click', function(e) {
                                      e.preventDefault();

                                      var name = $(this).data('name');
                                      var id = $(this).data('id');
                                      
                                       Swal.fire({
                                        title: 'Are you sure?',
                                        text: 'Restore ' + name + ' info?',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes!'
                                      }).then((result) => {
                                        if (result.value) {
                                          $('#passwordModal').modal('show');
                                          $('#hiddenArchiveID').val(id);
                                          
                                        }

                                      });
                                    });
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
                  </div>

              </div>
              <!-- /container -->
            </div>
            <!-- my-3 -->
          </div>
          <!-- flex-fill -->
        </div> <!-- /page -->
        <?php include '../includes/footer.php'; ?>

    <?php include '../includes/modal.password.php'; ?>

    <script type="text/javascript" src="../ajax/ajax.manage.employees.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>