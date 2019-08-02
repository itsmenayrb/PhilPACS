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
                                      <table id="example3" class="table table-bordered table-striped datatable2">
                                              <thead>
                                                  <tr>
                                                    <th>Request Type</th>
                                                    <th>Last Name</th>
                                                    <th>Request</th>
                                                    <th>Date Request</th>
                                                    <th>Date From</th>
                                                    <th>Date To</th>
                                                    <th>Reason</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              if(!empty($result)){
                                                foreach($result as $rows => $v) {
                                                  $requestID = $result[$rows]['requestID'];
                                                  ?>
                                                    <tr>
                                                        <td><?php echo $result[$rows]['RequestType']; ?></td>
                                                        <td><?php echo $result[$rows]['lastName']; ?></td>
                                                        <td><?php echo $result[$rows]['Request']; ?></td>
                                                        <td><?php echo $result[$rows]['DateRequest']; ?></td>
                                                        <td><?php echo $result[$rows]['DateFrom']; ?></td>
                                                        <td><?php echo $result[$rows]['DateTo']; ?></td>
                                                        <td><?php echo $result[$rows]['Reason']; ?></td>
                                                        <td><button type= "button" class ="btn btn-primary view_form" data-id="<?=$requestID;?>" data-toggle="modal" data-target="#viewRequestForm">
                                                        <i class ="fe fe-eye"></i></button>
                                                        <button type= "button" class ="btn btn-danger view_form" data-id="<?=$requestID;?>" data-toggle="modal" data-target="#viewRequestForm">
                                                        <i class ="fe fe-trash"></i></button></td>
                                                      </tr>
                                                        <?php
                                                      }
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
                                                    <th>EID</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Time in</th>
                                                    <th>Time out</th>
                                                    <th>Deration</th>
                                                    <th>Over Time</th>
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
                                                    <th>EID</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Time in</th>
                                                    <th>Time out</th>
                                                    <th>Deration</th>
                                                    <th>Over Time</th>
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
