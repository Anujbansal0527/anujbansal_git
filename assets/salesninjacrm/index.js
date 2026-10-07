const rvIsMobile =
    window.matchMedia && window.matchMedia("(max-width: 991px)").matches;

function scrollTopPercentage() {
    const scrollElementWrap = document.getElementById("scroll-percentage");
    if (!scrollElementWrap) return;

    const scrollPercentageValue = document.getElementById(
        "scroll-percentage-value",
    );
    let ticking = false;
    let docHeight = 0;
    let scrollTopPos = 0;

    function updateMetrics() {
        docHeight = Math.max(
            1,
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight,
        );
    }

    // Initialize metrics
    updateMetrics();
    window.addEventListener("resize", updateMetrics);

    const updateScrollDisplay = () => {
        const scrollValue = Math.round((scrollTopPos / docHeight) * 100);

        if (scrollElementWrap) {
            scrollElementWrap.style.background = `conic-gradient( #fff ${scrollValue}%, #000 ${scrollValue}%)`;

            if (scrollTopPos > 100) {
                scrollElementWrap.classList.add("active");
            } else {
                scrollElementWrap.classList.remove("active");
            }

            if (scrollValue < 99) {
                scrollPercentageValue.innerText = `${scrollValue}%`;
            } else {
                scrollPercentageValue.innerHTML =
                    '<i class="fa-solid fa-arrow-up-long"></i>';
            }
        }
        ticking = false;
    };

    window.addEventListener(
        "scroll",
        () => {
            scrollTopPos = window.pageYOffset || document.documentElement.scrollTop;
            if (!ticking) {
                window.requestAnimationFrame(updateScrollDisplay);
                ticking = true;
            }
        },
        { passive: true },
    );

    // Initial call
    updateScrollDisplay();

    // Back to Top
    scrollElementWrap.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
}
if (rvIsMobile) {
    window.addEventListener(
        "load",
        function () {
            rvRunAfterIdle(scrollTopPercentage, 1200);
        },
        { once: true },
    );
} else {
    scrollTopPercentage();
}

function fid(id, key) {
    return `#${id}_${key}`;
}
function validate(form) {
    let valid = true;
    const key = $(form).data("key");

    //First Name 
    if (jQuery(fid("rvrfname", key)).val().trim() === "") {
        jQuery(fid("rvrfname_err", key)).text("First Name Required");
        jQuery(fid("rvrfname", key))
            .removeClass("input-success")
            .addClass("error-field");
        valid = false;
    } else {
        jQuery(fid("rvrfname_err", key)).text("");
        jQuery(fid("rvrfname", key))
            .removeClass("error-field")
            .addClass("input-success");
    }

    //Last Name 
    if (jQuery(fid("rvrlname", key)).val().trim() === "") {
        jQuery(fid("rvrlname_err", key)).text("Last Name Required");
        jQuery(fid("rvrlname", key))
            .removeClass("input-success")
            .addClass("error-field");
        valid = false;
    } else {
        jQuery(fid("rvrlname_err", key)).text("");
        jQuery(fid("rvrlname", key))
            .removeClass("error-field")
            .addClass("input-success");
    }

    // Email
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(jQuery(fid("rvremail", key)).val())) {
        jQuery(fid("rvremail_err", key)).text("Email Required");
        jQuery(fid("rvremail", key))
            .removeClass("input-success")
            .addClass("error-field");
        valid = false;
    } else {
        jQuery(fid("rvremail_err", key)).text("");
        jQuery(fid("rvremail", key))
            .removeClass("error-field")
            .addClass("input-success");
    }

    // Mobile
    if (!/^[6-9]\d{9}$/.test(jQuery(fid("mobile", key)).val())) {
        jQuery(fid("rvrmobile_err", key)).text("Mobile Required");
        jQuery(fid("mobile", key))
            .removeClass("input-success")
            .addClass("error-field");
        valid = false;
    } else {
        jQuery(fid("rvrmobile_err", key)).text("");
        jQuery(fid("mobile", key))
            .removeClass("error-field")
            .addClass("input-success");
    }

    // Message
    if (jQuery(fid("rvrfarn", key)).val().trim().length < 3) {
        jQuery(fid("rvrfarn_err", key)).text("ARN No  Required");
        jQuery(fid("rvrfarn", key))
            .removeClass("input-success")
            .addClass("error-field");
        valid = false;
    } else {
        jQuery(fid("rvrfarn_err", key)).text("");
        jQuery(fid("rvrfarn", key))
            .removeClass("error-field")
            .addClass("input-success");
    }
    // Message
    if (jQuery(fid("rvrfname", key)).val().trim() === "") {
        jQuery(fid("rvrfcity_err", key)).text("City Required");
        jQuery(fid("rvrfcity", key))
            .removeClass("input-success")
            .addClass("error-field");
        valid = false;
    } else {
        jQuery(fid("rvrfcity_err", key)).text("");
        jQuery(fid("rvrfcity", key))
            .removeClass("error-field")
            .addClass("input-success");
    }



    jQuery(fid("submitBtn", key)).prop("disabled", !valid);
    return valid;
}
jQuery(".secureForm").on("submit", function (e) {
    if (!validate(this)) {
        e.preventDefault();
        return;
    }

    const key = $(this).data("key");
    jQuery(fid("submitBtn", key))
        .prop("disabled", true)
        .text("Please wait...");
});
jQuery(".vldatayes").on("focus", function () {
    $(this).removeClass("error-field input-success").addClass("input-active");
});

jQuery(".vldatayes").on("blur", function () {
    $(this).removeClass("input-active");
    validate($(this).closest("form"));
});
function refreshCaptcha(key) {
    fetch("/rvm-include/rvfcaptcha_generate.php?refresh=1&key=" + key)
        .then(res => res.text())
        .then(data => {
            document.getElementById("cap_" + key).innerHTML = data;
        });
}