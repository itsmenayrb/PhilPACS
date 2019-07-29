
<div class="modal" tabindex="-1" role="dialog" aria-labelledby="createAccountModalTitle" id="createAccountModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document" style="overflow-y: initial !important">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm();">
              <span aria-hidden="true"><i class="fe fe-times"></i></span>
            </button>
            <h6 class="form-text text-muted"><span class="text-danger">*</span> required fields.</h6>
            <div class="card text-white bg-lime mb-1">
              <div class="card-body p-3">
                 <h6 class="card-title"><i class="fe fe-user"></i> Create an account</h6>
              </div>
            </div>
            <div class="card pt-4 pb-4">
                <form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" style="width: 80%; margin: 0 auto;" id="createAccountForm">

                    <input type="hidden" id="hiddenPersonalIDAccount" name="hiddenPersonalIDAccount" />

                    <div class="form-group">
                        
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <label class="form-label">Account Type: <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <ul class='list-inline'>
                                    <li class='list-inline-item'>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="authorizer" name="accountType" value="1" checked />
                                            <label class="custom-control-label" for="authorizer">Authorizer</label>
                                        </div>
                                    </li>
                                    <li class='list-inline-item'>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="maker" name="accountType" value="0" />
                                            <label class="custom-control-label" for="maker">Maker</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="username">Username<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                        <span class="invalid-feedback" id="username_error"></span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                        <span class="invalid-feedback" id="password_error"></span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="rpassword">Re-type Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="Re-type Password" />
                        <span class="invalid-feedback" id="rpassword_error"></span>
                    </div>
                    <button type="submit" class="btn btn-success" id="createAccountBtn">Submit</button>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>