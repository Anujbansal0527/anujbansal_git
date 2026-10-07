<script>
  function sendContact() {
    var valid = validateContact();

    if (valid) {
      jQuery.ajax({
        url: "contact_mail.php",
        data: 'userName=' + $("#userName").val() +
          '&userMobile=' + $("#userMobile").val() +
          '&userEmail=' + $("#userEmail").val() +
          '&arnNo=' + $("#arnNo").val(),
        type: "POST",
        dataType: "json",
        success: function(response) {
          $("#userName").val('');
          $("#userMobile").val('');
          $("#userEmail").val('');
          $("#arnNo").val('');
          if (response.status == 1) { // Check for both 1 and true
            window.location.href = "thankyou.php?status=success&message=" + encodeURIComponent(response.message);
          } else {
            window.location.href = "thankyou.php?status=error&message=" + encodeURIComponent(response.message);
          }
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

  function validateContact() {
    var valid = true;
    $(".demoInputBox").css('background-color', '');
    $(".info").html('');


    if (!$("#userName").val()) {
      $("#userName-info").html("(required)");
      $("#userName").css('background-color', '#FFF');
      valid = false;
    }
    if (!$("#userMobile").val()) {
      $("#userMobile-info").html("(required)");
      $("#userMobile").css('background-color', '#FFF');
      valid = false;
    }
    if (!$("#userEmail").val()) {
      $("#userEmail-info").html("(required)");
      $("#userEmail").css('background-color', '#FFF');
      valid = false;
    }
    if (!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
      $("#userEmail-info").html("(invalid)");
      $("#userEmail").css('background-color', '#FFFFDF');
      valid = false;
    }
    if (!$("#arnNo").val()) {
      $("#arnNo-info").html("(required)");
      $("#arnNo").css('background-color', '#FFF');
      valid = false;
    }

    return valid;
  }
</script>

<div id="frmContact">
  <div class="form_con">
    <div id="mail-status" style="margin-top:0px;"></div>
    <!-- <div id="error_msg" style="color:white; font-size:12px;"></div> -->
    <div class="row">

      <!-- Company Name -->
      <div class="col-md-3">
        <div class="form-group">
          <input type="text" name="userName" id="userName" class="form-control" placeholder="Your Name" required />
          <div id="userName-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- Phone No. -->
      <div class="col-md-3">
        <div class="form-group">
          <input type="text" maxlength="10" name="userMobile" id="userMobile" class="form-control" placeholder="Your Mobile Number" required />
          <div id="userMobile-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- Phone No. -->
      <div class="col-md-3">
        <div class="form-group">
          <input type="email" name="userEmail" id="userEmail" class="form-control" placeholder="Your Email" required />
          <div id="userEmail-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>
      <!-- ARN No. -->
      <div class="col-md-3">
        <div class="form-group">
          <input type="text" name="arnNo" id="arnNo" class="form-control" placeholder="Your ARN No." required />
          <div id="arnNo-info" class="info" style="color:#fff; font-size:12px;"></div>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="col-md-3">
        <div class="form_control  button">
          <button name="submit" class="btn white_btn" onclick="sendContact();">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>