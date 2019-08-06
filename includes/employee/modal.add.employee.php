<div class="modal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalTitle" id="addEmployeeModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl" role="document" style="overflow-y: initial !important">
    <div class="modal-content">
            
      
      <div class="modal-body" style="max-height: calc(100vh - 100px); overflow-y: auto;">
        <div class="dimmer active">
          <div id="loader"></div>
            <div id="dimmer-content">
            <button class="close" type="button" data-dismiss="modal" aria-label='Close' onclick="reload();">
                <span aria-hidden="true"><i class="fe fe-times"></i></span>
            </button>
            <div class="container">

                <h6 class="form-text text-muted float-right mr-2"><span class="text-danger">*</span> required fields.</h6>
                <div class="card text-white bg-lime mb-1">
                  <div class="card-body p-3">
                     <h6 class="card-title"><i class="fe fe-user"></i> Add Employee</h6>
                  </div>
                </div>
                <div class="card">
                    
                    <div class="card-tabs">
                        <ul class="nav nav-justified" role="tablist" style="width: 100%;">

                            <li class="nav-item text-success" id="first">
                                <div class="card-tabs-item">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <i class="fe fe-user mr-2"></i>
                                        </div>
                                        <div class="col">
                                            <a class="nav-link" id="navPersonalDetailsTab" role="tab">
                                                <span class="hidden-sm-up"></span>
                                                <span class="hidden-xs-down">Personal Details</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item" id="second">
                                <div class="card-tabs-item">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <i class="fe fe-user-plus mr-2"></i>
                                        </div>
                                        <div class="col">
                                            <a class="nav-link disabled" id="navEmploymentDetailsTab" role="tab">
                                                <span class="hidden-sm-up"></span>
                                                <span class="hidden-xs-down">Employment Details</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item" id="third">
                                <div class="card-tabs-item">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <i class="fe fe-info mr-2"></i>
                                        </div>
                                        <div class="col">
                                            <a class="nav-link disabled" id="navOtherInfoTab" role="tab">
                                                <span class="hidden-sm-up"></span>
                                                <span class="hidden-xs-down">Other Information</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <div class="card-body">
                        
                        <form class="m-t-40" id="addEmployeeForm" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" enctype="multipart/form-data">

                            <div class="tab-content tabcontent-border p-2">
                                <div class="tab-pane active" id="personalDetailsTab" role="tabpanel">
                                    <div class="p-3">
                                        <div class="container">
                                            
                                            <div class="row">
                                                <div class="col-md-3 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type="file" name="profilePicture" id="profilePicture" accept="image/*"/>
                                                                <label for="profilePicture"><i class="fe fe-edit-2"></i></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview" style="background-image: url(../assets/logo/image_placeholder.png);"></div>
                                                            </div>
                                                        </div>
                                                        <span id="profilePicture_error" class="invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="row">
                                                       <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                 <label class="form-label" for="firstname">First Name<span class="text-danger">*</span></label>
                                                                 <input type="text" class="required form-control" id="firstname" name="firstname" placeholder="First Name" autofocus="true" required/>
                                                                 <span id="firstname_error" class="invalid-feedback"></span>
                                                            </div>
                                                       </div>
                                                       <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                 <label class="form-label" for="middlename">Middle Name</label>
                                                                 <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" />
                                                                 <span id="middlename_error" class="invalid-feedback"></span>
                                                            </div>
                                                       </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                 <label class="form-label" for="lastname">Last Name<span class="text-danger">*</span></label>
                                                                 <input type="text" class="form-control required" id="lastname" name="lastname" placeholder="Last Name" required/>
                                                                 <span id="lastname_error" class="invalid-feedback"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1 col-xs-12">
                                                    <label class="form-label">Gender<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-2 col-xs-12">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="male" name="gender" value="1" checked />
                                                        <label class="custom-control-label" for="male">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="female" name="gender" value="0" />
                                                        <label class="custom-control-label" for="female">Female</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="contact_number">Contact Number<span class="text-danger">*</span></label>
                                                         <input type="text" class="required form-control" id="contact_number" name="contact_number" data-mask="0000-000-0000" placeholder="09xx-xxx-xxxx" data-mask-clearifnotmatch="true" />
                                                         <span id="contact_number_error" class="invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <script>
                                                    require(['input-mask']);
                                                </script>
                                                <div class="col-md-5 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                                                            <input type="email" class="required email form-control" id="email" name="email" placeholder="Email" />
                                                        <span id="email_error" class="invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="birthday">Date of Birth<span class="text-danger">*</span></label>
                                                         <input type="text" class="required form-control" id="birthday" name="birthday" data-date-start-date="-18y"/>
                                                         <span id="birthday_error" class="invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                  require(['datepicker', 'jquery'], function(datepicker, $) {
                                                     /**
                                                      * Calculate age based on the given date of birth
                                                      */
                                                        $('#birthday').datepicker({
                                                            viewMode: 'years',
                                                            startDate: '-100y',
                                                            endDate: '-18y',
                                                            changeMonth: true,
                                                            changeYear: true
                                                        }).on('change', function(e) {
                                                            var currentDate = new Date();
                                                            var selectedDate = new Date($(this).val());
                                                            var age = currentDate.getFullYear() - selectedDate.getFullYear();
                                                            var m = currentDate.getMonth() - selectedDate.getMonth();

                                                            if (m < 0 || (m === 0 && currentDate.getDate() < selectedDate.getDate())) {
                                                                age--;
                                                            }

                                                            $('#age').val(age);

                                                        });
                                                    });
                                                </script>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="age">Age</label>
                                                         <input type="text" name="age" class="required form-control" id="age" placeholder="Age" value="" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-label">Address<span class="text-danger">*</span></label>
                                                    <span class="invalid-feedback" id="address_error"></span>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-2 col-xs-12">
                                                    <div class="form-group">
                                                         <small class="form-text" for="house_number">House No.</small>
                                                         <input type="text" name="house_number" class="form-control" id="house_number"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-xs-12">
                                                    <div class="form-group">
                                                         <small class="form-text" for="block">Block</small>
                                                         <input type="text" name="block" class="form-control" id="block"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-xs-12">
                                                    <div class="form-group">
                                                         <small class="form-text" for="lot">Lot</small>
                                                         <input type="text" name="lot" class="form-control" id="lot"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                         <small class="form-text" for="street">Street</small>
                                                         <input type="text" name="street" class="form-control" id="street"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                         <small class="form-text" for="subdivision">Subdivision</small>
                                                         <input type="text" name="subdivision" class="form-control" id="subdivision"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                         <small class="form-text" for="barangay">Barangay</small>
                                                         <input type="text" name="barangay" class="required form-control" id="barangay"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                         <small class="form-text" for="city">City/Municipality</small>
                                                         <input type="text" name="city" class="required form-control" id="city"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                         <small class="form-text" for="province">Province</small>
                                                         <input type="text" name="province" class="required form-control" id="province"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                         <small class="form-text" for="country">Country</small>
                                                         <input type="text" name="country" class="required form-control" value="Philippines" id="country"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-12">
                                                    <div class="form-group">
                                                         <small class="form-text" for="zipcode">Zip Code</small>
                                                         <input type="text" maxlength="4" minlength="4" name="zipcode" class="required form-control" id="zipcode"/>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="text-right mt-3">
                                                <button class="btn btn-info" data-target="#employmentDetailsTab" data-toggle="tab" type="button" id="personalDetailsBtnNext">Next</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="employmentDetailsTab" role="tabpanel">
                                    <div class="p-3">
                                        <div class="container">
                                            
                                            <!-- <div class="row">
                                                <div class="offset-md-3 col-md-3 col-xs-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="old_employee" name="old_employee"/>
                                                        <label class="custom-control-label" for="old_employee">Old Employee</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-12">
                                                    <div class="form-group" id="hiddenEmployeeIDContainer">
                                                        <label class="form-label" for="employee_id">Employee ID<span class="text-danger">*</span></label>
                                                        <input name="employee_id" class="form-control" id="employee_id" />
                                                        <span class="invalid-feedback" id="employee_id_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br> -->
                                            <div class="row">
                                                <div class="offset-md-3 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="date_hired">Date Hired<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="date_hired" name="date_hired" autocomplete="off" />
                                                        <span class="invalid-feedback" id="date_hired_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="offset-md-3 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="position" required>Position<span class="text-danger">*</span></label>
                                                         <select class="form-control" id="position" name="position">
                                                             <option value="" selected>Select a position.</option>
                                                            <?php
                                                                $status = 1;
                                                                $stmt = $config->runQuery("SELECT * FROM positiontbl WHERE status=:status");
                                                                $stmt->execute(array(":status" => $status));
                                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                    $position_id = $row['positionID'];
                                                                    $position_name = $row['positionName'];
                                                                    ?>
                                                                        <option value="<?=$position_id?>"><?=$position_name;?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                         </select>
                                                         <span id="position_error" class="invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="offset-md-3 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="basic_salary">Basic Salary</label>
                                                         <input type="text" name="basic_salary" class="form-control" id="basic_salary" placeholder="Basic Salary" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="offset-md-3 col-md-2 col-xs-12">
                                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-5 col-xs-12">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="regular" name="status" value="1" checked />
                                                        <label class="custom-control-label" for="regular">Regular</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="probationary" name="status" value="0" />
                                                        <label class="custom-control-label" for="probationary">Non-Regular</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right mt-3">
                                                <button class="btn btn-secondary" type="button" id="employmentDetailsBtnPrevious">Previous</button>
                                                <button class="btn btn-info" type="button" id="employmentDetailsBtnNext">Next</button>
                                                <!-- <button class="btn btn-success" type="submit" id="addEmployeeBtn">Add Employee</button> -->
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="otherInfoTab" role="tabpanel">
                                    <div class="p-3">
                                        <div class="container">

                                            <div class="row">
                                                <div class="offset-md-3 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="SSS_number">SSS Number</label>
                                                         <input type="text" name="SSS_number" class="form-control" id="SSS_number" placeholder="xx-xxxxxxx-x" data-mask="00-0000000-0" data-mask-clearifnotmatch="true"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="offset-md-3 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="philhealth_number">PhilHealth Number</label>
                                                         <input type="text" name="philhealth_number" class="form-control" id="philhealth_number" placeholder="xx-xxxxxxxxx-x" data-mask="00-000000000-0" data-mask-clearifnotmatch="true" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="offset-md-3 col-md-6 col-xs-12">
                                                     <div class="form-group">
                                                         <label class="form-label" for="PAGIBIG_number">PAG-IBIG Number</label>
                                                         <input type="text" class="form-control" id="PAGIBIG_number" placeholder="xxxx-xxxx-xxxx" name="PAGIBIG_number" data-mask="0000-0000-0000" data-mask-clearifnotmatch="true" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="offset-md-3 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="tin">Tax Identification Number</label>
                                                         <input type="text" class="form-control" id="tin" placeholder="xxx-xxx-xxx-xxx" name="tin" data-mask="000-000-000-000" data-mask-clearifnotmatch="true" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="offset-md-3 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                         <label class="form-label" for="bank_account">Bank Account Number</label>
                                                         <input type="text" class="form-control" id="bank_account" placeholder="xxxx-xxxx-xx" name="bank_account" data-mask="0000-0000-00" data-mask-clearifnotmatch="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-right mt-3">
                                                <button class="btn btn-secondary" type="button" id="otherInfoBtnPrevious">Previous</button>
                                                <button class="btn btn-success" type="submit" id="addEmployeeBtn">Add Employee</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>                    
                            </div>
                             
                        </form>
                    </div> 
                </div> <!-- /card -->
            </div>
            </div>
        </div>
      </div> <!-- /.modal-body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->