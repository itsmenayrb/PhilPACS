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
        <a class="btn btn-secondary btn-lg mb-4" href="./payroll.php">Back</a>
        <div class="clearfix"></div>
      </div>
    </div> <!-- /row -->


    <div class="row">
      <div class="col-md-12">
        <form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>">
          <div class="card">
            <div class="card-header" style="margin: 0 auto;">
              <b>Payroll Period: <?=date('F j, Y', $datePeriodFrom);?> - <?=date('F j, Y', $datePeriodTo);?></b>
            </div>
            <div class="card-body">
              <table class="table table-sm card-table table-vcenter table-hover table-bordered table-hover text-nowrap datatable">
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
                      <tr>
                        <td></td>
                        <td><?=$fullName;?></td>
                        <td><?=convertToHoursAndMins($result['totalMinutes'], '%02d hours and %02d minute/s');?></td>
                      </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>

               <hr class="bg-gray">

                <div class="row">
                  <div class="form-label col-sm-3 col-xs-12">Contributions: </div>
                  <div class="form-group col-sm-9">
                    <div>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="example-inline-checkbox1" value="option1" checked>
                        <span class="custom-control-label">SSS</span>
                      </label>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="example-inline-checkbox2" value="option2">
                        <span class="custom-control-label">PhilHealth</span>
                      </label>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="example-inline-checkbox3" value="option3">
                        <span class="custom-control-label">Pag-ibig</span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-label col-sm-3 col-xs-12">Less: </div>
                  <div class="form-group col-sm-9">
                    <div>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="example-inline-checkbox2" value="option2">
                        <span class="custom-control-label">Tax</span>
                      </label>
                    </div>
                  </div>
                </div>
              
            </div> <!-- /card-body -->
            <div class="card-footer">
                <div class="text-center">
                  <button class="btn btn-green btn-lg" type="submit">Generate Payroll</button>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div> <!-- dimmer-content -->
</div> <!-- /dimmer -->