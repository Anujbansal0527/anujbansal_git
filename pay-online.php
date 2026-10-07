<?php  include ('include/config.php'); ?>
<?php  include ('include/function.php'); ?>
<!doctype html>
<html lang="en">

<head>

    <title>REDVision Technologies | Wealth Management Software | Online App Payment</title>
    <meta name="description"
        content="You can pay REDVision Technologies using a QR code, UPI, NEFT, a Debit/Credit card, Net banking, or a Wallet. Please send us a screenshot to confirm your payment status.">
    <meta name="keywords"
        content="Mutual Fund Software payment, wealth elite software payment, wealth elite mobile application payment, wealth elite mobile app payment, financial website payment, robo app payment, advisor x payment" />
    <link rel="canonical" href="<?= $rvuserinfo['base_url']?>/pay-online.php">
    <?php include("include/head.php"); ?>
</head>

<body>
    <!-- BANNER -->
    <!-- /BANNER -->

    <?php include("include/header-inner.php"); ?>

    <main>
        <?php allPagesBanner($con, 'Payment', '', '')?>
 
        <section class="main-section contactinfo-section bg-light">
            <div class="container container-xl">
                <div class="row">
                    <div class="col-md-6">
                        <div class="payment-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="heading heading-payment">
                                        <div class="icon">
                                            <img src="assets/images/icons/barcode.png" alt="">
                                        </div>
                                        <h3>Pay Via<br>QR Code</h3>
                                    </div>
                                    <div class="note-tag">
                                        <p><b>NOTE:</b> Please share the payment screenshot with us at
                                            <span>accounts@redvisionglobal.com</span> for confirming your payment
                                            status.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="payment-content">
                                        <img src="assets/images/rvg-barcode.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="payment-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="heading heading-payment">
                                        <div class="icon">
                                            <img src="assets/images/icons/neft.png" alt="">
                                        </div>
                                        <h3>Pay Via<br>NEFT</h3>
                                    </div>
                                    <div class="note-tag">
                                        <p><b>NOTE:</b> Please share the payment screenshot with us at
                                            <span>accounts@redvisionglobal.com</span> for confirming your payment
                                            status.</p>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="payment-content">
                                        <div class="item">
                                            <h4>Account Name</h4>
                                            <p>REDVision Global Technologies Pvt. Ltd.</p>
                                        </div>
                                        <div class="item">
                                            <h4>Account Number</h4>
                                            <p>657305600504</p>
                                        </div>
                                        <div class="item">
                                            <h4>IFSC Code</h4>
                                            <p>ICIC0006573</p>
                                        </div>
                                        <div class="item">
                                            <h4>Account Type</h4>
                                            <p>Current Account</p>
                                        </div>
                                        <div class="item">
                                            <h4>Bank Branch</h4>
                                            <p>Saket Nagar, Indore (M.P.)</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="payment-box">
                            <div class="heading heading-payment text-center">
                                <div class="icon">
                                    <img src="assets/images/icons/online.png" alt="">
                                </div>
                                <h3>Pay Online</h3>
                            </div>
                            <div class="payment-content">
                                <div class="rvg-form">


                                    <form action="easebuzz.php?api_name=initiate_payment" method="POST"
                                        name="TransactionForm" id="transactionForm" class="primary_light_form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstName">Full Name *</label>
                                                    <input class="form-control" type="text" name="firstname"
                                                        id="firstname" placeholder="Full Name" size="62"
                                                        required="required" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address *</label>
                                                    <input class="form-control" type="text" name="address1"
                                                        id="addressStreet1" placeholder="Address" size="62"
                                                        required="required" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pincode *</label>
                                                    <input class="form-control" type="text" name="zipcode" id="zip"
                                                        placeholder="Pincode" onkeyup="showUser(this.value)"
                                                        required="required" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City *</label>

                                                    <div id="city_wrap">
                                                        <input class="form-control" class="text" name="city" id="city"
                                                            type="text" placeholder="City" size="62"
                                                            required="required" />
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State *</label>
                                                    <input class="form-control" type="text" name="state" id="state"
                                                        placeholder="State" size="62" required="required" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country *</label>
                                                    <input class="form-control" type="text" name="country"
                                                        id="addressCountry" placeholder="Country" size="62"
                                                        required="required" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile No. *</label>
                                                    <input class="form-control" type="tel" name="phone" id="phone"
                                                        placeholder="Mobile Number" required="required"
                                                        maxlength="10" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input class="form-control" type="email" name="email" id="email"
                                                        placeholder="Email" required="required" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group drop_item">
                                                    <label>Product Name *</label>

                                                    <select class="form-control" id="product" name="productinfo"
                                                        onchange="admSelectCheck(this);" required="required">
                                                        <option value="Wealth Elite IFA">Wealth Elite IFA (WEIFA)
                                                        </option>
                                                        <option value="Wealth Elite ARN"> Wealth Elite ARN (WEARN)
                                                        </option>
                                                        <option value="Online Mutual Fund Transaction Integration">
                                                            Online Mutual Fund Transaction Integration</option>
                                                        <option value="Mobile App Wealth Elite">Mobile App Wealth Elite
                                                        </option>
                                                        <option value="Mobile App Customized"> Mobile App Customized
                                                        </option>
                                                        <option value="Robo Onboarding Mobile APP">Robo Onboarding
                                                            Mobile APP</option>
                                                        <option value="Financial Website"> Financial Website (FW)
                                                        </option>
                                                        <option value="Brokerage">Brokerage</option>
                                                        <option value="Additional New Arn">Additional New Arn</option>
                                                        <option value="Tickers TK"> Tickers (TK)</option>
                                                        <option value="other" id="admOption">Others</option>
                                                    </select>
                                                    <input id="admDivCheck" type="text" name="udf2"
                                                        placeholder="Other product name"
                                                        style="display:none; margin-top: 3px;">
                                                </div>
                                            </div>
											 <div class="col-md-6">
                                                <div class="form-group drop_item">
                                                    <label>Payment Mode</label>

                                                    <select class="form-control" id="udf3" name="udf3"
                                                        required="required">
                                                        <option value="0.019">Debit Card</option>
                                                        <option value="0.019"> Net Banking</option>
                                                        <option value="0.019">Credit Card</option>
                                                        <option value="0.023">Wallets</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-6">
                                                <div class="form-group drop_item">
                                                    <label>Payment Mode</label>

                                                    <select class="form-control" id="udf3" name="udf3"
                                                        required="required">
                                                        <option value="0.019">Debit card (Additional Charges 1.9% + 18%
                                                            GST)</option>
                                                        <option value="0.019"> Net Banking (Additional Charges 1.9% +
                                                            18% GST )</option>
                                                        <option value="0.019">Credit Card (Additional Charges 1.9% + 18%
                                                            GST )</option>
                                                        <option value="0.023">Wallets (Additional Charges 2.3% + 18%
                                                            GST)</option>
                                                    </select>
                                                </div>
                                            </div>-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Product Amount *</label>
                                                    <input class="form-control" name="amount"
                                                        placeholder='Please enter product amount' id="amount" step="0.01" onblur="formatAmount(this)"
                                                        required="required" />
                                                </div>
                                            </div>
                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Convenience Fee</label>
                                                    <input class="form-control" type="text" name="exAmount" value=""
                                                        id="exAmount" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Total Payable Amount</label>
                                                    <input class="form-control" type="text" name="amount" value=""
                                                        id="amount" readonly />
                                                 
                                                </div>
                                            </div>-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Payment For *</label><br>
                                                    <span
                                                        style="display: inline-flex;font-weight: normal; margin-top:15px">
                                                        <input type="radio" name="udf1"
                                                            style="width:auto;margin: 0px 5px 0px 5px;height: 20px;"
                                                            value="purchase" checked>New Purchase &nbsp;
                                                    </span>
                                                    <span style="font-weight: normal;display: inline-flex;">
                                                        <input type="radio" name="udf1" value="renewal"
                                                            style="width:auto;margin: 0px;height: 20px;">&nbsp;
                                                        Renewal&nbsp;
                                                    </span>
                                                </div>
                                            </div>
											  <div class="col-md-12">
											   <span id="extrachrg">If you don't want to pay extra charges then <a
                                                            href="#" data-bs-toggle="modal" data-bs-target="#my1Modal">
                                                            click here </a> </span>
												  <div class="charge-note" style="padding-top:5px">
													  <span><b>Note:</b> Additional payment gateway fees or charges may apply.</span>
												  </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value="" id="acceptTerms" checked>
                                                        <label class="form-check-label" for="acceptTerms">
                                                            I accept the <a href="terms-and-conditions.php" target="_blank">Payment Terms & Conditions</a>
                                                        </label>
                                                    </div>
												  
												      </div>
											
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" id="surl" class="surl" name="surl"
                                                        value="https://www.redvisiontechnologies.com/response.php">
                                                    <input type="hidden" id="furl" class="furl" name="furl"
                                                        value="https://www.redvisiontechnologies.com/response.php">
                                                    <?php
                        $randNumber = uniqid();
                        $time = time();
                        // $date= date('ymd');
                        $orderNO = $randNumber . $time;
                        ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" id="txnid" class="txnid" name="txnid"
                                                        value="<?php echo $orderNO; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group text-center">
                                                    <input class="btn btn-line-primary" type="submit" name="submit"
                                                        id="submit" value="Proceed To Pay" />
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            const checkbox = document.getElementById('acceptTerms');
                                                            const btn = document.getElementById('submit');

                                                            // Toggle button based on checkbox state
                                                            checkbox.addEventListener('change', function() {
                                                                btn.disabled = !this.checked;
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>



        <?php include("include/footer.php"); ?>

        <script>
        function admSelectCheck(nameSelect) {
            if (nameSelect) {
                admOptionValue = document.getElementById("admOption").value;
                if (admOptionValue == nameSelect.value) {
                    document.getElementById("admDivCheck").style.display = "block";
                } else {
                    document.getElementById("admDivCheck").style.display = "none";
                }
            } else {
                document.getElementById("admDivCheck").style.display = "none";
            }
        }
        </script>
		
		
        <script type="text/javascript">
			
			function formatAmount(input) {
  if (input.value !== "") {
    input.value = parseFloat(input.value).toFixed(2);
  }
}
                // function compute() {
        //     var a = $('#udf3').val();
        //     var b = $('#udf4').val();
        //     if (a == '0.012') {
        //         exAmount = (b * 1.416) / (100 - 1.416);
        //         $('#exAmount').val((exAmount).toFixed(2));
        //         $('#extrachrg').show();

        //         amount = +b + +exAmount;
        //         $('#amount').val((amount).toFixed(2));
        //     } else if (a == '0.019') {
        //         exAmount = (b * 2.30559) / (100 - 2.30559);
        //         $('#exAmount').val((exAmount).toFixed(2));
        //         $('#extrachrg').show();

        //         amount = +b + +exAmount;
        //         $('#amount').val((amount).toFixed(2));
        //     } else if (a == '0.023') {
        //         exAmount = (b * 2.714) / (100 - 2.714);
        //         $('#exAmount').val((exAmount).toFixed(2));
        //         $('#extrachrg').show();

        //         amount = +b + +exAmount;
        //         $('#amount').val((amount).toFixed(2));
        //     }
        // }
        // $('#udf4').change(compute);
        // $('#udf3').change(compute);
        </script>
        <script>
        function showUser(str) {
            // alert('hellwo');
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                $.ajax({
                    type: "POST",
                    url: "getdetails.php",
                    data: {
                        "q": str
                    },
                    cache: false,
                    success: function(data) {
                        var result = JSON.parse(data);
                        var city = result.city;
                        var state = result.state;
                        $("#city").val(city);
                        $("#state").val(state);
                    }
                });
            }
        }
        </script>
        <?php include("include/foot.php"); ?>