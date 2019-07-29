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
                              <form method="post" enctype="multipart/form-data" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="uploadSSSFrom">
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
                                    <th rowspan="3" class="w-1"></th>
                                    <th colspan="2" rowspan="2">Range of Compensation</th>
                                    <th rowspan="3">Monthly Salary Credit</th>
                                    <th colspan="7">Employer - Employee</th>
                                </tr>
                                <tr>
                                    <th colspan="3">Social Security</th>
                                    <th>EC</th>
                                    <th colspan="3">Total Contribution</th>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>ER</th>
                                    <th>EE</th>
                                    <th>Total</th>
                                    <th>ER</th>
                                    <th>ER</th>
                                    <th>EE</th>
                                    <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      try {
                                          $stmt = $config->runQuery("SELECT * FROM sssmatrixtbl");
                                          $stmt->execute();
                                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                              ?>
                                              <tr>
                                                  <td><?=$row['sssMatrixID'];?></td>
                                                  <td><?=$row['rangeOfCompensationFrom'];?></td>
                                                  <td><?=$row['rangeOfCompensationTo'];?></td>
                                                  <td><?=$row['monthlySalaryCredit'];?></td>
                                                  <td><?=$row['socialSecurityEmployer'];?></td>
                                                  <td><?=$row['socialSecurityEmployee'];?></td>
                                                  <td><?=$row['socialSecurityTotal'];?></td>
                                                  <td><?=$row['employeeCompensationEmployer'];?></td>
                                                  <td><?=$row['totalContributionEmployer'];?></td>
                                                  <td><?=$row['totalContributionEmployee'];?></td>
                                                  <td><?=$row['totalContributions'];?></td>
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

    <script type="text/javascript" src="../ajax/ajax.import.sss.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>