<script>
  function sendContactModal() {
    var valid = validateContactModal();

    if (valid) {
      jQuery.ajax({
        url: "modal_mail.php",
        data: 'modalUserName=' + $("#modalUserName").val() +
          '&modalUserMobile=' + $("#modalUserMobile").val() +
          '&modalUserEmail=' + $("#modalUserEmail").val() +
          '&arnNoModal=' + $("#arnNoModal").val() +
          '&captchaModal=' + $("#captchaModal").val(),
        type: "POST",
        dataType: "json",
        success: function(response) {
          if (response.status == 'success') { // Check for both 1 and true
            window.location.href = "thankyou.php?status=success&message=" + encodeURIComponent(response.message);
          } else if (response.status == 'error') {
            window.location.href = "thankyou.php?status=error&message=" + encodeURIComponent(response.message);
          } else if (response.status == 'cap_error') {
            $("#captchaModal-info").html(response.message);
          }
          //  else if (response.status == 'test') {
          //   $("#captchaModal-info").html(response.message);
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

  function validateContactModal() {
    var valid = true;
    $(".demoInputBox").css('border-color', '');
    $(".info").html('');


    if (!$("#modalUserName").val()) {
      $("#modalUserName-info").html("Enter your name");
      $("#modalUserName").css('border-color', '#f00');
      valid = false;
    }
    if (!$("#modalUserMobile").val()) {
      $("#modalUserMobile-info").html("Enter your mobile");
      $("#modalUserMobile").css('border-color', '#f00');
      valid = false;
    }
    if (!$("#modalUserEmail").val()) {
      $("#modalUserEmail-info").html("Enter your email");
      $("#modalUserEmail").css('border-color', '#f00');
      valid = false;
    }
    if (!$("#modalUserEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
      $("#modalUserEmail-info").html("Enter valid email");
      $("#modalUserEmail").css('border-color', '#f00');
      valid = false;
    }
    if (!$("#arnNoModal").val()) {
      $("#arnNoModal-info").html("Enter your ARN No.");
      $("#arnNoModal").css('border-color', '#f00');
      valid = false;
    }

    if (!$("#captchaModal").val()) {
      $("#captchaModal-info").html("Enter the CAPTCHA");
      $("#captchaModal").css('border-color', '#f00');
      valid = false;
    }

    return valid;
  }

  function reloadCaptchaModal() {
    document.getElementById("captcha_image_modal").src = "captcha.php?" + Math.random();
  }
</script>

<div id="modalForm">
  <div class="form_con">
    <div id="mail-status" style="margin-top:0px;"></div>
    <!-- <div id="error_msg" style="color:white; font-size:12px;"></div> -->
    <div class="row">

      <!-- Company Name -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" name="modalUserName" id="modalUserName" class="form-control" placeholder="Your Name" required />
          <div id="modalUserName-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- Phone No. -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" maxlength="10" name="modalUserMobile" id="modalUserMobile" class="form-control" placeholder="Your Mobile Number" required />
          <div id="modalUserMobile-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- Phone No. -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="email" name="modalUserEmail" id="modalUserEmail" class="form-control" placeholder="Your Email" required />
          <div id="modalUserEmail-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- ARN No. -->
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" name="arnNoModal" id="arnNoModal" class="form-control" placeholder="Your ARN No." required />
          <div id="arnNoModal-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- CAPTCHA -->
      <div class="col-md-12">
        <div class="form-group captcha-group">
          <input type="text" name="captchaModal" id="captchaModal" class="form-control" placeholder="Enter CAPTCHA" required />
          <img src="https://www.redvisiontechnologies.com/software/captcha.php" id="captcha_image_modal" style="margin-top: 10px;" />
          <button type="button" onclick="reloadCaptchaModal()" style="background: none; border: none; color: #fff; font-size: 12px;">Reload</button>
        </div>
        <div id="captchaModal-info" class="info" style="color:#fff; font-size:12px;"></div>
      </div>

      <!-- Submit Button -->
      <div class="col-md-12">
        <div class="form_control  button">
          <button name="submit" class="btn white_btn" onclick="sendContactModal();">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>