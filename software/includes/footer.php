<!-- Footer-Section start -->
<footer>
    <div class="top_footer" id="contact">
        <!-- container start -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <!-- footer link 1 -->
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="abt_side">
                        <div class="logo"> <img src="<?= $base_url ?>/assets/images/logo-white.png" alt="image"></div>
                        <ul>
                            <li><a href="#"><i class="icofont-ui-call"></i> +91 9039822000</a></li>
                            <li><a href="#"><i class="icofont-envelope"></i> info@redvisionglobal.com</a></li>
                            <li><a href="#"><i class="icofont-google-map"></i> 101, 45 Hare Krishna Vihar, Behind Advanced Academy, Nipania, Indore, 452010 (MP)</a></li>
                        </ul>
                        <ul class="social_media">
                            <li><a href="https://www.facebook.com/redvisiontechnologies" target="_blank"><i class="icofont-facebook"></i></a></li>
                            <li><a href="https://twitter.com/redvisionindore" target="_blank"><i class="icofont-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/redvisiontechnologies" target="_blank"><i class="icofont-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/redvisiontechnologies" target="_blank"><i class="icofont-linkedin"></i></a></li>
                            <li><a href="https://www.youtube.com/@redvisiontechnologies" target="_blank"><i class="icofont-youtube"></i></a></li>
                            <li><a href="https://wa.me/+919039822000" target="_blank"><i class="icofont-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- footer link 2 -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="links">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="<?= $base_url ?>/best-mutual-fund-software.php#features">Features</a></li>
                            <li><a href="<?= $base_url ?>/best-mutual-fund-software.php#whyUs">Why Us</a></li>
                            <li><a href="<?= $base_url ?>/best-mutual-fund-software.php#services">Services</a></li>
                            <li><a href="<?= $base_url ?>/blog">Blog</a></li>
                            <li><a href="<?= $base_url ?>/best-mutual-fund-software.php#contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- footer link 4 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="try_out">
                        <h3>Let’s Try Out</h3>
                        <ul class="app_btn">
                            <li>
                                <a href="https://play.google.com/store/apps/details?id=com.redvision.wealth_elite&hl=en&gl=US" target="_blank">
                                    <img src="<?= $base_url ?>/assets/images/appstore.png" alt="image">
                                </a>
                            </li>
                            <li>
                                <a href="https://apps.apple.com/us/app/wealth-elite/id1518518606" target="_blank">
                                    <img src="<?= $base_url ?>/assets/images/googleplay.png" alt="image">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </div>

    <!-- last footer -->
    <div class="bottom_footer">
        <!-- container start -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>© Copyrights <?= date('Y') ?>. All rights reserved.</p>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </div>
    <!-- Request A Call Footer -->
    <div class="footer_request_call">
        <div class="call_button">
            <span class="icon"><i class="icofont-phone"></i></span>
            <span class="text">Request a Call</span>
        </div>
        <div class="call_form">
            <div class="form-header">
                <h3>Request a Call</h3>
                <button type="button" class="form-btn-close">
                    <i class="icofont-close-line"></i>
                </button>
            </div>
            <?php include('form-requestacall.php'); ?>
        </div>
    </div>
    <!-- go top button -->
    <div class="go_top">
        <span><i class="icofont-long-arrow-up"></i></span>
    </div>
</footer>
<!-- Footer-Section end -->

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button id="close-video" type="button" class="button btn btn-default text-right" data-dismiss="modal">
                <i class="icofont-close-line-circled"></i>
            </button>
            <div class="modal-body d-flex justify-content-center">
                <video id="localVideo" style="width: 600px; height: auto;">
                    <source src="<?= $base_url ?>/assets/video/hero.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>

<div class="purple_backdrop"></div>

</div>
<!-- Page-wrapper-End -->

<!-- Jquery-js-Link -->
<script src="<?= $base_url ?>/assets/js/jquery.js"></script>
<!-- owl-js-Link -->
<script src="<?= $base_url ?>/assets/js/owl.carousel.min.js"></script>
<!-- bootstrap-js-Link -->
<script src="<?= $base_url ?>/assets/js/bootstrap.min.js"></script>
<!-- aos-js-Link -->
<script src="<?= $base_url ?>/assets/js/aos.js"></script>
<script src="<?= $base_url ?>/assets/js/gsap.js"></script>
<script src="<?= $base_url ?>/assets/js/gsap-scroll-to-plugin.js"></script>
<script src="<?= $base_url ?>/assets/js/gsap-scroll-smoother.js"></script>
<script src="<?= $base_url ?>/assets/js/gsap-scroll-trigger.js"></script>
<script src="<?= $base_url ?>/assets/js/gsap-split-text.js"></script>
<script src="<?= $base_url ?>/assets/js/chroma.min.js"></script>
<script src="<?= $base_url ?>/assets/js/purecounter.js"></script>
<!-- main-js-Link -->
<script src="<?= $base_url ?>/assets/js/main.js"></script>
<script src="<?= $base_url ?>/assets/js/style.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const openVideoModal = document.getElementById("openVideoModal");
        const videoModal = new bootstrap.Modal(document.getElementById("videoModal"));
        const video = document.getElementById("localVideo");
        const closeVideo = document.getElementById("close-video");

        // Handle button click to open modal and play video
        openVideoModal.addEventListener("click", function() {
            // Open the modal
            videoModal.show();

            // Play the video with sound
            video.muted = false;
            video.currentTime = 0; // Reset video to the beginning
            const playPromise = video.play();

            // Handle autoplay errors
            if (playPromise !== undefined) {
                playPromise.catch(error => {
                    console.error("Video playback failed:", error);
                });
            }
        });

        // Stop and reset video when modal closes
        document.getElementById("videoModal").addEventListener("click", function() {
            video.pause(); // Pause the video
        });
        // Stop and reset video when modal closes
        closeVideo.addEventListener("click", function() {
            video.pause(); // Pause the video
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#submitButton').on('click', function() {
            var valid = validateContact();

            if (valid) {
                $.ajax({
                    url: 'submit_form.php',
                    type: 'POST',
                    data: {
                        arn: $('#arn').val(),
                        cname: $('#cname').val(),
                        mobile: $('#mobile').val(),
                        captcha: $('#captcha').val()
                    },
                    success: function(response) {
                        $('#response').html(response);
                        $('#queryForm input').val(''); // Clear inputs
                        $('#captchaImage').attr('src', 'captcha.php?' + Math.random()); // Refresh captcha
                    },
                    error: function() {
                        $('#response').html('<p style="color: red;">An error occurred. Please try again.</p>');
                    }
                });
            } else {
                $("#response").html("<p style='color: red;'>Please enter all required information and validate the captcha.</p>");
            }
        });

        $('#refreshCaptcha').on('click', function() {
            $('#captchaImage').attr('src', 'captcha.php?' + Math.random());
        });

        function validateContact() {
            var valid = true;
            $(".info").html('');
            $(".form-control").css('background-color', '');

            if (!$("#arn").val()) {
                $("#arn-info").html("(required)");
                $("#arn").css('background-color', '#FFE6E6');
                valid = false;
            }
            if (!$("#cname").val()) {
                $("#cname-info").html("(required)");
                $("#cname").css('background-color', '#FFE6E6');
                valid = false;
            }
            if (!$("#mobile").val()) {
                $("#mobile-info").html("(required)");
                $("#mobile").css('background-color', '#FFE6E6');
                valid = false;
            }
            if (!$("#captcha").val()) {
                $("#captcha-info").html("(required)");
                $("#captcha").css('background-color', '#FFE6E6');
                valid = false;
            }
            return valid;
        }
    });


    $(document).ready(function() {

        $(".call_button").click(function() {
            $(".call_form").addClass("active");
        });
        $(".form-btn-close").click(function() {
            $(".call_form").removeClass("active");
        });
    });
</script>