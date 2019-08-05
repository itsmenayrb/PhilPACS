<?php
  $id = $config->checkInput($_GET['id']);
  $stmt = $config->runQuery("SELECT
                      personaldetailstbl.personalID,
                      CONCAT (personaldetailstbl.firstName, ' ' , personaldetailstbl.middleName, ' ', personaldetailstbl.lastName) AS fullName,
                      personaldetailstbl.contactNumber, personaldetailstbl.email, IF (personaldetailstbl.gender = 1, 'Male', 'Female') AS gender,
                      personaldetailstbl.birthday, personaldetailstbl.age, personaldetailstbl.photo AS profilePicture, IF (employeetbl.jobStatus = 1, 'Regular', 'Non-Regular') AS jobStatus, employeetbl.dateHired,
                      addresstbl.houseNumber AS houseNumber, addresstbl.block AS block, addresstbl.lot AS lot, addresstbl.street AS street, addresstbl.subdivision AS subdivision,
                      addresstbl.barangay AS barangay, addresstbl.city AS city, addresstbl.province AS province, addresstbl.country AS country, addresstbl.zipcode AS zipcode,
                      CONCAT (
                        houseNumber, ' ',
                        block, ' ',
                        lot, ' ',
                        street, ' ',
                        subdivision, ' ',
                        barangay, ', ',
                        city, ', ',
                        province, ', ',
                        country, ', ',
                        zipcode
                      ) AS address,

                      CONCAT (positiontbl.code, employeetbl.employeeID) AS employeeID, positiontbl.positionName, positiontbl.basicSalary, departmenttbl.departmentName,
                      bankaccounttbl.bankAccountNumber, benefitnumberstbl.sssNumber, benefitnumberstbl.philhealthNumber, benefitnumberstbl.pagibigNumber, benefitnumberstbl.taxIdentificationNumber

                       FROM personaldetailstbl
                       INNER JOIN addresstbl ON personaldetailstbl.personalID = addresstbl.addressID
                       INNER JOIN benefitnumberstbl ON addresstbl.addressID = benefitnumberstbl.benefitID
                       INNER JOIN bankaccounttbl ON benefitnumberstbl.benefitID = bankaccounttbl.bankAccountID
                       INNER JOIN employeetbl ON bankaccounttbl.bankAccountID  = employeetbl.employeeID
                       INNER JOIN positiontbl ON employeetbl.positionID = positiontbl.positionID
                       INNER JOIN departmenttbl ON positiontbl.departmentID = departmenttbl.departmentID
                       WHERE personaldetailstbl.personalID = :personalID LIMIT 1
                     ");
  $stmt->execute(array(":personalID" => $id));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $personalID = $row['personalID'];
  $fullname = $row['fullName'];
  $contact_number = $row['contactNumber'];
  $email = $row['email'];
  $gender = $row['gender'];
  $birthday = $row['birthday'];
  $birthday = date('F j, Y', strtotime($birthday));
  $age = $row['age'];
  $displayPicture = $row['profilePicture'];
  $jobStatus = $row['jobStatus'];
  $dateHired = $row['dateHired'];
  $dateHired = date('F j, Y', strtotime($dateHired));
  $address = $row['address'];
  $employeeID = $row['employeeID'];
  $positionName = $row['positionName'];
  $basicSalary = $row['basicSalary'];
  $basicSalaryFormatted = number_format($basicSalary, 2);
  $departmentName = $row['departmentName'];

  $bankAccountNumber = $row['bankAccountNumber'];
  $sssNumber = $row['sssNumber'];
  $philhealthNumber = $row['philhealthNumber'];
  $pagibigNumber = $row['pagibigNumber'];
  $taxIdentificationNumber = $row['taxIdentificationNumber'];


?>

<div class="dimmer active">
  <div id="loader"></div>
  <div id="dimmer-content">

    <div class="row mb-4">
      <div class="col-md-12">
      <a class="btn btn-secondary btn-lg mb-4" href="./employee.php">Back</a>
      <a class="ml-2 float-right btn btn-lime" data-toggle="tooltip" title="Print" href="javascript:void(0)">
        <i class="fe fe-printer"></i> Print
      </a>
      <span class="float-right" data-toggle="tooltip" title="Update Employee Details">
        <a class="btn btn-teal" href="./employee.php?edit=<?=$personalID;?>">
          <i class="fe fe-edit-2"></i> Update
        </a>
      </span>
      <div class="clearfix"></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="card border-info">
          <div class="card-header">
            <h3 class="card-title">Employees</h3>
          </div>
          <div class="card-body">
          <table class="table table-sm datatable">
            <tbody>
              <?php
              $display = $config->runQuery("SELECT personalID, CONCAT (personaldetailstbl.firstName, ' ', personaldetailstbl.lastName) AS fullname
                                            FROM personaldetailstbl WHERE status=:status LIMIT 10");
              $display->execute(array(":status"=>1));
              while ($rows = $display->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                  <td>
                    <a href="./employee.php?id=<?=$rows['personalID'];?>" class="btn btn-link"><?=$rows['fullname'];?></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>

      <div class="col-md-9">


        <div class="card card-profile">
          <div class="card-header image-parallax"></div>
          <div class="card-body text-center">
            <img class="card-profile-img avatar avatar-xxl" src="<?php if ($displayPicture != "") { echo $displayPicture; } else { ?> ../assets/logo/image_placeholder.png <?php } ?>">
            <h3 class="mb-3"><?=$fullname;?></h3>
            <h4 class="mb-1"><?=$positionName;?></h4>
            <h4 class="mb-1"><?=$employeeID;?></h4>

            <hr>

            <ul class='nav nav-pills mb-3 mt-3 flex-column flex-sm-row nav-justified' id='pills-tab' role='tablist'>
              <li class='nav-item flex-sm-fill'>
                <a class='nav-link active text-sm-center p-3' id='pills-personal-tab' data-toggle='pill' href='#pills-personal' role='tab' aria-controls='pills-personal' aria-selected='true'>Personal Details</a>
              </li>

              <li class='nav-item flex-sm-fill'>
                <a class='nav-link text-sm-center p-3' id='pills-employment-tab' data-toggle='pill' href='#pills-employment' role='tab' aria-controls='pills-employment' aria-selected='false'>Employment Details</a>
              </li>

              <li class='nav-item flex-sm-fill'>
                <a class='nav-link text-sm-center p-3' id='pills-attendance-tab' data-toggle='pill' href='#pills-attendance' role='tab' aria-controls='pills-attendance' aria-selected='false'>Attendance</a>
              </li>

              <li class='nav-item flex-sm-fill'>
                <a class='nav-link text-sm-center p-3' id='pills-contribution-tab' data-toggle='pill' href='#pills-contribution' role='tab' aria-controls='pills-contribution' aria-selected='false'>Contributions</a>
              </li>

              <li class='nav-item flex-sm-fill'>
                <a class='nav-link text-sm-center p-3' id='pills-deduction-tab' data-toggle='pill' href='#pills-deduction' role='tab' aria-controls='pills-deduction' aria-selected='false'>Deductions</a>
              </li>

              <li class='nav-item flex-sm-fill'>
                <a class='nav-link text-sm-center p-3' id='pills-salary-history-tab' data-toggle='pill' href='#pills-salary-history' role='tab' aria-controls='pills-salary-history' aria-selected='false'>Payroll History</a>
              </li>

              <li class='nav-item flex-sm-fill'>
                <a class='nav-link text-sm-center p-3' id='pills-requisition-tab' data-toggle='pill' href='#pills-requisition' role='tab' aria-controls='pills-requisition' aria-selected='false'>Requisitions</a>
              </li>

              <li class='nav-item flex-sm-fill'>
                <a class='nav-link text-sm-center p-3' id='pills-settings-tab' data-toggle='pill' href='#pills-settings' role='tab' aria-controls='pills-settings' aria-selected='false'><span class='fe fe-settings'></span></a>
              </li>
            </ul>
            <!-- /ul> -->

            <hr>

            <div class='tab-content mt-3 text-left' id='pills-tabContent'>

              <div class='tab-pane fade show active mb-3' id='pills-personal' role='tabpanel' aria-labelledby='pills-personal-tab'>
                <div class='container'>
                  <dl class='row'>
                    <dt class='offset-sm-1 col-sm-4'>Contact Number: </dt>
                      <dd class='col-sm-7'><?=$contact_number;?></dd>

                    <dt class='offset-sm-1 col-sm-4'>Email: </dt>
                      <dd class='col-sm-7'><?=$email;?></dd>

                    <dt class='offset-sm-1 col-sm-4'>Gender: </dt>
                      <dd class='col-sm-7'><?=$gender;?></dd>

                    <dt class='offset-sm-1 col-sm-4'>Birthday: </dt>
                      <dd class='col-sm-7'><?=$birthday;?></dd>

                    <dt class='offset-sm-1 col-sm-4'>Age: </dt>
                      <dd class='col-sm-7'><?=$age;?> years old</dd>

                    <dt class='offset-sm-1 col-sm-4'>Address: </dt>
                      <dd class='col-sm-7'><?=$address;?></dd>

                  </dl>

                  <div class='border-top' style='width: 60%; margin: 0 auto;'></div>

                  <dl class='row mt-3'>
                    <dt class='offset-sm-1 col-sm-4'>SSS Number: </dt>
                      <dd class='col-sm-7'><?=$sssNumber;?></dd>

                    <dt class='offset-sm-1 col-sm-4'>PhilHealth Number: </dt>
                      <dd class='col-sm-7'><?=$philhealthNumber;?></dd>

                    <dt class='offset-sm-1 col-sm-4'>Pag-ibig Number: </dt>
                      <dd class='col-sm-7'><?=$pagibigNumber;?></dd>

                    <dt class='offset-sm-1 col-sm-4'>Tax Identification Number: </dt>
                      <dd class='col-sm-7'><?=$taxIdentificationNumber;?></dd>

                    <dt class='offset-sm-1 col-sm-4'>Bank Account Number: </dt>
                      <dd class='col-sm-7'><?=$bankAccountNumber;?></dd>
                  </dl>

                </div>
              </div> <!-- /personal-tab -->

              <div class='tab-pane fade mb-3' id='pills-employment' role='tabpanel' aria-labelledby='pills-employment-tab'>

                  <div class='container'>
                      <dl class='row pt-5'>
                        <dt class='offset-sm-2 col-sm-4'>Employee ID: </dt>
                          <dd class='col-sm-6'><?=$employeeID?></dd>

                        <dt class='offset-sm-2 col-sm-4'>Date Hired: </dt>
                          <dd class='col-sm-6'><?=$dateHired?></dd>

                        <dt class='offset-sm-2 col-sm-4'>Department: </dt>
                          <dd class='col-sm-6'><?=$departmentName?></dd>

                        <dt class='offset-sm-2 col-sm-4'>Position: </dt>
                          <dd class='col-sm-6'><?=$positionName?></dd>

                        <dt class='offset-sm-2 col-sm-4'>Job Status: </dt>
                          <dd class='col-sm-6'><?=$jobStatus?></dd>

                        <dt class='offset-sm-2 col-sm-4'>Basic Salary: </dt>
                          <dd class='col-sm-6'>Php <?=$basicSalaryFormatted?></dd>
                      </dl>
                  </div>
              </div> <!-- /employement-tab -->

              <div class='tab-pane fade' id='pills-attendance' role='tabpanel' aria-labelledby='pills-attendance-tab'>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter text-nowrap datatable" id="attendance_table">
                    <thead>
                      <tr>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Total Number of Hours</th>
                        <th class="w-1"><i class="fe fe-settings"></i></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div> <!-- /attendance-tab -->
              <script type="text/javascript">
                require(['datatables', 'jquery'], function(datatable, $) {
                  $('#attendance_table').DataTable();
                });
              </script>

              <div class='tab-pane fade' id='pills-contribution' role='tabpanel' aria-labelledby='pills-contribution-tab'>

                <!-- <div class="table-responsive">
                  <table class="table card-table table-vcenter text-nowrap datatable" id="contribution_table">
                    <thead>

                          <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th class="w-1"><i class="fe fe-settings"></i></th>
                          </tr>

                    </thead>
                    <tbody>
                      <tr>
                        <td>3</td>
                        <td>1</td>
                        <td><?=$basicSalary;?></td>
                        <td>3</td>
                      </tr> -->
                      <?php
                        $contribution = 0;
                        $sss = $config->runQuery("SELECT rangeOfCompensationFrom, rangeOfCompensationTo, socialSecurityEmployee FROM sssmatrixtbl");
                        $sss->execute();
                        while ($sssRow = $sss->fetch(PDO::FETCH_ASSOC)) {
                          $rangeOfCompensationFrom = $sssRow['rangeOfCompensationFrom'];
                          $rangeOfCompensationTo = $sssRow['rangeOfCompensationTo'];
                          // $rangeOfCompensationFrom  = floatval(preg_replace("/[^-0-9\.]/", "", $rangeOfCompensationFrom));
                          // $rangeOfCompensationTo2  = floatval(preg_replace("/[^-0-9\.]/", "", $rangeOfCompensationTo));
                          // $basicSalary  = floatval(preg_replace("/[^-0-9\.]/", "", $basicSalary));

                          if ($basicSalary >= $rangeOfCompensationFrom && $rangeOfCompensationTo == 0) {
                            $contribution = $sssRow['socialSecurityEmployee'];
                            echo $contribution;
                          } else {

                            if ($basicSalary >= $rangeOfCompensationFrom && $basicSalary <= $rangeOfCompensationTo) {
                              $contribution = floatval(preg_replace("/[^-0-9\.]/", "", $sssRow['socialSecurityEmployee']));
                              echo $contribution;
                              ?>
                              <?php
                            }
                          }

                          // echo $rangeOfCompensationTo+$basicSalary . "<br>";

                          // echo $rangeOfCompensationTo . "<br>";
                        }

                      ?>
                    <!-- </tbody>
                  </table>
                </div> -->
              </div> <!-- /contributions-tab -->
              <script type="text/javascript">
                require(['datatables', 'jquery'], function(datatable, $) {
                  $('#contribution_table').DataTable();
                });
              </script>

              <div class='tab-pane fade' id='pills-deduction' role='tabpanel' aria-labelledby='pills-deduction-tab'>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter text-nowrap datatable" id="deduction_table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th class="w-1"><i class="fe fe-settings"></i></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div> <!-- /deduction-tab -->
              <script type="text/javascript">
                require(['datatables', 'jquery'], function(datatable, $) {
                  $('#deduction_table').DataTable();
                });
              </script>

              <div class='tab-pane fade' id='pills-salary-history' role='tabpanel' aria-labelledby='pills-salary-history-tab'>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter text-nowrap datatable" id="salary_history_table">
                    <thead>
                      <tr>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Net Salary</th>
                        <th>Date Processed</th>
                        <th class="w-1"><i class="fe fe-settings"></i></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div> <!-- /salary-history -->
              <script type="text/javascript">
                require(['datatables', 'jquery'], function(datatable, $) {
                  $('#salary_history_table').DataTable();
                });
              </script>

              <div class='tab-pane fade' id='pills-requisition' role='tabpanel' aria-labelledby='pills-requisition-tab'>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter text-nowrap datatable" id="requisition_table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th class="w-1"><i class="fe fe-settings"></i></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div> <!-- /requisitions -->
              <script type="text/javascript">
                require(['datatables', 'jquery'], function(datatable, $) {
                  $('#requisition_table').DataTable();
                });
              </script>

              <div class='tab-pane fade mb-3' id='pills-settings' role='tabpanel' aria-labelledby='pills-settings-tab'>

              <div class='container'>
                <dl class='row'>
                  <dt class='offset-sm-2 col-sm-4'>Account: </dt>


                  <dd class='col-sm-6' id='accountContainer'>
                    <?php
                    $account = $config->runQuery("SELECT personalID, username, IF (accountType = 1, 'Authorizer', 'Maker') AS accountType, status
                              FROM accountstbl WHERE personalID=:personalID LIMIT 1");
                    $account->execute(array(":personalID"=>$id));
                    $rowcheck = $account->fetch(PDO::FETCH_ASSOC);

                    if ($rowcheck > 0) {

                      if ($rowcheck['personalID'] == $id && $rowcheck['status'] == 1) {
                        ?>
                        Username: <?=$rowcheck['username'];?><br>
                        Account Type: <?=$rowcheck['accountType'];?><br>
                        <a class='btn btn-sm btn-warning resetPasswordLinkModal' href='javascript:void(0)' data-id='<?=$rowcheck['personalID'];?>' data-username='<?=$rowcheck['username'];?>' data-toggle='modal' data-target='#resetPasswordModal' role='button'>Edit Account</a>
                        <script type="text/javascript">
                          require(['jquery'], function($) {
                            $('.resetPasswordLinkModal').on('click', function() {
                              var id = $(this).data('id');
                              var username = $(this).data('username');
                              $('#hiddenPersonalIDResetPassword').val(id);
                              $('#reset_username').val(username);
                             });
                          });
                        </script>
                        <?php
                      } else if ($rowcheck['personalID'] == $id && $rowcheck['status'] == 0) {
                        ?>
                        <a class="btn btn-sm btn-info reactivateAccount" href="javascript:void(0)" role="button" data-id='<?=$rowcheck['personalID'];?>'>Re-activate Account</a>
                        <script type='text/javascript'>
                          require(['jquery', 'sweetalert'], function($, Swal) {
                            $('.reactivateAccount').on('click', function(e) {
                              var id = $(this).data('id');
                              //console.log(id);

                              Swal.fire({
                                title: 'Are you sure?',
                                text: 'Re-activate account?',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes!'
                              }).then((result) => {
                                if (result.value) {
                                  $('#hiddenReactivateAccountID').val(id);
                                  $('#passwordModal').modal('show');

                                }
                              });
                            });
                          });
                        </script>
                        <?php
                      }

                    } else {
                      ?>
                      <a class='btn-link text-primary createAccountLinkModal' href='#' data-id='<?=$personalID;?>' data-toggle='modal' data-target='#createAccountModal' role='button'>Create an account</a>

                      <?php
                    }
                    ?>
                  </dd>

                  <br>
                  <div class='border-top'></div>
                  <br>

                  <dt class='offset-sm-2 col-sm-4'>Remove Employee: </dt>
                  <dd class='col-sm-6'>
                    <a class='btn-link text-danger removeEmployeeBtn' href='javascript:void(0);' role='button' data-id='<?=$id;?>'>Remove</a>
                  </dd>
                  <script type='text/javascript'>
                    require(['jquery', 'sweetalert'], function($, Swal) {
                      $('.removeEmployeeBtn').on('click', function(e) {
                        var id = $(this).data('id');
                        //console.log(id);

                        Swal.fire({
                          title: 'Are you sure?',
                          text: 'Remove this employee?',
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes!'
                        }).then((result) => {
                          if (result.value) {
                            $('#passwordModal').modal('show');
                            $('#hiddenRemoveID').val(id);

                          }

                        });

                      });
                    });
                  </script>
                </dl>
              </div>

            </div> <!-- /tab-content -->
          </div> <!-- /card-body -->
        </div> <!-- /card -->

      </div> <!-- /col -->
    </div> <!-- /row -->
  </div>
</div>
