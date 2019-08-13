require(['sweetalert', 'jquery', 'datatables', 'datetimepicker'], function(Swal, $, datatable, datetimepicker) {
	$(document).ready(function () {

		$('#passwordModal').on('hidden.bs.modal', function() {
			$('#passwordForm')[0].reset();
			$('#passwordAction').removeClass('is-invalid');
			$('#passwordAction_error').text("");
		});

		$('#updateAttendanceRecordBtn').on('click', function(e) {
        	e.preventDefault();

        	$('#saveChangesAttendanceBtn').removeAttr('disabled');
        	$('#saveChangesAttendanceBtn').removeClass('disabled');
	    
	    	var dateInput = $('.attendanceInput');
	    	dateInput.parent().css('position', 'relative');

	        dateInput.css('background', 'white');

	        dateInput.datetimepicker({
	            format: 'hh:mm:ss',
	            ignoreReadonly: true,
	            widgetPositioning: {
	            	horizontal: 'right',
	            	vertical: 'top'
	            },
	            widgetParent: 'body' 
	        });

        	dateInput.on('dp.show', function() {
	    		var top = ($(this).offset().top-200);
	    		var left = $(this).offset().left-200;
		      	if($(this).offset().top - 400 <= 0) { //display below if not enough room above
					top = $(this).offset().top+$(this).height()+10;
			  	}
				$('.bootstrap-datetimepicker-widget').css({
					'top': top + 'px',
					'left': left + 'px',
					'bottom': 'auto'
				});
			});

      	});

      	$('#saveChangesAttendanceBtn').on('click', function(e) {
			e.preventDefault();

			$('.attendanceInput').css('background', '#f8f9fa');
			$('#hiddenUpdatePersonalAttendanceID').val(1);

			$('#saveChangesAttendanceBtn').addClass('btn-loading');
			setTimeout(function() {
				$('#saveChangesAttendanceBtn').removeClass('btn-loading');
				$('#passwordModal').modal('show');
			}, 2000);

		});

		$('#passwordActionBtn').on('click', function(e) {
			e.preventDefault();

			var password_error = "";
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

								var hiddenHashedFile = $('.hiddenHashedFile').val();
								var hiddenUpdatePersonalAttendanceID = $('#hiddenUpdatePersonalAttendanceID').val();
								var hiddenSaveAttendanceForPendingID = $('#hiddenSaveAttendanceForPendingID').val();
								var hiddenSendToPayrollID = $('#hiddenSendToPayrollID').val();
								var hiddenRemoveAttendanceID = $('#hiddenRemoveAttendanceID').val();

								if (hiddenUpdatePersonalAttendanceID != "" && hiddenSaveAttendanceForPendingID == "" && hiddenSendToPayrollID == "" && hiddenRemoveAttendanceID == "") {
								
									var form = $('#updateAttendanceRecordForm');
									var formData = false;

									if (window.FormData) {
										formData = new FormData(form[0]);
									}

									$.ajax({

								    	method: 'POST',
								      	url: '../controllers/controller.attendance.php',
								      	dataType: 'json',
								      	data: formData ? formData : form.serialize(),
										cache: false,
										contentType: false,
										processData: false,
									    success: function(response) {

									    	if (response == 'great') {
										    	Swal.fire({
												  type: 'success',
												  title: "Attendance has been updated!",
												  confirmButtonColor: '#3085d6',
												  confirmButtonText: 'OK'
												}).then((result) => {
												  if (result.value) {
												  	window.location = './attendance.php?id=' + hiddenHashedFile;
												  }
												});
									    	}
									    	
									    }
									});
								} else if (hiddenUpdatePersonalAttendanceID == "" && hiddenSaveAttendanceForPendingID != "" && hiddenSendToPayrollID == "" && hiddenRemoveAttendanceID == "") {
									$.ajax({
										method: 'post',
										url: '../controllers/controller.attendance.php',
										data: {
											id: hiddenSaveAttendanceForPendingID,
											saveAttendanceForPending: 1
										},
										success: function(){
											Swal.fire({
											  type: 'success',
											  title: "Attendance has been saved!",
											  confirmButtonColor: '#3085d6',
											  confirmButtonText: 'OK'
											}).then((result) => {
											  if (result.value) {
											  	window.location = './attendance.php';
											  }
											});
										}
									});
								} else if (hiddenUpdatePersonalAttendanceID == "" && hiddenSaveAttendanceForPendingID == "" && hiddenSendToPayrollID != "" && hiddenRemoveAttendanceID == "") {
									$.ajax({
										method: 'post',
										url: '../controllers/controller.attendance.php',
										data: {
											id: hiddenSendToPayrollID,
											sendToPayroll: 1
										},
										success: function(){
											Swal.fire({
											  type: 'success',
											  title: "Attendance has been sent!",
											  confirmButtonColor: '#3085d6',
											  confirmButtonText: 'OK'
											}).then((result) => {
											  if (result.value) {
											  	window.location = './attendance.php';
											  }
											});
										}
									});
								} else if (hiddenUpdatePersonalAttendanceID == "" && hiddenSaveAttendanceForPendingID == "" && hiddenSendToPayrollID == "" && hiddenRemoveAttendanceID != "") {
									$.ajax({
										method: 'post',
										url: '../controllers/controller.attendance.php',
										data: {
											id: hiddenRemoveAttendanceID,
											removeAttendance: 1
										},
										success: function(){
											Swal.fire({
											  type: 'success',
											  title: "Attendance has been removed!",
											  confirmButtonColor: '#3085d6',
											  confirmButtonText: 'OK'
											}).then((result) => {
											  if (result.value) {
											  	window.location = './attendance.php';
											  }
											});
										}
									});
								}
							}
						}, 2000);
					}
				});
			}

		});

		$('#saveAttendanceForPendingBtn').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			$('#hiddenSaveAttendanceForPendingID').val(id);
			// console.log(id);
			$("#saveAttendanceForPendingBtn").addClass('btn-loading');
			setTimeout(function() {
				$("#saveAttendanceForPendingBtn").removeClass('btn-loading');
				$('#passwordModal').modal('show');
			}, 2000);			

		});

		$('#sendToPayrollBtn').on('click', function(e) {
			e.preventDefault();

			Swal.fire({
			  title: 'Send to payroll?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes!'
			}).then((result) => {
			  if (result.value) {
				var id = $(this).data('id');
				$('#hiddenSendToPayrollID').val(id);
				// console.log(id);
				$("#loader").addClass('loader');
				$('#dimmer-content').addClass('dimmer-content')
				setTimeout(function() {
					$("#loader").removeClass('loader');
					$('#dimmer-content').removeClass('dimmer-content');
					$('#passwordModal').modal('show');
				}, 2000);
			  }
			});

			return false;

		});

		$('.removeAttendanceBtn').on('click', function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			$('#hiddenRemoveAttendanceID').val(id);

			Swal.fire({
			  title: 'Are you sure?',
			  text: 'This action is cannot be undone.',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes!'
			}).then((result) => {
			  if (result.value) {
				$(this).addClass('btn-loading');
				setTimeout(function() {
					$('.removeAttendanceBtn').removeClass('btn-loading');
					$('#passwordModal').modal('show');
				}, 2000);
			  }
			});

			return false;
		});

		function onlyUnique(value, index, self) {
			return self.indexOf(value) === index;
		}

	}); //document
}); // require