<!-- Modal of Requisition Absent Form -->
<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalTitle" id="addAbsentModal" data-backdrop="static" data-keyboard="false">
  <center>
  <div class="modal-dialog modal-xl" role="document" style="overflow-y: initial !important; width: 50%">
    <div class="modal-content">

      <div class="modal-body" style="max-height: calc(100vh - 100px); overflow-y: auto; align: center">
        <button class="close" type="button" data-dismiss="modal" aria-label='Close' onclick="clearForm();">
            <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
        <div class="container">

          <div class="card text-white bg-lime mb-1">
              <div class="card-body p-3">
                 <h6 class="card-title"><i class="fe fe-user"></i> Requisition From</h6>
              </div>
            </div>
            <div class="card">

                <div class="card-body">
                  <form class="m-t-40" id="addrequisitionForm" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
                                  <ul class="nav nav-tabs" role="tablist">
                                      <li class="nav-item">
                                          <a class="nav-link active" data-toggle="tab" href="#personalDetailsTab" role="tab">
                                              <span class="hidden-sm-up"></span>
                                              <span class="hidden-xs-down">Request Form</span>
                                          </a>
                                      </li>
                                  </ul>

                                  <div class="tab-content tabcontent-border p-2">
                                      <div class="tab-pane active" id="personalDetailsTab" role="tabpanel">
                                          <div class="p-3">
                                              <div class="container">

                                                </div>
                                                  <div class="row">
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                             <label class="form-control-label" for="RequestType">Request Type<span class="text-danger" required>*</span></label>
                                                             <select class="required form-control" id="request_type" onChange="getRequest(this.value);">
                                                                    <option value="" selected>Request type</option>
                                                                   <option value="Absence Request">Absence Request</option>
                                                                   <option value="OverTime Request">OverTime Request</option>
                                                              </select>
                                                             <span id="request_type_error"></span>
                                                        </div>
                                                    </div>
                                                      <div class="col-md-6 col-xs-12">
                                                          <div class="form-group">
                                                               <label class="form-control-label" for="lastName">Last Name<span class="text-danger"/>*</span></label>
                                                               <select class="required form-control" id="last_name" placeholder="Last Name" required />
                                                                 <option value ="" selected>Last Name</option>
                                                                 <?php
                                                                 try
                                                                 {
                                                                   $sql = "SELECT lastName FROM personaldetailstbl";
                                                                   $result = $config->runQuery($sql);
                                                                   $numRows = $result->execute();
                                                                     while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {

                                                                       echo "
                                                                              <option value='". $rows['lastName'] ."'>". $rows['lastName']."</option>
                                                                       ";
                                                                     }
                                                                 } catch (PDOException $e) {
                                                                  echo "Connection Error: " . $e->getMessage();
                                                                } ?>
                                                               </select>
                                                               <span id="first_name_error"></span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <script>
                                                          function getRequest(val) {
                                                          	$.ajax({
                                                          	type: "POST",
                                                          	url: "../controllers/Request.inc.php",
                                                            	data:'requesttype='+val,
                                                          	success: function(response){
                                                          		$("#request-list").html(response);
                                                          	}
                                                          	});
                                                          }

                                                  </script>
                                                  <script>
                                                          function getReq(val) {
                                                            $.ajax({
                                                            type: "POST",
                                                            url: "Request.inc.php",
                                                              data:'request='+val,
                                                            success: function(response){
                                                              $("#req-list").html(response);
                                                            }
                                                            });
                                                          }

                                                  </script>
                                                  <div class="col-md-12 col-xs-12">
                                                      <div class="form-group" id="req-list">

                                                      </div>
                                                  </div>
                                                        <div id="request-list">
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-12 col-xs-12">
                                                      <div class="form-group">
                                                           <label class="form-control-label" for="DataFrom">Reason<span class="text-danger">*</span></label>
                                                           <textarea type="text" class="required form-control" id="reasontype" style="height: 70px;font-size: 12px" required/></textarea
                                                             <span id="reason_error"></span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="text-right">
                                                      <button class="btn btn-success" type="submit" id="submitrequest">Submit</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                </div>
            </div> <!-- /card -->
        </div>

      </div>
        </center>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
