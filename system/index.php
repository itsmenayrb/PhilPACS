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
    <title>Dashboard</title>
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
            
              <div class="page-header">
                <h1 class="page-title">
                  Dashboard
                </h1>
                
              </div>
              <!-- /page-header -->
              
             <div class="row">
               <div class="col-xs-12 col-sm-5">
                 <div class="card">
                      <div class="card-body">
                        <div class="card-value float-right text-yellow">13%</div>
                        <h3 class="mb-1">233</h3>
                        <div class="text-muted">Total Employees since 2017</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-revenue" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function (c3, $) {
                        $(document).ready(function() {
                          var chart = c3.generate({
                            bindto: '#chart-bg-revenue',
                            padding: {
                              bottom: -10,
                              left: -1,
                              right: -1
                            },
                            data: {
                              names: {
                                data1: 'Users online'
                              },
                              columns: [
                                ['data1', 30, 40, 10, 40, 12, 22, 40]
                              ],
                              type: 'area'
                            },
                            legend: {
                              show: false
                            },
                            transition: {
                              duration: 0
                            },
                            point: {
                              show: false
                            },
                            tooltip: {
                              format: {
                                title: function (x) {
                                  return '';
                                }
                              }
                            },
                            axis: {
                              y: {
                                padding: {
                                  bottom: 0,
                                },
                                show: false,
                                tick: {
                                  outer: false
                                }
                              },
                              x: {
                                padding: {
                                  left: 0,
                                  right: 0
                                },
                                show: false
                              }
                            },
                            color: {
                              pattern: ['#f1c40f']
                            }
                          });
                        });
                      });
                    </script>
<<<<<<< HEAD

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header">
                            Events List
                          </div>
                          <table class="table card-table">
                              <thead>
                                <tr>
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $eventStatus = 1;
                                  $queryDays = $config->runQuery("SELECT * FROM eventstbl WHERE status=:status ORDER BY startDate");
                                  $queryDays->execute(array(":status" => $eventStatus));
                                  while ($rowCheck = $queryDays->fetch(PDO::FETCH_ASSOC)) {
                                    $from = strtotime($rowCheck['startDate']);
                                    $dateToday = time();
                                    $remainingDays = $from - $dateToday;
                                    $remainingDays = floor($remainingDays/86400) + 1;
                                    $title = $rowCheck['title'];
                                    $description = $rowCheck['description'];

                                    ?>
                                      <tr>
                                        <td><?=$title;?></td>
                                        <td><?=$description;?></td>
                                        <td><?=$remainingDays;?> days to go</td>
                                      </tr>
                                    <?php
                                  }
                                ?>
                              </tbody>
                          </table>
                        </div>  
                      </div>
                        
                    </div>

               </div>

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
               <div class="col-xs-12 col-sm-7">
                <div class="card">
                  <div class="card-body">
                    <div id="dashboard_calendar"></div>
                    <div class="text-center mt-3">
                      <a href="./event.php" class="btn btn-green" role="button">Add more events</a>
                    </div>
                  </div>
                </div>
               </div>

=======
<<<<<<< HEAD
               </div>

=======
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
               <div class="col-xs-12 col-sm-3">
                 
               </div>

               <div class="col-xs-12 col-sm-4">
                 
               </div>
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
             </div>

          </div>
          <!-- /container -->
        </div>
        <!-- my-3 -->
      </div>
      <!-- flex-fill -->
    </div>

    <?php if ($remainingDays == 6) : ?>

      <script type="text/javascript">
          require(['notify', 'jquery'], function(notify, $) {
            $.notify('Hello', 'info');
          }
      </script>

    <?php endif ?>

    <?php include '../includes/footer.php'; ?>
    <script type="text/javascript" src="../ajax/ajax.dashboard.js"></script>
  </body>
</html>