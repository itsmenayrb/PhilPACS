 require(['sweetalert', 'datepicker', 'jquery'], function(Swal, datepicker, $) {
    $(document).ready(function() {

    	/**
		 * Preview uploaded image during adding of employee
		 */
		 $('#profilePicture').on('change', function() {
		 	previewImageUpload(this);
		 });

		 $('#edit_profilePicture').on('change', function() {
		 	previewUpdateImageUpload(this);
		 });


		 /**
		 * Auto populate salary everytime user change the position
		 * during adding of employee
		 */
		$('#position').on('change', function() {
			var id = $(this).val();
			// console.log(id);

			$.ajax({
				method: 'post',
				url: '../controllers/controller.employee.php',
				data: {
					id: id,
					getSalary: 1
				},
				dataType: 'json',
				success: function(response) {
					$('#basic_salary').val(response);
				}
			});

		});

		$('#edit_position').on('change', function() {
			var id = $(this).val();
			// console.log(id);

			$.ajax({
				method: 'post',
				url: '../controllers/controller.employee.php',
				data: {
					id: id,
					getSalary: 1
				},
				dataType: 'json',
				success: function(response) {
					$('#edit_basic_salary').val(response);
				}
			});

		});

		/**
		  * Restrict future dates
		  */
		 $('#date_hired').datepicker({
		 	startDate: '-100y',
		 	endDate: 'today'
		 });

		 $('#edit_date_hired').datepicker({
		 	startDate: '-100y',
		 	endDate: 'today'
		 });


		 //check email
		 // $('#email').on('blur change', function() {
		 // 	var email = $('#email').val();

		 // 	if (email == "") {
		 // 		$('#email_error').text("Email is required.");
			// 	$('#email').addClass('invalid-state');
			// 	$('#email_success').text("");
		 // 	} else {
		 // 		if (validateEmail(email) == false) {
			// 		$("#email_error").text(email_error);
			// 		$('#email').addClass('invalid-state');
			// 		$('#email_success').text("");
			// 	} else {
				 	
			// 	}
		 // 	}

			// return false;
		 // });

		 ///////////////////////////////////////
		 
		 $('.updateEmployeePasswordBtn').on('click', function() {
		 	var link = $(this).data('href');
		 	$('#hiddenHref').val(link);
		 });

		$('#passwordActionBtn').on('click', function(e) {
			e.preventDefault();

			var password_error = "";

			var reactivateAccountID = $('#hiddenReactivateAccountID').val();
			var deactivateAccountID = $('#hiddenDeactivateAccountID').val();
			var editEmployeeID = $('#hiddenEditEmployeeID2').val();
			var addEmployeeID = $('#hiddenAddEmployeeID').val();
			var removeEmployeeID = $('#hiddenRemoveID').val();
			var archiveID = $('#hiddenArchiveID').val();

			var id = $('#hiddenIDSession').val();
			var password = $('#passwordAction').val();

			if (password == "") {
				password_error = "Password is required.";
				$("#passwordAction_error").text(password_error);
				$('#passwordAction').addClass('is-invalid');

			} else {

				var form = $('#passwordForm');
				var formData = false;

				if (window.FormData) {
					formData = new FormData(form[0]);
				}

				$.ajax({
					type: 'post',
					url: '../controllers/controller.session.php',
					data: formData ? formData : form.serialize(),
					cache: false,
					contentType: false,
					processData: false,
					success: function(response) {
						$('#passwordAction').attr('disabled', 'disabled');
						$('#passwordActionBtn').addClass('btn-loading');
						setTimeout(function() {
							$('#passwordAction').removeAttr('disabled');
							$('#passwordActionBtn').removeClass('btn-loading');

							if (response == 'incorrect') {
								password_error = "Incorrect password.";
								$("#passwordAction_error").text(password_error);
								$('#passwordAction').addClass('is-invalid');
								$('#passwordAction').val("");
							}

							if (response == 'success') {
								// console.log(reactivateAccountID);
								// console.log(deactivateAccountID);
								// console.log(editEmployeeID);
								// console.log(addEmployeeID);
								// console.log(removeEmployeeID);

								//add employee
								if (addEmployeeID != "" && editEmployeeID == "" && removeEmployeeID == "" && deactivateAccountID == "" && reactivateAccountID == "" && archiveID == "") {
									var form = $('#addEmployeeForm');
									var formData = false;

									if (window.FormData) {
										formData = new FormData(form[0]);
									}

									$.ajax({
										type: 'post',
										url: '../controllers/controller.employee.php',
										data: formData ? formData : form.serialize(),
										cache: false,
										contentType: false,
										processData: false,
										success: function(response) {
											var err = response;
											if (err == "employee_exist") {
												require(['sweetalert'], function(Swal) {
													Swal.fire({
													  type: 'error',
													  title: "Employee already listed"
													});
												});
											}

											if (err == "email_exist") {
												require(['sweetalert'], function(Swal) {
													Swal.fire({
													  type: 'error',
													  title: "Email is already use"
													});
												});
											}

											if (err == "invalid_firstname"){
												require(['sweetalert'], function(Swal) {
													Swal.fire({
													  type: 'error',
													  title: "Invalid First Name"
													});
												});
											}

											if (err == "invalid_middlename") {
												require(['sweetalert'], function(Swal) {
													Swal.fire({
													  type: 'error',
													  title: "Invalid Middle Name"
													});
												});
											}

											if (err == "invalid_lastname") {
												require(['sweetalert'], function(Swal) {
													Swal.fire({
													  type: 'error',
													  title: "Invalid Last Name"
													});
												});
											}

											if (err == "invalid_image") {
												require(['sweetalert'], function(Swal) {
													Swal.fire({
													  type: 'error',
													  title: "Invalid Image"
													});
												});
											}


											if (err == "success"){
												require(['sweetalert'], function(Swal) {
													Swal.fire({
													  type: 'success',
													  title: "Employee Added Successfully!",
													  confirmButtonColor: '#3085d6',
													  confirmButtonText: 'OK'
													}).then((result) => {
													  if (result.value) {
													  	location.reload();
													  }
													});
												});
											}
										}
									}); // edit employee
								} else if (addEmployeeID == "" && editEmployeeID != "" && removeEmployeeID == "" && deactivateAccountID == "" && reactivateAccountID == ""  && archiveID == "") {
									var form = $('#editEmployeeForm');
									var formData = false;

									if (window.FormData) {
										formData = new FormData(form[0]);
									}

									$.ajax({
										type: 'post',
										url: '../controllers/controller.employee.php',
										data: formData ? formData : form.serialize(),
										cache: false,
										contentType: false,
										processData: false,
										success: function(response) {
											var err = JSON.parse(response);
											if (err.invalid_firstname){
												Swal.fire({
												  type: 'error',
												  title: err.invalid_firstname
												});
											}

											if (err.invalid_middlename) {
												Swal.fire({
												  type: 'error',
												  title: err.invalid_middlename
												});
											}

											if (err.invalid_lastname) {
												Swal.fire({
												  type: 'error',
												  title: err.invalid_lastname
												});
											}

											if (err.invalid_image) {
												Swal.fire({
												  type: 'error',
												  title: err.invalid_image
												});
											}

											if (err.success){
												Swal.fire({
												  type: 'success',
												  title: err.success,
												  confirmButtonColor: '#3085d6',
												  confirmButtonText: 'Great'
												}).then((result) => {
												  if (result.value) {
												  	window.location = './employee.php?id=' + editEmployeeID;
												  }
												});
											}
										}	
										
									});	//remove employee
								} else if (addEmployeeID == "" && editEmployeeID == "" && removeEmployeeID != "" && deactivateAccountID == "" && reactivateAccountID == ""  && archiveID == "") {
									$.ajax({
			                            type: 'post',
			                            url: '../controllers/controller.employee.php',
			                            data: {
			                              id: removeEmployeeID,
			                              removeEmployee: 1
			                            },
			                            success: function(response) {
			                            	$('#passwordModal').modal('hide');
			                                Swal.fire({
			                                  type: 'success',
			                                  title: 'Removed!',
			                                  text: 'Employee has been removed.',
			                                  confirmButtonColor: '#3085d6',
			                                  confirmButtonText: 'OK'
			                                }).then((result) => {
			                                  if (result.value) {
			                                    window.location = "./employee.php";
			                                  }
			                                });
			                            }
		                            }); //deactivate account
								} else if (addEmployeeID == "" && editEmployeeID == "" && removeEmployeeID == "" && deactivateAccountID != "" && reactivateAccountID == ""  && archiveID == "") {
									$.ajax({
								    	type: 'post',
										url: '../controllers/controller.employee.php',
										data: {
											id: deactivateAccountID,
											deactivateAccount: 1
										},
										success: function(response) {
												Swal.fire({
												  type: 'success',
												  title: 'Deactivated!',
												  text: 'Account has been deactivated.',
												  confirmButtonColor: '#3085d6',
												  confirmButtonText: 'OK'
												}).then((result) => {
												  if (result.value) {
												  	location.reload();
												  }
												});
										}
								    }); //reactivate account
								} else if (addEmployeeID == "" && editEmployeeID == "" && removeEmployeeID == "" && deactivateAccountID == "" && reactivateAccountID != ""  && archiveID == "") {
									$.ajax({
	                                    type: 'post',
	                                    url: '../controllers/controller.employee.php',
	                                    data: {
	                                      id: reactivateAccountID,
	                                      reactivateAccount: 1
	                                    },
	                                    success: function(response) {
	                                        Swal.fire({
	                                          type: 'success',
	                                          title: 'Re-activated!',
	                                          text: 'Account has been re-activated.',
	                                          confirmButtonColor: '#3085d6',
	                                          confirmButtonText: 'OK'
	                                        }).then((result) => {
	                                          if (result.value) {
	                                            location.reload();
	                                          }
	                                        });
	                                    }
	                                  }); // restoring archived
								} else if (addEmployeeID == "" && editEmployeeID == "" && removeEmployeeID == "" && deactivateAccountID == "" && reactivateAccountID == ""  && archiveID != "") {
									$.ajax({
	                                    type: 'post',
	                                    url: '../controllers/controller.archives.php',
	                                    data: {
	                                      id: archiveID,
	                                      restoreEmployee: 1
	                                    },
	                                    success: function(response) {
	                                        Swal.fire({
	                                          type: 'success',
	                                          title: 'Restored!',
	                                          text: 'Employee has been restore.',
	                                          confirmButtonColor: '#3085d6',
	                                          confirmButtonText: 'OK'
	                                        }).then((result) => {
	                                          if (result.value) {
	                                            location.reload();
	                                          }
	                                        });
	                                    }
	                                });
								}
							} //success

						}, 2000);

					}
				});	
			}
			return false;
		});

		// $('.updateEmployeePasswordBtn').on('click', function(e) {
		// 	e.preventDefault();


		// });


		/**
		 * Javascript file for employee management
		 * Perform client-side validation before send to the/**
		 * Self-created form-wizard
		 * Button for Next Button inside form
		 * Personal Details Section
		 * User will restrict to proceed to the next step if validation fails
		 */
		$('#personalDetailsBtnNext').on('click', function() {

			var firstname_error = "";
			var middlename_error = "";
			var lastname_error = "";
			var contact_number_error = "";
			var birthday_error = "";
			var email_error = "";
			var address_error = "";

			var firstname = $('#firstname').val();
			var middlename = $('#middlename').val();
			var lastname = $('#lastname').val();
			var contact_number = $('#contact_number').val();
			var birthday = $('#birthday').val();
			var email = $('#email').val();

			contact_number = formatContactNumber(contact_number);
			// console.log(contact_number);
			//address
			var house_number = $('#house_number').val();
			var block = $('#block').val();
			var lot = $('#lot').val();
			var street = $('#street').val();
			var subdivision = $('#subdivision').val();
			var barangay = $('#barangay').val();
			var province = $('#province').val();
			var city = $('#city').val();
			var country = $('#country').val();
			var zipcode = $('#zipcode').val();



			//firstname validation
			if ($.trim(firstname) == 0) {
				firstname_error = "First Name is required.";
				$("#firstname_error").text(firstname_error);
				$('#firstname').addClass('is-invalid');
			} else {
				if (validateName(firstname) == false) {
					firstname_error = "Invalid First Name.";
					$("#firstname_error").text(firstname_error);
					$('#firstname').addClass('is-invalid');
				} else {
					firstname_error = "";
					$("#firstname_error").text(firstname_error);
					$('#firstname').removeClass('is-invalid');
				}
			}

			//middlename validation
			if (validateName(middlename) == false) {
				middlename_error = "Invalid Middle Name.";
				$("#middlename_error").text(middlename_error);
				$('#middlename').addClass('is-invalid');
			} else {
				middlename_error = "";
				$("#middlename_error").text(middlename_error);
				$('#middlename').removeClass('is-invalid');
			}

			//lastname validation
			if (lastname == "") {
				lastname_error = "Last Name is required.";
				$("#lastname_error").text(lastname_error);
				$('#lastname').addClass('is-invalid');
			} else {
				if (validateName(lastname) == false) {
					lastname_error = "Invalid Last Name.";
					$("#lastname_error").text(lastname_error);
					$('#lastname').addClass('is-invalid');
				} else {
					lastname_error = "";
					$("#lastname_error").text(lastname_error);
					$('#lastname').removeClass('is-invalid');
				}
			}

			//contact number validation
			if (contact_number == "") {
				contact_number_error = "Contact Number is required.";
				$("#contact_number_error").text(contact_number_error);
				$('#contact_number').addClass('is-invalid');
			} else {
				if (validateContactNumber(contact_number) == false) {
					contact_number_error = "Invalid Contact Number.";
					$("#contact_number_error").text(contact_number_error);
					$('#contact_number').addClass('is-invalid');
				} else {
					contact_number_error = "";
					$("#contact_number_error").text(contact_number_error);
					$('#contact_number').removeClass('is-invalid');
				}
			}

			//email validation
			if (email == "") {
				email_error = "Email is required.";
				$("#email_error").text(email_error);
				$('#email').addClass('is-invalid');
			} else {
				if (validateEmail(email) == false) {
					email_error = "Invalid Email.";
					$("#email_error").text(email_error);
					$('#email').addClass('is-invalid');
				} else {
					email_error = "";
					$("#email_error").text(email_error);
					$('#email').removeClass('is-invalid');
				}
			}

			//email validation
			if (birthday == "") {
				birthday_error = "Birthday is required.";
				$("#birthday_error").text(birthday_error);
				$('#birthday').addClass('is-invalid');
			} else {
				birthday_error = "";
				$("#birthday_error").text(birthday_error);
				$('#birthday').removeClass('is-invalid');	
			}

			//Address validation

			if (barangay == "") {
				address_error = "Address should be complete. Input n/a if not applicable.";
				$("#address_error").text(address_error);
				$('#barangay').addClass('is-invalid');
			} else {
				address_error = "";
				$("#address_error").text(address_error);
				$('#barangay').removeClass('is-invalid');	
			}

			if (province == "") {
				address_error = "Address should be complete. Input n/a if not applicable.";
				$("#address_error").text(address_error);
				$('#province').addClass('is-invalid');
			} else {
				address_error = "";
				$("#address_error").text(address_error);
				$('#province').removeClass('is-invalid');	
			}

			if (city == "") {
				address_error = "Address should be complete. Input n/a if not applicable.";
				$("#address_error").text(address_error);
				$('#city').addClass('is-invalid');
			} else {
				address_error = "";
				$("#address_error").text(address_error);
				$('#city').removeClass('is-invalid');	
			}

			if (country == "") {
				address_error = "Address should be complete. Input n/a if not applicable.";
				$("#address_error").text(address_error);
				$('#country').addClass('is-invalid');
			} else {
				address_error = "";
				$("#address_error").text(address_error);
				$('#country').removeClass('is-invalid');	
			}

			if (zipcode != ""){
				if (validateContactNumber(zipcode) == false) {
					address_error = "Address should be complete. Input n/a if not applicable.";
					$("#address_error").text(address_error);
					$('#zipcode').addClass('is-invalid');
				} else {

					if (zipcode.length < 4) {
						address_error = "Address should be complete. Input n/a if not applicable.";
						$("#address_error").text(address_error);
						$('#zipcode').addClass('is-invalid');
					} else {

						address_error = "";
						$("#address_error").text(address_error);
						$('#zipcode').removeClass('is-invalid');	
					}
				}
			}
			
			//End of address validation


			//proceed to next step if no error encountered
			if (firstname_error == "" && middlename_error == "" && lastname_error == "" && contact_number_error == "" && birthday_error == "" && address_error == "") {

				$.ajax({
					method: 'post',
					url: '../controllers/controller.employee.php',
					data: {
						email: email,
						checkEmail: 1
					},
					success: function(response) {
						if (response == 'error') {
							email_error = "Email is already use.";
							$("#email_error").text(email_error);
							$('#email').addClass('is-invalid');
							$('#email').focus();
						}

						if (response == 'success') {
							$('#personalDetailsTab').removeClass('active');
							$('#navPersonalDetailsTab').removeAttr('href data-toggle');
							$('#navPersonalDetailsTab').removeClass('active');
							$('#navPersonalDetailsTab').addClass('disabled');
							$('#first').removeClass('text-success');
							

							$('#navEmploymentDetailsTab').removeClass('disabled');
							$('#navEmploymentDetailsTab').addClass('active');
							$('#navEmploymentDetailsTab').attr('href', '#employmentDetailsTab');
							$('#navEmploymentDetailsTab').attr('data-toggle', 'tab');
							$('#employmentDetailsTab').addClass('active in');
							$('#second').addClass('text-success');
							
						}
					}
				});


			}

			return false;
		});

		//Button for previous button at Employment Details Section
		$('#employmentDetailsBtnPrevious').on('click', function() {
			$('#personalDetailsTab').addClass('active in');
			$('#navPersonalDetailsTab').attr('data-toggle', 'tab');
			$('#navPersonalDetailsTab').attr('href', '#personalDetailsTab');
			$('#navPersonalDetailsTab').removeClass('disabled');
			$('#navPersonalDetailsTab').addClass('active');
			$('#first').addClass('text-success');
			

			$('#navEmploymentDetailsTab').removeClass('active');
			$('#navEmploymentDetailsTab').removeAttr('href', 'data-toggle');
			$('#navEmploymentDetailsTab').addClass('disabled');
			$('#employmentDetailsTab').removeClass('active');
			$('#second').removeClass('text-success');

		});

	//Button for next button at employment details section
		$('#employmentDetailsBtnNext').on('click', function(e) {
			e.preventDefault();

			// var employee_id_error = "";
			var date_hired_error = "";
			var position_error = "";

			// var old_employee = $('#old_employee');
			// var employee_id = "";
			var position = $('#position').val();
			var date_hired = $('#date_hired').val();
			var status = $('input[name=status]:checked').val();
			var job_status;

			// console.log("status: " + status);
			// console.log("date: " + date_hired);
			// console.log("Pos" + position);

			if (date_hired == "") {
				date_hired_error = "Date Hired is required.";
				$("#date_hired_error").text(date_hired_error);
				$('#date_hired').addClass('is-invalid');
			} else {
				date_hired_error = "";
				$("#date_hired_error").text(date_hired_error);
				$('#date_hired').removeClass('is-invalid');
			}

			if (position == "") {
				position_error = "Position is required.";
				$("#position_error").text(position_error);
				$('#position').addClass('is-invalid');
			} else {
				position_error = "";
				$("#position_error").text(position_error);
				$('#position').removeClass('is-invalid');
			}

			// if(old_employee.is(':checked')) {
			// 	employee_id = $('#employee_id').val();

			// 	if (employee_id == "") {
			// 		employee_id_error = "Employee ID is required.";
			// 		$("#employee_id_error").text(employee_id_error);
			// 		$('#employee_id').addClass('is-invalid');
			// 	} else {
			// 		employee_id_error = "";
			// 		$("#employee_id_error").text(employee_id_error);
			// 		$('#employee_id').removeClass('is-invalid');
			// 	}

			// } else {
			// 	employee_id = "";
			// 	$('#employee_id').val(employee_id);
			// }

			if (position_error == "" && date_hired_error == "") {
				$('#employmentDetailsTab').removeClass('active');
				$('#navEmploymentDetailsTab').removeAttr('href data-toggle');
				$('#navEmploymentDetailsTab').removeClass('active');
				$('#navEmploymentDetailsTab').addClass('disabled');
				$('#second').removeClass('text-success');

				$('#navOtherInfoTab').removeClass('disabled');
				$('#navOtherInfoTab').addClass('active');
				$('#navOtherInfoTab').attr('href', '#employmentDetailsTab');
				$('#navOtherInfoTab').attr('data-toggle', 'tab');
				$('#otherInfoTab').addClass('active in');
				$('#third').addClass('text-success');
			}

			return false;

		});

		$('#otherInfoBtnPrevious').on('click', function() {
			$('#employmentDetailsTab').addClass('active in');
			$('#navEmploymentDetailsTab').attr('data-toggle', 'tab');
			$('#navEmploymentDetailsTab').attr('href', '#personalDetailsTab');
			$('#navEmploymentDetailsTab').removeClass('disabled');
			$('#navEmploymentDetailsTab').addClass('active');
			$('#second').addClass('text-success');

			$('#navOtherInfoTab').removeClass('active');
			$('#navOtherInfoTab').removeAttr('href', 'data-toggle');
			$('#navOtherInfoTab').addClass('disabled');
			$('#otherInfoTab').removeClass('active');
			$('#third').removeClass('text-success');
		}); 

		/**
		 * Adding of employee
		 * Send data through ajax
		 */
		$('#addEmployeeBtn').on('click', function(e) {
			e.preventDefault();
			var id = 1;
			$('#loader').addClass('loader');
			$('#dimmer-content').addClass('dimmer-content');
			setTimeout(function() {
				$('#loader').removeClass('loader');
				$('#dimmer-content').removeClass('dimmer-content');
				$('#passwordModal').modal('show');
				$('#hiddenAddEmployeeID').val(id);

			}, 2000) 
		});

		//Updating of employee information
		$('#updateEmployeeProfileBtn').on('click', function(e) {
			e.preventDefault();

			var firstname_error = "";
			var middlename_error = "";
			var lastname_error = "";
			var contact_number_error = "";
			var birthday_error = "";
			var email_error = "";
			var address_error = "";
			var date_hired_error = "";
			var position_error = "";


			var id = $('#hiddenEditEmployeeID').val();			
			var firstname = $('#edit_firstname').val();
			var middlename = $('#edit_middlename').val();
			var lastname = $('#edit_lastname').val();
			var contact_number = $('#edit_contact_number').val();
			var email = $('#edit_email').val();
			var birthday = $('#edit_birthday').val();
			var age = $('#edit_age').val();

			contact_number = formatContactNumber(contact_number);

			//address
			var house_number = $('#edit_house_number').val();
			var block = $('#edit_block').val();
			var lot = $('#edit_lot').val();
			var street = $('#edit_street').val();
			var subdivision = $('#edit_subdivision').val();
			var barangay = $('#edit_barangay').val();
			var city = $('#edit_city').val();
			var province = $('#edit_province').val();
			var country = $('#edit_country').val();
			var zipcode = $('#edit_zipcode').val();

			//numbers
			var sssNumber = $('#edit_SSS_number').val();
			var philhealthNumber = $('#edit_philhealth_number').val();
			var pagibigNumber = $('#edit_PAGIBIG_number').val();
			var tin = $('#edit_tin').val();
			var bankAccountNumber = $('#edit_bank_account').val();

			//employment
			var position = $('#edit_position').val();
			var date_hired = $('#edit_date_hired').val();
			var status = $('input[name=edit_status]:checked').val();


			//firstname validation
			if ($.trim(firstname) == 0) {
				firstname_error = "First Name is required.";
				$("#edit_firstname_error").text(firstname_error);
				$('#edit_firstname').addClass('is-invalid');
				$('#edit_firstname').focus();

			} else {
				if (validateName(firstname) == false) {
					firstname_error = "Invalid First Name.";
					$("#edit_firstname_error").text(firstname_error);
					$('#edit_firstname').addClass('is-invalid');
					$('#edit_firstname').focus();
				} else {
					firstname_error = "";
					$("#edit_firstname_error").text(firstname_error);
					$('#edit_firstname').removeClass('is-invalid');
				}
			}

			//middlename validation
			if (validateName(middlename) == false) {
				middlename_error = "Invalid Middle Name.";
				$("#edit_middlename_error").text(middlename_error);
				$('#edit_middlename').addClass('is-invalid');
				$('#edit_middlename').focus();
			} else {
				middlename_error = "";
				$("#edit_middlename_error").text(middlename_error);
				$('#edit_middlename').removeClass('is-invalid');
			}

			//lastname validation
			if (lastname == "") {
				lastname_error = "Last Name is required.";
				$("#edit_lastname_error").text(lastname_error);
				$('#edit_lastname').addClass('is-invalid');
				$('#edit_lastname').focus();
			} else {
				if (validateName(lastname) == false) {
					lastname_error = "Invalid Last Name.";
					$("#edit_lastname_error").text(lastname_error);
					$('#edit_lastname').addClass('is-invalid');
					$('#edit_lastname').focus();
				} else {
					lastname_error = "";
					$("#edit_lastname_error").text(lastname_error);
					$('#edit_lastname').removeClass('is-invalid');
				}
			}

			//contact number validation
			if (contact_number == "") {
				contact_number_error = "Contact Number is required.";
				$("#edit_contact_number_error").text(contact_number_error);
				$('#edit_contact_number').addClass('is-invalid');
				$('#edit_contact_number').focus();
			} else {
				if (validateContactNumber(contact_number) == false) {
					contact_number_error = "Invalid Contact Number.";
					$("#edit_contact_number_error").text(contact_number_error);
					$('#edit_contact_number').addClass('is-invalid');
					$('#edit_contact_number').focus();
				} else {
					contact_number_error = "";
					$("#edit_contact_number_error").text(contact_number_error);
					$('#edit_contact_number').removeClass('is-invalid');
				}
			}

			//email validation
			if (email == "") {
				email_error = "Email is required.";
				$("#edit_email_error").text(email_error);
				$('#edit_email').addClass('is-invalid');
				$('#edit_email').focus();
			} else {
				if (validateEmail(email) == false) {
					email_error = "Invalid Email.";
					$("#edit_email_error").text(email_error);
					$('#edit_email').addClass('is-invalid');
					$('#edit_email').focus();
				} else {
					email_error = "";
					$("#edit_email_error").text(email_error);
					$('#edit_email').removeClass('is-invalid');
				}
			}

			//email validation
			if (birthday == "") {
				birthday_error = "Birthday is required.";
				$("#edit_birthday_error").text(birthday_error);
				$('#edit_birthday').addClass('is-invalid');
				$('#edit_birthday').focus();
			} else {
				birthday_error = "";
				$("#edit_birthday_error").text(birthday_error);
				$('#edit_birthday').removeClass('is-invalid');	
			}

			//Address validation

			if (barangay == "") {
				address_error = "Address should be complete. Input n/a if not applicable.";
				$("#edit_address_error").text(address_error);
				$('#edit_barangay').addClass('is-invalid');
				$('#edit_barangay').focus();
			} else {
				address_error = "";
				$("#edit_address_error").text(address_error);
				$('#edit_barangay').removeClass('is-invalid');	
			}

			if (province == "") {
				address_error = "Address should be complete. Input n/a if not applicable.";
				$("#edit_address_error").text(address_error);
				$('#edit_province').addClass('is-invalid');
				$('#edit_province').focus();
			} else {
				address_error = "";
				$("#edit_address_error").text(address_error);
				$('#edit_province').removeClass('is-invalid');	
			}

			if (city == "") {
				address_error = "Address should be complete. Input n/a if not applicable.";
				$("#edit_address_error").text(address_error);
				$('#edit_city').addClass('is-invalid');
				$('#edit_city').focus();
			} else {
				address_error = "";
				$("#edit_address_error").text(address_error);
				$('#edit_city').removeClass('is-invalid');	
			}

			if (country == "") {
				address_error = "Address should be complete. Input n/a if not applicable.";
				$("#edit_address_error").text(address_error);
				$('#edit_country').addClass('is-invalid');
				$('#edit_country').focus();
			} else {
				address_error = "";
				$("#edit_address_error").text(address_error);
				$('#edit_country').removeClass('is-invalid');	
			}

			if (zipcode != ""){
				if (validateContactNumber(zipcode) == false) {
					address_error = "Address should be complete. Input n/a if not applicable.";
					$("#edit_address_error").text(address_error);
					$('#edit_zipcode').addClass('is-invalid');
					$('#edit_zipcode').focus();
				} else {
					address_error = "";
					$("#edit_address_error").text(address_error);
					$('#edit_zipcode').removeClass('is-invalid');	
				}
			}
			
			//End of address validation
			
			if (date_hired == "") {
				date_hired_error = "Date Hired is required.";
				$("#edit_date_hired_error").text(date_hired_error);
				$('#edit_date_hired').addClass('is-invalid');
				$('#edit_date_hired').focus();
			} else {
				date_hired_error = "";
				$("#edit_date_hired_error").text(date_hired_error);
				$('#edit_date_hired').removeClass('is-invalid');
			}

			if (position == "") {
				position_error = "Position is required.";
				$("#edit_position_error").text(position_error);
				$('#edit_position').addClass('is-invalid');
				$('#edit_position').focus();
			} else {
				position_error = "";
				$("#edit_position_error").text(position_error);
				$('#edit_position').removeClass('is-invalid');
			}

			if (firstname_error == "" && middlename_error == "" && lastname_error == "" && contact_number_error == "" && birthday_error == "" && email_error == "" && address_error == "" && date_hired_error == "" && position_error == "") {
				
				var id = $('#hiddenEditEmployeeID').val();

					$('#passwordModal').modal('show');
					$('#hiddenEditEmployeeID2').val(id);

				}

			return false;
			
		});

 		//creating of account
 		$('.createAccountLinkModal').on('click', function(){
	      var id = $(this).data('id');
	      $('#hiddenPersonalIDAccount').val(id);
	      // console.log(id);
	     });

 		$('#createAccountBtn').on('click', function(e){
		 	e.preventDefault();

		 	var username_error = "";
		 	var password_error = "";
		 	var rpassword_error = "";

		 	var id = $('#hiddenPersonalIDAccount').val();
		 	var username = $('#username').val();
		 	var password = $('#password').val();
		 	var rpassword = $('#rpassword').val();
		 	var accountType = $('input[name=accountType]:checked').val();

		 	if (username == "") {
				username_error = "Username is required.";
				$("#username_error").text(username_error);
				$('#username').addClass('is-invalid');
			} else {
				username_error = "";
				$("#username_error").text(username_error);
				$('#username').removeClass('is-invalid');	
			}

			if (password == "") {
				password_error = "Password is required.";
				$("#password_error").text(password_error);
				$('#password').addClass('is-invalid');
			} else {
				if (validatePassword(password) == false) {
					password_error = "Password must be at least 6 characters and composed of alphanumeric characters.";
					$("#password_error").text(password_error);
					$('#password').addClass('is-invalid');
				} else {
					pasword_error = "";
					$("#password_error").text(password_error);
					$('#password').removeClass('is-invalid');
				}
			}

			if (rpassword == "") {
				rpassword_error = "Please re-type your password.";
				$("#rpassword_error").text(rpassword_error);
				$('#rpassword').addClass('is-invalid');
			} else {
				if (password != rpassword) {
					rpassword_error = "Password did not match.";
					$("#rpassword_error").text(rpassword_error);
					$('#rpassword').addClass('is-invalid');
					password_error = "Password did not match";
					$("#password_error").text(password_error);
					$('#password').addClass('is-invalid');
				} else {
					rpassword_error = "";
					$("#rpassword_error").text(rpassword_error);
					$('#rpassword').removeClass('is-invalid');
				}
			}

			if (username_error == "" && password_error == "" && rpassword_error == "") {
			

				// var form = $('#createAccountForm');
				// var formData = false;

				// if (window.FormData) {
				// 	formData = new FormData(form[0]);
				// }

				$.ajax({
					type: 'post',
					url: '../controllers/controller.employee.php',
					data: {
						id: id,
						username: username,
						password: password,
						rpassword: rpassword,
						accountType: accountType,
						createAccount: 1
					},
					dataType: 'json',
					success: function(response) {
						

							if (response.empty_password){
								Swal.fire({
								  type: 'error',
								  title: response.empty_password
								});
							}

							if (response.empty_rpassword) {
								Swal.fire({
								  type: 'error',
								  title: response.empty_rpassword
								});
							}

							if (response.error_password) {
								Swal.fire({
								  type: 'error',
								  title: response.error_password
								});
							}

							if (response.success) {
								Swal.fire({
								  type: 'success',
								  title: response.success,
								  confirmButtonColor: '#3085d6',
								  confirmButtonText: 'OK'
								}).then((result) => {
								  if (result.value) {
								  	location.reload();
								  }
								});
							}
					}
				});
			}

			return false;

		 });

 		//updating of user account
 		$('#resetPasswordBtn').on('click', function(e){
		 	e.preventDefault();

		 	var password_error = "";
		 	var rpassword_error = "";

		 	var id = $('#hiddenPersonalIDResetPassword').val();
		 	var password = $('#reset_password').val();
		 	var rpassword = $('#reset_rpassword').val();


			if (password == "") {
				password_error = "Password is required.";
				$("#reset_password_error").text(password_error);
				$('#reset_password').addClass('is-invalid');
			} else {
				pasword_error = "";
				$("#reset_password_error").text(password_error);
				$('#reset_password').removeClass('is-invalid');	
			}

			if (rpassword == "") {
				rpassword_error = "Please re-type your password.";
				$("#reset_rpassword_error").text(rpassword_error);
				$('#reset_rpassword').addClass('is-invalid');
			} else {
				if (password != rpassword) {
					rpassword_error = "Password did not match.";
					$("#reset_rpassword_error").text(rpassword_error);
					$('#reset_rpassword').addClass('is-invalid');
					password_error = "Password did not match";
					$("#reset_password_error").text(password_error);
					$('#reset_password').addClass('is-invalid');
				} else {
					rpassword_error = "";
					$("#reset_rpassword_error").text(rpassword_error);
					$('#reset_rpassword').removeClass('is-invalid');
				}
			}

			if (password_error == "" && rpassword_error == "") {
				var form = $('#resetPasswordForm');
				var formData = false;

				if (window.FormData) {
					formData = new FormData(form[0]);
				}

				$.ajax({
					type: 'post',
					url: '../controllers/controller.employee.php',
					data: formData ? formData : form.serialize(),
					cache: false,
					contentType: false,
					processData: false,
					dataType: 'json',
					success: function(response) {
						$('#loader').addClass('loader');
            $('#dimmer-content').addClass('dimmer-content');
            setTimeout(function() {
              $('#loader').removeClass('loader');
              $('#dimmer-content').removeClass('dimmer-content');
							if (response.username_exist) {
								Swal.fire({
								  type: 'error',
								  title: response.username_exist
								});
							}

							if (response.empty_username) {
								Swal.fire({
								  type: 'error',
								  title: response.empty_username
								});
							}

							if (response.empty_password){
								Swal.fire({
								  type: 'error',
								  title: response.empty_password
								});
							}

							if (response.empty_rpassword) {
								Swal.fire({
								  type: 'error',
								  title: response.empty_rpassword
								});
							}

							if (response.error_password) {
								Swal.fire({
								  type: 'error',
								  title: response.error_password
								});
							}

							if (response.success) {
								Swal.fire({
								  type: 'success',
								  title: response.success,
								  confirmButtonColor: '#3085d6',
								  confirmButtonText: 'OK'
								}).then((result) => {
								  if (result.value) {
								  	location.reload();
								  }
								});
							}
						}, 2000);
					}
				});
			}

			return false;

		 });

 		//deactivating of account
 		$('#deactivateAccountBtn').on('click', function(e) {
		 	e.preventDefault();

		 	var id = $('#hiddenPersonalIDResetPassword').val();		 	
		 	Swal.fire({
			  title: 'Are you sure?',
			  text: 'Deactivate this account?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, deactivate!'
			}).then((result) => {
			  if (result.value) {
			  	$('#hiddenDeactivateAccountID').val(id);
			  	$('#resetPasswordModal').modal('hide');
                $('#passwordModal').modal('show');
			    
			  }
			});

		 });

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		/**
		 * Function for email validation
		 */
		function validateEmail(email) {
	      var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
	      return re.test(email);
	    }

	    /**
	     * Function for name validation
	     */
	    function validateName(name) {
	    	var re = /^[A-Za-z\s]*$/;
	    	return re.test(name);
	    }

	    /**
	     * Function for name validation
	     */
	    function validatePassword(password) {
	    	var re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
	    	return re.test(password);
	    }

	    /**
	     * Function for contact number validation
	     */
	    function validateContactNumber(number) {
	    	var re = /^[0-9]*$/;
	    	return re.test(number);
	    }

	    function formatContactNumber(number) {
	    	var re = number.replace(/-/g, "");
	    	return re;
	    }

	    /**
	     * Function for Image preview
	     */
	    function previewImageUpload(image) {

	    	if (validateImage(image) == true) {

		    	if (image.files && image.files[0]) {

			        var reader = new FileReader();
			        reader.onload = function(e) {
			            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
			            $('#imagePreview').hide();
			            $('#imagePreview').fadeIn(650);
			        }
			        reader.readAsDataURL(image.files[0]);
			    }

	    	} else {
	    		Swal.fire({
				  type: 'error',
				  title: 'Invalid Image!',
				  confirmButtonColor: '#3085d6',
				  confirmButtonText: 'OK'
				})
	    	}

	    }

	    function previewUpdateImageUpload(image) {

	    	if (validateImage(image) == true) {

		    	if (image.files && image.files[0]) {

			        var reader = new FileReader();
			        reader.onload = function(e) {
			            $('#edit_imagePreview').css('background-image', 'url('+e.target.result +')');
			            $('#edit_imagePreview').hide();
			            $('#edit_imagePreview').fadeIn(650);
			        }
			        reader.readAsDataURL(image.files[0]);
			    }

	    	} else {
	    		Swal.fire({
				  type: 'error',
				  title: 'Invalid Image!',
				  confirmButtonColor: '#3085d6',
				  confirmButtonText: 'OK'
				})
	    	}

	    }

	    function validateImage(image) {
	    	var _validateFileExtensions = [".jpg", ".jpeg", ".JPG", ".JPEG", ".png", ".PNG"];

	    	if (image.type == 'file'){
	    		var filename =  image.value;
	    		if (filename.length > 0) {
	    			var valid = false;
	    			for (var j=0; j<_validateFileExtensions.length; j++) {
	    				var sCurExtension = _validateFileExtensions[j];
	    				if (filename.substr(filename.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
	    					valid = true;
	    					break;
	    				}
	    			}
	    			if (!valid) {
	    				
	    				image.value = "";
	    				return false;
	    			}
	    		}
	    	}
	    	return true;
	    }

    });
});