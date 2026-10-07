<div class="rvba-form">
	<form class="" role="form" name="rvba_form" id="rvba_form" method="post" action="thankyou.php">
		<input type="hidden" name="rvba_form_part" id="rvba_form_part" value="rvba_form_value">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" name="rvba_name" id="rvba_name" placeholder="Enter Name">
					<span id="rvba_name_msg" class="error"> </span>
				</div>
				<?php if (isset($_GET['con_ne'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter Your Name
					</div>
				<?php  } ?>
				<?php if (isset($_GET['con_new1'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter Valid Name
					</div>
				<?php  } ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="email" class="form-control" id="rvba_email" name="rvba_email" placeholder="Enter Email">
					<span id="rvba_email_msg" class="error"> </span>
				</div>
				<?php if (isset($_GET['con_ee'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter Your Email
					</div>
				<?php  } ?>
				<?php if (isset($_GET['con_eew'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter Valid Email
					</div>
				<?php  } ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" maxlength="10" class="form-control" id="rvba_mobile" name="rvba_mobile" placeholder="Enter Mobile No.">
					<span id="rvba_mobile_msg" class="error"> </span>
				</div>
				<?php if (isset($_GET['con_me'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter Your Mobile No.
					</div>
				<?php  } ?>
				<?php if (isset($_GET['con_mew'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter valid Mobile No.
					</div>
				<?php  } ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" id="rvba_city" name="rvba_city" placeholder="Enter City">
					<span id="rvba_city_msg" class="error"> </span>
				</div>
				<?php if (isset($_GET['con_ce'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter Your City
					</div>
				<?php  } ?>
				<?php if (isset($_GET['con_cew'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter Valid City
					</div>
				<?php  } ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="number" onkeypress="isInputNum(event)" class="form-control" id="rvba_arn_no" name="rvba_arn_no" placeholder="Enter Arn No.">
					<span id="rvba_arn_no_msg" class="error"> </span>
				</div>
				<?php if (isset($_GET['con_ae'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter Your Arn No.
					</div>
				<?php  } ?>
				<?php if (isset($_GET['con_aew'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#F00;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Please Enter valid Arn No.
					</div>
				<?php  } ?>
			</div>
			<div class="col-md-6">
				<div class="form-group product-group drop_item">
					<select name="rvba_product_option" class="w100 form-control" id="rvba_product_option" required="required" style="width: 100%;">
						<option value="" selected disabled>Interested In</option>
						<option value="Wealth Elite">Wealth Elite</option>
						<option value="Brand Ambassador Program">Brand Ambassador Program</option>
					</select>
					<span id="rvba_product_option_msg" class="error"> </span>
				</div>

			</div>
			<div class="col-md-6 cptcha-group">
				<!-- Captcha Start -->
				<div class="form-group captcha_img">
					<img src="/captcha.php" width="120" height="30" border="1" alt="CAPTCHA">
				</div>
				<div class="form-group captcha_field">
					<input type="text" size="6" maxlength="5" id="rvba_captcha" name="rvba_captcha" value="" class="form-control" placeholder="Enter Captcha Code">
					<span id="rvba_captcha_msg" class="error"> </span>
					<?php if (isset($_GET['con_new'])) { ?>
						<span id="rvba_captcha_msg" class="error">Please Enter Valid Captcha</span>
					<?php } ?>
				</div>
				<!-- Captcha End -->

				<?php if (isset($_GET['con_msg'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:#3DC7D2;">
						<a href="#" class="" data-dismiss="alert" aria-label="">&times;</a>
						<?php /*?> <?php echo $_GET['msg']; ?><?php */ ?>
						<strong>We have received the information submitted by you and our team will be in touch with you shortly to process the information.</strong>
					</div>
				<?php  } ?>
				<?php if (isset($_GET['con_nmsg'])) { ?>
					<div class="form-group alert" style="margin-bottom:6px;color:red;">
						<a href="#" class="" data-dismiss="alert" aria-label="">&times;</a>
						<?php
						echo "<strong>" . $_GET['con_nmsg'] . "</strong>";
						echo "<br>";
						echo "<strong>Try Again</strong>";
						?>
					</div>
				<?php  } ?>

			</div>

			<div class="col-md-6">
				<button type="submit" class="btn btn-primary" name="rvba_submit" id="rvba_submit" onClick="return rvba_valid_entry();">Submit</button>
				<input type="hidden" name="rvba_action_check" id="rvba_action_check" value="not_self">
			</div>


		</div>

	</form>
</div>