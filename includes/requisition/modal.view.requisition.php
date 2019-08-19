<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalTitle" id="viewRequestModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg mw-100 w-75" role="document" >
      <center>
      <div class="modal-content" style="width: 65%!important">
        <div class="modal-header">
          <h4 class="modal-title" id="">View Form</h4>
          <button class="btn btn-danger float-right" type="button" data-dismiss="modal">
                <i class="fa fa-times"></i> Cancel
            </button>
            <!-- <div class="clearfix"></div> -->
        </div>
              <div class="modal-body" id= "displayRequestForm">
                          <div class='card'>
                              <div class='card-body'>
                                <form  class="m-t-40" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>"  method ='POST'>
                                  <div class='tab-content tabcontent-border p-2'>
                                      <div class='tab-pane active'role='tabpanel'>
                                          <div class='p-3'>

                                              <div class='container'>
                                                </div>

                                                  <div class='row'>

                                                        <div class='col-md-4 col-xs-12'>
                                                        <div class='form-group'>
                                                          <label class='form-control-label'>RequestType</label>
                                                          <input type='text' class='required form-control' name='RequestType' id='RequestType' placeholder='Request Type' disabled/>

                                                        </div>
                                                    </div>
                                                      <div class='col-md-4 col-xs-12'>
                                                          <div class='form-group'>
                                                               <label class='form-control-label'>First Name</label>
                                                               <input type='text' class='required form-control' name='firstName' id='firstname' placeholder='First Name' disabled/>

                                                          </div>
                                                      </div>

                                                      <div class='col-md-4 col-xs-12'>
                                                          <div class='form-group'>
                                                               <label class='form-control-label'>Last Name</label>
                                                                 <input type='text' class='form-control required' name='lastName' id='lastname' disabled/>

                                                          </div>
                                                      </div>
                                                  </div>

                                                          <div class='form-group'>
                                                            <label class='form-control-label'>Request type</label>
                                                            <input type='text' class='form-control' name='Request' id='request' placeholder='Request' disabled/>
                                                          </div>


                                                  <div class='row'>
                                                      <div class='col-md-6 col-xs-12'>
                                                          <div class='form-group'>
                                                               <label class='form-control-label'>Date From</label>
                                                               <input type='text' class='required form-control' name='DateFrom' id='DateFrom' placeholder='dd/mm/yyyy' disabled/>

                                                          </div>
                                                      </div>
                                                      <div class='col-md-6 col-xs-12'>
                                                          <div class='form-group'>
                                                               <label class='form-control-label'>Date To</label>
                                                               <input type='text' class='required form-control' name='DateTo' id='DateTo' placeholder='dd/mm/yyyy' disabled/>

                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class='form-group'>
                                                       <label class='form-control-label'>Reason</label>
                                                       <textarea class='form-control require' id='reason' rows='4' cols='45' disabled></textarea>

                                                  </div>
                                                  <input type='text' name='requestID' id='requestID' hidden='true'/>
                                                  <div class='text-right'>
                                                  <button class='btn btn-success' type='submit' id="approved">Approved</button>
                                                  <button class='btn btn-danger' type='submit' id="declined">Declined</button>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                </form>
                              </div>
                            </div>
                            </div>
                    </div><!-- /.modal-content -->
                  </div> <!-- /.modal-dialog -->
              </div>


              <div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalTitle" id="viewapproved" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog modal-lg mw-100 w-75" role="document" >
                    <center>
                    <div class="modal-content" style="width: 65%!important">
                      <div class="modal-header">
                        <h4 class="modal-title" id="">Request From</h4>
                        <button class="btn btn-danger float-right" type="button" data-dismiss="modal">
                              <i class="fa fa-times"></i> Cancel
                          </button>
                          <!-- <div class="clearfix"></div> -->
                      </div>
                            <div class="modal-body" id= "displayRequestForm">
                                        <div class='card'>
                                            <div class='card-body'>
                                              <form  class="m-t-40" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>"  method ='POST'>
                                                <div class='tab-content tabcontent-border p-2'>
                                                    <div class='tab-pane active'role='tabpanel'>
                                                        <div class='p-3'>
                                                            <div class='container'>
                                                              </div>

                                                                <div class='row'>
                                                                        <div class='col-md-4 col-xs-12'>
                                                                      <div class='form-group'>
                                                                        <label class='form-control-label'>RequestType</label>
                                                                        <input type='text' class='required form-control' name='RequestType' id='Request_Type' placeholder='Request Type' disabled/>

                                                                      </div>
                                                                  </div>
                                                                    <div class='col-md-4 col-xs-12'>
                                                                        <div class='form-group'>
                                                                             <label class='form-control-label'>First Name</label>
                                                                             <input type='text' class='required form-control' name='firstName' id='first' placeholder='First Name' disabled/>

                                                                        </div>
                                                                    </div>

                                                                    <div class='col-md-4 col-xs-12'>
                                                                        <div class='form-group'>
                                                                             <label class='form-control-label'>Last Name</label>
                                                                               <input type='text' class='form-control required' name='lastName' id='last' disabled/>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                        <div class='form-group'>
                                                                          <label class='form-control-label'>Request type</label>
                                                                          <input type='text' class='form-control' name='Request' id='Request' placeholder='Request' disabled/>
                                                                        </div>

                                                                <div class='row'>
                                                                    <div class='col-md-6 col-xs-12'>
                                                                        <div class='form-group'>
                                                                             <label class='form-control-label'>From</label>
                                                                             <input type='text' class='required form-control' name='DateFrom' id='Date_From' placeholder='dd/mm/yyyy' disabled/>

                                                                        </div>
                                                                    </div>
                                                                    <div class='col-md-6 col-xs-12'>
                                                                        <div class='form-group'>
                                                                             <label class='form-control-label'>To</label>
                                                                             <input type='text' class='required form-control' name='DateTo' id='Date_To' placeholder='dd/mm/yyyy' disabled/>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class='form-group'>
                                                                     <label class='form-control-label'>Reason</label>
                                                                     <textarea class='form-control require' id='reason_type' rows="4" cols="50" disabled></textarea>

                                                                </div>
                                                                <input type='text' name='requestID' id='requestID' hidden='true'/>

                                                            </div>
                                                        </div>
                                                    </div>
                                              </form>
                                            </div>
                                          </div>
                                          </div>
                                  </div><!-- /.modal-content -->
                                </div> <!-- /.modal-dialog -->
                            </div>
