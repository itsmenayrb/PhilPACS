$(document).ready(function () {

	// $('#sssMatrixTable').DataTable();
	$('#philhealthMatrixTable').DataTable();

	
	$('#uploadPhilhealthBtn').on('click', function(e) {
		e.preventDefault();

		var form = $('#importPhilHealthCsvForm');
		var formData = false;

		if (window.FormData) {
			formData = new FormData(form[0]);
		}

		$.ajax({
			type: 'post',
			url: '../controllers/controller.import.philhealth.php',
			cache: false,
			processData: false,
			contentType: false,
			data: formData ? formData : form.serialize(),
			success: function(response) {
				
				if (response === "empty") {
					Swal.fire({
					  type: 'error',
					  title: 'File should not be empty.'
					})
				} else if (response === "invalid") {
					Swal.fire({
					  type: 'error',
					  title: 'Invalid file format.'
					})
				} else if (response === "success") {
					Swal.fire({
					  type: 'success',
					  title: 'File Uploaded Successfully',
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Yes'
					}).then((result) => {
					  if (result.value) {
					  	location.reload();
					  }
					});
				}
			}
		});

		return false;
	});

});