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
                            <li><a href="#"><i class="icofont-ui-call"></i> +91 9999999999</a></li>
                            <li><a href="#"><i class="icofont-envelope"></i> info@redvisiontechnologies.com</a></li>
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
                            <li><a href="<?= $base_url ?>#features">Features</a></li>
                            <li><a href="<?= $base_url ?>#whyUs">Why Us</a></li>
                            <li><a href="<?= $base_url ?>#services">Services</a></li>
                            <li><a href="<?= $base_url ?>#blogs">Blog</a></li>
                            <li><a href="<?= $base_url ?>#contact">Contact Us</a></li>
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
                    <p>© Copyrights 2024. All rights reserved.</p>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </div>

    <!-- go top button -->
    <div class="go_top">
        <span><i class="icofont-long-arrow-up"></i></span>
    </div>
</footer>
<!-- Footer-Section end -->

<!-- VIDEO MODAL -->
<div class="modal fade youtube-video" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button id="close-video" type="button" class="button btn btn-default text-right" data-dismiss="modal">
                <i class="icofont-close-line-circled"></i>
            </button>
            <div class="modal-body">
                <video id="localVideo" width="100%">
                    <source src="<?= $base_url ?>/assets/video/hero.mp4" type="video/mp4">
                </video>
            </div>
            <div class="modal-footer">
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
        const videoModal = document.getElementById("videoModal");
        const video = document.getElementById("localVideo");

        videoModal.addEventListener("show.bs.modal", function() {
            video.currentTime = 0; // Start from the beginning
            video.play();
        });

        videoModal.addEventListener("hide.bs.modal", function() {
            video.pause();
        });
    });
</script>