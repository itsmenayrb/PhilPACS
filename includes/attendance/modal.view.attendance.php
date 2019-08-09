<div class="modal" tabindex="-1" role="dialog" aria-labelledby="viewEmployeeAttendanceModalTitle" id="viewEmployeeAttendanceModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document" style="overflow-y: initial !important">
        <div class="modal-content">
          <div class="modal-body" style="max-height: calc(100vh - 100px); overflow-y: auto;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reload();">
              <span aria-hidden="true"><i class="fe fe-times"></i></span>
            </button>
            <div class="card text-white bg-lime mb-1">
              <div class="card-body p-3">
                 <h6 class="card-title"><i class="fe fe-user"></i> View Attendance</h6>
              </div>
            </div>
            <div class="card pt-4 pb-4">
                <div class="row">
                  <div class="col-md-12">
                    <span data-toggle="tooltip" class="float-right" title="Update Attendance">
                      <button class="btn btn-warning" type="button" id="updateAttendanceRecordBtn">
                        <i class="fe fe-edit-3"></i> Update
                      </button>
                    </span>
                    
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class='attendanceContainer'>
                    
                </div>

            </div>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function reload() {
    location.reload();
  }
</script>