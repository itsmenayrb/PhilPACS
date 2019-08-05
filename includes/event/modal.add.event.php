<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEventModalTitle" id="addEventModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document" style="overflow-y: initial !important">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm();">
              <span aria-hidden="true"><i class="fe fe-times"></i></span>
            </button>
            <h6 class="form-text text-muted float-right mr-2"><span class="text-danger">*</span> required fields.</h6>
            <div class="card text-white bg-lime mb-1">
              <div class="card-body p-3">
                 <h6 class="card-title"><i class="fe fe-user"></i> Add an event</h6>
              </div>
            </div>
            <div class="card pt-4 pb-4">
                <form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="addEventForm">

                    <div class="container">
                            <div class="row">
                                <label class="form-label col-sm-2 col-xs-12 align-self-center">Time<span class="text-danger">*</span> </label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <small class="form-text text-muted">From</small>
                                        <div class='input-icon'>
                                            <input type='text' class="form-control date" id='startTime' name="startTime" />
                                            <span class="input-icon-addon">
                                                <span class="fe fe-clock"></span>
                                            </span>
                                        </div>
                                        <span class="invalid-feedback" id="startTime_error">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <small class="form-text text-muted">To</small>
                                        <div class="input-icon">
                                            <input type="text" id="endTime" name="endTime" class="form-control date" />
                                            <span class="input-icon-addon">
                                                <span class="fe fe-clock"></span>
                                            </span>
                                        </div>
                                        <span class="invalid-feedback" id="endTime_error"></span>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                require(['moment', 'datetimepicker', 'jquery'], function(moment, datetimepicker, $) {
                                    $('#startTime').datetimepicker({
                                        format: 'LT',
                                        stepping: 5,
                                        minDate: moment().startOf('day'),
                                        maxDate: moment().endOf('day')
                                    });

                                    $('#endTime').datetimepicker({
                                        format: 'LT',
                                        useCurrent: false,
                                        minDate: moment().startOf('day'),
                                        maxDate: moment().endOf('day')
                                    });

                                    $('#startTime').on('dp.change', function(e) {
                                        $('#endTime').data('DateTimePicker').minDate(e.date);
                                    });

                                    $('#endTime').on('dp.change', function(e) {
                                        $('#startTime').data('DateTimePicker').maxDate(e.date);
                                    });

                                    $('#endTime').on('dp.show', function(e){
                                        if (!$('#endtime').data('DateTimePicker').date()) {
                                            var defaultDate = $('#startTime').data('DateTimePicker').date().add(1, 'hours');
                                            $('#endTime').data('DateTimePicker').defaultDate(defaultDate);
                                        }
                                    });

                                });
                            </script>

                        <div class="form-group">
                            <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" />
                            <span class="invalid-feedback" id="title_error"></span>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                            <span class="invalid-feedback" id="description_error"></span>
                        </div>

                        <button type="submit" class="btn btn-success" id="addEventBtn">Add Event</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>