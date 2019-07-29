<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addPositionModalTitle" id="addPositionModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
         <h6 class="form-text text-muted"><span class="text-danger">*</span> required fields.</h6>
        <div class="card text-white bg-lime mb-1">
          <div class="card-body p-3">
             <h6 class="card-title"><i class="fe fe-layers"></i> Add Position</h6>
          </div>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="dimmer active">
                <div id="loader"></div>
                <div id="dimmer-content">
                  <form class="m-t-40" id="addPositionForm" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">

                      <input type="hidden" id="hiddenSalary" value="" />
                      <div class="form-group">
                          <label class="form-label" for="department_name">Department<span class="text-danger">*</span></label>
                          <select id="department_name" class="form-control">
                              <option value="" selected>Select a department.</option>
                              <?php
                                  $status = 1;
                                  $stmt = $config->runQuery("SELECT * FROM departmenttbl WHERE status=:status");
                                  $stmt->execute(array(":status" => $status));
                                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                      $department_id = $row['departmentID'];
                                      $department_name = $row['departmentName'];
                                      ?>
                                      <option value="<?=$department_id;?>"><?=$department_name;?></option>
                                      <?php
                                  }
                              ?>
                          </select>
                          <span id="department_name_error" class="invalid-feedback"></span>
                      </div>

                      <div class="row">
                          <div class="col-md-4 col-xs-12">
                              <div class="form-group">
                                   <label class="form-label" for="code">Code<span class="text-danger">*</span></label>
                                   <input type="text" class="required form-control" id="code" placeholder="A/B/C/D" autofocus="true" required/>
                                   <span id="code_error" class="invalid-feedback"></span>
                              </div>
                          </div>
                          <div class="col-md-8 col-xs-12">
                              <div class="form-group">
                                   <label class="form-label" for="department_name">Position Name<span class="text-danger">*</span></label>
                                   <input type="text" class="required form-control" id="position_name" placeholder="Position Name" autofocus="true" required/>
                                   <span id="position_name_error" class="invalid-feedback"></span>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                           <label class="form-label" for="amount">Basic Salary<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" id="amount" placeholder="0.00" autofocus="true" required/>
                           <span id="amount_error" class="invalid-feedback"></span>
                      </div>
                      
                      <div class="text-right">
                          <button type="submit" class="btn btn-success" id="addPositionBtn">Add</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->