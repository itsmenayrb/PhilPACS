<div class="modal" tabindex="-1" role="dialog" aria-labelledby="editEventModalTitle" id="editEventModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document" style="overflow-y: initial !important">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fe fe-times"></i></span>
            </button>
            <h6 class="form-text text-muted float-right mr-2"><span class="text-danger">*</span> required fields.</h6>
            <div class="card text-white bg-lime mb-1">
              <div class="card-body p-3">
                 <h6 class="card-title"><i class="fe fe-layers"></i> Add an event</h6>
              </div>
            </div>
            <div class="card pt-4 pb-4">
                <form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="editEventForm">

                    <div class="container">
                        <input type="hidden" value="" id="hiddenEditEventID" name="hiddenEditEventID" />
                        <div class="form-group">
                            <label class="form-label" for="edit_title">Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_title" name="edit_title" placeholder="Title" />
                            <span class="invalid-feedback" id="edit_title_error"></span>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="edit_description">Description</label>
                            <textarea name="edit_description" id="edit_description" class="form-control" cols="30" rows="3"></textarea>
                            <span class="invalid-feedback" id="edit_description_error"></span>
                        </div>

                        <button type="submit" class="btn btn-success" id="editEventBtn">Update Event</button>
                        <button type="submit" class="btn btn-danger float-right" id="removeEventBtn">Remove Event</button>
                    

                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>