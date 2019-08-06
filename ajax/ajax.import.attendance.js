require(['sweetalert', 'jquery'], function(Swal, $) {
	$(document).ready(function () {


<<<<<<< HEAD
=======
		// $('#sssMatrixTable').DataTable();

>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
		$('#file').on('change', function(e) {
			e.preventDefault();
			uploadFile();
		});

		function uploadFile() {
			var drop = $("#file");
            drop.on('dragenter', function (e) {
              $(".drop").css({
                "border": "4px dashed #09f",
                "background": "rgba(0, 153, 255, .05)"
              });
              $(".cont").css({
                "color": "#09f"
              });
            }).on('dragleave dragend mouseout drop', function (e) {
              $(".drop").css({
                "border": "3px dashed #DADFE3",
                "background": "transparent"
              });
              $(".cont").css({
                "color": "#8E99A5"
              });
            });
<<<<<<< HEAD
<<<<<<< HEAD

            var form = $('#uploadAttendanceFrom');
=======
<<<<<<< HEAD
            var form = $('#uploadAttendanceForm');
=======

            var form = $('#uploadAttendanceFrom');
>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
=======
            var form = $('#uploadAttendanceForm');
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
			var formData = false;

			if (window.FormData) {
				formData = new FormData(form[0]);
			}
<<<<<<< HEAD
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======

>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
			$.ajax({
				type: 'post',
				url: '../controllers/controller.import.attendance.php',
				cache: false,
				processData: false,
				contentType: false,
				data: formData ? formData : form.serialize(),
				success: function(response) {
					$('#loader').addClass('loader');
			        $('#dimmer-content').addClass('dimmer-content');
			        setTimeout(function() {
			            $('#loader').removeClass('loader');
			            $('#dimmer-content').removeClass('dimmer-content');
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
					}, 2000);
				}
			});

			return false;

<<<<<<< HEAD
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======

>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
		}


<<<<<<< HEAD
=======
		}
=======
<<<<<<< HEAD
<<<<<<< HEAD
		// });

=======

		// });
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9

		// $('#uploadSSSBtn').on('click', function(e) {
		// 	e.preventDefault();

<<<<<<< HEAD
=======
>>>>>>> 61f66e9473d951964ebdccb678a17e2c5672df4f
=======
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
		// });
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7

<<<<<<< HEAD
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
>>>>>>> 97ea8b4d7ca0c3fde4df973995007f0a0dfd42a9
	});
});
