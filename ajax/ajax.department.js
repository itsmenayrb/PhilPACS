/**
 * Javascript file for adding, updating and archiving department
 * @author: Bryan Balaga
 */
require(['sweetalert', 'datepicker', 'jquery'], function(Swal, datepicker, $) {
	$(document).ready(function() {

		/**
		 * Data Table for department table
		 */
		$('#department_table').DataTable();
		/**
		 * End of Data Table
		 */

		 /**
		  * When adding form of department submit
		  * Perform client-side validation when submit
		  */
		$('#addDepartmentBtn').on('click', function(e) {
			e.preventDefault();

			var department_name_error = "";
			var department_type_error = "";

			var department_name = $('#department_name').val();

			if (department_name == "") {
				department_name_error = "Department Name is required.";
				$("#department_name_error").text(department_name_error);
				$('#department_name').addClass('is-invalid');
			} else {
				department_name_error = "";
				$("#department_name_error").text(department_name_error);
				$('#department_name').removeClass('is-invalid');
			}

			if(department_name_error == "") {

				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.department.php',
		       		data: {
		       			department_name: department_name,
		       			add_department_name: 1
		       		},
		       		dataType: 'json',
		       		success: function(response) {
		       			$('#loader').addClass('loader');
				        $('#dimmer-content').addClass('dimmer-content');
				        setTimeout(function() {
				            $('#loader').removeClass('loader');
				            $('#dimmer-content').removeClass('dimmer-content');
		       			
			       			if (response.error_department_name) {
								$("#department_name_error").text(response.error);
								$('#department_name').addClass('is-invalid');
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
		       			department_id: id,
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

			var id = $(this).data('id');
			var name = $(this).data('name');

			$('#hiddenDepartmentID').val(id);
			$('#update_department_name_input').val(name);

		});

		$('#updateDepartmentBtn').on('click', function(e) {

			e.preventDefault();

			var update_department_name_error = "";

			var id = $('#hiddenDepartmentID').val();
			var department_name = $('#update_department_name_input').val();

			if (department_name == "") {
				update_department_name_error = "Department Name is required.";
				$("#update_department_name_error").text(update_department_name_error);
				$('#update_department_name_input').addClass('is-invalid');
			} else {
				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.department.php',
		       		data: {
		       			department_id: id,
		       			department_name: department_name,
		       			update_department_name: 1
		       		},
		       		dataType: 'json',
		       		success: function(response) {
		       			$('#update-loader').addClass('loader');
				        $('#update-dimmer-content').addClass('dimmer-content');
				        setTimeout(function() {
				            $('#update-loader').removeClass('loader');
				            $('#update-dimmer-content').removeClass('dimmer-content');
			       			if (response.error) {
								$("#update_department_name_error").text(response.error);
								$('#update_department_name_input').addClass('is-invalid');
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


	});
});