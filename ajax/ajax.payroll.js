require(['sweetalert', 'jquery', 'datatables', 'datetimepicker'], function(Swal, $, datatable, datetimepicker) {
	$(document).ready(function() {

		$('#savePayrollBtn').on('click', function(e) {
			e.preventDefault();

			var contributions_error = "";
			var contributions = $('input[name="contribution[]"]');
			var hashedFile = $('#hiddenHashedFile').val();
			var hasCheck = false;

			for (var i=0; i<contributions.length; i++) {
				if (contributions[i].checked) {
					hasCheck = true;
					break;
				}
			}

			if (hasCheck == false) {
				contributions_error = "Contributions is required. Please select at least one.";
				$('#contributions_error').text(contributions_error);
			} else {
				contributions_error = "";
				$('#contributions_error').text(contributions_error);

				$(this).addClass('btn-loading');
				setTimeout(function() {
					$('#savePayrollBtn').removeClass('btn-loading');
					$('#passwordModal').modal('show');
					$('#hiddenPayrollID').val(hashedFile);				
				}, 2000);

			}
			
			return false;

		});

		//password
		$('#passwordActionBtn').on('click', function(e) {
			e.preventDefault();

			var contributions_error = "";

			var payrollID = $('#hiddenPayrollID').val();

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
								if (payrollID != "") {
									var form = $('#payrollForm');
									var formData = false;

									if (window.FormData) {
										formData = new FormData(form[0]);
									}

									$.ajax({
										type: 'post',
										url: '../controllers/controller.payroll.php',
										data: formData ? formData : form.serialize(),
										cache: false,
										contentType: false,
										processData: false,
										success: function(response) {
											var err = JSON.parse(response);

											if (err.error_empty) {
												contributions_error = error_empty;
												$('#contributions_error').text(contributions_error);
											}

											if (err.success){
												Swal.fire({
												  type: 'success',
												  title: err.success,
												  confirmButtonColor: '#3085d6',
												  confirmButtonText: 'Great'
												}).then((result) => {
												  if (result.value) {
												  	window.location = './payroll.php?id=' + payrollID;
												  }
												});
											}

										}	
										
									});
								}
							}
						}, 2000);
					}
				});
			}

			return false;
		});

	}); //document.ready
}); // require