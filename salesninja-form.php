<div class="rvfrhcontent-box ">
    <form id="secureForm" method="POST" action="salesninja-rvscmail.php" data-key="<?= $formval; ?>"
        onsubmit="return validate();">
        <?php if (isset($_GET['err']) && $_GET['err'] == "captcha_err") {
            echo "<span style='color:red;'>Invalid Captcha. Please resubmit form!</span>";
        }
        ?>
        <div class="">

            <input type="hidden" name="<?= $formval; ?>rvrrf" value="<?= $_SESSION[$rvrrf][$formKey] ?>">
            <input type="hidden" name="<?= $formval; ?>_hp_<?= $formKey; ?>" class="honeypot">
            <input type="hidden" name="<?= $formval; ?>form_key" value="<?= $formKey; ?>">
            <input type="hidden" name="form_val" value="<?= $formval; ?>">
            <input type="hidden" name="<?= $formval; ?>_rvrformtype" value="<?= $formKeyName; ?>">
            <input type="hidden" name="<?= $formval; ?>_cfservices" value="SalesNinja MFD CRM">

            <div class="rvsf-rows">

                <div class="form-group rvsf-cols">
                    <label for='rvrfname_<?= $formval; ?>'>First Name</label>
                    <div class="input-icone">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" class="vldatayes" name="<?= $formval; ?>_rvusersfName"
                            id="rvrfname_<?= $formval; ?>">
                    </div>
                    <span id="rvrfname_err_<?= $formval; ?>" class="error"></span>
                </div>

                <div class="form-group rvsf-cols">
                    <label for='rvrlname_<?= $formval; ?>'>Last Name</label>
                    <div class="input-icone">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" class="vldatayes" name="<?= $formval; ?>_rvuserslName"
                            id="rvrlname_<?= $formval; ?>">
                    </div>
                    <span id="rvrlname_err_<?= $formval; ?>" class="error"></span>
                </div>



                <div class="form-group rvsf-cols">
                    <label for='mobile_<?= $formval; ?>'>Mobile</label>
                    <div class="input-icone">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" class="vldatayes" name="<?= $formval; ?>_rvrmobile"
                            id="mobile_<?= $formval; ?>" maxlength="10" pattern="[0-9]{10}"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)">
                    </div>
                    <span id="rvrmobile_err_<?= $formval; ?>" class="error"></span>
                </div>

                <div class="form-group rvsf-cols">
                    <label for='rvremail_<?= $formval; ?>'>Email</label>
                    <div class="input-icone">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" class="vldatayes" name="<?= $formval; ?>_rvruserEmail"
                            id="rvremail_<?= $formval; ?>">
                    </div>
                    <span id="rvremail_err_<?= $formval; ?>" class="error"></span>
                </div>

                <div class="form-group rvsf-cols">
                    <label for='rvrfarn_<?= $formval; ?>'>ARN No</label>
                    <div class="input-icone">
                        <i class="fa-solid fa-id-card"></i>
                        <input type="number" class="vldatayes" name="<?= $formval; ?>_rvusersfArn"
                            id="rvrfarn_<?= $formval; ?>">
                    </div>
                    <span id="rvrfarn_err_<?= $formval; ?>" class="error"></span>
                </div>

                <div class="form-group rvsf-cols">
                    <label for='rvrfcity_<?= $formval; ?>'>City</label>
                    <div class="input-icone">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" class="vldatayes" name="<?= $formval; ?>_rvusersfCity"
                            id="rvrfcity_<?= $formval; ?>">
                    </div>
                    <span id="rvrfcity_err_<?= $formval; ?>" class="error"></span>
                </div>

                <div class="form-group  ">
                    <label for='rvrname_<?= $formval; ?>'>Solve: <b
                            id="cap_<?= $formKey . '_' . $formval ?>"><?= $captcha_contact ?> </b> = ? </label>
                    <div class="">
                        <input type="number" name="<?= $formKey . '_' . $formval ?>_captcha" id="rvfcaptcha"
                            maxlength="2" required>
                        <span type="button" class="btn btn-primary"
                            onclick="refreshCaptcha('<?= $formKey . '_' . $formval ?>')" id="refreshCaptcha">↻</span>
                    </div>

                </div>
            </div>




        </div>
        <div class="back-links text-center">
            <button type="submit" class="btn-fill" id="submitBtn_<?= $formval; ?>" disabled>Submit</button>
        </div>
    </form>
</div>