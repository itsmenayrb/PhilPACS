<div class="modal" tabindex="-1" role="dialog" aria-labelledby="updateDepartmentModalTitle" id="updateDepartmentModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
         <h6 class="form-text text-muted"><span class="text-danger">*</span> required fields.</h6>
        <div class="card text-white bg-lime mb-1">
          <div class="card-body p-3">
             <h6 class="card-title"><i class="fe fe-layers"></i> Update Department</h6>
          </div>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="dimmer active">
                <div id="update-loader"></div>
                <div id="update-dimmer-content">
                  <form class="m-t-40" id="updateDepartmentForm" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">

                      <input type="hidden" value="" id="hiddenDepartmentName" name="hiddenDepartmentName" />
                      <div class="form-label" for="update_salary_code">Salary Code<span class="text-danger">*</span></div>
                      <small><span id="update_salary_code_error" class="text-danger"></span></small>
                      <table class="table table-sm card-table" id="updateDepartmentSalaryCodeTable">
                        <thead>
                          <tr>
                            <th class="w-1">
                                <input type="checkbox" onchange="updateCheckAll(this)" name="checkAll[]" />
                            </th>
                            <th>Salary Code</th>
                            <th>Basic Salary</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>

                      <div class="form-group">
                           <label class="form-label" for="update_department_name_input">Department Name<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" name="update_department_name" id="update_department_name_input" placeholder="Department Name" autofocus="true" required/>
                           <span id="update_department_name_error" class="invalid-feedback"></span>
                      </div>
                      
                      <div class="text-right">
                          <button type="submit" class="btn btn-success" name="updateDepartmentBtn" id="updateDepartmentBtn">Update</button>
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