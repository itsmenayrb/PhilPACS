            <div class="card">

                <div class="card-tabs">
                    <ul class="nav nav-justified" role="tablist" style="width: 100%;">

                        <li class="nav-item">
                            <div class="card-tabs-item">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <i class="fe fe-user mr-2"></i>
                                    </div>
                                    <div class="col">
                                        <a class="nav-link" data-target="#Requestpending" data-toggle="tab">
                                            <span class="sm-up"></span>
                                            <span class="xs-down">Request Pending</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="card-tabs-item">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <i class="fe fe-linkedin mr-2"></i>
                                    </div>
                                    <div class="col">
                                        <a class="nav-link" data-target="#ApprovedList" data-toggle="tab">
                                            <span class="sm-up"></span>
                                            <span class="xs-down">Approved List</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="card-tabs-item">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <i class="fe fe-info mr-2"></i>
                                    </div>
                                    <div class="col">
                                        <a class="nav-link" data-target="#DeclinedList" data-toggle="tab">
                                            <span class="sm-up"></span>
                                            <span class="xs-down">Declined List</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

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
                                            <th>Date From</th>
                                            <th>Date To</th>
                                            <th>Reason</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $status = 'pending';
                                            $stmt = $config->runQuery("SELECT personaldetailstbl.photo AS profilePicture,
                                                                        personaldetailstbl.lastName, requestformtbl.lastName,
                                                                        requestformtbl.firstName, requestformtbl.Request,
                                                                        requestformtbl.DateRequest, requestformtbl.RequestType,
                                                                        requestformtbl.DateFrom, requestformtbl.DateTo, requestformtbl.Reason,
                                                                        requestformtbl.requestID
                                                                         FROM personaldetailstbl INNER JOIN requestformtbl
                                                                         ON requestformtbl.lastName = personaldetailstbl.lastName
                                                                       WHERE requestformtbl.status=:status");
                                            $stmt->execute(array(":status" => $status));
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                              $profilePicture = $row['profilePicture'];
                                                $requestID = $row['requestID'];
                                              $RequestType = $row['RequestType'];
                                              $firstName = $row['firstName'];
                                              $lastName = $row['lastName'];
                                              $Request = $row['Request'];
                                              $DateRequest = $row['DateRequest'];
                                              $DateFrom = $row['DateFrom'];
                                              $DateTo = $row['DateTo'];
                                              $Reason = $row['Reason'];

                                              ?>
                                              <tr class="employee-link" data-toggle="modal" data-target="#viewRequestModal" data-id="<?=$requestID;?>">
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
                                                  <td><?=$Reason;?></td>
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

                            <div class="tab-pane" id="ApprovedList" role="tabpanel">
                                <div class="p-3">
                                  <div class="panel-body">
                                    <div class="box-body table-responsive">
                                        <table id="example3" class="table table-bordered table-striped datatable">
                                            <thead>
                                                <tr>
                                                  <th class="w-1"></th>
                                                  <th>Request type</th>
                                                  <th>Last Name</th>
                                                  <th>Request</th>
                                                  <th>Date Request</th>
                                                  <th>Date From</th>
                                                  <th>Date To</th>
                                                  <th>Reason</th>
                                                </tr>
                                            </thead>
                                            <?php
                                              $requestt->viewApprovedForm();
                                          ?>

                                        </table>
                                        </div>

                                </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="DeclinedList" role="tabpanel">
                                <div class="p-3">
                                  <div class="panel-body">
                                    <div class="box-body table-responsive">
                                        <table id="example3" class="table table-bordered table-striped datatable">
                                            <thead>
                                                <tr>
                                                  <th class="w-1"></th>
                                                  <th>Request type</th>
                                                  <th>Last Name</th>
                                                  <th>Request</th>
                                                  <th>Date Request</th>
                                                  <th>Date From</th>
                                                  <th>Date To</th>
                                                  <th>Reason</th>
                                                </tr>
                                            </thead>
                                            <?php
                                              $requestt->viewDeclinedForm();
                                          ?>

                                        </table>

                                        </div>

                                </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div> <!-- /card -->
      <!-- /.modal -->
