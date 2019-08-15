require(['sweetalert', 'datepicker', 'jquery'], function(Swal, datepicker, $) {
	$(document).ready(function() {

		$('#addSalaryCodeModal').on('hidden.bs.modal', function() {
			$('#addSalaryCodeForm')[0].reset();

			var salary_code_error = "";
			var basicSalary_error = "";

			salary_code_error = "";
			$("#salary_code_error").text(salary_code_error);
			$('#salary_code').removeClass('is-invalid');

			basicSalary_error = "";
			$("#basicSalary_error").text(basicSalary_error);
			$('#basicSalary').removeClass('is-invalid');

		});


		$('#basicSalary').on('change', function() {
			var basicSalary_error = "";

			var basicSalary = $(this).val();
			let formattedAmount = 0;

			if (isNaN(basicSalary)) {
				basicSalary_error = "Invalid amount.";
				$('#basicSalary_error').text(basicSalary_error);
				$(this).addClass('is-invalid');
			} else {
				if (basicSalary == "") {
					basicSalary_error = "Basic Salary is required.";
					$('#basicSalary_error').text(basicSalary_error);
					$(this).addClass('is-invalid');
				} else {

					basicSalary_error = "";
					$('#basicSalary_error').text(basicSalary_error);
					$(this).removeClass('is-invalid');
					formattedAmount = numberWithCommas(basicSalary);
					$(this).val(formattedAmount);
					basicSalary = parseFloat(basicSalary.replace(/,/g, ''));
					$('#hiddenBasicSalary').val(basicSalary);
				}

			}

			return false;
		});


		$('#addSalaryCodeBtn').on('click', function(e) {
			e.preventDefault();

			var salary_code_error = "";
			var basicSalary_error = "";

			var salary_code = $('#salary_code').val();
			var basicSalary = $('#hiddenBasicSalary').val();
			var description = $('#description').val();

			salary_code = salary_code.toUpperCase();

			if (salary_code == "") {
				salary_code_error = "Salary Code is required.";
				$("#salary_code_error").text(salary_code_error);
				$('#salary_code').addClass('is-invalid');
			} else {
				if (validateSalaryCode(salary_code) == false) {
					salary_code_error = "Invalid Salary Code.";
					$("#salary_code_error").text(salary_code_error);
					$('#salary_code').addClass('is-invalid');
				} else {
					salary_code_error = "";
					$("#salary_code_error").text(salary_code_error);
					$('#salary_code').removeClass('is-invalid');
				}
			}

			if (basicSalary == "") {
				basicSalary_error = "Basic Salary is required.";
				$("#basicSalary_error").text(basicSalary_error);
				$('#basicSalary').addClass('is-invalid');
			} else {

				if (isNaN(basicSalary)) {
					basicSalary_error = "Invalid basicSalary.";
					$('#basicSalary_error').text(basicSalary_error);
					$(this).addClass('is-invalid');
				} else {
					basicSalary_error = "";
					$("#basicSalary_error").text(basicSalary_error);
					$('#basicSalary').removeClass('is-invalid');
				}
			}

			if (salary_code_error == "" && basicSalary_error == "") {
				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.salary.code.php',
		       		data: {
		       			salary_code: salary_code,
		       			basicSalary: basicSalary,
		       			description: description,
		       			add_salary_code: 1
		       		},
		       		dataType: 'json',
		       		success: function(response) {
		       			$('#loader').addClass('loader');
				        $('#dimmer-content').addClass('dimmer-content');

				        setTimeout(function() {

				            $('#loader').removeClass('loader');
				            $('#dimmer-content').removeClass('dimmer-content');

			       			if (response.error_salary_code) {
								$("#salary_code_error").text(response.error_salary_code);
								$('#salary_code').addClass('is-invalid');
			       			} 

			       			if (response.error_basicSalary) {
			       				$("#basicSalary_error").text(response.error_basicSalary);
								$('#basicSalary').addClass('is-invalid');	
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

		//update
		$('#update_basicSalary').on('change', function() {
			var basicSalary_error = "";

			var basicSalary = $(this).val();
			let formattedAmount = 0;

			if (isNaN(basicSalary)) {
				basicSalary_error = "Invalid amount.";
				$('#update_basicSalary_error').text(basicSalary_error);
				$(this).addClass('is-invalid');
			} else {
				if (basicSalary == "") {
					basicSalary_error = "Basic Salary is required.";
					$('#update_basicSalary_error').text(basicSalary_error);
					$(this).addClass('is-invalid');
				} else {

					basicSalary_error = "";
					$('#update_basicSalary_error').text(basicSalary_error);
					$(this).removeClass('is-invalid');
					formattedAmount = numberWithCommas(basicSalary);
					$(this).val(formattedAmount);
					basicSalary = parseFloat(basicSalary.replace(/,/g, ''));
					$('#hiddenUpdateBasicSalary').val(basicSalary);
				}

			}

			return false;
		});

		$('.updateSalaryCodeBtnModal').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var name = $(this).data('name');
			var description = $(this).data('description');
			var salary = $(this).data('salary');

			$('#hiddenSalaryCodeID').val(id);
			$('#update_salary_code').val(name);
			$('#update_description').val(description);
			// $('#update_basicSalary').val(salary);

		});

		$('#updateSalaryCodeBtn').on('click', function(e) {
			e.preventDefault();

			var salary_code_error = "";
			var basicSalary_error = "";

			var id = $('#hiddenSalaryCodeID').val();
			var salary_code = $('#update_salary_code').val();
			var basicSalary = $('#hiddenUpdateBasicSalary').val();
			var description = $('#update_description').val();


			if (salary_code == "") {
				salary_code_error = "Salary Code is required.";
				$("#salary_code_error").text(salary_code_error);
				$('#salary_code').addClass('is-invalid');
			} else {
				if (validateSalaryCode(salary_code) == false) {
					salary_code_error = "Invalid Salary Code.";
					$("#salary_code_error").text(salary_code_error);
					$('#salary_code').addClass('is-invalid');
				} else {
					salary_code_error = "";
					$("#salary_code_error").text(salary_code_error);
					$('#salary_code').removeClass('is-invalid');
				}
			}

			if (basicSalary == "") {
				basicSalary_error = "Basic Salary is required.";
				$("#basicSalary_error").text(basicSalary_error);
				$('#basicSalary').addClass('is-invalid');
			} else {

				if (isNaN(basicSalary)) {
					basicSalary_error = "Invalid basicSalary.";
					$('#basicSalary_error').text(basicSalary_error);
					$(this).addClass('is-invalid');
				} else {
					basicSalary_error = "";
					$("#basicSalary_error").text(basicSalary_error);
					$('#basicSalary').removeClass('is-invalid');
				}
			}

			if (salary_code_error == "" && basicSalary_error == "") {
				salary_code = salary_code.toUpperCase();
				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.salary.code.php',
		       		data: {
		       			id: id,
		       			salary_code: salary_code,
		       			basicSalary: basicSalary,
		       			description: description,
		       			update_salary_code: 1
		       		},
		       		dataType: 'json',
		       		success: function(response) {
		       			$('#update_loader').addClass('loader');
				        $('#update_dimmer-content').addClass('dimmer-content');

				        setTimeout(function() {

				            $('#update_loader').removeClass('loader');
				            $('#update_dimmer-content').removeClass('dimmer-content');

			       			if (response.error_salary_code) {
								$("#salary_code_error").text(response.error_salary_code);
								$('#salary_code').addClass('is-invalid');
			       			} 

			       			if (response.error_basicSalary) {
			       				$("#basicSalary_error").text(response.error_basicSalary);
								$('#basicSalary').addClass('is-invalid');	
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

		//archive
		$('.archiveSalaryCodeBtn').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var name = $(this).data('name');
			// console.log(id);
			
			Swal.fire({
			  title: 'Archive Salary Code: ' + name + '?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, archive it!'
			}).then((result) => {
			  if (result.value) {
			  	$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.salary.code.php',
		       		data: {
		       			id: id,
		       			archive_salary_code: 1
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

		//restore
		$('.restoreSalaryCodeBtn').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var name = $(this).data('name');
			// console.log(id);
			
			Swal.fire({
			  title: 'Restore Salary Code: ' + name + '?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, restore it!'
			}).then((result) => {
			  if (result.value) {
			  	$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.salary.code.php',
		       		data: {
		       			id: id,
		       			restore_salary_code: 1
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

		function numberWithCommas(x) {
	    	var parts = x.toString().split(".");
		    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		    return parts.join(".");
		}

		function validateSalaryCode(salary_code) {
	    	var re = /^[A-Da-d]*$/;
	    	return re.test(salary_code);
	    }

	});
});