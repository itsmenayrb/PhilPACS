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
    <title>Human Resources :: Employee Management</title>
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
                  
                  <div class="float-right">
                    <div class="input-group mb-3">
                      <div class="input-group-append">
                        <button type="button" class="btn btn-lime"  data-toggle="modal" data-target="#addEmployeeModal"><i class="fe fe-user-plus mr-2"></i>Add Employee</button>
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
                        <span class="form-help bg-green text-white" data-toggle="popover" data-placement="bottom" data-content="<p>Download the employee sheet to enter employee data.<p>
                          <p>Import the employee data using the same excel format that you have downloaded</p>">?</span>
                      </span>
                    </div>
                  </div>
                  

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

                    <div class="col-lg-12">
                      <div class="card">
                        <div class="table-responsive">

                          <table class="table card-table table-vcenter text-nowrap datatable" id="employeeTable">
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
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $status = 1;
                                $stmt = $config->runQuery("SELECT personaldetailstbl.personalID,
                                                            CONCAT (personaldetailstbl.firstName, ' ', personaldetailstbl.lastName) AS fullname,
                                                              personaldetailstbl.photo AS profilePicture,
                                                            CONCAT (positiontbl.code, employeetbl.employeeID) AS employeeNumber,
                                                            IF (employeetbl.jobStatus = 1, 'Regular', 'Probationary') AS jobStatus,
                                                              employeetbl.dateHired,
                                                              positiontbl.positionName,
                                                              positiontbl.basicSalary,
                                                              departmenttbl.departmentName
                                                           FROM personaldetailstbl
                                                           INNER JOIN employeetbl
                                                           ON personaldetailstbl.personalID = employeetbl.employeeID
                                                           INNER JOIN positiontbl
                                                           ON employeetbl.positionID = positiontbl.positionID
                                                           INNER JOIN departmenttbl
                                                           ON positiontbl.departmentID = departmenttbl.departmentID
                                                           WHERE personaldetailstbl.status=:status");
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
                                          <span class="avatar d-block rounded" style="background-image: url(<?=$profilePicture;?>)"></span>
                                      </td>
                                      <td>
                                        <a href="./employee.php?id=<?=$personalID;?>" class="btn btn-link">
                                          <?=$fullname;?>
                                        </a>
                                      </td>
                                      <td><?=$employeeNumber;?></td>
                                      <td><?=$position;?></td>
                                      <td><?=$department;?></td>
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
                            require(['datatables', 'jquery'], function(datatable, $) {
                              $('.datatable').DataTable();
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

    <script type="text/javascript" src="../ajax/ajax.manage.employees.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>