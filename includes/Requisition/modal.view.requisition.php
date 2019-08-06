<?php
      $id = $config->checkInput($_GET['id']);

      $sql = "SELECT RequestType, firstName, lastName, Request,
       DateFrom, DateTo, Reason, requestID
       FROM requestformtbl WHERE requestID = :requestID";
      $result = $config->runQuery($sql);
      $result->execute(array(":requestID" => $id));

      $rows = $result->fetch(PDO::FETCH_ASSOC);
        $requestID = $rows['requestID'];

        echo "
      
                          <div class='card'>
                              <div class='card-body'>
                                <form method ='POST'>
                                  <div class='tab-content tabcontent-border p-2'>
                                      <div class='tab-pane active'role='tabpanel'>
                                          <div class='p-3'>
                                              <div class='container'>
                                                </div>
                                                  <div class='row'>
                                                          <div class='col-md-4 col-xs-12'>
                                                        <div class='form-group'>
                                                          <label class='form-control-label'>RequestType</label>
                                                          <input type='text' class='required form-control' value='". $rows['RequestType'] ."' name='RequestType' id='RequestType' placeholder='Request Type' disabled/>

                                                        </div>
                                                    </div>
                                                      <div class='col-md-4 col-xs-12'>
                                                          <div class='form-group'>
                                                               <label class='form-control-label'>First Name</label>
                                                               <input type='text' class='required form-control' value='". $rows['firstName'] ."' name='firstName' id='firstname' placeholder='First Name' disabled/>

                                                          </div>
                                                      </div>

                                                      <div class='col-md-4 col-xs-12'>
                                                          <div class='form-group'>
                                                               <label class='form-control-label'>Last Name</label>
                                                               <input type='text' class='form-control required' value='". $rows['lastName'] ."' name='lastName' id='lastname' disabled/>

                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class='row'>
                                                      <div class='col-md-12 col-xs-12'>
                                                          <div class='custom-control custom-radio'>
                                                            <label class='form-control-label'>Request type</label>
                                                            <input type='text' class='form-control' name='Request' value='". $rows['Request'] ."' id='Request' placeholder='Request' disabled/>

                                                          </div>

                                                      </div>

                                                  </div>

                                                  <div class='row'>
                                                      <div class='col-md-6 col-xs-12'>
                                                          <div class='form-group'>
                                                               <label class='form-control-label'>Date From</label>
                                                               <input type='date' class='required form-control' value='". $rows['DateFrom'] ."' name='DateFrom' id='DataFrom' placeholder='dd/mm/yyyy' disabled/>

                                                          </div>
                                                      </div>
                                                      <div class='col-md-6 col-xs-12'>
                                                          <div class='form-group'>
                                                               <label class='form-control-label'>Date To</label>
                                                               <input type='date' class='required form-control' value='". $rows['DateTo'] ."' name='DateTo' id='DataTo' placeholder='dd/mm/yyyy' disabled/>

                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class='form-group'>
                                                       <label class='form-control-label'>Reason</label>
                                                       <textarea class='required email form-control' placeholder='". $rows['Reason'] ."' name='Reason' id='Reason' disabled/></textarea>

                                                  </div>
                                                  <input type='text' name='requestID' id='requestID' value='". $requestID ."' hidden='true'/>


                                                  <div class='text-right'>

                                                  <button class='btn btn-primary' type='submit' name='Approved'>Approved</button>
                                                  <button class='btn btn-danger' type='submit' name='Declined'>Declined</button>

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
        ";

 ?>
