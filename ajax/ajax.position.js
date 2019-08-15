/**
 * Javascript file for adding, updating and archiving position
 * @author: Bryan Balaga
 */
require(['sweetalert', 'datepicker', 'jquery'], function(Swal, datepicker, $) {
	$(document).ready(function() {

		/**
		 * Function for number formatting
		 */
		function numberWithCommas(x) {
	    	var parts = x.toString().split(".");
		    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		    return parts.join(".");
		}

		$('#department_name').on('change', function() {

			var department_name = $(this).val();
			$('#amount').val("");

			$.ajax({
				method: 'POST',
		       	url: '../controllers/controller.position.php',
	       		data: {
	       			department_name: department_name,
	       			displaySalaryCode: 1
	       		},
	       		dataType: 'html',
	       		success: function(response) {
	       			$('#salary_code').html(response);
	       		}
			});
			// console.log(department_name);

		});


		$('#salary_code').on('change', function() {

			var salary_code = $(this).val();

			$.ajax({
				method: 'POST',
		       	url: '../controllers/controller.position.php',
	       		data: {
	       			salary_code: salary_code,
	       			displayBasicSalary: 1
	       		},
	       		dataType: 'json',
	       		success: function(response) {
	       			$('#amount').val(response);
	       		}
			});
			// console.log(salary_code);

		});

		 /**
		  * When adding form of position submit
		  * Perform client-side validation when submit
		  */
		$('#addPositionBtn').on('click', function(e) {
			e.preventDefault();

			var code_error = "";
			var department_name_error = "";
			var position_name_error = "";

			var department_name = $('#department_name').val();
			var position_name = $('#position_name').val();
			// var amount = $('#amount').val();
			var code = $('#salary_code').val();

			if (department_name == "") {
				department_name_error = "Department Name is required.";
				$("#department_name_error").text(department_name_error);
				$('#department_name').addClass('is-invalid');
			} else {
				if (validatePosition(department_name) == false) {
					department_name_error = "Invalid Department Name.";
					$("#department_name_error").text(department_name_error);
					$('#department_name').addClass('is-invalid');
				} else {
					department_name_error = "";
					$("#department_name_error").text(department_name_error);
					$('#department_name').removeClass('is-invalid');
				}
			}

			if (position_name == "") {
				position_name_error = "Position Name is required.";
				$("#position_name_error").text(position_name_error);
				$('#position_name').addClass('is-invalid');
			} else {
				if (validatePosition(position_name) == false) {
					position_name_error = "Invalid Position Name.";
					$("#position_name_error").text(position_name_error);
					$('#position_name').addClass('is-invalid');
				} else {
					position_name_error = "";
					$("#position_name_error").text(position_name_error);
					$('#position_name').removeClass('is-invalid');
				}
			}

			// if (amount == "") {
			// 	amount_error = "Basic Salary is required.";
			// 	$("#amount_error").text(amount_error);
			// 	$('#amount').addClass('is-invalid');
			// } else {

			// 	if (isNaN(amount)) {
			// 		amount_error = "Invalid amount.";
			// 		$('#amount_error').text(amount_error);
			// 		$(this).addClass('is-invalid');
			// 	} else {
			// 		amount_error = "";
			// 		$("#amount_error").text(amount_error);
			// 		$('#amount').removeClass('is-invalid');
			// 	}
			// }

			if (code == "") {
				code_error = "Salary Code is required.";
				$("#salary_code_error").text(code_error);
				$('#salary_code').addClass('is-invalid');
			} else {
				code_error = "";
				$("#salary_code_error").text(code_error);
				$('#salary_code').removeClass('is-invalid');
			}

			if (department_name_error == "" && position_name_error == "" && code_error == "") {
				code = code.toUpperCase();
				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.position.php',
		       		data: {
		       			code: code,
		       			department_name: department_name,
		       			position_name: position_name,
		       			add_position_name: 1
		       		},
		       		dataType: 'json',
		       		success: function(response) {
		       			$('#loader').addClass('loader');
				        $('#dimmer-content').addClass('dimmer-content');
				        setTimeout(function() {
				            $('#loader').removeClass('loader');
				            $('#dimmer-content').removeClass('dimmer-content');
			       			if (response.error_department) {
								$("#department_name_error").text(response.error_department);
								$('#department_name').addClass('is-invalid');
			       			} 

			       			if (response.error_position) {
			       				$("#position_name_error").text(response.error_position);
								$('#position_name').addClass('is-invalid');	
			       			}

			     //   			if (response.error_amount) {
								// $("#amount_error").text(response.error_amount);
								// $('#amount').addClass('is-invalid');
			     //   			}

			       			if (response.error_code) {
								$("#code_error").text(response.error_code);
								$('#code').addClass('is-invalid');
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
		/**
		 * End of adding department form
		 */

		 /**
		  * Archiving Position
		  */
		$('.archivePositionBtn').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var name = $(this).data('name');
			console.log(id);
			
			Swal.fire({
			  title: 'Archive ' + name + ' position?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, archive it!'
			}).then((result) => {
			  if (result.value) {
			  	$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.position.php',
		       		data: {
		       			position_id: id,
		       			archive_position: 1
		       		},
		       		dataType: 'json',
		       		success: function(response) {
		       			$('#archive-loader').addClass('loader');
				        $('#archive-dimmer-content').addClass('dimmer-content');
				        setTimeout(function() {
				            $('#archive-loader').removeClass('loader');
				            $('#archive-dimmer-content').removeClass('dimmer-content');
			       			if(response.success) {
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
			});

			return false;

		});
		/**
		 * End of archiving of position
		 */


		 /**
		  * Updating of Position
		  */
		 
		$('#update_department_name').on('change', function() {

			var department_name = $(this).val();
			$('#update_amount').val("");

			$.ajax({
				method: 'POST',
		       	url: '../controllers/controller.position.php',
	       		data: {
	       			department_name: department_name,
	       			displaySalaryCode: 1
	       		},
	       		dataType: 'html',
	       		success: function(response) {
	       			$('#update_salary_code').html(response);
	       		}
			});
			// console.log(department_name);

		});


		$('#update_salary_code').on('change', function() {

			var salary_code = $(this).val();

			$.ajax({
				method: 'POST',
		       	url: '../controllers/controller.position.php',
	       		data: {
	       			salary_code: salary_code,
	       			displayBasicSalary: 1
	       		},
	       		dataType: 'json',
	       		success: function(response) {
	       			$('#update_amount').val(response);
	       		}
			});
			// console.log(salary_code);

		});

		$('#update_amount').on('change mouseover', function() {

			var amount_error = "";
			var amount = $(this).val();
			let formattedAmount = 0;
			amount = parseFloat(amount.replace(/,/g, ''));

			if (isNaN(amount)) {
				amount_error = "Invalid amount.";
				$('#update_amount_error').text(amount_error);
				$(this).addClass('is-invalid');
			} else {
				amount_error = "";
				$('#update_amount_error').text(amount_error);
				$(this).removeClass('is-invalid');
				formattedAmount = numberWithCommas(amount);
				$(this).val(formattedAmount);
				$('#hiddenUpdateSalary').val(amount);
			}

			return false;

		});

		$('.updatePositionBtnModal').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var name = $(this).data('name');
			var salary = $(this).data('salary');
			var formattedAmount = 0;

			$('#hiddenPositionID').val(id);
			$('#update_position_name').val(name);

			salary = parseFloat(salary.replace(/,/g, ''));
			formattedAmount = numberWithCommas(salary);

			$('#hiddenUpdateSalary').val(amount);
			$('#update_amount').val(formattedAmount);


		});

		$('#updatePositionBtn').on('click', function(e) {

			e.preventDefault();

			var update_department_name_error = "";
			var update_position_name_error = "";
			// var update_amount_error = "";
			var update_code_error = "";

			var position_id = $('#hiddenPositionID').val();
			var department_name = $('#update_department_name').val();
			var position_name = $('#update_position_name').val();
			// var amount = $('#hiddenUpdateSalary').val();
			var code = $('#update_salary_code').val();

			if (department_name == "") {
				update_department_name_error = "Department Name is required.";
				$("#update_department_name_error").text(update_department_name_error);
				$('#update_department_name').addClass('is-invalid');
			} else {
				department_name_error = "";
				$("#update_department_name_error").text(department_name_error);
				$('#update_department_name').removeClass('is-invalid');
			}

			if (position_name == "") {
				position_name_error = "Position Name is required.";
				$("#update_position_name_error").text(position_name_error);
				$('#update_position_name').addClass('is-invalid');
			} else {
				position_name_error = "";
				$("#update_position_name_error").text(position_name_error);
				$('#update_position_name').removeClass('is-invalid');
			}

			// if (amount == "") {
			// 	amount_error = "Basic Salary is required.";
			// 	$("#amount_error").text(amount_error);
			// 	$('#amount').addClass('is-invalid');
			// } else {

			// 	if (isNaN(amount)) {
			// 		amount_error = "Invalid amount.";
			// 		$('#amount_error').text(amount_error);
			// 		$(this).addClass('is-invalid');
			// 	} else {
			// 		amount_error = "";
			// 		$("#amount_error").text(amount_error);
			// 		$('#amount').removeClass('is-invalid');
			// 	}
			// }

			if (code == "") {
				code_error = "Position Code is required.";
				$("#update_code_error").text(code_error);
				$('#update_code').addClass('is-invalid');
			} else {
				code_error = "";
				$("#update_code_error").text(code_error);
				$('#update_code').removeClass('is-invalid');
			}

			if (department_name_error == "" && position_name_error == "" && code_error == "") {
				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.position.php',
		       		data: {
		       			code: code,
		       			position_id: position_id,
		       			position_name: position_name,
		       			department_name: department_name,
		       			update_position_name: 1
		       		},
		       		dataType: 'json',
		       		success: function(response) {
		       			$('#update-loader').addClass('loader');
				        $('#update-dimmer-content').addClass('dimmer-content');
				        setTimeout(function() {
				            $('#update-loader').removeClass('loader');
				            $('#update-dimmer-content').removeClass('dimmer-content');
			       			if (response.error_department) {
								$("#update_department_name_error").text(response.error_department);
								$('#update_department_name').addClass('is-invalid');
			       			} 

			       			if (response.error_position) {
			       				$("#update_position_name_error").text(response.error_department);
								$('#update_position_name').addClass('is-invalid');	
			       			}

			     //   			if (response.error_amount) {
								// $("#update_amount_error").text(response.error_amount);
								// $('#update_amount').addClass('is-invalid');
			     //   			}

			       			if (response.error_code) {
								$("#code_error").text(response.error_code);
								$('#code').addClass('is-invalid');
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
		/**
		 * End of updating of Position
		 */

		//restore
		$('.restorePositionBtn').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var name = $(this).data('name');
			console.log(id);
			
			Swal.fire({
			  title: 'Restore ' + name + ' position?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, restore it!'
			}).then((result) => {
			  if (result.value) {
			  	$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.position.php',
		       		data: {
		       			position_id: id,
		       			restore_position: 1
		       		},
		       		dataType: 'json',
		       		success: function(response) {
		       			$('#archive-loader').addClass('loader');
				        $('#archive-dimmer-content').addClass('dimmer-content');
				        setTimeout(function() {
				            $('#archive-loader').removeClass('loader');
				            $('#archive-dimmer-content').removeClass('dimmer-content');
			       			if(response.success) {
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
			});

			return false;

		});

		function validatePosition(name) {
	    	var re = /^[A-Za-z\s]*$/;
	    	return re.test(name);
	    }

	});
});