$(document).ready(function() {
	$('#loginBtn').on('click', function(e) {
		var defaultMessage = "Authentication Required";
		var error = "";
		var username = $('#username').val();
		var password = $('#password').val();

		if (username == "" || password == "") {
			error = "Username and Password is required";
			$('#login_message').text(error);
			$('.loginBox').addClass('animated');
			$('.loginBox').addClass('shake');
			setTimeout(function() {
				$('#login_message').text(defaultMessage);
				$('.loginBox').removeClass('animated');
				$('.loginBox').removeClass('shake');
			}, 3000);
		} else {
			
			$.ajax({
				type: 'post',
				url: './controllers/controller.session.php',
				data: {
					username: username,
					password: password,
					login: 1
				},
				dataType: 'text',
				success: function(response) {
					// $('#loginBtn').html("");
					$('#username').attr('disabled', 'disabled');
					$('#password').attr('disabled', 'disabled');
					$('#loginBtn').addClass('btn-loading');
					setTimeout(function() {
						$('#loginBtn').html("Sign in");
						$('#loginBtn').removeClass('btn-loading');
						$('#username').removeAttr('disabled');
						$('#password').removeAttr('disabled');
						if (response == "empty") {
							$('#login_message').text("Username and Password is required");
							setTimeout(function() {
								$('#login_message').text(defaultMessage);
							}, 3000);
						}

						if (response == "incorrect") {
							$('#login_message').text("Incorrect username or password.");
							setTimeout(function() {
								$('#login_message').text(defaultMessage);
							}, 3000);
						}

						if (response == "success") {
							window.location = './system/index.php';
						}

					}, 2000);
				}
			});
		}
		return false;
	});
});