<?php
  $id = $config->checkInput($_GET['edit']);
  $stmt = $config->runQuery("SELECT
                      personaldetailstbl.personalID, personaldetailstbl.firstName, personaldetailstbl.middleName, personaldetailstbl.lastName,
                      personaldetailstbl.contactNumber, personaldetailstbl.email, personaldetailstbl.birthday, personaldetailstbl.age, personaldetailstbl.photo,
                      employeetbl.dateHired, employeetbl.jobStatus, employeetbl.positionID,
                      positiontbl.positionName, positiontbl.basicSalary, departmenttbl.departmentID, departmenttbl.departmentName,
                      bankaccounttbl.bankAccountNumber, benefitnumberstbl.sssNumber, benefitnumberstbl.philhealthNumber, benefitnumberstbl.pagibigNumber, benefitnumberstbl.taxIdentificationNumber,
                      addresstbl.houseNumber, addresstbl.block, addresstbl.lot, addresstbl.street, addresstbl.subdivision, addresstbl.barangay, addresstbl.city, addresstbl.province, addresstbl.country, addresstbl.zipcode
                      
                       FROM personaldetailstbl
                       INNER JOIN addresstbl ON personaldetailstbl.personalID = addresstbl.addressID
                       INNER JOIN benefitnumberstbl ON addresstbl.addressID = benefitnumberstbl.benefitID
                       INNER JOIN bankaccounttbl ON benefitnumberstbl.benefitID = bankaccounttbl.bankAccountID
                       INNER JOIN employeetbl ON bankaccounttbl.bankAccountID  = employeetbl.employeeID
                       INNER JOIN positiontbl ON employeetbl.positionID = positiontbl.positionID
                       INNER JOIN departmenttbl ON positiontbl.departmentID = departmenttbl.departmentID
                       WHERE personaldetailstbl.personalID = :personalID LIMIT 1");
  $stmt->execute(array(":personalID" => $id));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  //Personal
  $profilePicture = $row['photo'];
  $firstName = $row['firstName'];
  $middleName = $row['middleName'];
  $lastName = $row['lastName'];
  $contactNumber = $row['contactNumber'];
  $email = $row['email'];
  $birthday = $row['birthday'];
  $age = $row['age'];

  //Address
  $houseNumber = $row['houseNumber'];
  $block = $row['block'];
  $lot = $row['lot'];
  $street = $row['street'];
  $subdivision = $row['subdivision'];
  $barangay = $row['barangay'];
  $city = $row['city'];
  $province = $row['province'];
  $country = $row['country'];
  $zipcode = $row['zipcode'];

  //employment
  $dateHired = $row['dateHired'];
  $jobStatus = $row['jobStatus'];
  $position = $row['positionID'];
  $departmentName = $row['departmentName'];
  $basicSalary = $row['basicSalary'];
  $basicSalary = number_format($basicSalary, 2);

  //government numbers
  $bankAccountNumber = $row['bankAccountNumber'];
  $sssNumber = $row['sssNumber'];
  $philhealthNumber = $row['philhealthNumber'];
  $pagibigNumber = $row['pagibigNumber'];
  $taxIdentificationNumber = $row['taxIdentificationNumber'];

  if ($block != "") {
    $block = ltrim($block, 'Block ');
  }

  if ($lot != "") {
    $lot = ltrim($lot, 'Lot ');
  }

  if ($houseNumber != "") {
    $houseNumber = ltrim($houseNumber, 'House #');
  }

  if ($street != "") {
    $street = ltrim($street, ' St.');
  }
?>

<div class="dimmer active">
	<div id="loader"></div>
	<div id="dimmer-content">

		<div class="page-header">
		  <h1 class="page-title">
		    Edit Employee Information
		  </h1>
		</div>
		<!-- /page-header -->

		<form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" id="editEmployeeForm" enctype="multipart/form-data">
		  
			<div class="row mb-0 pb-0">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="card" style="width: 375px; height: 375px;">
						<div class="form-group">
                            <div class="edit_avatar-upload">
                                <div class="edit_avatar-edit">
                                    <input type="file" name="edit_profilePicture" id="edit_profilePicture" accept="image/*"/>
                                    <label for="edit_profilePicture"><i class="fe fe-edit-2"></i></label>
                                </div>
                                <div class="edit_avatar-preview">
                                    <div id="edit_imagePreview" style="background-image: url(<?php if ($profilePicture != "") { echo $profilePicture; } else { ?> ../assets/logo/image_placeholder.png <?php } ?>);"></div>
                                </div>
                            </div>
                            <span id="edit_profilePicture_error" class="invalid-feedback"></span>
                        </div>
					</div>

					<div class="row">
						<div class="col-md-12 col-xs-12">
				            <div class="card text-white bg-lime mb-1">
				              <div class="card-body p-3">
				                 <h6 class="card-title"><i class="fe fe-user-plus"></i> Employment Details</h6>
				              </div>
				            </div>

				            <div class="card">
				              <div class="card-body">
				                <div class="form-group">
				                    <label class="form-label" for="edit_date_hired">Date Hired<span class="text-danger">*</span></label>
				                    <input class="form-control" id="edit_date_hired" name="edit_date_hired" value="<?=$dateHired;?>" />
				                    <span class="invalid-feedback" id="edit_date_hired_error"></span>
				                </div>

				                <div class="form-group">
				                     <label class="form-label" for="edit_position" required>Position<span class="text-danger">*</span></label>
				                     <select class="form-control" id="edit_position" name="edit_position">
				                         <option value="">Select a position.</option>
				                        <?php
				                            $status = 1;
				                            $option = $config->runQuery("SELECT * FROM positiontbl WHERE status=:status");
				                            $option->execute(array(":status" => $status));
				                            while ($col = $option->fetch(PDO::FETCH_ASSOC)) {
				                                ?>
				                                    <option value="<?=$col['positionID'];?>" <?php if($col['positionID']==$position): ?> selected <?php endif ?> ><?=$col['positionName'];?></option>
				                                <?php
				                            }
				                        ?>
				                     </select>
				                     <span id="edit_position_error" class="invalid-feedback"></span>
				                </div>

				                <div class="form-group">
				                     <label class="form-label" for="edit_basic_salary">Basic Salary</label>
				                     <input type="text" name="edit_basic_salary" class="form-control" id="edit_basic_salary" placeholder="Basic Salary" value="<?=$basicSalary;?>" readonly/>
				                </div>

				                <div class="row">
				                    <div class="col-md-3 col-xs-12">
				                        <label class="form-label">Status<span class="text-danger">*</span></label>
				                    </div>
				                    <div class="col-md-3 col-xs-12">
				                        <div class="custom-control custom-radio">
				                            <input type="radio" class="custom-control-input" id="edit_regular" name="edit_status" value="1" <?php if($jobStatus == 1) : ?> checked <?php endif ?> />
				                            <label class="custom-control-label" for="edit_regular">Regular</label>
				                        </div>
				                    </div>
				                    <div class="col-md-5 col-xs-12">
				                        <div class="custom-control custom-radio">
				                            <input type="radio" class="custom-control-input" id="edit_probationary" name="edit_status" value="0" <?php if($jobStatus == 0) : ?> checked <?php endif ?> />
				                            <label class="custom-control-label" for="edit_probationary">Non-Regular</label>
				                        </div>
				                    </div>
				                </div>
				                <br>
				                <div class="form-group">
				                     <label class="form-label" for="edit_bank_account">Bank Account Number</label>
				                     <input type="text" class="form-control" id="edit_bank_account" placeholder="xxxx-xxxx-xx" name="edit_bank_account" data-mask="0000-0000-00" data-mask-clearifnotmatch="true" value="<?=$bankAccountNumber;?>" />
				                </div>

				              </div>
				            </div>
				         </div> <!-- /col -->
					</div>

				</div>

				<div class="clearfix"></div>

				<div class="col-md-8 col-sm-12 col-xs-12">
			        <div class="card text-white bg-lime mb-1">
			          <div class="card-body p-3">
			             <h6 class="card-title"><i class="fe fe-user"></i> Personal Details</h6>
			          </div>
			        </div>
					
		        	<input type="hidden" name="hiddenEditEmployeeID" id="hiddenEditEmployeeID" value="<?=$id;?>" />

			        <div class="card">
			          <div class="card-body">

			          	<div class="row">
			              <div class="col-md-4">
			                <div class="form-group">
			                  <label for="edit_firstname" class="form-label"><b>First Name</b><span class="text-danger">*</span></label>
			                  <input type="text" class="form-control" name="edit_firstname" id="edit_firstname" placeholder="First Name" value="<?=$firstName;?>">
			                  <span id="edit_firstname_error" class="invalid-feedback"></span>
			                </div>
			              </div>

			              <div class="col-md-4">
			                <div class="form-group">
			                  <label for="edit_middlename" class="form-label"><b>Middle Name</b></label>
			                  <input type="text" class="form-control" name="edit_middlename" id="edit_middlename" placeholder="Middle Name" value="<?=$middleName;?>">
			                  <span id="edit_middlename_error" class="invalid-feedback"></span>
			                </div>
			              </div>

			              <div class="col-md-4">
			                <div class="form-group">
			                  <label for="edit_lastname" class="form-label"><b>Last Name</b><span class="text-danger">*</span></label>
			                  <input type="text" class="form-control" name="edit_lastname" id="edit_lastname" placeholder="Last Name" value="<?=$lastName;?>">
			                  <span id="edit_lastname_error" class="invalid-feedback"></span>
			                </div>
			              </div>
			            </div>

			            <div class="row">
			              <div class="col-md-6">
			                <div class="form-group">
			                  <label for="edit_contact_number" class="form-label"><b>Contact Number</b><span class="text-danger">*</span></label>
			                  <input type="text" class="form-control" name="edit_contact_number" id="edit_contact_number" value="<?=$contactNumber;?>"/>
			                  <span id="edit_contact_number_error" class="invalid-feedback"></span>
			                </div>
			              </div>

			              <div class="col-md-6">
			                <div class="form-group">
			                  <label for="edit_email" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
			                  <input type="email" class="form-control" name="edit_email" id="edit_email" placeholder="Email" value="<?=$email;?>">
			                  <span id="edit_email_error" class="invalid-feedback"></span>
			                </div>
			              </div>
			            </div>

			            <div class="row">
			              <div class="col-md-2">
			                <div class="form-group">
			                    <label class="form-label"><b>Gender</b></label>
			                </div>
			              </div>

			              <div class="col-md-2">
			                <div class="form-group">
			                    <div class="custom-control custom-radio">
			                      <input type="radio" class="custom-control-input" id="edit_male" name="edit_gender" value="1" checked />
			                      <label class="custom-control-label" for="edit_male">Male</label>
			                  </div>
			                </div>
			              </div>

			              <div class="col-md-2">
			                <div class="form-group">
			                  <div class="custom-control custom-radio">
			                      <input type="radio" class="custom-control-input" id="edit_female" name="edit_gender" value="0" />
			                      <label class="custom-control-label" for="edit_female">Female</label>
			                  </div>
			                </div>
			              </div>
			            </div>

			            <div class="row">
			              <div class="col-md-6">
			                <div class="form-group">
			                  <label for="edit_birthday" class="form-label"><b>Birthday</b><span class="text-danger">*</span></label>
			                  <input type="text" class="form-control" name="edit_birthday" id="edit_birthday" value="<?=$birthday;?>"/>
			                  <span id="edit_birthday_error" class="invalid-feedback"></span>
			                </div>
			              </div>
			              <script type="text/javascript">
			                require(['datepicker', 'jquery'], function(datepicker, $) {
			                   /**
			                    * Calculate age based on the given date of birth
			                    */
			                      $('#edit_birthday').datepicker({
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

			                          $('#edit_age').val(age);

			                      });
			                  });
			              </script>

			              <div class="col-md-6">
			                <div class="form-group">
			                  <label for="edit_age" class="form-label"><b>Age</b></label>
			                  <input type="text" class="form-control" name="edit_age" id="edit_age" value="<?=$age;?>" readonly />
			                </div>
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="edit_house_number" class="form-label"><b>Address</b><span class="text-danger">*</span></label>
			            </div>

			            <div class="row">

			                <div class="col-md-3 col-sm-6">
			                  <div class="form-group">
			                    <small class='form-text text-muted'>House Number</small>
			                    <input type="text" class="form-control" name="edit_house_number" id="edit_house_number" placeholder="House #" value="<?=$houseNumber;?>" />
			                  </div>
			                </div>

			                <div class="col-md-3 col-sm-6">
			                  <div class="form-group">
			                    <small class='form-text text-muted'>Block</small>
			                    <input type="text" class="form-control" name="edit_block" id="edit_block" placeholder="Block" value="<?=$block;?>"/>
			                  </div>
			                </div>

			                <div class="col-md-3 col-sm-6">
			                  <div class="form-group">
			                    <small class='form-text text-muted'>Lot</small>
			                    <input type="text" class="form-control" name="edit_lot" id="edit_lot" placeholder="Lot" value="<?=$lot;?>"/>
			                  </div>
			                </div>

			                <div class="col-md-3 col-sm-6">
			                  <div class="form-group">
			                    <small class='form-text text-muted'>Street</small>
			                    <input type="text" class="form-control" name="edit_street" id="edit_street" placeholder="Street" value="<?=$street;?>"/>
			                  </div>
			                </div>

			            </div>

			            <div class="row">
			              <div class="col-md-4">
			                <div class="form-group">
			                  <small class='form-text text-muted'>Subdivision</small>
			                  <input type="text" class="form-control" name="edit_subdivision" id="edit_subdivision" placeholder="Subdivision" value="<?=$subdivision;?>"/>
			                </div>
			              </div>

			              <div class="col-md-4">
			                <div class="form-group">
			                  <small class='form-text text-muted'>Barangay</small>
			                  <input type="text" class="form-control" name="edit_barangay" id="edit_barangay" placeholder="Barangay" value="<?=$barangay;?>"/>
			                </div>
			              </div>

			              <div class="col-md-4">
			                <div class="form-group">
			                  <small class='form-text text-muted'>City/Municipality</small>
			                  <input type="text" class="form-control" name="edit_city" id="edit_city" placeholder="City/Municipality" value="<?=$city;?>"/>
			                </div>
			              </div>       
			            </div>

			            <div class="row">
			              <div class="col-md-4">
			                <div class="form-group">
			                  <small class='form-text text-muted'>Province</small>
			                  <input type="text" class="form-control" name="edit_province" id="edit_province" placeholder="Province" value="<?=$province;?>"/>
			                </div>
			              </div>

			              <div class="col-md-4">
			                <div class="form-group">
			                  <small class='form-text text-muted'>Country</small>
			                  <input type="text" class="form-control" name="edit_country" id="edit_country" placeholder="Country" value="<?=$country;?>"/>
			                </div>
			              </div>

			              <div class="col-md-4">
			                <div class="form-group">
			                  <small class='form-text text-muted'>Zip Code</small>
			                  <input type="text" class="form-control" name="edit_zipcode" id="edit_zipcode" placeholder="0000" value="<?=$zipcode;?>"/>
			                </div>
			              </div>       
			            </div>


			          </div> <!-- /card-body -->
			        </div> <!-- /card -->

			        <div class="row py-0 my-0">
			          
			        </div> <!-- /row -->

			        <div class="row py-0 my-0">
			          <div class="col-md-12 col-xs-12">
			            <div class="card text-white bg-lime mb-1">
			              <div class="card-body p-3">
			                 <h6 class="card-title"><i class="fe fe-info"></i> Other Details</h6>
			              </div>
			            </div>


			            <div class="card">
			              <div class="card-body">
			              	<div class="row">
			              		<div class="col-sm-6 col-xs-12">
					                <div class="form-group">
					                     <label class="form-label" for="edit_SSS_number">SSS Number</label>
					                     <input type="text" name="edit_SSS_number" class="form-control" id="edit_SSS_number" placeholder="xx-xxxxxxx-x" data-mask="00-0000000-0" data-mask-clearifnotmatch="true" value="<?=$sssNumber;?>" />
					                </div>
			              		</div>
			              		<div class="col-sm-6 col-xs-12">
					                <div class="form-group">
					                     <label class="form-label" for="edit_philhealth_number">PhilHealth Number</label>
					                     <input type="text" name="edit_philhealth_number" class="form-control" id="edit_philhealth_number" placeholder="xx-xxxxxxxxx-x" data-mask="00-000000000-0" data-mask-clearifnotmatch="true" value="<?=$philhealthNumber;?>" />
					                </div>
			              		</div>
			              	</div>

			              	<div class="row">
			              		<div class="col-sm-6 col-xs-12">
					                <div class="form-group">
					                     <label class="form-label" for="edit_PAGIBIG_number">PAG-IBIG Number</label>
					                     <input type="text" class="form-control" id="edit_PAGIBIG_number" placeholder="xxxx-xxxx-xxxx" name="edit_PAGIBIG_number" data-mask="0000-0000-0000" data-mask-clearifnotmatch="true" value="<?=$pagibigNumber;?>" />
					                </div>
			              		</div>
			              		<div class="col-sm-6 col-xs-12">
					                <div class="form-group">
					                     <label class="form-label" for="edit_tin">Tax Identification Number</label>
					                     <input type="text" class="form-control" id="edit_tin" placeholder="xxx-xxx-xxx-xxx" name="edit_tin" data-mask="000-000-000-000" data-mask-clearifnotmatch="true" value="<?=$taxIdentificationNumber;?>"/>
					                </div>
			              		</div>
			              	</div>
			                
			              </div>
			            </div>
			            
			          </div> <!-- /col -->
			        </div> <!-- /row -->


				</div> <!-- /col-md-8 -->

			</div> <!-- /row -->

		  <div class="row py-0 my-0">
		    <div class="col-md-12">
		      <div class="card">
		        <div class="card-body">
		          <a class="btn btn-secondary btn-lg" role="button" href="./employee.php?id=<?=$id;?>">Cancel</a>
		          <div class="float-right">
		            <button class="btn btn-success btn-lg" type="submit" id="updateEmployeeProfileBtn">Save Changes</button>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>

		</form>
	</div>
</div>