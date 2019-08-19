
            <div class="card">
                <div class="card-body">
                    <form class="m-t-40" id="addEmployeeForm" enctype="multipart/form-data">

                        <div class="tab-content tabcontent-border p-2">
                            <div class="tab-pane active" id="Requestpending" role="tabpanel">
                                <div class="p-3">
                                  <div class="panel-body">
                                      <div class="box-body table-responsive">
                                      <table class="table card-table table-vcenter text-nowrap datatable table-hover" id="employeeTable">
                                        <thead>
                                          <tr>
                                            <th class="w-1"></th>
                                            <th>Request type</th>
                                            <th>Last Name</th>
                                            <th>Request</th>
                                            <th>Date Request</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php

                                            $stmt = $config->runQuery("SELECT personaldetailstbl.photo AS profilePicture,
                                                                        personaldetailstbl.lastName, requestformtbl.lastName,
                                                                        requestformtbl.firstName, requestformtbl.Request,
                                                                        requestformtbl.DateRequest, requestformtbl.RequestType,
                                                                        requestformtbl.DateFrom, requestformtbl.DateTo, requestformtbl.Reason,
                                                                        requestformtbl.requestID, requestformtbl.status
                                                                         FROM personaldetailstbl INNER JOIN requestformtbl
                                                                         ON requestformtbl.lastName = personaldetailstbl.lastName
                                                                       ORDER BY FIELD(requestformtbl.status, 'pending', 'approved', 'declined')");
                                            $stmt->execute();
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                              $profilePicture = $row['profilePicture'];
                                                $requestID = $row['requestID'];
                                              $RequestType = $row['RequestType'];
                                              $firstName = $row['firstName'];
                                              $lastName = $row['lastName'];
                                              $Request = $row['Request'];
                                              $DateRequest = $row['DateRequest'];
                                              $Reason = $row['Reason'];
                                              $status = $row['status'];

                                              if ($RequestType == 'Absent Request') {
                                                $DateFrom =  date('Y-m-d', strtotime($row['DateFrom']));
                                                $DateTo =  date('Y-m-d', strtotime($row['DateTo']));

                                              }
                                              else {
                                                $DateFrom =  date('h:i A', strtotime($row['DateFrom']));
                                                $DateTo =  date('h:i A', strtotime($row['DateTo']));

                                              }
                                              if ($status == 'approved') {
                                                ?>
                                                <tr class="requisition-link" style="background:#cce5cc" data-toggle="modal" data-target="#viewapproved" data-id="<?=$requestID;?>" data-lastname="<?=$lastName;?>" data-requesttype="<?=$RequestType;?>" data-firstname="<?=$firstName;?>" data-typerequest = "<?=$Request;?>" data-reason="<?=$Reason;?>" data-datefrom="<?=$DateFrom;?>" data-dateto="<?=$DateTo;?>">
                                              <?php
                                              }
                                              if ($status == 'declined') {
                                                ?>
                                                <tr class="requisition-link" style="background:#ffe5e5" data-toggle="modal" data-target="#viewapproved" data-id="<?=$requestID;?>" data-lastname="<?=$lastName;?>" data-requesttype="<?=$RequestType;?>" data-firstname="<?=$firstName;?>" data-typerequest = "<?=$Request;?>" data-reason="<?=$Reason;?>" data-datefrom="<?=$DateFrom;?>" data-dateto="<?=$DateTo;?>">
                                              <?php
                                              }

                                              if ($status == 'pending'){
                                              ?>
                                              <tr class="employee-link" data-toggle="modal" data-target="#viewRequestModal" data-id="<?=$requestID;?>" data-lastname="<?=$lastName;?>" data-requesttype="<?=$RequestType;?>" data-firstname="<?=$firstName;?>" data-typerequest = "<?=$Request;?>" data-reason="<?=$Reason;?>" data-datefrom="<?=$DateFrom;?>" data-dateto="<?=$DateTo;?>">

                                              <?php
                                              }
                                              ?>

                                              <td>
                                                  <span class="avatar d-block rounded" style="background-image: url(<?php if ($profilePicture !== "") { ?>'<?=$profilePicture?>' <?php ; } else { ?> ../assets/logo/image_placeholder.png <?php } ?>)"></span>
                                              </td>
                                                  <td>
                                                      <?=$RequestType;?>
                                                  </td>
                                                  <td><?=$lastName;?></td>
                                                  <td><?=$Request;?></td>
                                                  <td><?=$DateRequest;?></td>
                                                  <td><?=$DateFrom;?></td>
                                                  <td><?=$DateTo;?></td>
                                                  <td><?=$status;?></td>
                                              </tr>
                                              <?php
                                            }
                                          ?>
                                        </tbody>
                                      </table>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div> <!-- /card -->
      <!-- /.modal -->
