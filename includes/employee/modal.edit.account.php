<div class="modal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalTitle" id="resetPasswordModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document" style="overflow-y: initial !important">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm();">
          <span aria-hidden="true"><i class="fe fe-times"></i></span>
        </button>
        <h6 class="form-text text-muted"><span class="text-danger">*</span> required fields.</h6>
        <div class="card text-white bg-lime mb-1">
          <div class="card-body p-3">
             <h6 class="card-title"><i class="fe fe-user"></i> Update User Account</h6>
          </div>
        </div>
        <div class="card">
            <form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" style="width: 80%; margin: 0 auto;" id="resetPasswordForm">
                <div class="card-body">
                
                    <input type="hidden" id="hiddenPersonalIDResetPassword" name="hiddenPersonalIDResetPassword" />

                    <div class="form-group">
                        <label class="form-label" for="reset_username">Username<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="reset_username" name="reset_username" placeholder="Username" readonly />
                        <span class="invalid-feedback" id="reset_username_error"></span>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <label class="form-label">Account Type: <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7 col-xs-12">
                            <ul class='list-inline'>
                                <li class='list-inline-item'>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="reset_authorizer" name="reset_accountType" value="1" checked />
                                        <label class="custom-control-label" for="reset_authorizer">Authorizer</label>
                                    </div>
                                </li>
                                <li class='list-inline-item'>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="reset_maker" name="reset_accountType" value="0" />
                                        <label class="custom-control-label" for="reset_maker">Maker</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="reset_password">Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="reset_password" name="reset_password" placeholder="Password" />
                        <span class="invalid-feedback" id="reset_password_error"></span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="reset_rpassword">Re-type Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="reset_rpassword" name="reset_rpassword" placeholder="Re-type Password" />
                        <span class="invalid-feedback" id="reset_rpassword_error"></span>
                    </div>
                    <button type="submit" class="btn btn-success" id="resetPasswordBtn">Update</button>
                    <hr>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-danger" type="button" id="deactivateAccountBtn">Deactivate</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>