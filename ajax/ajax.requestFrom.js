require(['datatables', 'jquery', 'sweetalert'], function(datatable, $, Swal) {
  $('.datatable').DataTable();

  $('.employee-link').on('click',function(e){
        e.preventDefault();
        var reqID = $(this).data('id');
        var request_type = $(this).data('requesttype');
        var last_name = $(this).data('lastname');
        var first_name = $(this).data('firstname');
        var type_request = $(this).data('typerequest');
        var reason = $(this).data('reason');
        var datefrom = $(this).data('datefrom');
        var dateto = $(this).data('dateto');


        $('#requestID').val(reqID);
        $('#RequestType').val(request_type);
        $('#firstname').val(first_name);
        $('#lastname').val(last_name);
        $('#request').val(type_request);
        $('#reason').val(reason);
        $('#DateFrom').val(datefrom);
        $('#DateTo').val(dateto);
    });

    $('#submitrequest').on('click', function(e) {
			e.preventDefault();

			var request_type_error = "";
			var last_name_error = "";
      var type_request_error = "";
      var date_from_error = "";
      var date_to_error = "";
      var reason_error = "";

			var request_type = $('#request_type').val();
			var last_name = $('#last_name').val();
      var type_request = $('#type_request').val();
      var date_from = $('#date_from').val();
      var date_to = $('#date_to').val();
      var reason = $('#reasontype').val();

			if (request_type == "") {
				request_type_error = "request type is required.";
				$("#request_type_error").text(request_type_error);
				$('#request_type').addClass('is-invalid');
			} else {
				request_type_error = "";
				$("#request_type_error").text(request_type_error);
				$('#request_type').removeClass('is-invalid');
			}

			if (last_name == "") {
				last_name_error = "last name is required.";
				$("#last_name_error").text(last_name_error);
				$('#last_name').addClass('is-invalid');
			} else {
				last_name_error = "";
				$("#last_name_error").text(last_name_error);
				$('#last_name').removeClass('is-invalid');
			}
      if (type_request == "") {
				type_request_error = "type request is required.";
				$("#type_request_error").text(type_request_error);
				$('#type_request').addClass('is-invalid');
			} else {
				last_name_error = "";
				$("#type_request_error").text(type_request_error);
				$('#type_request').removeClass('is-invalid');
			}
      if (reason == "") {
        reason_error = "reason is required.";
        $("#reason_error").text(reason_error);
        $('#reasontype').addClass('is-invalid');
      } else {
        reason_error = "";
        $("#reason_error").text(reason_error);
        $('#reasontype').removeClass('is-invalid');
      }
      if (date_from == "") {
				date_from_error = "date from is required.";
				$("#date_from_error").text(date_from_error);
				$('#date_from').addClass('is-invalid');
			} else {
				date_from_error = "";
				$("#date_from_error").text(date_from_error);
				$('#date_from').removeClass('is-invalid');
			}
      if (date_to == "") {
				date_to_error = "date from is required.";
				$("#date_to_error").text(date_to_error);
				$('#date_to').addClass('is-invalid');
			} else {
				date_to_error = "";
				$("#date_to_error").text(date_to_error);
				$('#date_to').removeClass('is-invalid');
			}


			if(request_type_error == "" && last_name_error == "" && type_request_error == ""
          && date_from_error == "" && date_to_error == "" && reason_error == "") {

				$.ajax({
					method: 'POST',
		       		url: '../controllers/controller.Requisition.php',
		       		data: {
                request_type: request_type,
                last_name: last_name,
                type_request: type_request,
                date_from: date_from,
                date_to: date_to,
                reason: reason,
                addrequisition: 1
              },
					dataType: 'json',
		       		success: function(response) {
		       			$('#loader').addClass('loader');
				        $('#dimmer-content').addClass('dimmer-content');
				        setTimeout(function() {
				            $('#loader').removeClass('loader');
				            $('#dimmer-content').removeClass('dimmer-content');

				            // response = JSON.parse(response);
                    if (response.error_reason) {
  								$("#reason_error").text(response.error_reason);
  								$('#reason').addClass('is-invalid');
  			       			}
			       			if (response.error_request_type) {
								$("#request_type_error").text(response.error_request_type);
								$('#request_type').addClass('is-invalid');
			       			}
			       			if (response.error_last_name) {
								$("#last_name_error").text(response.error_last_name);
								$('#last_name').addClass('is-invalid');
			       			}
                  if (response.error_type_request) {
								$("#type_request_error").text(response.error_type_request);
								$('#type_request').addClass('is-invalid');
			       			}
                  if (response.error_date_from) {
								$("#date_from_error").text(response.error_date_from);
								$('#date_from').addClass('is-invalid');
			       			}
                  if (response.error_date_to) {
								$("#date_to_error").text(response.error_date_to);
								$('#date_to').addClass('is-invalid');
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
		       			});
		       		}
				});

			return false;
			}

		});

    $('#approved').on('click',function(e){
          e.preventDefault();

          var requestid = $('#requestID').val();

          $.ajax({
          type: 'post',
          url:'../controllers/controller.Requisition.php',
          data:
          {
              requestid: requestid,
              approved: 1
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
              },100);
            }
       });
      });

      $('#declined').on('click',function(e){
            e.preventDefault();

            var requestid = $('#requestID').val();

            $.ajax({
            type: 'post',
            url:'../controllers/controller.Requisition.php',
            data:
            {
                requestid: requestid,
                declined: 1
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
                  if (response.success) {
                    Swal.fire({
                  type: 'warning',
                  title: response.success,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.value) {
                    location.reload();
                  }
                });
                  }
                },100);
              }
         });
        });

          $('.requisition-link').on('click',function(e){
                e.preventDefault();
                var reqID = $(this).data('id');
                var request_type = $(this).data('requesttype');
                var last_name = $(this).data('lastname');
                var first_name = $(this).data('firstname');
                var type_request = $(this).data('typerequest');
                var reason = $(this).data('reason');
                var datefrom = $(this).data('datefrom');
                var dateto = $(this).data('dateto');

                $('#requestID').val(reqID);
                $('#Request_Type').val(request_type);
                $('#first').val(first_name);
                $('#last').val(last_name);
                $('#Request').val(type_request);
                $('#reason_type').val(reason);
                $('#Date_From').val(datefrom);
                $('#Date_To').val(dateto);
            });

});
