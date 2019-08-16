<?php

    require '../models/requisition.inc.php';
    $config = new Config();

    if(isset($_POST['displayRequestForm'])){

        $requestID = $config->checkInput($_POST['reqID']);
        $request = new Request();
        $request->readForm($requestID);
    }

    if ($_POST['requesttype'] == 'Absence Request') {
      ?>
          <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="form-group">
                 <label class="form-control-label" for="TypeRequest">Type of Request<span class="text-danger" required>*</span></label>
                 <select class="required form-control" id="type_request">
                   <option value="" selected>Request</option>
                   <option value="Sick">Sick</option>
                   <option value="Vacation">Vacation</option>
                   <option value="Bereavement">Bereavement</option>
                   <option value="Time Off Without Pay">Time Off Without Pay</option>
                   <option value="Maternity/Paternity">Maternity/Paternity</option>
                   </select>
                 <span id="type_request_error"></span>

            </div>
          </div>

          <div class="col-md-6 col-xs-12">
              <div class="form-group">
                   <label class="form-control-label" for="DataFrom">Date From<span class="text-danger">*</span></label>
                   <input type="date" class="mydate required form-control" id="date_from" placeholder="dd/mm/yyyy"  required/>
                     <span id="date_from_error"></span>
              </div>
          </div>
          <div class="col-md-6 col-xs-12">
              <div class="form-group">
                   <label class="form-control-label" for="DataTo">Date To<span class="text-danger">*</span></label>
                   <input type="date" class="mydate required form-control" id="date_to" placeholder="dd/mm/yyyy" required/>
                   <span id="date_to_error"></span>
              </div>
          </div>
        </div>
        <script type="text/javascript">
        var date = new Date();
        date.setDate(date.getDate());
        $('#date_from').datepicker({
        startDate: date
        });
        </script>
      <?php
    }
    if ($_POST['requesttype'] == 'OverTime Request') {
      ?>
      <div class="row">
        <div class="col-md-6 col-xs-12">
          <div class="form-group">
            <small class="form-text text-muted">Type of Request(For Absentsence only)</small>
          <select class="required form-control" id="type_request">
                 <option value="none" hidden>Request</option>
               </select>
               <span id="type_request_error"></span>

          </div>
        </div>
        <div class="col-sm-3">
              <div class="form-group">
                  <small class="form-text text-muted">Start Time</small>
                  <div class='input-icon'>
                      <input type='text' class="form-control date" id='date_from'  required/>
                      <span class="input-icon-addon">
                          <span class="fe fe-clock"></span>
                      </span>
                  </div>
                  <span id="date_from_error"></span>
              </div>
          </div>
          <div class="col-sm-3">
              <div class="form-group">
                  <small class="form-text text-muted">End Time</small>
                  <div class="input-icon">
                      <input type="text" id="date_to" class="form-control date"  required/>
                      <span class="input-icon-addon">
                          <span class="fe fe-clock"></span>
                      </span>
                  </div>
                  <span id="date_to_error"></span>
              </div>
          </div>
        </div>
      <script type="text/javascript">
          require(['moment', 'datetimepicker', 'jquery'], function(moment, datetimepicker, $) {
              $('#date_from').datetimepicker({
                  format: 'LT',
                  stepping: 5,
                  minDate: moment().startOf('day'),
                  maxDate: moment().endOf('day')
              });

              $('#date_to').datetimepicker({
                  format: 'LT',
                  useCurrent: false,
                  minDate: moment().startOf('day'),
                  maxDate: moment().endOf('day')
              });

              $('#date_from').on('dp.change', function(e) {
                  $('#date_to').data('DateTimePicker').minDate(e.date);
              });

              $('#date_to').on('dp.change', function(e) {
                  $('#date_from').data('DateTimePicker').maxDate(e.date);
              });

              $('#date_to').on('dp.show', function(e){
                  if (!$('#date_to').data('DateTimePicker').date()) {
                      var defaultDate = $('#date_from').data('DateTimePicker').date().add(1, 'hours');
                      $('#date_to').data('DateTimePicker').defaultDate(defaultDate);
                  }
              });

          });
      </script>
      <?php
    }
?>
