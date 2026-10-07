<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
  #contact_us {
    width: 60%;
    margin: 0 auto;
  }

  input,
  select,
  textarea {
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
  }

  .btn-line-primary {
    background-color: #f00;
    padding: 11px 10px;
    border: 1px solid #f00;
    cursor: pointer;
    color: #fff;
    border-radius: 4px;
  }

  #con_cap {
    margin: 0 10px 0 10px;
    width: 95%;
  }

  .captcha_field {
    width: 80%;
  }

  .captcha_code img {
    height: 40px;
  }

  .cptcha-group {
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>

<form class="primary_light_form" role="form" name="contact_us" id="contact_us" method="post" action="apimail.php">
  <input type="hidden" name="form_part" id="form_part" value="contact">
  <div class="row">
    <div class="col-sm-6 col-xs-12">
      <div class="form-group">

        <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Enter Name">
        <span id="contact_name_msg" class="error"> </span>
      </div>
      <?php if (isset($_GET['con_ne'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Your Name
        </div>
      <?php } ?>
      <?php if (isset($_GET['con_new1'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Valid Name
        </div>
      <?php } ?>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="form-group">

        <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Enter Email">
        <span id="contact_email_msg" class="error"> </span>
      </div>
      <?php if (isset($_GET['con_ee'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Your Email
        </div>
      <?php } ?>
      <?php if (isset($_GET['con_eew'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Valid Email
        </div>
      <?php } ?>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="form-group">

        <input type="text" maxlength="10" class="form-control" id="contact_mobile" name="contact_mobile"
          placeholder="Enter Mobile No.">
        <span id="contact_mobile_msg" class="error"> </span>
      </div>
      <?php if (isset($_GET['con_me'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Your Mobile No.
        </div>
      <?php } ?>
      <?php if (isset($_GET['con_mew'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter valid Mobile No.
        </div>
      <?php } ?>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="form-group">

        <input type="text" class="form-control" id="contact_city" name="contact_city" placeholder="Enter City">
        <span id="contact_city_msg" class="error"> </span>
      </div>
      <?php if (isset($_GET['con_ce'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Your City
        </div>
      <?php } ?>
      <?php if (isset($_GET['con_cew'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Valid City
        </div>
      <?php } ?>
    </div>

    <div class="col-sm-6 col-xs-12">
      <div class="form-group">

        <input type="text" onkeypress="isInputNum(event)" class="form-control" id="contact_arn_No" name="contact_arn_No"
          placeholder="Enter Arn No.">
        <span id="contact_arn_No_msg" class="error"> </span>
      </div>
      <?php if (isset($_GET['con_ae'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Your Arn No.
        </div>
      <?php } ?>
      <?php if (isset($_GET['con_aew'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter valid Arn No.
        </div>
      <?php } ?>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="form-group drop_item">

        <select name="cal_option" class="w100 form-control" id="cal_option" required="required" style="width: 100%;">
          <option value="">Interested In</option>
          <option value="Wealth Elite">Wealth Elite</option>
          <option value="Robo App">Robo App</option>
          <option value="Web Robo">Web Robo</option>
          <option value="Financial Website">Financial Website</option>
          <option value="Business Booster">Business Booster</option>
          <option value="Advisory X App">Advisory X App</option>
          <option value="Digital Marketing Services">Digital Marketing Services</option>
          <option value="Sales Ninja CRM">Sales Ninja CRM</option>


        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <textarea id="contact_message" name="contact_message" class="form-control" placeholder="Enter Message" rows="6"
          style="height:127px"></textarea>
        <span id="contact_message_msg" class="error"> </span>
      </div>
      <?php if (isset($_GET['con_ms'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Please Enter Your Arn No.
        </div>
      <?php } ?>
    </div>

    <div class="col-md-6 cptcha-group">
      <?php if (isset($_GET['con_new'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#F00;">
          <a href="#" class="" data-dismiss="alert" aria-label="">&times;</a>
          Please Enter Correct Code
        </div>
        <?php
      } ?>

      <!-- Captcha Start -->
      <div class="form-group ftrfrmcptainner captcha_code">
        <img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA">
      </div>
      <div class="form-group ftrfrmgrp captcha_field">
        <input type="text" size="6" maxlength="5" id="con_cap" name="con_cap" value="" class="form-control"
          placeholder="Enter Code">
        <span id="con_cap_msg" class="error"> </span>
      </div>
      <!-- Captcha End -->

      <?php if (isset($_GET['con_msg'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:#3DC7D2;">
          <a href="#" class="" data-dismiss="alert" aria-label="">&times;</a>
          <?php /*?> <?php echo $_GET['msg']; ?><?php */ ?>
          <strong>We have received the information submitted by you and our team will be in touch with you shortly
            to process the information.</strong>
        </div>
      <?php } ?>
      <?php if (isset($_GET['con_nmsg'])) { ?>
        <div class="form-group alert" style="margin-bottom:6px;color:red;">
          <a href="#" class="" data-dismiss="alert" aria-label="">&times;</a>
          <?php
          echo "<strong>" . $_GET['con_nmsg'] . "</strong>";
          echo "<br>";
          echo "<strong>Try Again</strong>";
          ?>
        </div>
      <?php } ?>
      <button type="submit" class="btn btn-line-primary" name="contact_us_submit" id="contact_us_submit"
        style="width:100%" onClick="return valid_entry();">Submit</button>
      <input type="hidden" name="action_chk" id="action_chk" value="not_self">
    </div>
  </div>
</form>