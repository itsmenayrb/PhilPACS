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

                      <input type="hidden" value="" id="hiddenDepartmentID" />
                      <div class="form-group">
                           <label class="form-label" for="department_name">Department Name<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" id="update_department_name_input" placeholder="Department Name" autofocus="true" required/>
                           <span id="update_department_name_error" class="invalid-feedback"></span>
                      </div>
                      
                      <div class="text-right">
                          <button type="submit" class="btn btn-success" id="updateDepartmentBtn">Update</button>
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