<<<<<<< HEAD


 <?php
     require_once '../models/Config.php';
     $config = new Config();
     $config->isnot_loggedin();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <?php include '../includes/meta.php'; ?>

     <!-- Generated: 2019-04-04 16:55:45 +0200 -->
     <title>Human Resources :: SSS Contribution Matrix</title>
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
                       SSS Contribution Matrix
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
                                           $stmt = $config->runQuery("SELECT * FROM sssmatrixtbl");
                                           $stmt->execute();
                                           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                              $EMTimein = date('h:i a', strtotime($rows['EMTimein']));
                                              $EMTimeout = date('h:i a', strtotime($rows['EMTimeout']));
                                              $EATimein = date('h:i a', strtotime($rows['EATimein']));
                                              $EATimeout = date('h:i a', strtotime($rows['EATimeout']));
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
=======
<?php
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

    <style type="text/css">
      input:focus,
      select:focus,
      textarea:focus,
      button:focus {
        outline: none;
      }

      .wrapper {
        width: 100%;
        height: 100%;
      }

      .drop {
        width: 100%;
        height: 100%;
        border: 3px dashed #DADFE3;
        border-radius: 15px;
        overflow: hidden;
        text-align: center;
        background: white;
        -webkit-transition: all 0.5s ease-out;
        -moz-transition: all 0.5s ease-out;
        transition: all 0.5s ease-out;
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
      }
      .drop:hover {
        cursor: pointer
        background: #f5f5f5
      }
      .drop .cont {
        width: 500px;
        height: 170px;
        color: #8E99A5;
        -webkit-transition: all 0.5s ease-out;
        -moz-transition: all 0.5s ease-out;
        transition: all 0.5s ease-out;
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
      }
      .drop .cont i {
        font-size: 300%;
        color: #8E99A5;
        position: relative;
      }
      .drop .cont .tit {
        font-size: 200%;
        text-transform: uppercase;
      }
      .drop .cont .desc {
        color: #A4AEBB;
      }
      .drop .cont .browse {
        margin: 10px 25%;
        color: white;
        padding: 8px 16px;
        border-radius: 5px;
        background: #09f;
      }
      .drop input {
        width: 100%;
        height: 100%;
        cursor: pointer;
        background: red;
        opacity: 0;
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
      }
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
                      Attendance Import
                    </h1>
                    <span class="align-self-center ml-3" data-toggle="tooltip" data-placement="top" title="Help">
                      <span class="form-help bg-green text-white" data-toggle="popover" data-placement="bottom" data-content="<p>Download the Attendance Time in and out.<p>
                        <p><a class='btn-link' href='../downloads/Format - SSS Contribution.xlsx' download='SSS_Contribution_Sheet'>SSS Matrix Format Excel Sheet</p>">?</span>
                    </span>
                  </div>
                  <!-- /page-header -->
                  <div class="clearfix"></div>
                  <div class="dimmer active">
                    <div id="loader"></div>
                    <div id="dimmer-content">
                      <div class="card" style="height: 30vh; border-radius: 1%;">
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
                        <div class="dimmer active">
                          <div id='archive-loader'></div>
                          <div id='archive-dimmer-content'>
                          <div class="table-responsive">

                            <table class="table card-table table-vcenter table-hover text-center table-bordered table-striped text-nowrap datatable" id="importAttendance">
                              <thead>
                                <tr>

                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Date</th>
                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Total Hours</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  try {
                                        function hoursandmins($time, $format = '%02d:%02d')
                                              {
                                                  if ($time < 1) {
                                                      return;
                                                  }
                                                  $hours = floor($time / 60);
                                                  $minutes = ($time % 60);
                                                  return sprintf($format, $hours, $minutes);
                                              }

                                      $result = $config->runQuery("SELECT * FROM attendancetbl WHERE status = 'unread'");
                                      $result->execute();
                                         while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                                              $data[] = $rows;
                                              $lastName =$rows['lastName'];
                                              $Edate = $rows['Edate'];

                                              $starttime1 = $rows['EMTimein'];
                                               $stoptime1 = $rows['EMTimeout'];
                                               $diff1 = (strtotime($stoptime1) - strtotime($starttime1));
                                               $total1 = $diff1/60;

                                               $starttime2 = $rows['EATimein'];
                                                $stoptime2 = $rows['EATimeout'];
                                                $diff2 = (strtotime($stoptime2) - strtotime($starttime2));
                                                $total2 = $diff2/60;
                                                $totalhours = $total1/60 + $total2/60;
                                                $totalminutes = floor($total1%60 + ($total2%60));
                                                $total = "";


                                              if ($totalminutes >= 60) {
                                                $totalhours1 = $totalhours ++;
                                              $totalminutes1 = $totalminutes - 60;

                                              }
                                              else {
                                                $totalhours1 = $totalhours;
                                                $totalminutes1 = $totalminutes;
                                              }
                                              $total  = ($totalhours1*60);

                                                  $stmt = $config->runQuery("UPDATE attendancetbl SET totalMinutes = '$total' WHERE lastName = '$lastName' AND Edate = '$Edate'");
                                                    $stmt->execute();

                                            echo "n
                                                  <tr>
                                                      <td>". $rows['firstName'] ."</td>
                                                      <td>". $rows['lastName'] ."</td>
                                                      <td>". $rows['Edate'] ."</td>
                                                      <td>". $rows['EMTimein'] ."</td>
                                                      <td>". $rows['EMTimeout'] ."</td>
                                                      <td>". $rows['EATimein'] ."</td>
                                                      <td>". $rows['EATimeout'] ."</td>
                                                      <td>". hoursandmins($total, '%02d Hours, %02d Minutes') ."</td>
                                                      ";
                                                  }

                                           echo "
                                             </tr>
                                         </tbody>";
                                       } catch (PDOException $e) {
                                        echo "Connection Error: " . $e->getMessage();
                                      }
                                  ?>
                              </tbody>
                            </table>
                            <script type="text/javascript">
                              require(['datatables', 'jquery'], function(datatable, $) {
                                $('#importAttendance').DataTable();
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
>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
