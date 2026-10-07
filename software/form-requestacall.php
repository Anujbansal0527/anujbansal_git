<script>
  function sendContactRequest() {
    var valid = validateContactRequest();

    if (valid) {
      jQuery.ajax({
        url: "request_mail.php",
        data: 'requestUserName=' + $("#requestUserName").val() +
          '&requestUserMobile=' + $("#requestUserMobile").val() +
          '&requestUserEmail=' + $("#requestUserEmail").val() +
          '&requestarnNo=' + $("#requestarnNo").val() +
          '&requestCaptcha=' + $("#requestCaptcha").val(),
        type: "POST",
        dataType: "json",
        success: function(response) {
          if (response.status == 'success') { // Check for both 1 and true
            window.location.href = "thankyou.php?status=success&message=" + encodeURIComponent(response.message);
          } else if (response.status == 'error') {
            window.location.href = "thankyou.php?status=error&message=" + encodeURIComponent(response.message);
          } else if (response.status == 'cap_error') {
            $("#captcha-info").html(response.message);
          }
          //  else if (response.status == 'test') {
          //   $("#captcha-info").html(response.message);
          // }
        },
        error: function(xhr, status, error) {
          alert("An error occurred: " + error);
        }
      });
    } else {
      var msg = "Please Enter All Information";
      $("#error_msg").html(msg);
    }
  }

  function validateContactRequest() {
    var valid = true;
    $(".demoInputBox").css('background-color', '');
    $(".info").html('');


    if (!$("#requestUserName").val()) {
      $("#requestUserName-info").html("Enter your name");
      $("#requestUserName").css('border-color', '#f00');
      valid = false;
    }
    if (!$("#requestUserMobile").val()) {
      $("#requestUserMobile-info").html("Enter your mobile");
      $("#requestUserMobile").css('border-color', '#f00');
      valid = false;
    }
    if (!$("#requestUserEmail").val()) {
      $("#requestUserEmail-info").html("Enter your email");
      $("#requestUserEmail").css('border-color', '#f00');
      valid = false;
    }
    if (!$("#requestUserEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
      $("#requestUserEmail-info").html("Enter valid email");
      $("#requestUserEmail").css('border-color', '#f00');
      valid = false;
    }
    if (!$("#requestarnNo").val()) {
      $("#requestarnNo-info").html("Enter your ARN No.");
      $("#requestarnNo").css('border-color', '#f00');
      valid = false;
    }

    if (!$("#requestCaptcha").val()) {
      $("#requestCaptcha-info").html("Enter the CAPTCHA");
      $("#requestCaptcha").css('border-color', '#f00');
      valid = false;
    }

    return valid;
  }

  function reloadCaptchaRequest() {
    document.getElementById("captcha_image_request").src = "captcha.php?" + Math.random();
  }
</script>

<div id="frmContact">
  <div class="form_con">
    <div id="mail-status" style="margin-top:0px;"></div>
    <!-- <div id="error_msg" style="color:white; font-size:12px;"></div> -->
    <div class="row">

      <!-- Company Name -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" name="requestUserName" id="requestUserName" class="form-control" placeholder="Your Name" required />
          <div id="requestUserName-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- Phone No. -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" maxlength="10" name="requestUserMobile" id="requestUserMobile" class="form-control" placeholder="Your Mobile Number" required />
          <div id="requestUserMobile-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- Phone No. -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="email" name="requestUserEmail" id="requestUserEmail" class="form-control" placeholder="Your Email" required />
          <div id="requestUserEmail-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- ARN No. -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" name="requestarnNo" id="requestarnNo" class="form-control" placeholder="Your ARN No." required />
          <div id="requestarnNo-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- CAPTCHA -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" name="requestCaptcha" id="requestCaptcha" class="form-control" placeholder="Enter CAPTCHA" required />
        </div>
        <div class="form-group captcha-group">
          <img src="https://www.redvisiontechnologies.com/software/captcha.php" id="captcha_image_request" style="margin-top: 10px;" />
          <button type="button" onclick="reloadCaptchaRequest()" style="background: none; border: none; color: #fff; font-size: 12px;">Reload</button>
        </div>
        <div id="requestCaptcha-info" class="info" style="color:#fff; font-size:12px;"></div>
      </div>

      <!-- Submit Button -->
      <div class="col-md-12">
        <div class="form_control  button">
          <button name="submit" class="btn white_btn" onclick="sendContactRequest();">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>