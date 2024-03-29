/**
 * Javascript file for adding, updating and archiving department
 * @author: Bryan Balaga
 */
require(['sweetalert', 'datepicker', 'jquery'], function(Swal, datepicker, $) {
	$(document).ready(function() {



		 /**
		  * When adding form of department submit
		  * Perform client-side validation when submit
		  */
		$('#addDepartmentBtn').on('click', function(e) {
			e.preventDefault();

			var department_name_error = "";
			var salary_code_error = "";

			var department_name = $('#department_name').val();
			var salary_code = $('input[name="salary_code[]"]');
			var hasCheck = false;

			if (department_name == "") {
				department_name_error = "Department Name is required.";
				$("#department_name_error").text(department_name_error);
				$('#department_name').addClass('is-invalid');
			} else {
				if (validateDepartment(department_name) == false) {
					department_name_error = "Invalid Department Name.";
					$("#department_name_error").text(department_name_error);
					$('#department_name').addClass('is-invalid');
				} else {
					department_name_error = "";
					$("#department_name_error").text(department_name_error);
					$('#department_name').removeClass('is-invalid');
				}
			}

			// console.log(salary_code);
			for (var i=0; i<salary_code.length; i++) {
				if (salary_code[i].checked) {
					hasCheck = true;
					break;
				}
			}

			if (hasCheck == false) {
				salary_code_error = "Salary Code is required. Please select at least one.";
				$("#salary_code_error").text(salary_code_error);
				// $('#salary_code').addClass('is-invalid');
				
				for (var i=0; i<salary_code.length; i++) {
					$(salary_code[i]).addClass('is-invalid');
				}

			} else {
				salary_code_error = "";
				$("#salary_code_error").text(salary_code_error);
				$('#salary_code').removeClass('is-invalid');

				salary_code = $('#salary_code').val();
			}

			if(department_name_error == "" && salary_code_error == "") {

				var form = $('#addDepartmentForm');
				var formData = false;

				if (window.FormData) {
					formData = new FormData(form[0]);
				}

				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.department.php',
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

				            // response = JSON.parse(response);
		       			
			       			if (response.error_department_name) {
								$("#department_name_error").text(response.error_department_name);
								$('#department_name').addClass('is-invalid');
			       			}

			       			if (response.error_salary_code) {
								$("#salary_code_error").text(response.error_salary_code);
								$('#salary_code').addClass('is-invalid');
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

			return false;
			}

		});
		/**
		 * End of adding department form
		 */

		 /**
		  * Archiving department
		  */
		$('.archiveDepartmentBtn').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var name = $(this).data('name');
			// console.log(id);
			
			Swal.fire({
			  title: 'Archive ' + name + ' department?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, archive it!'
			}).then((result) => {
			  if (result.value) {
			  	$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.department.php',
		       		data: {
		       			department_id: name,
		       			archive_department: 1
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
		 * End of archiving of department
		 */


		 /**
		  * Updating of Department
		  */
		$('.updateDepartmentBtnModal').on('click', function(e) {
			e.preventDefault();

			// let salary_code = [];

			var id = $(this).data('id');
			var name = $(this).data('name');
			var salary_code = $(this).data('salaryid');

			$('#hiddenDepartmentName').val(name);
			$('#update_department_name_input').val(name);
			
			$.ajax({
				type: 'post',
				url: '../controllers/controller.department.php',
				data: {
					salary_code: salary_code,
					populate_checked_salary_code: 1
				},
				dataType: 'html',
				success: function(response) {
					$('#updateDepartmentSalaryCodeTable tbody').html(response);
				}
			});

			// console.log(salary_code);

		});

		$('#updateDepartmentBtn').on('click', function(e) {

			e.preventDefault();

			var update_department_name_error = "";

			var id = $('#hiddenDepartmentName').val();
			var department_name = $('#update_department_name_input').val();
			var salary_code = $('input[name="update_salary_code[]"]');
			var hasCheck = false;

			if (department_name == "") {
				department_name_error = "Department Name is required.";
				$("#update_department_name_error").text(department_name_error);
				$('#update_department_name_input').addClass('is-invalid');
			} else {
				department_name_error = "";
				$("#update_department_name_error").text(department_name_error);
				$('#update_department_name_input').removeClass('is-invalid');
			}

			for (var i=0; i<salary_code.length; i++) {
				if (salary_code[i].checked) {
					hasCheck = true;
					break;
				}
			}

			if (hasCheck == false) {
				salary_code_error = "Salary Code is required. Please select at least one.";
				$("#update_salary_code_error").text(salary_code_error);
				// $('#salary_code').addClass('is-invalid');
				
				for (var i=0; i<salary_code.length; i++) {
					$(salary_code[i]).addClass('is-invalid');
				}

			} else {
				salary_code_error = "";
				$("#update_salary_code_error").text(salary_code_error);
				$('#update_salary_code').removeClass('is-invalid');

				salary_code = $('#update_salary_code').val();
			}

			if(department_name_error == "" && salary_code_error == "") {

				var form = $('#updateDepartmentForm');
				var formData = false;

				if (window.FormData) {
					formData = new FormData(form[0]);
				}

				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.department.php',
		       		data: formData ? formData : form.serialize(),
					cache: false,
					contentType: false,
					processData: false,
					dataType: 'json',
		       		success: function(response) {
		       			$('#update-loader').addClass('loader');
				        $('#update-dimmer-content').addClass('dimmer-content');
				        setTimeout(function() {
				            $('#update-loader').removeClass('loader');
				            $('#update-dimmer-content').removeClass('dimmer-content');
			       			
			       			if (response.error_department_name) {
								$("#department_name_error").text(response.error_department_name);
								$('#department_name').addClass('is-invalid');
			       			}

			       			if (response.error_salary_code) {
								$("#salary_code_error").text(response.error_salary_code);
								$('#salary_code').addClass('is-invalid');
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
		 * End of updating of department
		 */

		 //restore
		 $('.restoreDepartmentBtn').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var name = $(this).data('name');
			// console.log(id);
			
			Swal.fire({
			  title: 'Restore Department: ' + name + '?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, restore it!'
			}).then((result) => {
			  if (result.value) {
			  	$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.department.php',
		       		data: {
		       			id: name,
		       			restore_department: 1
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

		 function validateDepartment(name) {
	    	var re = /^([A-Za-z]+\s)*[A-Za-z]+$/;
	    	return re.test(name);
	    }

	});
});

function checkAll(obj) {
	var checkboxes = $('input[name="salary_code[]"]');
	
	if (obj.checked) {
		for (var i=0; i<checkboxes.length; i++) {
			checkboxes[i].checked = true;
		}
	} else {
		for (var i=0; i<checkboxes.length; i++) {
			checkboxes[i].checked = false;
		}
	}
}

function updateCheckAll(obj) {
	var checkboxes = $('input[name="update_salary_code[]"]');
	
	if (obj.checked) {
		for (var i=0; i<checkboxes.length; i++) {
			checkboxes[i].checked = true;
		}
	} else {
		for (var i=0; i<checkboxes.length; i++) {
			checkboxes[i].checked = false;
		}
	}
}