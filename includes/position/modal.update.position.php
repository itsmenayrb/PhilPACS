<div class="modal" tabindex="-1" role="dialog" aria-labelledby="updatePositionModalTitle" id="updatePositionModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
         <h6 class="form-text text-muted float-right mr-2"><span class="text-danger">*</span> required fields.</h6>
        <div class="card text-white bg-lime mb-1">
          <div class="card-body p-3">
             <h6 class="card-title"><i class="fe fe-layers"></i> Update Position</h6>
          </div>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="dimmer active">
                <div id="update-loader"></div>
                <div id="update-dimmer-content">
                  <form class="m-t-40" id="updatePositionForm" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">

                      <input type="hidden" value="" id="hiddenPositionID" />
                      <input type="hidden" value="" id="hiddenUpdateSalary" />
                      
                        <div class="row">
                          <div class="col-md-8 col-xs-12">
                            <div class="form-group">
                                <label class="form-label" for="update_department_name">Department Name<span class="text-danger">*</span></label>
                                <select id="update_department_name" class="form-control">
                                    
                                </select>
                                <span id="update_department_name_error" class="invalid-feedback"></span>
                            </div>
                          </div>

                          <div class="col-md-4 col-xs-12">
                              <div class="form-group">
                                   <label class="form-label" for="update_code">Salary Code<span class="text-danger">*</span></label>
                                   <select id="update_salary_code" class="form-control">
                                      <option value="" selected></option>
                                   </select>
                                   <span id="update_salary_code_error" class="invalid-feedback"></span>
                              </div>
                          </div>
                        </div>
                      <div class="form-group">
                           <label class="form-label" for="update_amount">Basic Salary</label>
                           <input type="text" class="required form-control" id="update_amount" placeholder="0.00" readonly />
                           <!-- <span id="amount_error" class="invalid-feedback"></span> -->
                      </div>

                      <div class="form-group">
                           <label class="form-label" for="update_position_name">Position Name<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" id="update_position_name" placeholder="Position Name" autofocus="true" required/>
                           <span id="position_name_error" class="invalid-feedback"></span>
                      </div>
                      
                      <div class="text-right">
                          <button type="submit" class="btn btn-success" id="updatePositionBtn">Update</button>
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