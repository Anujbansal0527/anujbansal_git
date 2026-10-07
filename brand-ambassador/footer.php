</main>
<footer class="rvba-footer">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-widget">
                        <div class="logo">
                            <img src="assets/images/logo.png" alt="Footer Logo">
                        </div>
                        <p>REDVision is a leading Fintech company bringing its exclusive mentorship program designed for MFDs.</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="footer-widget contact-widget">
                        <div class="text-box">
                            <h4 class="title">Get In Touch</h4>
                            <ul>
                                <li><a href="tel:+919039822000"><i class="flaticon-phone-call"></i> +91 9039822000</a></li>
                                <li><a href="mailto:info@redvisionglobal.com"><i class="flaticon-mail"></i> info@redvisionglobal.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text text-center">
                        <p><?php echo date("Y"); ?> &copy; REDVision Brand Ambassador Program. All rights resereved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/style.js"></script>

<script>
    function rvba_valid_entry() {
        var rvba_name = $('#rvba_name').val();
        var rvba_arn_no = $('#rvba_arn_no').val();
        var rvba_email = $('#rvba_email').val();
        var rvba_mobile = $('#rvba_mobile').val();
        var rvba_city = $('#rvba_city').val();
        var rvba_product_option = $('#rvba_product_option').val();
        var rvba_captcha = $('#rvba_captcha').val();
        var error_log = '';

        console.log(rvba_name);

        // 1 Name
        if (rvba_name == '') {
            $('#rvba_name').css('border', '1px solid red');
            $('#rvba_name_msg').html('Please Enter Name');
            error_log += 'Please Enter Name';
        } else {
            var RegExpression = /^[a-zA-Z\s]*$/;
            if (RegExpression.test($('#rvba_name').val())) {
                $('#rvba_name').css('border', '');
                $('#rvba_name_msg').html('');
            } else {
                $('#rvba_name').css('border', '1px solid red');
                $('#rvba_name_msg').html('Please Enter Valid Name');
                error_log += 'Please Enter Name Valid Name';
            }
        }

        // 2 ARN No.
        if (rvba_arn_no == '') {
            $('#rvba_arn_no').css('border', '1px solid red');
            $('#rvba_arn_no_msg').html('Please Enter Arn No');
            error_log += 'Please Enter Arn No';
        } else {
            if (!isNaN($('#rvba_arn_no').val())) {
                $('#rvba_arn_no').css('border', '');
                $('#rvba_arn_no_msg').html('');
            } else {
                $('#rvba_arn_no').css('border', '1px solid red');
                $('#rvba_arn_no_msg').html('Please Enter Valid Arn No');
                error_log += 'Please Enter Valid Arn No';
            }
        }

        // 3 Email
        if (rvba_email == '') {
            $('#rvba_email').css('border', '1px solid red');
            $('#rvba_email_msg').html('Please Enter Email');
            error_log += 'Please Enter Email';
        } else {
            var RegExpression_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            if (RegExpression_email.test($('#rvba_email').val())) {
                $('#rvba_email').css('border', '');
                $('#rvba_email_msg').html('');
            } else {
                $('#rvba_email').css('border', '1px solid red');
                $('#rvba_email_msg').html('Please Enter Valid Email');
                error_log += 'Please Enter Valid Email';
            }
        }

        // 4 Mobile
        if (rvba_mobile == '') {
            $('#rvba_mobile').css('border', '1px solid red');
            $('#rvba_mobile_msg').html('Please Enter Mobile');
            error_log += 'Please Enter Mobile';
        } else {

            if (!isNaN($('#rvba_mobile').val())) {
                var phoneno = /^\d{10}$/;
                if ($('#rvba_mobile').val().match(phoneno)) {
                    $('#rvba_mobile').css('border', '');
                    $('#rvba_mobile_msg').html('');
                } else {
                    $('#rvba_mobile').css('border', '1px solid red');
                    $('#rvba_mobile_msg').html('Please Enter Valid Mobile No.');
                    error_log += 'Please Enter Valid Mobile No';
                }
            } else {
                $('#rvba_mobile').css('border', '1px solid red');
                $('#rvba_mobile_msg').html('Please Enter Valid Mobile No..');
                error_log += 'Please Enter Valid Mobile No';
            }
        }

        // 5 City
        if (rvba_city == '') {
            $('#rvba_city').css('border', '1px solid red');
            $('#rvba_city_msg').html('Please Enter City');
            error_log += 'Please Enter City';
        } else {

            if (!isNaN($('#rvba_city').val())) {
                $('#rvba_city').css('border', '1px solid red');
                $('#rvba_city_msg').html('Please Enter Valid City');
                error_log += 'Please Enter valid City';
            } else {
                $('#rvba_city_msg').html('');
                $('#rvba_city').css('border', '');
            }
        }

        // 6 Product
        if (rvba_product_option == null) {
            $('#rvba_product_option').css('border', '1px solid red');
            $('#rvba_product_option_msg').html('Please Select Any Product');
            error_log += 'Please Select Any Product';
        } else {
            $('#rvba_product_option_msg').html('');
            $('#rvba_product_option').css('border', '');
        }

        // 7 Captcha
        if (rvba_captcha == '') {
            $('#rvba_captcha').css('border', '1px solid red');
            $('#rvba_captcha_msg').html('Please Enter Captch Code');
            error_log += 'Please Enter Captch Code';
        } else {
            var matchcap = /^\d{5}$/;

            if ($('#rvba_captcha').val().match(matchcap)) {
                $('#rvba_captcha').css('border', '');
                $('#rvba_captcha_msg').html('');
            } else {
                $('#rvba_captcha').css('border', '1px solid red');
                $('#rvba_captcha_msg').html('Please Enter Valid Captcha');
                error_log += 'Please Enter Valid Captcha';
            }
        }

        if (error_log == '') {
            return true;
        } else {
            return false;
        }
    }
</script>

</body>

</html>