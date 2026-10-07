<?php include('header.php'); ?>

<section class="section rvba-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner-text" data-aos="fade-up" data-aos-easing="ease-in-sine">
                    <h2>Become a mentor to MFDs & Earn up to <span>30 Lacs/Annum</span></h2>
                    <h6>If you are a Mutual Fund Distributor, get ready to become a technology leader & grow more with REDVision Brand Ambassador Program. </h6>
                    <h5>Limited spots!</h5>
                    <a href="#get_started" class="btn btn-primary">Register Now</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="banner-image" data-aos="fade-down" data-aos-easing="ease-in-sine">
                    <img src="assets/images/mfd.png" alt="Brand Ambassador" width="100%">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section rvba-features-section">
    <div class="container">
        <div class="rvba-heading-one text-center">
            <h2>Become a REDVision Brand Ambassador to get</h2>
        </div>
        <div class="feature-items">
            <?php
            for ($i = 1; $i <= 5; $i++) {
            ?>
                <div class="feature-box" data-aos="fade-right" data-aos-delay="<?php switch ($i) {
                                                                                    case 1:
                                                                                        echo "800";
                                                                                        break;
                                                                                    case 2:
                                                                                        echo "600";
                                                                                        break;
                                                                                    case 3:
                                                                                        echo "400";
                                                                                        break;
                                                                                    case 4:
                                                                                        echo "200";
                                                                                        break;
                                                                                    case 5:
                                                                                        echo "0";
                                                                                        break;
                                                                                } ?>" data-aos-easing="ease-in-sine" style="<?php switch ($i) {
                                                                                                                                case 1:
                                                                                                                                    echo "--boxcolor:#ed1859; --boxbgcolor:#ffdcdc;";
                                                                                                                                    break;
                                                                                                                                case 2:
                                                                                                                                    echo "--boxcolor:#27ad11; --boxbgcolor:#c8e4ce";
                                                                                                                                    break;
                                                                                                                                case 3:
                                                                                                                                    echo "--boxcolor:#0b6fc4; --boxbgcolor:#b8deff";
                                                                                                                                    break;
                                                                                                                                case 4:
                                                                                                                                    echo "--boxcolor:#f69508; --boxbgcolor:#ffe4c9";
                                                                                                                                    break;
                                                                                                                                case 5:
                                                                                                                                    echo "--boxcolor:#524eff; --boxbgcolor:#cecdff";
                                                                                                                                    break;
                                                                                                                            } ?>">
                    <div class="icon">
                        <img src="assets/images/icons/<?php switch ($i) {
                                                            case 1:
                                                                echo "recognition.png";
                                                                break;
                                                            case 2:
                                                                echo "respect.png";
                                                                break;
                                                            case 3:
                                                                echo "value.png";
                                                                break;
                                                            case 4:
                                                                echo "marketing.png";
                                                                break;
                                                            case 5:
                                                                echo "leadership.png";
                                                                break;
                                                        } ?>"></imf>
                    </div>
                    <h5><?php switch ($i) {
                            case 1:
                                echo "Recognition";
                                break;
                            case 2:
                                echo "Respect";
                                break;
                            case 3:
                                echo "Brand Value";
                                break;
                            case 4:
                                echo "Personal Marketing";
                                break;
                            case 5:
                                echo "Leadership";
                                break;
                        } ?></h5>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>
</section>

<section class="section rvba-about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="rvba-heading-one" data-aos="fade-up" data-aos-easing="ease-in-sine">
                    <h2>What is REDVision Brand Ambassador Program?</h2>
                </div>
                <div class="content" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="200">
                    <p>REDVision is a leading Fintech company bringing its exclusive mentorship program designed for MFDs. </p>
                    <p>All eligible MFDs will get to optimize & share their immense knowledge & industry skills to raise awareness amongst those who aspire to be like them. </p>
                    <p>It’s your chance to get associated with REDVision & position yourself as an industry leader amongst your network of other MFDs, investors & peers. </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-image" data-aos="fade-left" data-aos-easing="ease-in-sine">
                    <img src="assets/images/brand-ambassador.png" alt="Brand Ambassador">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section rvba-benefit-section rvba-bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                ?>
                    <div class="rvba-icon-box" data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-delay="<?php switch ($i) {
                                                                                                                        case 1:
                                                                                                                            echo "0";
                                                                                                                            break;
                                                                                                                        case 2:
                                                                                                                            echo "200";
                                                                                                                            break;
                                                                                                                        case 3:
                                                                                                                            echo "400";
                                                                                                                            break;
                                                                                                                        case 4:
                                                                                                                            echo "600";
                                                                                                                            break;
                                                                                                                        case 5:
                                                                                                                            echo "800";
                                                                                                                            break;
                                                                                                                    } ?>" style="<?php switch ($i) {
                                                                                                                                        case 1:
                                                                                                                                            echo "--boxcolor:#ed1859; --boxbgcolor:#ffdcdc;";
                                                                                                                                            break;
                                                                                                                                        case 2:
                                                                                                                                            echo "--boxcolor:#27ad11; --boxbgcolor:#c8e4ce";
                                                                                                                                            break;
                                                                                                                                        case 3:
                                                                                                                                            echo "--boxcolor:#0b6fc4; --boxbgcolor:#b8deff";
                                                                                                                                            break;
                                                                                                                                        case 4:
                                                                                                                                            echo "--boxcolor:#f69508; --boxbgcolor:#ffe4c9";
                                                                                                                                            break;
                                                                                                                                        case 5:
                                                                                                                                            echo "--boxcolor:#524eff; --boxbgcolor:#cecdff";
                                                                                                                                            break;
                                                                                                                                    } ?>">
                        <div class="icon">
                            <img src="assets/images/icons/<?php switch ($i) {
                                            case 1:
                                                echo "reward";
                                                break;
                                            case 2:
                                                echo "support";
                                                break;
                                            case 3:
                                                echo "celebration";
                                                break;
                                            case 4:
                                                echo "recognition2";
                                                break;
                                            case 5:
                                                echo "opportunity";
                                                break;
                                        } ?>.png"></img>
                        </div>
                        <div class="text">
                            <h4><?php switch ($i) {
                                    case 1:
                                        echo "Rewards";
                                        break;
                                    case 2:
                                        echo "Support";
                                        break;
                                    case 3:
                                        echo "Celebration";
                                        break;
                                    case 4:
                                        echo "Recognition";
                                        break;
                                    case 5:
                                        echo "Opportunities";
                                        break;
                                } ?></h4>
                            <p><?php switch ($i) {
                                    case 1:
                                        echo "Fixed & performance rewards";
                                        break;
                                    case 2:
                                        echo "Continuous marketing & promotional support.";
                                        break;
                                    case 3:
                                        echo "Brand Ambassador meet & celebration";
                                        break;
                                    case 4:
                                        echo "Immediate recognition";
                                        break;
                                    case 5:
                                        echo "Networking opportunities with industry experts.";
                                        break;
                                } ?></p>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="col-md-6">
                <div class="rvba-heading-one rvba-flex-heading">
                    <div class="text">
                        <div class="rvba-heading-one" data-aos="fade-up" data-aos-easing="ease-in-sine">
                            <h2>Benefits of becoming REDVision Brand Ambassador?</h2>
                        </div>
                        <div class="content" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="200">
                            <p>Get all these perks by just sharing your knowledge & spreading awareness.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section rvba-participation-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="rvba-heading-one" data-aos="fade-up" data-aos-easing="ease-in-sine">
                    <h2>How to become a REDVision Brand Ambassador?</h2>
                </div>
                <div class="content" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="200">
                    <ul class="rvba-listing">
                        <li>Check eligibility in FAQ 1.</li>
                        <li>Fill the enrollment form.</li>
                        <li>Pay a nominal security fee or call for details.</li>
                        <li>Receive a brand loyalty kit at your address.</li>
                        <li>Get continuous promotional material, to raise awareness about REDVision.</li>
                        <li>Earn a share from product sales & build your brand value.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="participation-image">
                    <img src="assets/images/participate.png" alt="Participate" data-aos="fade-left" data-aos-easing="ease-in-sine">
                </div>
            </div>
        </div>
    </div>
</section>


<section id="get_started" class="section rvba-form-section rvba-bg-light">
    <div class="container">
        <div class="rvba-heading-one text-center" data-aos="fade-up" data-aos-easing="ease-in-sine">
            <h2>Get Started</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="200">
                    <?php include('form.php'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section rvba-faq-section">
    <div class="container">
        <div class="rvba-heading-one text-center" data-aos="fade-up" data-aos-easing="ease-in-sine">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="faqs">
                    <div class="accordion rvba-accordion" id="accordionFaq">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php switch ($i) {
                                                                            case 1:
                                                                                echo $i;
                                                                                break;
                                                                            case 2:
                                                                                echo $i;
                                                                                break;
                                                                            case 3:
                                                                                echo $i;
                                                                                break;
                                                                            case 4:
                                                                                echo $i;
                                                                                break;
                                                                            case 5:
                                                                                echo $i;
                                                                                break;
                                                                        } ?>">
                                    <button class="<?php switch ($i) {
                                                        case 1:
                                                            echo "accordion-button";
                                                            break;
                                                        case 2:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 3:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 4:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 5:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 6:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 7:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 8:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 9:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 10:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 11:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                        case 12:
                                                            echo "accordion-button collapsed";
                                                            break;
                                                    } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php switch ($i) {
                                                                                                                                case 1:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 2:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 3:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 4:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 5:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 6:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 7:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 8:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 9:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 10:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 11:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                                case 12:
                                                                                                                                    echo $i;
                                                                                                                                    break;
                                                                                                                            } ?>" aria-expanded="true" aria-controls="collapse<?php switch ($i) {
                                                                                                                                                                                    case 1:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 2:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 3:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 4:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 5:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 6:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 7:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 8:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 9:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 10:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 11:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                    case 12:
                                                                                                                                                                                        echo $i;
                                                                                                                                                                                        break;
                                                                                                                                                                                } ?>">
                                        <?php switch ($i) {
                                            case 1:
                                                echo "What’s the eligibility criteria to become a REDVision Brand Ambassador?";
                                                break;
                                            case 2:
                                                echo "What is the REDVision Brand Ambassador Program all about?";
                                                break;
                                            case 3:
                                                echo "Who can join the Brand Ambassador Program?";
                                                break;
                                            case 4:
                                                echo "What's the deal with the security fee?";
                                                break;
                                            case 5:
                                                echo "What's in the brand loyalty kit?";
                                                break;
                                            case 6:
                                                echo "How do I become a Brand Ambassador?";
                                                break;
                                            case 7:
                                                echo "What happens after I enroll?";
                                                break;
                                            case 8:
                                                echo "What if I need help during the onboarding process or creating awareness?";
                                                break;
                                            case 9:
                                                echo "How will REDVision promote me as a Brand Ambassador?";
                                                break;
                                            case 10:
                                                echo "What will be my role as a Brand Ambassador?";
                                                break;
                                            case 11:
                                                echo "What do I get if my influence works?";
                                                break;
                                            case 12:
                                                echo "How often do we review progress?";
                                                break;
                                        } ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php switch ($i) {
                                                        case 1:
                                                            echo $i;
                                                            break;
                                                        case 2:
                                                            echo $i;
                                                            break;
                                                        case 3:
                                                            echo $i;
                                                            break;
                                                        case 4:
                                                            echo $i;
                                                            break;
                                                        case 5:
                                                            echo $i;
                                                            break;
                                                        case 6:
                                                            echo $i;
                                                            break;
                                                        case 7:
                                                            echo $i;
                                                            break;
                                                        case 8:
                                                            echo $i;
                                                            break;
                                                        case 9:
                                                            echo $i;
                                                            break;
                                                        case 10:
                                                            echo $i;
                                                            break;
                                                        case 11:
                                                            echo $i;
                                                            break;
                                                        case 12:
                                                            echo $i;
                                                            break;
                                                    } ?>" class="<?php switch ($i) {
                                                                        case 1:
                                                                            echo "accordion-collapse collapse show";
                                                                            break;
                                                                        case 2:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 3:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 4:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 5:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 6:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 7:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 8:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 9:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 10:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 11:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                        case 12:
                                                                            echo "accordion-collapse collapse";
                                                                            break;
                                                                    } ?>" aria-labelledby="heading<?php switch ($i) {
                                                                                                        case 1:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 2:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 3:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 4:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 5:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 6:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 7:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 8:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 9:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 10:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 11:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                        case 12:
                                                                                                            echo $i;
                                                                                                            break;
                                                                                                    } ?>" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        <?php switch ($i) {
                                            case 1:
                                                echo "<h4>Franchise Requirements: </h4>
                                                <ul class='rvba-listing'>
                                                    <li>You must be a REDVision platform user.</li>
                                                    <li>You have a minimum 300 sq. feet office space.</li> 
                                                    <li>You need to have at least 2 employees on your payroll. </li>
                                                    <li>You should be having AUM of more than 50 crores. </li>
                                                    </ul>
                                                    <h4>Franchise Selection Process:</h4>
                                                    <ul class='rvba-listing'>
                                                    <li>Cross-checking your profile.</li>
                                                    <li>Shortlisting your profile.</li>
                                                    <li>Final decision is at the discretion of REDVision’s top management.</li>
                                                </ul>";
                                                break;
                                            case 2:
                                                echo "It's your golden ticket to shine in the world of Mutual Fund Distribution! We're offering MFDs a chance to become our Brand Ambassadors, with exclusive perks and the opportunity to make a mark in the financial world.";
                                                break;
                                            case 3:
                                                echo "If you're a Mutual Fund Distributor (MFD) with a passion for success, you're in! Check out our eligibility criteria, and if it fits, welcome aboard!";
                                                break;
                                            case 4:
                                                echo "Think of it as your VIP pass to a world of benefits. The fee covers your enrollment and a fabulous brand loyalty kit. It's an investment in your brand and future success.";
                                                break;
                                            case 5:
                                                echo "Oh, it's a surprise you'll love! Exclusive goodies, swanky accessories, and materials to kick start your brand ambassador journey.";
                                                break;
                                            case 6:
                                                echo "Easy! Check your eligibility, fill out the form or give us a ring for assistance. Our Sales team will guide you through the process, and voila – you're a REDVision Brand Ambassador!";
                                                break;
                                            case 7:
                                                echo "You'll get your brand loyalty kit within 7-10 days, and our branding team will discuss with you about some cool stuff – like your journey, strengths, and goals. We’ll create a unique story about your beginning, ups & downs & achievements to position you as a thought leader & MFD who’s a performer in the industry.";
                                                break;
                                            case 8:
                                                echo "No worries! Our Support team is here for you. Drop us a message, and we'll guide you through any bumps in the road.";
                                                break;
                                            case 9:
                                                echo "Get ready for the spotlight! Our branding & marketing teams will craft engaging stories regularly that you can share in your network. We'll promote these on our platforms too.";
                                                break;
                                            case 10:
                                                echo "Just do what you are good at. Networking & sharing your industrial & technological knowledge with your fellow MFDs. Spread the word & get them curious about REDVision platforms curated for MFDs and watch your influence grow. The more, the merrier!";
                                                break;
                                            case 11:
                                                echo "Sweet rewards! You'll get the profit share when the MFDs from your network buys a REDVision product & even renew his subscription later. It's a life-time win-win for everyone.";
                                                break;
                                            case 12:
                                                echo "Monthly check-ins! Our Sales team will catch up with you to see how things are going. We value your feedback and want to make sure you're loving the journey & assist you for any challenges or support required make it easier for you.";
                                                break;
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>