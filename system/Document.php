<?php
    require_once '../models/Config.php';
    $config = new Config();
    require_once '../controllers/controller.document.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../includes/meta.php'; ?>

    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Human Resources :: Documents Management</title>
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
                      Documents Management
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
                                    Click here to Import Files
                                  </div>
                                </div>
                                <form method="post" enctype="multipart/form-data" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="uploadDocumentForm">
                                  <input type="file" id="file" name="file"/>
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
                            <table class="table card-table text-center table-bordered table-hover text-nowrap datatable" id="importDocument">
                              <thead>
                                <tr>
                                    <th>Document Name</th>
                                    <th>Document Size</th>
                                    <th>Download List</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    try {
                                        $result = $config->runQuery("SELECT
                                                                      *
                                                                    FROM documentstbl");
                                        $result->execute();
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                          $downloadName = $row['documentName'];
                                          $documentSize = $row['documentSize'];
                                          $downloadList = $row['downloadsList'];
                                          ?>
                                            <tr>
                                              <td><?=$downloadName;?></td>
                                              <td><?=$documentSize;?></td>
                                              <td><?=$downloadList;?></td>
                                              <td><a class="btn btn-info" href="./Document.php?file_id=<?=$row['documentID'];?>"><i class="fe fe-download"></i></a>
                                              <a class="btn btn-lime" href="https://docs.google.com/viewer?url=http://localhost:8080/PhilPACS/Document/<?=$downloadName;?>"><i class="fe fe-eye"></i></a></td>

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
                                $('#importDocument').DataTable();

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
                  </div> <!-- /row -->

                <?php endif ?>

              </div>
              <!-- /container -->
            </div>
            <!-- my-3 -->
          </div>
          <!-- flex-fill -->
        </div> <!-- /page -->
        <?php include '../includes/footer.php'; ?>

    <script type="text/javascript" src="../ajax/ajax.document.js"></script>
    <script type="text/javascript">
      function reload() {
        location.reload();
      }
    </script>
  </body>
</html>
