<form class="primary_light_form pop_page_form" role="form" id="popup_form">
    <span id="form_message"></span>
    <input type="hidden" name="popup_part" id="popup_part" value="requestpopup">
    <div class="row">
        <!-- Name Field -->
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" id="pop_name" name="pop_name" placeholder="Enter Name">
                <span id="pop_name_msg" class="error"></span>
            </div>
        </div>
        <!-- Email Field -->
        <div class="col-md-12">
            <div class="form-group">
                <input type="email" class="form-control" id="pop_email" name="pop_email" placeholder="Enter Email">
                <span id="pop_email_msg" class="error"></span>
            </div>
        </div>
        <!-- Mobile Field -->
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" id="pop_mobile" name="pop_mobile" placeholder="Enter Mobile No."
                    maxlength="10">
                <span id="pop_mobile_msg" class="error"></span>
            </div>
        </div>
        <!-- City Field -->
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" id="pop_city" name="pop_city" placeholder="Enter City">
                <span id="pop_city_msg" class="error"></span>
            </div>
        </div>
        <!-- ARN No Field -->
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" id="pop_arn" name="pop_arn" placeholder="Enter ARN No.">
                <span id="pop_arn_msg" class="error"></span>
            </div>
        </div>
        <!-- Interested In Dropdown -->
        <div class="col-md-12">
            <div class="form-group dropdown-group">
                <select class="form-control" id="pop_service" name="pop_service">
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


                <span id="pop_service_msg" class="error"></span>
            </div>
        </div>
        <!-- Message Field -->
        <div class="col-md-12">
            <div class="form-group">
                <textarea class="form-control" id="pop_message" name="pop_message" placeholder="Enter Message"
                    rows="4"></textarea>
                <span id="pop_message_msg" class="error"></span>
            </div>
        </div>
        <!-- Captcha Field -->
        <div class="col-md-12">
            <div class="form-group captcha-group">
                <div class="d-flex align-items-center justify-content-between  gap-3 w-100">
                    <div class="d-flex align-items-center gap-3 flex-grow-1 ">
                        <img src="/captcha.php" id="captcha_code1" alt="CAPTCHA">
                        <div class="flex-grow-1">
                            <input type="text" class="form-control w-100" id="pop_cap" name="pop_cap"
                                placeholder="Enter Code">
                            <span id="pop_cap_msg" class="error"></span>
                        </div>
                    </div>
                    <button name="submit" type="button"
                        class="btn btn-primary btnRefresh d-flex align-items-center justify-content-center"
                        onClick="refreshCaptcha1();" style="width: 45px;">
                        <i class="bi bi-arrow-clockwise" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="col-md-12">
            <button type="button" class="btn btn-primary disabled-btn" id="popup_submit_form">Submit</button>
        </div>
        <input type="hidden" name="action_popup" id="action_popup" value="not_self">
    </div>
</form>



<!--<script>
    document.getElementById('submit_form').addEventListener('click', function(event) {
        event.preventDefault();
        const disabledButton = document.querySelector('.disabled-btn');
                disabledButton.disabled = true;

        let valid = true;

        // Clear previous error messages
        document.querySelectorAll('.error').forEach(el => el.innerText = '');

        // Validate fields
        const fields = {
            pop_name: /^[a-zA-Z\s]+$/, // Letters and spaces
            pop_email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, // Standard email format
            pop_mobile: /^\d{10}$/, // 10-digit number
            pop_city: /^[a-zA-Z\s]+$/, // Letters and spaces
            pop_arn: /^\d+$/, // One or more digits
            pop_message: /^.+$/, // Non-empty string
            pop_service: /^.+$/, // Non-empty string for dropdown
            pop_cap: /^.+$/, // Non-empty string for CAPTCHA
        };

        const customMessages = {
            pop_name: "Please enter valid name",
            pop_email: "Please enter valid email",
            pop_mobile: "Please enter valid mobile",
            pop_city: "Please enter valid city",
            pop_arn: "Please enter valid ARN number",
            pop_service: "Please select service",
            pop_message: "Please enter valid message",
            pop_cap: "Please enter valid captcha",
        };


        for (const [field, regex] of Object.entries(fields)) {
            const value = document.getElementById(field).value.trim();
            if (!value || !regex.test(value)) {
                document.getElementById(`${field}_msg`).innerText = customMessages[field];
                valid = false;
            } else {
                document.getElementById(`${field}_msg`).innerText = ""; // Clear error message if valid
            }
        }
        if (valid) {
            // Submit form data via AJAX
            const formData = new FormData(document.getElementById('popup_form'));
            fetch('form_popup_data.php', {
                    method: 'POST',
                    body: formData, // Assuming formData is a valid FormData object
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        window.location.href = "https://redvisiontechnologies.com/thanks.php#thankssection";
                    } else if (data.status === 'existing_error') {
                        window.location.href = "https://redvisiontechnologies.com/thanks.php?req=err";
                    } else if (data.status === 'captcha_error') {
                        document.getElementById('pop_cap_msg').innerHTML = data.errors;
                    } else {
                        document.getElementById('form_message').innerHTML = data.errors;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
    function refreshCaptcha() {
                var mytime = "ms=" + new Date().getMilliseconds();
                $("#captcha_code").attr('src', 'captcha.php?' + mytime);
            }
</script>-->

<script>
    document.getElementById('popup_submit_form').addEventListener('click', function (event) {
        event.preventDefault();

        const submitButton1 = document.querySelector('.disabled-btn');
        const originalText = submitButton1.innerText;

        // Button disable + text change
        submitButton1.disabled = true;
        submitButton1.innerText = "Submitting...";

        let valid = true;

        // Clear previous error messages
        document.querySelectorAll('.error').forEach(el => el.innerText = '');

        // Validation rules
        const fields = {
            pop_name: /^[a-zA-Z\s]+$/,
            pop_email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
            pop_mobile: /^\d{10}$/,
            pop_city: /^[a-zA-Z\s]+$/,
            pop_arn: /^\d+$/,
            pop_message: /^.+$/,
            pop_service: /^.+$/,
            pop_cap: /^.+$/,
        };

        const customMessages = {
            pop_name: "Please enter valid name",
            pop_email: "Please enter valid email",
            pop_mobile: "Please enter valid mobile",
            pop_city: "Please enter valid city",
            pop_arn: "Please enter valid ARN number",
            pop_service: "Please select service",
            pop_message: "Please enter valid message",
            pop_cap: "Please enter valid captcha",
        };

        // Validate all fields
        for (const [field, regex] of Object.entries(fields)) {
            const input = document.getElementById(field);
            const value = input ? input.value.trim() : '';
            if (!value || !regex.test(value)) {
                document.getElementById(`${field}_msg`).innerText = customMessages[field];
                valid = false;
            } else {
                document.getElementById(`${field}_msg`).innerText = "";
            }
        }

        // Agar validation fail
        if (!valid) {
            submitButton1.disabled = false;
            submitButton1.innerText = originalText; // Reset button text
            return;
        }

        // Validation pass → AJAX submit
        const form = document.getElementById('popup_form');
        const formData = new FormData(form);

        fetch('form_popup_data.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    form.reset();
                    setTimeout(() => {
                        window.location.href =
                            "https://redvisiontechnologies.com/thanks.php#thankssection";
                    }, 1000);

                } else if (data.status === 'existing_error') {
                    window.location.href = "https://redvisiontechnologies.com/thanks.php?req=err";
                } else if (data.status === 'captcha_error') {
                    document.getElementById('pop_cap_msg').innerHTML = data.errors;
                } else {
                    document.getElementById('form_message').innerHTML = data.errors;
                }

                // AJAX complete → button enable & text reset
                submitButton1.disabled = false;
                submitButton1.innerText = originalText;
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('form_message').innerText = "Network error! Please try again.";
                submitButton1.disabled = false;
                submitButton1.innerText = originalText;
            });
    });

    // Refresh captcha function
    function refreshCaptcha1() {
        var mytime = "ms=" + new Date().getMilliseconds();
        $("#captcha_code1").attr('src', 'captcha.php?' + mytime);
    }
</script>