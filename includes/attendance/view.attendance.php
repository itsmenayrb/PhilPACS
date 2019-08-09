<?php

  function convertToHoursAndMins($time, $format = '%d:%s') {
    settype($time, 'integer');
    
    $hours = floor($time/60);
    $minutes = $time%60;
    if ($minutes < 10) {
      $minutes = '0' . $minutes;
    }
    return sprintf($format, $hours, $minutes);
  }

  $hashedFile = $config->checkInput($_GET['id']);
  $stmt = $config->runQuery("SELECT *, MIN(Edate) AS datePeriodFrom,
                              MAX(Edate) AS datePeriodTo,
                              SUM(totalMinutes) AS totalMinutes,
                              CASE WHEN status = 0
                                   THEN 'Unprocessed'
                                   WHEN status = 1
                                   THEN 'Processed'
                                   ELSE 'Pending'
                              END AS status
                            FROM attendancetbl WHERE hashedFile=:hashedFile GROUP BY lastName");
  $stmt->execute(array(":hashedFile" => $hashedFile));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $datePeriodFrom = strtotime($row['datePeriodFrom']);
  $datePeriodTo = strtotime($row['datePeriodTo']);
  $status = $row['status'];
?>
<div class="dimmer active">
  <div id="loader"></div>
  <div id="dimmer-content">

    <div class="row mb-4">
      <div class="col-md-12">
        <a class="btn btn-secondary btn-lg mb-4" href="./attendance.php">Back</a>
        <div class="clearfix"></div>
      </div>
    </div> <!-- /row -->


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <b>Date Period: <?=date('F j, Y', $datePeriodFrom);?> - <?=date('F j, Y', $datePeriodTo);?></b>
          </div>
          <div class="card-body">
            <table class="table card-table table-vcenter table-hover table-bordered table-hover text-nowrap datatable" id="detailedAttendanceTable">
              <thead>
                <tr>
                  <th width="15%">Employee ID</th>
                  <th>Full Name</th>
                  <th width="20%">Total Number of Hours</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $fullName = $result['lastName'] . ", " . $result['firstName'];
                    ?>
                    <tr class="personal-attendance-link" data-href="./attendance.php?id=<?=$row['hashedFile'];?>&fname=<?=$result['firstName'];?>&lname=<?=$result['lastName'];?>" style="cursor: pointer;">
                      <td></td>
                      <td><?=$fullName;?></td>
                      <td><?=convertToHoursAndMins($result['totalMinutes'], '%02d hours and %02d minute/s');?></td>
                    </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
            <script type="text/javascript">
              require(['datatables', 'jquery'], function(datatable, $) {

                $('.personal-attendance-link').on('click', function(e) {
                  e.preventDefault();
                  window.location = $(this).data('href');
                });

                $('#detailedAttendanceTable').DataTable();

                $('.viewEmployeeAttendanceBtn').on('click', function() {
                  var firstName = $(this).data('fname');
                  var lastName = $(this).data('lname');
                  var hashedFile = $(this).data('id');

                  $.ajax({
                    type: 'post',
                    url: '../controllers/controller.attendance.php',
                    data: {
                      hashedFile: hashedFile,
                      firstName: firstName,
                      lastName: lastName,
                      populateAttendance: 1
                    },
                    dataType: 'html',
                    success: function(response) {
                      $('.attendanceContainer').html(response);
                    }
                  });

                });
              });
            </script>
            
          </div> <!-- /card-body -->
          <div class="card-footer">
            <?php if ($status == 'Pending') : ?>
              <button class="btn btn-lime float-right" type="button" data-id="<?=$hashedFile;?>" id="sendToPayrollBtn">Send to Payroll</button>
            <?php endif ?>
            <?php if ($status == 'Unprocessed') : ?>
              <button class="btn btn-teal float-right mr-2" type="button" data-id="<?=$hashedFile;?>" id="saveAttendanceForPendingBtn">Save</button>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>

  </div> <!-- dimmer-content -->
</div> <!-- /dimmer -->