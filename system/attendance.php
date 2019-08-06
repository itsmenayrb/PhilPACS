<?php
<<<<<<< HEAD
    require_once '../models/Config.php';
    $config = new Config();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Human Resources :: SSS Contribution Matrix</title>
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

                <?php if (!isset($_GET['id'])) : ?>

                  <div class="page-header">
                    <h1 class="page-title">
                      Attendance Management
                    </h1>
                    
                  </div>
                  <!-- /page-header -->
                  <div class="clearfix"></div>
                  <div class="dimmer active">
                    <div id="loader"></div>
                    <div id="dimmer-content">
                      <div class="card" style="height: 30vh; border-radius: 15px;">
                        <div class="card-body">
                          <div class="wrapper">
                            <div class="drop">
                              <div class="cont">
                                <i class="fe fe-upload-cloud"></i>
                                <div class="tit">
                                  Drag and Drop CSV File
                                </div>
                                <div class="desc">or</div>
                                <div class="browse">
                                  Click here to Import
                                </div>
                              </div>
                              <form method="post" enctype="multipart/form-data" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="uploadAttendanceFrom">
                                <input type="file" id="file" name="file" accept=".csv" />
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row row-cards">

                    <div class="col-lg-12">
                      <div class="card">
                          <div class="table-responsive">

                            <table class="table card-table table-vcenter table-hover text-center table-bordered table-hover text-nowrap datatable" id="importAttendance">
                              <thead>
                                <tr>
                                    <th colspan="2">Date Period</th>
                                    <th colspan="2"></th>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th width="20%">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    try {
                                        $status = 0;
                                        $result = $config->runQuery("SELECT
                                                                      MIN(Edate) AS datePeriodFrom,
                                                                      MAX(Edate) AS datePeriodTo,
                                                                      IF (status = 0, 'Unprocessed', 'Processed') AS status,
                                                                      hashedFile
                                                                    FROM attendancetbl
                                                                    WHERE status=:status
                                                                    GROUP BY hashedFile");

                                        $result->execute(array(":status" => $status));

                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                          $datePeriodFrom = strtotime($row['datePeriodFrom']);
                                          $datePeriodTo = strtotime($row['datePeriodTo']);

                                          ?>
                                            <tr class="attendance-link" data-href="./attendance.php?id=<?=$row['hashedFile'];?>" style="cursor: pointer;">
                                              <td><?=date('F j, Y', $datePeriodFrom);?></td>
                                              <td><?=date('F j, Y', $datePeriodTo);?></td>
                                              <td><?=$row['status'];?></td>
                                            </tr>
                                          <?php 
                                        }
                                    }catch (PDOException $e) {
                                        echo "Connection Error: " . $e->getMessage();
                                    }
                                  ?>
                              </tbody>
                            </table>
                            <script type="text/javascript">
                              require(['datatables', 'jquery'], function(datatable, $) {
                                $('#importAttendance').DataTable();

                                $('.attendance-link').on('click', function(e) {
                                  e.preventDefault();
                                  window.location = $(this).data('href');
                                });

                              });
                            </script>
                        </div> <!-- /table-responsive -->
                      </div> <!-- /card -->

                    </div>
                    <!-- /lg-12 -->

                  </div>
                  <!-- /row row-cards -->

                <?php endif ?>

                <?php if (isset($_GET['id'])) : ?>
                  <?php include '../includes/attendance/view.attendance.php'; ?>
                <?php endif ?>  

              </div>
              <!-- /container -->
            </div>
            <!-- my-3 -->
          </div>
          <!-- flex-fill -->
        </div> <!-- /page -->
        <?php include '../includes/footer.php'; ?>

    <?php include '../includes/attendance/modal.view.attendance.php'; ?>
    <script type="text/javascript" src="../ajax/ajax.import.attendance.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>
=======
  require_once '../models/attendance.inc.php';
  $attendance = new Attendance();

  if (isset($_POST['save_send'])) {
    $attendance->
  }

 ?>

 <?php

     $config = new Config();
     $config->isnot_loggedin();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <?php include '../includes/meta.php'; ?>

     <!-- Generated: 2019-04-04 16:55:45 +0200 -->
     <title>Human Resources :: Attendance Management</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

     <style type="text/css">


     </style>
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
                       Attendance Management
                     </h1>
                     <span class="align-self-center ml-3" data-toggle="tooltip" data-placement="top" title="Help">
                       <span class="form-help bg-green text-white" data-toggle="popover" data-placement="bottom" data-content="<p>Download the SSS Matrix Format Excel Sheet.<p>
                         <p><a class='btn-link' href='../downloads/Format - SSS Contribution.xlsx' download='SSS_Contribution_Sheet'>SSS Matrix Format Excel Sheet</p>">?</span>
                     </span>
                   </div>
                   <!-- /page-header -->

                   <div class="clearfix"></div>
                   <div class="dimmer active">
                     <div id="loader"></div>
                     <div id="dimmer-content">
                       <div class="card" style="height: 30vh; border-radius: 15px;">
                         <div class="card-body">
                           <div class="wrapper">
                             <div class="drop">
                               <div class="cont">
                                 <i class="fe fe-upload-cloud"></i>
                                 <div class="tit">
                                   Drag and Drop CSV File
                                 </div>
                                 <div class="desc">or</div>
                                 <div class="browse">
                                   Click here to Import
                                 </div>
                               </div>
                               <form method="post" enctype="multipart/form-data" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="uploadAttendanceForm">
                                 <input type="file" id="file" name="file" accept=".csv" />
                               </form>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>


                   <div class="row row-cards">

                     <div class="col-lg-12">
                       <div class="float-right">
                         <div class="input-group mb-3">
                           <div class="input-group-append">
                             <!-- save edit and send to accounting -->
                             <button type="submit" class="btn btn-lime" name="save_send" ><i class="fe fe-save mr-2"></i>Save/Send</button>
                            </div>
                         </div>
                       </div>
                       <div class="card">
                         <div class="dimmer active">
                           <div id='archive-loader'></div>
                           <div id='archive-dimmer-content'>
                           <div class="table-responsive">

                             <table class="table card-table table-vcenter table-hover text-center table-bordered table-striped text-nowrap datatable" id="sssContributionTable">
                               <thead>
                                 <tr>
                                     <th>Last Name</th>
                                     <th>First Name</th>
                                     <th>Date</th>
                                     <th>TIme in</th>
                                     <th>Time out</th>
                                     <th>Time in</th>
                                     <th>Time out</th>
                                 </tr>
                               </thead>
                               <tbody>
                                   <?php
                                       try {
                                           $stmt = $config->runQuery("SELECT * FROM attendancetbl WHERE status = ''");
                                           $stmt->execute();
                                           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                              $EMTimein = date('h:i A', strtotime($row['EMTimein']));
                                              $EMTimeout = date('h:i A', strtotime($row['EMTimeout']));
                                              $EATimein = date('h:i A', strtotime($row['EATimein']));
                                              $EATimeout = date('h:i A', strtotime($row['EATimeout']));
                                               ?>
                                               <tr>
                                                   <td><?=$row['lastName'];?></td>
                                                   <td><?=$row['firstName'];?></td>
                                                   <td><?=$row['Edate'];?></td>
                                                   <td><?=$EMTimein;?></td>
                                                   <td><?=$EMTimeout;?></td>
                                                   <td><?=$EATimein;?></td>
                                                   <td><?=$EATimeout;?></td>
                                               </tr>
                                               <?php
                                           }
                                       } catch (PDOException $e) {
                                           echo "Connection Error: " . $e->getMessage();
                                       }
                                   ?>
                               </tbody>
                             </table>
                             <script type="text/javascript">
                               require(['datatables', 'jquery'], function(datatable, $) {
                                 $('#sssContributionTable').DataTable();
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

     <script type="text/javascript" src="../ajax/ajax.import.attendance.js"></script>
     <script type="text/javascript">
       function reload() {
         location.reload();
       }
     </script>
   </body>
 </html>
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
