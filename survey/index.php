<?php include('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="EN">

<head>
    <title>Social Media Survey</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">


    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/inter/font.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script>
        function sendContact() {
            var valid = validateContact();

            var surveyOneArray = [];
            $.each($("input[name='surveyOne']:checked"), function() {
                surveyOneArray.push($(this).val());
            });
            var surveyOneVal = surveyOneArray.join(", ");

            var surveyThreeArray = [];
            $.each($("input[name='surveyThree']:checked"), function() {
                surveyThreeArray.push($(this).val());
            });
            var surveyThreeVal = surveyThreeArray.join(", ");

            var surveyFourArray = [];
            $.each($("input[name='surveyFour']:checked"), function() {
                surveyFourArray.push($(this).val());
            });
            var surveyFourVal = surveyFourArray.join(", ");

            var surveyFiveArray = [];
            $.each($("input[name='surveyFive']:checked"), function() {
                surveyFiveArray.push($(this).val());
            });
            var surveyFiveVal = surveyFiveArray.join(", ");

            var surveySixArray = [];
            $.each($("input[name='surveySix']:checked"), function() {
                surveySixArray.push($(this).val());
            });
            var surveySixVal = surveySixArray.join(", ");

            if (valid) {

                // Insert Ajax 
                jQuery.ajax({
                    url: "survey_mail.php",
                    data: 'name=' + $("#name").val() + '&arn=' + $("#arn").val() + '&email=' + $("#email").val() + '&mobile=' + $("#mobile").val() + '&surveyOne=' + surveyOneVal + '&surveyTwo=' + $('input[name="surveyTwo"]:checked').val() + '&surveyThree=' + surveyThreeVal + '&surveyFour=' + surveyFourVal + '&surveyFive=' + surveyFiveVal + '&surveySix=' + surveySixVal + '&surveyFourOption=' + $("#question-four-oth").val() + '&surveyFiveOption=' + $("#question-five-oth").val(),
                    type: "POST",
                    success: function(data) {
                        if (data.status === false) {
                            $("#mail-status").html(data.message);
                            $('.survey-area-form').fadeOut();
                            $('.survey-top').fadeOut();
                            $('.survey-img').fadeOut();
                            // $(".survey-header").css('display', 'none');
                            $(".response-body").addClass('show');
                            $(".message").html(data.message);
                        } else if (data.status === true) {
                            $('.survey-img').fadeIn();
                            $('.survey-img').addClass('show-img');
                            $('.survey-area-form').fadeOut();
                            $('.survey-top').fadeOut();
                            $("#mail-status").html(data.message);
                            // $(".survey-header").css('display', 'none');
                            // $(".response-body").addClass('show');
                            // $(".message").html(data.message);
                            // $(".sub-message").html(data.subMessage);
                        }

                    },
                    error: function() {}
                });
            } else {
                msg = "Please Enter All Information";
                $("#error_msg").html(msg);
            }
        }

        function validateContact() {
            var valid = true;
            $(".demoInputBox").css('background-color', '');
            $(".info").html('');

            if (!$("#name").val()) {
                $(".name-error").html("Please enter your name");
                $("#name").css('border-color', '#f00000');
                valid = false;
            }
            if (!$("#email").val()) {
                $(".email-error").html("Please enter your email");
                $("#email").css('border-color', '#f00000');
                valid = false;
            }
            if (!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                $(".email-error").html("Invalid email ID");
                $("#email").css('border-color', '#f00000');
                valid = false;
            }

            if (!$("#mobile").val().match(/^\d*(?:\.\d{1,2})?$/)) {
                $(".mobile-error").html("Invalid movile number");
                $("#mobile").css('border-color', '#f00000');
                valid = false;
            }
            if (!$("#mobile").val()) {
                $(".mobile-error").html("Please enter your Mobile No.");
                $("#mobile").css('border-color', '#f00000');
                valid = false;
            }

            if (!$("#arn").val()) {
                $(".arn-error").html("Please enter your ARN No.");
                $("#arn").css('border-color', '#f00000');
                valid = false;
            }

            return valid;
        }

        // $("input[type='checkbox'][name='surveyOne']").change(function() {
        //     if ($("input[type='checkbox'][name='check']:checked").length){
        //         $(this).valid();
        //         console.log('Ok');
        //     }
        //     else{
        //         console.log('Not Ok');
        //     }
        // })
    </script>


</head>

<section class="digital-marketing-survey">
    <header class="survey-header">
        <div class="container">
            <div class="logo">
                <img src="assets/images/logo.png" alt="">
            </div>
        </div>
    </header>



    <div classs="survey-body">
        <div class="container">
            <div class="survey-top">
                <h3 class="title">The most used social media platforms in India</h3>
            </div>
            <div id="mail-status" style="margin-top:0px;"></div>
            <div class="survey-img">

                <img class="survey-result-desktop" src="assets/images/survey.png" alt="Servey">
                <img class="survey-result-mobile" src="assets/images/survey-mobile.png" alt="Servey Mobile">
                <div class="result-btn">
                    <button id="viewResult" class="btn btn-primary">View Result</button>
                </div>
            </div>
            <!-- <div class="result-btn">
            <button id="viewResult" class="btn btn-primary">Start Survey</button>
        </div> -->

            <div class="survey-form">
                <div class="survey-area-form">
                    <div id="error_msg" style="color:red; font-size:16px;"></div>

                    <div class="progressbar">
                        <div class="progress-step progress-step-active"></div>
                        <div class="progress-step"></div>
                        <div class="progress-step"></div>
                        <div class="progress-step"></div>
                        <div class="progress-step"></div>
                        <div class="progress-step"></div>

                        <div class="progress" id="progress"></div>
                    </div>


                    <div class="form-step form-step-active">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>1. Which social media platforms does your MFD business currently utilize for lead generation?</h4>
                                <div class="form-group radio-group">
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyOne" id="surveyOne1" type="checkbox" value="1" />
                                            <em>Facebook</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyOne" id="surveyOne2" type="checkbox" value="2" />
                                            <em>Twitter</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyOne" id="surveyOne3" type="checkbox" value="3" />
                                            <em>Instagram</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyOne" id="surveyOne4" type="checkbox" value="4" />
                                            <em>LinkedIn</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyOne" id="surveyOne5" type="checkbox" value="5" />
                                            <em>Youtube</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <span class="error servey-one-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn">
                                    <button href="#" class="btn btn-primary next-btn next-btn-one" disabled>Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-step">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>2. MFDs, how frequently do you post on your social media accounts?</h4>
                                <div class="form-group radio-group">
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyTwo" id="surveyTwo1" type="radio" value="1" />
                                            <em>Multiple times a day</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyTwo" id="surveyTwo2" type="radio" value="2" />
                                            <em> Once a day</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyTwo" id="surveyTwo3" type="radio" value="3" />
                                            <em> 2-3 times a week</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyTwo" id="surveyTwo4" type="radio" value="4" />
                                            <em> Once a week</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyTwo" id="surveyTwo5" type="radio" value="5" />
                                            <em>Less than once a week</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <span class="error servey-two-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group">
                                    <button href="#" class="btn btn-primary previous-btn">Previous</button>
                                    <button href="#" class="btn btn-primary next-btn next-btn-two" disabled>Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-step">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>3. What is your primary goal for using social media for your MFD business?</h4>
                                <div class="form-group radio-group">
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyThree" id="surveyThree1" type="checkbox" value="1" />
                                            <em> Brand awareness</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyThree" id="surveyThree2" type="checkbox" value="2" />
                                            <em> Lead generation</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyThree" id="surveyThree3" type="checkbox" value="3" />
                                            <em>Customer engagement</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyThree" id="surveyThree4" type="checkbox" value="4" />
                                            <em>Driving website traffic</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyThree" id="surveyThree5" type="checkbox" value="5" />
                                            <em>Sales and conversions</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyThree" id="surveyThree6" type="checkbox" value="6" />
                                            <em>Communication</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyThree" id="surveyThree7" type="checkbox" value="7" />
                                            <em>Entertainment</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <span class="error servey-three-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group">
                                    <button href="#" class="btn btn-primary previous-btn">Previous</button>
                                    <button href="#" class="btn btn-primary next-btn next-btn-three" disabled>Next</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-step">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>4. Which financial influencer do you follow on social media?</h4>
                                <div class="form-group radio-group">
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFour" id="surveyFour1" type="radio" value="1" onclick="optionFour();" />
                                            <em>Pranjal Kamra</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFour" id="surveyFour2" type="radio" value="2" onclick="optionFour();" />
                                            <em>CA Rachna Ranade</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFour" id="surveyFour3" type="radio" value="3" onclick="optionFour();" />
                                            <em>Sharan Hegde</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFour" id="surveyFour4" type="radio" value="4" onclick="optionFour();" />
                                            <em>Neha Nagar</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFour" id="surveyFour5" type="radio" value="5" onclick="optionFour();" />
                                            <em>Ankur Warikoo</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFour" id="surveyFour6" type="radio" value="6" onclick="optionFour();" />
                                            <em>Akshat Shrivastava</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-other">
                                        <label class="radio">
                                            <input class="other-option-four" name="surveyFour" id="surveyFour7" type="radio" value="7" onclick="optionFour();" />
                                            <em>Other</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group question-four-other d-none">
                                        <input class="form-control" name="question-four-oth" id="question-four-oth" type="text" value="" placeholder="Enter here" />
                                    </div>
                                    <span class="error servey-four-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group">
                                    <button href="#" class="btn btn-primary previous-btn">Previous</button>
                                    <button href="#" class="btn btn-primary next-btn next-btn-four" disabled>Next</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-step">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>5. Which Youtuber do you like the most?</h4>
                                <div class="form-group radio-group">
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFive" id="surveyFive1" type="radio" value="1"  onclick="optionFive();"/>
                                            <em>CA Rachna Ranade (CA Rachna Ranade)</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFive" id="surveyFive2" type="radio" value="2"  onclick="optionFive();"/>
                                            <em>Pranjal Kamra (Pranjal Kamra)</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFive" id="surveyFive3" type="radio" value="3"  onclick="optionFive();"/>
                                            <em>Ankur Warikoo (Ankur Warikoo)</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFive" id="surveyFive4" type="radio" value="4"  onclick="optionFive();"/>
                                            <em>Anant Ladha (Invest Aaj For Kal)</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFive" id="surveyFive5" type="radio" value="5"  onclick="optionFive();"/>
                                            <em>Mukul Malik (Asset Yogi)</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio">
                                            <input name="surveyFive" id="surveyFive6" type="radio" value="6"  onclick="optionFive();"/>
                                            <em>Rishabh Jain and Mandeep Gill (Labour Law Advisor)</em>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                    <label class="radio">
                                    <input class="other-option-five" name="surveyFive" id="surveyFive7" type="radio" value="7" onclick="optionFive();"/>
                                    <em>Other</em>
                                    <span class="checkmark"></span>
                                    </label>
                                </div>
                                    <div class="form-group question-five-other d-none">
                                    <input class="form-control" name="question-five-oth" id="question-five-oth" type="text" value="" placeholder="Enter here"/>
                                </div>
                                    <span class="error servey-five-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group">
                                    <button href="#" class="btn btn-primary previous-btn">Previous</button>
                                    <button href="#" class="btn btn-primary next-btn next-btn-five" disabled>Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Kindly fill out the details below to see the result.</h4>
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" />
                                    <span class="error name-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!--<label>Mobile</label>-->
                                    <input type="text" maxlength="10" name="mobile" id="mobile" class="form-control" placeholder="Mobile" maxlength="10" />
                                    <span class="error mobile-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!--<label>Email</label>-->
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
                                    <span class="error email-error"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <!--<label>Email</label>-->
                                    <input type="text" name="arn" id="arn" class="form-control" placeholder="ARN No." />
                                    <span class="error arn-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group">
                                    <button href="#" class="btn btn-primary previous-btn">Previous</button>
                                    <button name="submit" class="btn btn-primary submit-btn" onclick="sendContact();">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>

            </div>
        </div>
    </div>
</section>




<!-- Jquery -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/survey.js"></script>

<script>
    $(document).ready(function() {

        $('.survey-area-form').fadeOut();
        $('#viewResult').click(function() {
            $(this).hide();
            $('.survey-top').hide();
            $('.survey-img').hide();
            $('.survey-area-form').fadeIn();
        });

    });


    // QUESTION 4 OTHER

    var optionFourVal = $('#question-four-oth').val();

    const optionFour = () => {
        if ($("#surveyFour7").is(":checked")) {
            $('.question-four-other').removeClass('d-none');
            $('.next-btn-four').attr("disabled", true);
            if (optionFourVal !== '') {
                $('.next-btn-four').attr("disabled", false);
            };
        } else {
            $('.question-four-other').addClass('d-none');
            $('#question-four-oth').attr('required', 'false');
        }
    }

    $("#question-four-oth").keyup(function() {
        $('.next-btn-four').attr("disabled", false);
    });

    // QUESTION 5 OTHER

    const optionFive = () => {
        if ($("#surveyFive7").is(":checked")) {
            $('.question-five-other').removeClass('d-none');
            $('.next-btn-five').attr("disabled", true);
            if (optionFiveVal !== '') {
                $('.next-btn-five').attr("disabled", false);
            };
            
        } else {
            $('.question-five-other').addClass('d-none');
            $('#question-five-oth').attr('required', 'false');
        }
    }
    $("#question-five-oth").keyup(function() {
        $('.next-btn-five').attr("disabled", false);
    });
</script>




</body>

</html>