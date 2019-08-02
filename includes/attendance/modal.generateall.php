<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalTitle" id="generateAll" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg mw-100 w-75" role="document" >
        <center>
        <div class="modal-content" style="width: 50%!important">
          <div class="modal-header">
            <h4 class="modal-title" id="addEmployeeModalTitle">Date cutoff</h4>
            <button class="btn btn-danger float-right" type="button" data-dismiss="modal">
                  <i class="fa fa-times"></i> Cancel
              </button>
              <!-- <div class="clearfix"></div> -->
          </div>
          <div class="modal-body" >
            <div class="card">
                <div class="card-body">
                    <form class="m-t-40" id="generateAll" method="post">
                        <div class="tab-content tabcontent-border p-2">
                            <div class="tab-pane active" id="personalDetailsTab" role="tabpanel">
                                <div class="p-3">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                     <label class="form-control-label" for="firstname">Date From<span class="text-danger">*</span></label>
                                                     <input type="date" class="required form-control" name="DateFrom" placeholder="Date From" required/>
                                                     <span id="firstname_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                     <label class="form-control-label" for="lastname">Date To<span class="text-danger">*</span></label>
                                                     <input type="date" class="form-control required" name="DateTo" placeholder="Date To" required/>
                                                     <span id="lastname_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-success" type="submit" name="generate">Generate All</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="summaryTab" role="tabpanel">
                                <div class="p-3">
                                    <div class="container">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
