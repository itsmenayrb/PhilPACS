<div class="modal" tabindex="-1" role="dialog" aria-labelledby="updateSalaryCodeModalTitle" id="updateSalaryCodeModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
         <h6 class="form-text text-muted float-right mr-2"><span class="text-danger">*</span> required fields.</h6>
        <div class="card text-white bg-lime mb-1">
          <div class="card-body p-3">
             <h6 class="card-title"><i class="fe fe-layers"></i> Update Salary Code</h6>
          </div>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="dimmer active">
                <div id="update_loader"></div>
                <div id="update_dimmer-content">
                    
                  <div class="alert alert-success">
                    <i class="fe fe-info"></i> Salary Code must be letters from A to D.
                  </div>

                  <form class="m-t-40" id="updateSalaryCodeForm" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">

                    <input type="hidden" id="hiddenUpdateBasicSalary" value="" />
                    <input type="hidden" id="hiddenSalaryCodeID" value="" />

                    <div class="row">

                      <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="form-group">
                           <label class="form-label" for="update_salary_code">Salary Code<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" maxlength="1" id="update_salary_code" autofocus="true" required/>
                           <span id="update_salary_code_error" class="invalid-feedback"></span>
                        </div>
                      </div>

                      <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="form-group">
                           <label class="form-label" for="update_basicSalary">Basic Salary<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" id="update_basicSalary" placeholder="0.00" required/>
                           <span id="update_basicSalary_error" class="invalid-feedback"></span>
                        </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <label class="form-label" for="update_description">Description</label>
                      <textarea name="update_description" id="update_description" class="form-control"></textarea>
                    </div>
                      
                    <div class="text-right">
                        <button type="submit" class="btn btn-success" id="updateSalaryCodeBtn">Update</button>
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