<?php

  $hashedFile = $config->checkInput($_GET['id']);
  $firstName = $config->checkInput($_GET['fname']);
  $lastName = $config->checkInput($_GET['lname']);

  $stmt = $config->runQuery("SELECT attendancetbl.firstName, attendancetbl.lastName,
                                attendancetbl.Edate AS Edate,
                                CASE WHEN attendancetbl.status = 0
                                     THEN 'Unprocessed'
                                     WHEN attendancetbl.status = 1
                                     THEN 'Processed'
                                     ELSE 'Pending'
                                END AS status,
                                attendancetbl.EMTimein, attendancetbl.EMTimeout, attendancetbl.EATimein, attendancetbl.EATimeout, 
                                CONCAT (salarycodetbl.salaryCode, employeetbl.employeeID) AS employeeID,
                                positiontbl.positionName,
                                benefitnumberstbl.taxIdentificationNumber AS tax
                              FROM attendancetbl
                              INNER JOIN personaldetailstbl ON attendancetbl.lastName = personaldetailstbl.lastName
                              INNER JOIN employeetbl ON personaldetailstbl.personalID = employeetbl.employeeID
                              INNER JOIN benefitnumberstbl ON employeetbl.employeeID = benefitnumberstbl.benefitID
                              INNER JOIN positiontbl ON employeetbl.positionID = positiontbl.positionID
                              INNER JOIN salarycodetbl ON positiontbl.salaryCode = salarycodetbl.salaryCodeID
                             WHERE attendancetbl.firstName=:firstName AND attendancetbl.lastName=:lastName AND attendancetbl.hashedFile=:hashedFile
                             ORDER BY Edate");

  $stmt->execute(array(":firstName" => $firstName, ":lastName" => $lastName, ":hashedFile" => $hashedFile));
  $update = $stmt->fetch(PDO::FETCH_ASSOC);
  $status = $update['status'];
  $employeeID = $update['employeeID'];
  $position = $update['positionName'];
  $tax = $update['tax'];
?>
<div class="dimmer active">
  <div id="loader"></div>
  <div id="dimmer-content">

    <div class="row mb-4">
      <div class="col-md-12">
        <a class="btn btn-secondary btn-lg mb-4" href="./attendance.php?id=<?=$hashedFile;?>">Back</a>
        <a class="ml-2 float-right btn btn-secondary" data-toggle="tooltip" title="Print" href="javascript:void(0)">
          <i class="fe fe-printer"></i> Print  
        </a>
        <?php if ($status != 'Processed') : ?>
          <span class="float-right" data-toggle="tooltip" title="Update Attendance Record">
            <button class="btn btn-teal" type="button" id="updateAttendanceRecordBtn">
              <i class="fe fe-edit-3"></i> Update
            </button>
          </span>
        <?php endif ?>
        <div class="clearfix"></div>
      </div>
    </div> <!-- /row -->


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="text-center col-md-12">
                <h4 class="mb-2">B2BPRICENOW.COM, INC. dba PHILPaCS</h4>
                <p>Time-in/Payroll for </p>
              </div>
            </div>


            <div class="row">
              <div class="col-md-8">
                <p class="mb-0 font-weight-bold"><?=$firstName;?> <?=$lastName;?></p>
                <span>TIN#: <strong class="font-weight-bold"><?=$tax;?></strong></span> 
              </div>
              <div class="col-md-4">
                <span>Employee#: <strong class="font-weight-bold"><?=$employeeID;?></strong></span><br/>
                <span>Position: <strong class="font-weight-bold"><?=$position;?></strong></span>
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-12">
                <form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="updateAttendanceRecordForm">
                  <div class='table-responsive'>
                      <table class='table table-sm card-table table-vcenter table-hover table-bordered table-hover text-nowrap datatable' id="personalAttendanceTable" style="width: 100%;">
                          <thead>
                              <tr>
                                <th class="bg-warning text-center text-white font-weight-bold" colspan="7"><?=$firstName;?> <?=$lastName;?></th>
                                <th class="text-center">Total</th>
                              </tr>
                              <tr>
                                <th></th>
                                <th colspan="2" width="25%" class="text-center">AM</th>
                                <th colspan="2" width="25%" class="text-center">PM</th>
                                <th colspan="2" width="25%" class="text-center">OVERTIME</th>
                                <th></th>
                              </tr>
                              <tr class="text-center">
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>AM</th>
                                <th>PM</th>
                                <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                  $date = strtotime($row['Edate']);
                                  $date = date('F j, Y', $date);
                                  ?>
                                    <tr>
                                      <td class="text-center"><?=$date;?></td>
                                      <td>
                                        <div class="input-icon">
                                          <input type="text" class="form-control attendanceInput EMTimein" name="EMTimein[]" value="<?=$row['EMTimein'];?>" required readonly/>
                                          <span class="input-icon-addon">
                                            <span class="fe fe-clock"></span>
                                          </span>
                                        </div>
                                      </td>
                                      <input type="hidden" class="hiddenHashedFile" name="hiddenHashedFile" value="<?=$row['hashedFile'];?>" />
                                      <input type="hidden" class="firstName" name="firstName" value="<?=$row['firstName'];?>" />
                                      <input type="hidden" class="lastName" name="lastName" value="<?=$row['lastName'];?>" />
                                      <input type="hidden" class="hiddenAttendanceID" name="hiddenAttendanceID[]" value="<?=$row['attendanceID'];?>" />
                                      <td>
                                        <div class="input-icon">
                                          <input type="text" class="form-control attendanceInput EMTimeout" name="EMTimeout[]" value="<?=$row['EMTimeout'];?>" required readonly/>
                                          <span class="input-icon-addon">
                                            <span class="fe fe-clock"></span>
                                          </span>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="input-icon">
                                          <input type="text" class="form-control attendanceInput EATimein" name="EATimein[]" value="<?=$row['EATimein'];?>" required readonly/>
                                          <span class="input-icon-addon">
                                              <span class="fe fe-clock"></span>
                                          </span>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="input-icon">
                                          <input type="text" class="form-control attendanceInput EATimeout" name="EATimeout[]" value="<?=$row['EATimeout'];?>" required readonly/>
                                          <span class="input-icon-addon">
                                              <span class="fe fe-clock"></span>
                                          </span>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="input-icon">
                                          <input type="text" class="form-control attendanceInput overtimeAM" name="overtimeAM[]" value="" required readonly/>
                                          <span class="input-icon-addon">
                                              <span class="fe fe-clock"></span>
                                          </span>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="input-icon">
                                          <input type="text" class="form-control attendanceInput overtimePM" name="overtimePM[]" value="" required readonly/>
                                          <span class="input-icon-addon">
                                              <span class="fe fe-clock"></span>
                                          </span>
                                        </div>
                                      </td>
                                      <td></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                          </tbody>
                      </table>
                  </div>
                </form>
              </div>
            </div>
          </div> <!-- /card-body -->
          <div class="card-footer">
            <?php if ($status != 'Processed') : ?>
              <button class="btn btn-green disabled float-right" name="saveChangesAttendanceBtn" id="saveChangesAttendanceBtn" type="submit" disabled="disabled">Save Changes</button>
            <?php endif ?>
          </div>
        </div> <!-- /card -->
      </div> <!-- /col -->
    </div> <!-- /row -->
  </div> <!-- dimmer-content -->
</div> <!-- /dimmer -->