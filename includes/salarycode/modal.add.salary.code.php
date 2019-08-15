<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addSalaryCodeModalTitle" id="addSalaryCodeModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm();">
          <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
         <h6 class="form-text text-muted float-right mr-2"><span class="text-danger">*</span> required fields.</h6>
        <div class="card text-white bg-lime mb-1">
          <div class="card-body p-3">
             <h6 class="card-title"><i class="fe fe-layers"></i> Add Salary Code</h6>
          </div>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="dimmer active">
                <div id="loader"></div>
                <div id="dimmer-content">
                    
                  <div class="alert alert-success">
                    <i class="fe fe-info"></i> Salary Code must be letters from A to D.
                  </div>

                  <form class="m-t-40" id="addSalaryCodeForm" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">

                    <input type="hidden" id="hiddenBasicSalary" value="" />

                    <div class="row">

                      <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="form-group">
                           <label class="form-label" for="salary_code">Salary Code<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" maxlength="1" id="salary_code" autofocus="true" required/>
                           <span id="salary_code_error" class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="form-group">
                           <label class="form-label" for="basicSalary">Basic Salary<span class="text-danger">*</span></label>
                           <input type="text" class="required form-control" id="basicSalary" placeholder="0.00" required/>
                           <span id="basicSalary_error" class="invalid-feedback"></span>
                        </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <label class="form-label" for="description">Description</label>
                      <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                      
                    <div class="text-right">
                        <button type="submit" class="btn btn-success" id="addSalaryCodeBtn">Add</button>
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