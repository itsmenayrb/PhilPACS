<div class="modal" tabindex="-1" role="dialog" aria-labelledby="passwordModalTitle" id="passwordModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document" style="overflow-y: initial !important">
    <div class="modal-content">
      <div class="modal-body" style="max-height: calc(100vh - 100px); overflow-y: auto;">
        <div class="dimmer active">
          <div id="loader"></div>
            <div id="dimmer-content">
            <button class="close" type="button" data-dismiss="modal" aria-label='Close'>
                <span aria-hidden="true"><i class="fe fe-times"></i></span>
            </button>
            <div class="container">
                <div class="card text-white bg-lime mb-1">
                  <div class="card-body p-3">
                     <h6 class="card-title"><i class="fe fe-lock"></i> Enter Password</h6>
                  </div>
                </div>
                <div class="card">
                    <form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="passwordForm">
                        <div class="card-body">
                            <!-- employee -->
                            <input type="hidden" id="hiddenArchiveID" name="hiddenArchiveID" value="" />                            
                            <input type="hidden" id="hiddenEditEmployeeID2" name="hiddenEditEmployeeID2" value="" />
                            <input type="hidden" id="hiddenAddEmployeeID" name="hiddenAddEmployeeID" value="" />                            
                            <input type="hidden" id="hiddenRemoveID" name="hiddenRemoveID" value="" />
                            <input type="hidden" id="hiddenDeactivateAccountID" name="hiddenDeactivateAccountID" value="" />
                            <input type="hidden" id="hiddenReactivateAccountID" name="hiddenReactivateAccountID" value="" />

                            <!-- attendance -->
                            <input type="hidden" id="hiddenUpdatePersonalAttendanceID" name="hiddenUpdatePersonalAttendanceID" value="" />
                            <input type="hidden" id="hiddenSaveAttendanceForPendingID" name="hiddenSaveAttendanceForPendingID" value="" />
                            <input type="hidden" id="hiddenSendToPayrollID" name="hiddenSendToPayrollID" value="" />
                            <!-- /// -->
                            <input type="hidden" id="hiddenHref" name="hiddenHref" value="" />
                            <input type="hidden" id="hiddenIDSession" name="hiddenIDSession" value="<?=$_SESSION['accountID'];?>" />
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" id="passwordAction" name="passwordAction" />
                                <span id="passwordAction_error" class="invalid-feedback"></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" id="passwordActionBtn" name="passwordActionBtn">Proceed</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div> <!-- /.modal-body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    require(['jquery'], function($) {
        
    });
</script>