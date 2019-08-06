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
                              SUM(totalMinutes) AS totalMinutes
                            FROM attendancetbl WHERE hashedFile=:hashedFile GROUP BY lastName");
  $stmt->execute(array(":hashedFile" => $hashedFile));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $datePeriodFrom = strtotime($row['datePeriodFrom']);
  $datePeriodTo = strtotime($row['datePeriodTo']);
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
                  <th class="w-1"><i class="fe fe-settings"></i> </th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $fullName = $result['lastName'] . ", " . $result['firstName'];
                    ?>
                    <tr>
                      <td></td>
                      <td><?=$fullName;?></td>
                      <td><?=convertToHoursAndMins($result['totalMinutes'], '%02d hours and %02d minute/s');?></td>
                      <td class="w-1 text-center">
                        <button class="btn btn-teal btn-icon viewEmployeeAttendanceBtn" type="button" data-toggle="modal" data-target="#viewEmployeeAttendanceModal" data-fname="<?=$result['firstName'];?>" data-lname="<?=$result['lastName'];?>" data-id="<?=$hashedFile;?>">
                          <i class="fe fe-eye" data-toggle="tooltip" title="View"></i>
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
                  // console.log(firstName);
                  // console.log(lastName);
                  // console.log(hashedFile);

                });
              });
            </script>
            
          </div>
        </div>
      </div>
    </div>

  </div> <!-- dimmer-content -->
</div> <!-- /dimmer -->