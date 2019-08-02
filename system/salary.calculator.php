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
    <title>Accounting :: Salary Calculator</title>
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
                      Salary Calculator
                    </h1>
                  </div>
                  <!-- /page-header -->
                  
                  <div class="clearfix"></div>


                  <div class="row row-cards">

                    <div class="col-lg-12">
                      <div class="card">
                        
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

    <script type="text/javascript" src="../ajax/ajax.salary.calculator.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>