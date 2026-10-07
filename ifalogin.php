<?php
$callbackUrl = "https://www.ascentcapitalonline.com/ascent-wealth-desk-1";
$siteUrl = "https://wealthelite.in";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div>
           <form name="signinForm" id="signinForm" action="<?php echo $siteUrl; ?>/Login/login/validate-user" method="POST" style="border: solid 0px #eee;padding: 10px; text-align: center;" onsubmit="return GetSubmitLogin();" target="_">
                <div style="width: fit-content;margin: auto; min-width: 300px; padding-top: 20px;">
                <label style="width: fit-content;margin-right: 2px; color: #000;">
                <input type="radio" name="loginType" id="client" value="CLIENT" checked="checked" style="margin-right: 5px;margin-bottom: 15px;">Client
                </label>
                
                <label style="width: fit-content;margin-right: 2px; color: #000;">
                <input type="radio" name="loginType" id="emp" value="EMPLOYEE" style="margin-right: 5px;margin-bottom: 15px;">Employee
                </label>
    
                <label style="width: fit-content;margin-right: 2px; color: #000;">
                <input type="radio" name="loginType" id="advisor" value="ADVISOR" style="margin-right: 5px;margin-bottom: 15px;">Admin
                </label>
                <br>
                </div>

                <div style="width: fit-content; margin: auto;">
                    <label style="width: auto;margin-bottom: 0px; float: left; color: #000; padding-right: 10px;" for="inputEmail">Username</label>
                    <input style="width: 250px; font-size: 13px;padding: 5px 8px; margin-bottom: 5px; color: #000;" type="text" id="inputEmail" name="username" value="" placeholder="Enter your User Name" required>
                    <br>
                    <label style="width: auto;margin-bottom: 0px; float: left; color: #000; padding-right: 13px;" for="inputPassword">Password</label>
                    <input style="width: 250px; font-size: 13px;padding: 5px 8px; margin-bottom: 5px;" type="password" id="inputPassword" name="password" value="" placeholder="******" required>

                    <br>
                    <label style="width: 240px;margin-bottom: 15px;cursor: pointer; color: #000;" data-toggle="modal" data-target="#exampleModal" onclick="submitForgetPwdUserNameForWeb()">Forgot Password?</label>
                    <button style="padding: 4px 8px;" type="submit">Login</button>

                    <input type="hidden" name="loginFor" id="loginFor" value="CLIENT">
                    <input type="hidden" name="callbackUrl" id="callbackUrl" value="<?php echo $callbackUrl; ?>">
                </div>



                <div style="text-align: center;font-size: 14px;width: 100%;font-weight: 700;">
                    <p style="color: #dc3545; display: none" id="loginPageAlertError"></p>
                    <p style="color: #28a745; display: none" id="loginPageAlertSuccess"></p>
                </div>
            </form>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width: 430px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="float: left;width: 90%; color: #000000;">Forgot Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div id="userNameDiv">
                                <form name="forgotForm" id="forgetPwdForm" method="POST" style="width: 380px;padding: 10px;margin: 10px auto;display: block;">
                                    <div style="width: fit-content; margin: 0 auto;">
                                        <label style="width: 100px;line-height: 30px;margin: 0 auto; display: block; color: #fff;" for="inputEmail">Username</label>
                                        <div class="d-flex">
                                            <input style="width: 190px; font-size: 13px;padding: 5px 8px; color: #000;" type="text" id="inputEmail" name="userName" value="" placeholder="Enter your User Name" required>
                                            <input type="hidden" name="type" id="type" value="CLIENT">
                                            <input type="hidden" name="source" id="source" value="link" />
                                            <button style="padding: 4px 8px;margin-left: 10px;" type="button" onclick="submitForgetPwdUserNameForWeb();">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <form name="forgotForm" id="forgetPwdFormVerify" method="POST" style="width: 380px;padding: 10px;margin: 10px auto;display: flex; display: none"> </form>
                                <div style="text-align: center;font-size: 14px;width: 100%;font-weight: 700;">
                                    <p style="color: #dc3545; display: none" id="loginPageAlertErrorFp"></p>
                                    <p style="color: #28a745; display: none" id="loginPageAlertSuccessFp"></p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $get = $_REQUEST;
            $type = "";
            $msg = "";
            if (isset($get['et'])) {
                $ET = $get['et'];
                $type = "";
                $msg = "";
                if ($ET == 1) {
                    $type = "error";
                    $msg = "Username or password is incorrect";
                }
                if ($ET == 2) {
                    $type = "error";
                    $msg = "Username not exists";
                }

                if ($ET == 3) {
                    $type = "error";
                    $msg = "Your IP was blocked! Please contact admin to access your account";
                }

                if ($ET == 4) {
                    $type = "error";
                    $msg = "Login disabled.";
                }
            }
            ?>
            </div>
            
            
            
            
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script src="<?php echo $siteUrl; ?>/js/aes.js"></script>
<script src="<?php echo $siteUrl; ?>/js/login_script.js"></script>
<script src="<?php echo $siteUrl; ?>/js/formValidation.js"></script>
<script src="<?php echo $siteUrl; ?>/js/ajaxCore.js"></script>
<script src="<?php echo $siteUrl; ?>/js/login.js"></script>    

<script>
    var msgType = '<?php echo $type; ?>';
    var msg = '<?php echo $msg; ?>';
    if (msgType === "error" && msg !== "") {
        $('#loginPageAlertError').html(msg);
        $('#loginPageAlertError').css("display", "block");
    }

    $('input[type=radio][name=loginType]').change(function () {
        var optionValue = this.value;
        $('#loginFor').val('');
        if (optionValue != "" && optionValue != 'undefined') {
            $('#loginFor').val(optionValue);
            $('#type').val(optionValue);
        }
    });
</script>
<script>
$(document).ready(function(){
  $(".close").click(function(){
    $("#exampleModal").addClass("intro");
  });
});
</script>
