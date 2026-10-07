<form class="primary_light_form contact_page_form" role="form" id="contact_us_form">
    <span id="form_message"></span>
    <input type="hidden" name="form_part" id="form_part" value="contact">
    <div class="row">
        <!-- Name Field -->
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter Name">
                <span id="contact_name_msg" class="error"></span>
            </div>
        </div>
        <!-- Email Field -->
        <div class="col-md-6">
            <div class="form-group">
                <input type="email" class="form-control" id="contact_email" name="contact_email"
                    placeholder="Enter Email">
                <span id="contact_email_msg" class="error"></span>
            </div>
        </div>
        <!-- Mobile Field -->
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" id="contact_mobile" name="contact_mobile"
                    placeholder="Enter Mobile No." maxlength="10">
                <span id="contact_mobile_msg" class="error"></span>
            </div>
        </div>
        <!-- City Field -->
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" id="contact_city" name="contact_city" placeholder="Enter City">
                <span id="contact_city_msg" class="error"></span>
            </div>
        </div>
        <!-- ARN No Field -->
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" id="contact_arn_No" name="contact_arn_No"
                    placeholder="Enter ARN No.">
                <span id="contact_arn_No_msg" class="error"></span>
            </div>
        </div>
        <!-- Interested In Dropdown -->
        <div class="col-md-6">
            <div class="form-group dropdown-group">
                <select class="form-control" id="service" name="service">
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
                <span id="service_msg" class="error"></span><br />
            </div>
        </div>
        <!-- Message Field -->
        <div class="col-md-6">
            <div class="form-group">
                <textarea class="form-control" id="message" name="message" placeholder="Enter Message"
                    rows="4"></textarea>
                <span id="message_msg" class="error"></span><br />
            </div>
        </div>
        <!-- Captcha Field -->
        <div class="col-md-6">
            <div class="form-group captcha-group">
                <div class="rv-rvrefreshbtn" id="rvrefreshbtn">
                    <div class="rvrefreshbtn_div">
                        <img src="/captcha.php" id="captcha_code" alt="CAPTCHA" class="rounded border">
                        <button name="submit" type="button"
                            class="btn btn-primary btnRefresh d-flex align-items-center justify-content-center"
                            onClick="refreshCaptcha();" style="width: 45px;">
                            <i class="bi bi-arrow-clockwise" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="">
                        <input type="text" class="form-control w-100" id="con_cap" name="con_cap"
                            placeholder="Enter Code">
                        <span id="con_cap_msg" class="error"></span>
                    </div>

                </div>
            </div>
            <button type="button" class="btn btn-line-primary w-100 disabled-btn" id="submit_form">Submit</button>
            <input type="hidden" name="action_chk" id="action_chk" value="not_self">


        </div>
        <div class="col-md-12">
            <span id="prev_sub_msg" class="error"></span>
        </div>

    </div>
</form>