<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addDepartmentModalTitle" id="addDepartmentModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm();">
          <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
         <h6 class="form-text text-muted"><span class="text-danger">*</span> required fields.</h6>
        <div class="card text-white bg-lime mb-1">
          <div class="card-body p-3">
             <h6 class="card-title"><i class="fe fe-layers"></i> Add Department</h6>
          </div>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="dimmer active">
                <div id="loader"></div>
                <div id="dimmer-content">
                  <form class="m-t-40" id="addDepartmentForm" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                      <div class="alert alert-success">
                        <i class="fe fe-info"></i> Press and hold <kbd>ctrl</kbd> key to select multiple salary code.  
                      </div>

                      <div class="form-group">
                        <label class="form-label" for="salary_code">Salary Code<span class="text-danger">*</span></label>
                        <select class="form-control" name="salary_code[]" id="salary_code" multiple>
                             <?php
                              $status = 1;
                              $stmt = $config->runQuery("SELECT * FROM salarycodetbl WHERE status=:status ORDER BY salaryCode");
                              $stmt->execute(array(":status" => $status));
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <option value="<?=$row['salaryCodeID'];?>"><?=$row['salaryCode'];?></option>
                                <?php
                              }
                             ?>
                        </select>
                         <span id="salary_code_error" class="invalid-feedback"></span>
                      </div>
                      <div class="form-group">
                           <label class="form-label" for="department_name">Department Name<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" name="department_name" id="department_name" placeholder="Department Name" autofocus="true" required/>
                           <span id="department_name_error" class="invalid-feedback"></span>
                      </div>

                      
                      <div class="text-right">
                          <button type="submit" class="btn btn-success" id="addDepartmentBtn" name="addDepartmentBtn">Add</button>
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