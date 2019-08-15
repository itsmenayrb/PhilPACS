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
    <title>Human Resources :: Employee Management</title>
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
                
                <?php if (!isset($_GET['id']) && !isset($_GET['edit'])) : ?>
                  <div class="page-header">
                    <h1 class="page-title">
                      Employee Management
                    </h1>
                    <div class="page-subtitle">
                      <?php
                        $status = 1;
                        $stmt = $config->runQuery("SELECT COUNT(*) AS employeeCount FROM personaldetailstbl WHERE status=:status");
                        $stmt->execute(array(":status" => $status));
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo $row['employeeCount'] . " active employee/s."
                      ?>
                    </div>
                  </div>
                  <!-- /page-header -->
                  
                  <div class="float-right mb-2">
                        <button type="button" class="btn btn-lime"  data-toggle="modal" data-target="#addEmployeeModal"><i class="fe fe-user-plus mr-2"></i>Add Employee</button>
                    <!-- <div class="input-group mb-3">
                      <div class="input-group-append">
                        <button data-toggle="dropdown" type="button" class="btn btn-lime dropdown-toggle"></button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="../downloads/Format - Employee Import.xlsx" download="Employee_Sheet">Download Employee Sheet</a>
                          <input type="file" class="hidden" id="uploadFile" />
                          <a class="dropdown-item" id="importEmployeeDataLink" href="javascript:void(0)">
                            Import Employee Data
                          </a>
                        </div>
                        <script type="text/javascript">
                          require(['jquery'], function($) {
                            $('#importEmployeeDataLink').on('click', function(e) {
                              e.preventDefault();
                              $('#uploadFile:hidden').trigger('click');
                            });    
                          });
                        </script>
                      </div>
                      <span class="align-self-center ml-3" data-toggle="tooltip" data-placement="top" title="Help">
                        <span class="form-help bg-green text-white" tabindex="0" data-trigger="focus" data-toggle="popover" data-placement="bottom" data-content="<p>Download the employee sheet to enter employee data.<p>
                          <p>Import the employee data using the same excel format that you have downloaded</p>">?</span>
                      </span>
                      <script type="text/javascript">
                          require(['jquery'], function($) {
                          	$("[data-toggle='popover']").on('shown.bs.popover', function() {
                          		var popover = $(this);
                          		setTimeout(function() {
                          			popover.popover('hide');
                          		}, 5000)
                          	});
                          });
                        </script>
                    </div> -->
                  </div>
                  

                  <div class="clearfix"></div>

                  <div class="row row-cards">

                    <div class="col-lg-12">
                      <div class="card">
                        <div class="table-responsive">

                          <table class="table card-table table-vcenter text-nowrap datatable table-hover" id="employeeTable">
                            <thead>
                              <tr>
                                <th class="w-1"></th>
                                <th>Employee ID</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Job Position</th>
                                <th>Basic Salary</th>
                                <th>Job Status</th>
                                <th>Date Hired</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $status = 1;
                                $stmt = $config->runQuery("SELECT personaldetailstbl.personalID,
                                                            CONCAT (personaldetailstbl.firstName, ' ', personaldetailstbl.lastName) AS fullname,
                                                              personaldetailstbl.photo AS profilePicture,
                                                            CONCAT (salarycodetbl.salaryCode, employeetbl.employeeID) AS employeeNumber,
                                                            IF (employeetbl.jobStatus = 1, 'Regular', 'Non-Regular') AS jobStatus,
                                                              employeetbl.dateHired,
                                                              positiontbl.positionName,
                                                              departmenttbl.departmentName,
                                                              salarycodetbl.basicSalary AS basicSalary
                                                           FROM personaldetailstbl
                                                           INNER JOIN employeetbl
                                                           ON personaldetailstbl.personalID = employeetbl.employeeID
                                                           INNER JOIN positiontbl
                                                           ON employeetbl.positionID = positiontbl.positionID
                                                           INNER JOIN departmenttbl
                                                           ON positiontbl.departmentName = departmenttbl.departmentName
                                                           INNER JOIN salarycodetbl ON positiontbl.salaryCode = salarycodetbl.salaryCodeID
                                                           WHERE personaldetailstbl.status=:status
                                                           GROUP BY personaldetailstbl.firstName, personaldetailstbl.lastName");
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
                                  <tr class="employee-link" data-href="./employee.php?id=<?=$personalID;?>">
                                      <td>
                                          <span class="avatar d-block rounded" style="background-image: url(<?php if ($profilePicture !== "") { ?>'<?=$profilePicture?>' <?php ; } else { ?> ../assets/logo/image_placeholder.png <?php } ?>)"></span>
                                      </td>
                                      <td><?=$employeeNumber;?></td>
                                      <td>
                                          <?=$fullname;?>
                                      </td>
                                      <td><?=$department;?></td>
                                      <td><?=$position;?></td>
                                      <td><?=$basicSalary;?></td>
                                      <td><?=$status;?></td>
                                      <td><?=$dateHired;?></td>
                                  </tr>
                                  <?php
                                }
                              ?>
                            </tbody>
                          </table>
                          <script type="text/javascript">
                            require(['datatables', 'jquery', 'sweetalert'], function(datatable, $, Swal) {
                              $('.datatable').DataTable();

                              $('.employee-link').on('click', function(e) {
                              	e.preventDefault();
                              	window.location = $(this).data('href');
                              });
                            });
                          </script>
                        </div>
                          
                    </div>
                    <!-- /lg-8 -->

                  </div>
                  <!-- /row row-cards -->
                <?php endif ?>

                <?php if (isset($_GET['id'])) : ?>
            
                  <?php include '../includes/employee/employee.data.php'; ?>

                <?php endif ?>

                
                <?php if (isset($_GET['edit'])) : ?>
            
                  <?php include '../includes/employee/employee.edit.php'; ?>

                <?php endif ?>

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

    <?php include '../includes/employee/modal.add.employee.php'; ?>
    <?php include '../includes/employee/modal.add.account.php'; ?>
    <?php include '../includes/employee/modal.edit.account.php'; ?>
    <?php include '../includes/modal.password.php'; ?>

    <script type="text/javascript" src="../ajax/ajax.manage.employees.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>