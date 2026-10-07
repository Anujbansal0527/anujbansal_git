// AOS Animation Init
  AOS.init();



  // Form Validation & AJAX Process
  function sendForm() {
		var valid = validateForm();

		if (valid) {
			jQuery.ajax({
				url: "form_mail.php",
				data: 'rvba-name=' + $("#rvba-name").val() + '&rvba-email=' + $("#rvba-email").val() + '&rvba-mobile=' + $("#rvba-mobile").val() + '&rvba-company=' + $("#rvba-company").val()+ '&rvba-interest=' + $("#rvba-interest").val()+ '&rvba-address=' + $("#rvba-address").val() + '&captcha=' + $("#captcha").val(),
				type: "POST",
				success: function(data) {
					$("#mail-status").html(data);
					$("#rvba-name").val('');
					$("#rvba-email").val('');
					$("#rvba-mobile").val('');
					$("#rvba-company").val('');
					$("#rvba-interest").val('');
					$("#rvba-address").val('');
					$("#captcha").val('');
					setInterval(function() {
						$("#mail-status").html('');
					}, 3000);

				},
				error: function() {}
			});
		} else {
			msg = "Please Enter All Information";
			$("#error_msg").html(msg);
		}
	}

	function validateForm() {
		var valid = true;
		$(".demoInputBox").css('background-color', '');
		$(".info").html('');

		if (!$("#rvba-name").val()) {
			$("#rvba-name-info").html("(required)");
			$("#rvba-name").css('background-color', '#FFFFDF');
			valid = false;
		}
		if (!$("#rvba-email").val()) {
			$("#rvba-email-info").html("(required)");
			$("#rvba-email").css('background-color', '#FFFFDF');
			valid = false;
		}
		if (!$("#rvba-email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
			$("#rvba-email-info").html("(invalid)");
			$("#rvba-email").css('background-color', '#FFFFDF');
			valid = false;
		}

		if (!$("#rvba-mobile").val()) {
			$("#rvba-mobile").html("(required)");
			$("#rvba-mobile").css('background-color', '#FFFFDF');
			valid = false;
		}
		if (!$("#rvba-company").val()) {
			$("#rvba-company-info").html("(required)");
			$("#rvba-company").css('background-color', '#FFFFDF');
			valid = false;
		}
    if (!$("#rvba-interest").val()) {
			$("#rvba-interest-info").html("(required)");
			$("#rvba-interest").css('background-color', '#FFFFDF');
			valid = false;
		}
    if (!$("#rvba-address").val()) {
			$("#rvba-address-info").html("(required)");
			$("#rvba-address").css('background-color', '#FFFFDF');
			valid = false;
		}
		if (!$("#captcha").val()) {
			$("#captcha-info").html("(required)");
			$("#captcha").css('background-color', '#FFFFDF');
			valid = false;
		}

		return valid;
	}

	function refreshCaptcha() {
		var mytime = "ms=" + new Date().getMilliseconds();
		$("#captcha_code").attr('src', 'captcha_code.php?' + mytime);
	}
