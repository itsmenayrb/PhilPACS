<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalTitle" id="addRequestModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl" role="document" style="overflow-y: initial !important">
    <div class="modal-content">
      <div class="modal-body" style="max-height: calc(100vh - 100px); overflow-y: auto;">
        <button class="close" type="button" data-dismiss="modal" aria-label='Close' onclick="reload();">
            <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
        <div class="container">

            <h6 class="form-text text-muted"><span class="text-danger">*</span> required fields.</h6>
            <div class="card text-white bg-lime mb-1">
              <div class="card-body p-3">
                 <h6 class="card-title"><i class="fe fe-user"></i> Add Request</h6>
              </div>
            </div>
            <div class="card">

                <div class="card-body">
                  <form class="m-t-40" id="addEmployeeForm" method="POST">
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
                                                             <label class="form-control-label" for="firstname">Request Type<span class="text-danger">*</span></label>
                                                             <select class="required form-control" name="RequestType">
                                                               <option selected disabled>Request Type</option>
                                                                    <option value="Absent Request">Absent Request</option>
                                                                    <option value="OverTime Request">OverTime Request</option>
                                                             </select>

                                                             <span id="requesttype_error"></span>
                                                        </div>
                                                    </div>
                                                      <div class="col-md-6 col-xs-12">
                                                          <div class="form-group">
                                                               <label class="form-control-label" for="lastName">Last Name<span class="text-danger">*</span></label>
                                                               <select class="required form-control" name="lastName" placeholder = "last Name">
                                                                <?php $requestt->employeelastName(); ?>
                                                               </select>
                                                               <span id="firstname_error"></span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-2 col-xs-12">
                                                          <label class="form-control-label">Type of Request(For Absent only)<span class="text-danger"></span></label>
                                                          <span id="typeRequest_error"></span>
                                                      </div>
                                                      <div class="col-md-4 col-xs-12">
                                                          <div class="custom-control custom-radio">
                                                              <input type="radio" class="custom-control-input" name="Request" value="Sick" id="Sick" />
                                                              <label class="custom-control-label" value="Sick" for="Sick">Sick</label>
                                                          </div>

                                                          <div class="custom-control custom-radio">
                                                              <input type="radio" class="custom-control-input" name="Request" value="Vacation" id="Vacation" />
                                                              <label class="custom-control-label" name="Request" value="Vacation" for="Vacation">Vacation</label>
                                                          </div>
                                                          <div class="custom-control custom-radio">
                                                              <input type="radio" class="custom-control-input" name= "Request" value= "Bereavement" id="Bereavement" />
                                                              <label class="custom-control-label" name="Request" value= "Bereavement" for="Bereavement">Bereavement</label>
                                                          </div>
                                                          <div class="custom-control custom-radio">
                                                              <input type="radio" class="custom-control-input" name="Request" value="Time Off Without Pay" id="Time Off Without Pay" />
                                                              <label class="custom-control-label" name="Request" value="Time Off Without Pay" for="Time Off Without Pay">Time Off Without Pay</label>
                                                          </div>

                                                          <div class="custom-control custom-radio">
                                                              <input type="radio" class="custom-control-input" name="Request" value="Maternity/Paternity" id="Maternity/Paternity" />
                                                              <label class="custom-control-label" name="Request" value="Maternity/Paternity" for="Maternity/Paternity">Maternity/Paternity</label>
                                                          </div>
                                                          <div class="custom-control custom-radio">

                                                              <label class="custom-control-label" for="Other (Please Specify):">Other (Please Specify):</label>
                                                              <input type="text" class="required form-control" name="Request" id="Other (Please Specify):" placeholder="Other"/>
                                                          </div>
                                                      </div>

                                                      <div class="col-md-3 col-xs-12">
                                                          <div class="form-group">
                                                               <label class="form-control-label" for="DataFrom">Date From<span class="text-danger">*</span></label>
                                                               <input type="date" class="required form-control" name="DateFrom" id="DataFrom" placeholder="dd/mm/yyyy" />
                                                               <span id="DataFrom_error"></span>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3 col-xs-12">
                                                          <div class="form-group">
                                                               <label class="form-control-label" for="DataTo">Date To<span class="text-danger">*</span></label>
                                                               <input type="date" class="required form-control" name="DateTo" id="DataTo" placeholder="dd/mm/yyyy" />
                                                               <span id="DataTo_error"></span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                       <label class="form-control-label" for="Reason">Reason<span class="text-danger">*</span></label>
                                                       <textarea type="" class="required email form-control" name="Reason" id="Reason" placeholder="Reason for requesrt" /></textarea>
                                                       <span id="email_error"></span>
                                                  </div>

                                                  <div class="text-right">
                                                      <button class="btn btn-primary" type="submit" name="SubmitRequest">Submit</button>

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
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
