<?php
    require_once '../models/Config.php';
    $config = new Config();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Accounting :: Payroll</title>
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
                      Payroll
                    </h1>
                  </div>
                  <!-- /page-header -->
                  
                  <div class="clearfix"></div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="card border-success">
                        <div class="card-header">
                          <h3 class="card-title">Legend</h3>
                          <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                          </div>
                        </div>
                        <div class="card-body">
                          <ul class="list-unstyled">
                            <li>
                              <div class="row align-items-center">
                                <div class="col-auto">
                                  <div class="h5 mb-0">
                                    <span class="status-icon bg-success"></span> A
                                    <span class="small text-muted">Regular Holiday</span>
                                  </div>
                                </div>
                                <div class="col text-right">
                                  <span class="h4 text-success font-weight-bold">100%</span>
                                </div>
                              </div>
                            </li>
                            <li class="mt-1">
                              <div class="row align-items-center">
                                <div class="col-auto">
                                  <div class="h5 mb-0">
                                    <span class="status-icon bg-primary"></span> B
                                    <span class="small text-muted">Special Non-working Holiday</span>
                                  </div>
                                </div>
                                <div class="col text-right">
                                  <span class="h4 text-primary font-weight-bold">200%</span>
                                </div>
                              </div>
                            </li>
                            <li class="mt-1">
                              <div class="row align-items-center">
                                <div class="col-auto">
                                  <div class="h5 mb-0">
                                    <span class="status-icon bg-info"></span> C
                                    <span class="small text-muted">Night Differential</span>
                                  </div>
                                </div>
                                <div class="col text-right">
                                  <span class="h4 text-info font-weight-bold">10%</span>
                                </div>
                              </div>
                            </li>
                            <li class="mt-1">
                              <div class="row align-items-center">
                                <div class="col-auto">
                                  <div class="h5 mb-0">
                                    <span class="status-icon bg-teal"></span> D
                                    <span class="small text-muted">Overtime</span>
                                  </div>
                                </div>
                                <div class="col text-right">
                                  <span class="h4 text-teal font-weight-bold">10%</span>
                                </div>
                              </div>
                            </li>
                          </ul>
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
                            <form>
                            <div class="table-responsive">
                              <table class="table card-table table-bordered table-hover table-sm text-nowrap table-outline">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th colspan="3"></th>
                                    <?php
                                      $y = 1;
                                      while ($y <= 31){
                                        $y++;
                                        ?>
                                        <th class="w-1 border-success bg-green text-white">
                                          <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" />
                                              <span class="custom-control-label">A</span>
                                            </label>
                                          </div>
                                        </th>
                                        <th class="w-1 border-primary bg-blue text-white">
                                          <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" />
                                              <span class="custom-control-label">B</span>
                                            </label>
                                          </div>
                                        </th>
                                        <th class="w-1 border-info bg-info text-white">
                                          <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" />
                                              <span class="custom-control-label">C</span>
                                            </label>
                                          </div>
                                        </th>
                                        <th class="w-1 border-teal bg-teal text-white">
                                          <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" />
                                              <span class="custom-control-label">D</span>
                                            </label>
                                          </div>
                                        </th>
                                        <?php
                                      }
                                    ?>
                                  </tr>
                                  <tr>
                                      <th class="w-1"></th>
                                      <th>Full Name</th>
                                      <th>Basic Salary</th>
                                      <th>Total Hours</th>
                                      <?php
                                        $x = 1;
                                        while ($x <= 31) {
                                          ?>
                                          <th colspan="4" class="text-center">7/<?=$x++;?></th>
                                          <?php
                                        }
                                      ?>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $xyz = 1;
                                    while ($xyz < 10) {
                                      $xyz++;
                                      ?>
                                      <tr>
                                        <td></td>
                                        <td>Bryan Balaga</td>
                                        <td>18,000.00</td>
                                        <td>48 hours</td>
                                        <?php
                                          $z = 1;
                                          while ($z <= 124) {
                                            $z++;

                                            ?>
                                            <td>
                                              <div class="form-group text-center">
                                                <label class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" />
                                                  <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                              </div>
                                            </td>
                                            <?php
                                          }
                                        ?>
                                      </tr>
                                      <?php
                                    }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="form-group text-center">
                              <button type="submit" class="btn btn-success mt-4">Generate Payroll</button>
                            </div>
                          </form>
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

    <script type="text/javascript" src="../ajax/ajax.payroll.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>