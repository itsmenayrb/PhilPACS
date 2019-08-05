require(['sweetalert', 'jquery'], function(Swal, $) {
	$(document).ready(function () {

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


            var form = $('#uploadPagibigForm');
			var formData = false;

			if (window.FormData) {
				formData = new FormData(form[0]);
			}

			$.ajax({
				type: 'post',
				url: '../controllers/controller.import.pagibig.php',
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
		}

	});
});