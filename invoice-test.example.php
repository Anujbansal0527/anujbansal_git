<?php
ob_start();
date_default_timezone_set('Asia/Kolkata');
$host = "localhost";
$user = "redtechn_user";
$pass = "REPLACE_WITH_PRIVATE_VALUE";
$data = "redtechn_databs";
$con = mysqli_connect($host, $user, $pass, $data);
?>
<?php
$url = 'https://my-eoffice.com/redvisionWebsiteGstInvociesAmc.php?key=redvisionAmc';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);

$jsondata = $data;
$obj = json_decode($jsondata, true);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Favicon -->
  <link rel="icon" href="assets/images/favicon.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
  <title>REDVision Technologies | Contact Mutual Fund Software Concern Person</title>
  <meta name="description" content="Contact us today to get expert assistance and learn more about our range of fintech products. Call us at 9039822000 to schedule a demo or get an estimate.">
  <meta name="keywords" content="mutual fund software concern person, red vision payment mode, revision crm payment, mutual fund software content, contact for mutual fund software, help support contact on mutual fund software, redvision contact, red vision tehnologies contact number, contact number redvision concern person, redvision technologies support manager number." />
  <meta name="author" content="REDVision Technologies Pvt. Ltd.">
  <link href="assets/css/mdb.min.css" rel="stylesheet" />
  <!-- Fonts -->
  <link href="assets/fonts/whyte/font.css" rel="stylesheet" />
  <link href="assets/fonts/oswald/font.css" rel="stylesheet" />
  <link href="assets/fonts/the-unseen/font.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="assets/css/animate.min.css" />
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/light-gallery/css/lightgallery.css" />
  <link rel="stylesheet" href="assets/light-gallery/css/lg-thumbnail.css" />
  <link rel="stylesheet" href="assets/light-gallery/css/lg-zoom.css" />
  <link rel="stylesheet" href="assets/fonts/bootstrap-icon/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/fonts/themify-icon/themify-icons.css" />
  <!-- venobox -->
  <link rel="stylesheet" type="text/css" href="assets/venobox/venobox.css" />
  <!-- <link href="assets/css/whatsapp-chat.css" rel="stylesheet"/> -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/responsive.css" rel="stylesheet" />
</head>

<body>
  <!-- BANNER -->
  <!-- /BANNER -->
  <?php include 'header-inner.php' ?>
  <main>
    <section class="inner_banner_section">
      <div class="container container-xl">
        <div class="banner-content">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="title">
                <h2>GST INVOICE</h2>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="breadcrumb-bar">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="https://www.redvisiontechnologies.com">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">GST INVOICE</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="inner_banner_shape1"></div>
      <div class="inner_banner_shape2"></div>
      <div class="inner_banner_shape3"></div>
      <div class="inner_banner_shape4"></div>
    </section>



    <section class="main_section">
                <div class="container">
                <script>
                function show_service_tax(value)
                {
                $('#service').css('display', 'block');
                $('#service_tab').css('background-color', '#4495D4');
                $('#service_tab').css('color', '#FFFFFF');
                $('#gst_tab').css('background-color', '#de0202');
                $('#gst_tab').css('color', '#FFFFFF');
                $('#gst').css('display', 'none');
                if (value == 'tab')
                {
                $('#gst_mail_msg').html('');
                }
                }
                function show_gst(value)
                {
                $('#gst').css('display', 'block');
                $('#gst_tab').css('background-color', '#4495D4');
                $('#gst_tab').css('color', '#FFFFFF');
                $('#service_tab').css('background-color', '#de0202');
                $('#service_tab').css('color', '#FFFFFF');
                $('#service').css('display', 'none');
                if (value == 'tab')
                {
                $('#gst_mail_msg').html('');
                }
                }
                </script>
                <?php
                if (isset($_POST['UD_PRINT'])) {
                header("Location:testprint.php?invoiceno=$invoiceno&ARNno=$arn_no&tdate=$tdate&sevicepname=$sevicepname&serviceprovideradd=$serviceprovideradd&semail=$semail&sregno=$sregno&amcname=$amcname_value&addAmc=$addAmc&disamt=$disamt&netbrokage=$netbrokage&servTaxAmt=$servTaxAmt&swachCess=$swachCess&krishiCess=$krishiCess&totalAmt=$totalAmt&AmtWords=$AmtWords&month=$month&year=$year&output=$file_name");
                }
                /* if(isset($_POST['PDF_MAIL'])){
                header("Location:testpdf.php?invoiceno=$invoiceno&ARNno=$arn_no&tdate=$tdate&ServicerProvider=$sevicepname&ServicerProviderAddress=$serviceprovideradd&sEmail=$semail&ServReg=$sregno&txtSelectedAMC=$amcname_value&addAmc=$addAmc&disAmt=$disamt&netv=$netbrokage&servTaxAmt=$servTaxAmt&swachCess=$swachCess&krishiCess=$krishiCess&totalAmt=$totalAmt&AmtWords=$AmtWords&Month=$month&year=$year&output=$output&pdfWithPath=$pdfWithPath&thumb=$thumb&thumbDirectory=$thumbDirectory&pdfDirectory=$pdfDirectory&amcnamehidden=$amcnamevalue");
                }
                */
                ?>
                <div style="max-width:800px;margin-left:277px;font-size:18px;background: -o-linear-gradient(#da2417 , #ba190d);
                    background: -moz-linear-gradient(#da2417 , #ba190d);
                    background: -webkit-linear-gradient(#da2417 , #ba190d);
                    background: linear-gradient(#da2417 , #ba190d);margin:auto;overflow:hidden;">
                    <!-- <div id="service_tab" onClick="show_service_tax('tab');" style="background-color:#4495D4;float:left;width:50%;text-align:center;color:#FFF;padding:10px;cursor: pointer;">
                        Service Tax Invoice
                    </div> -->
                    <!-- <div id="gst_tab" onClick="show_gst('tab');" style="float:left;width:100%;text-align:center;padding:10px;color:white;cursor: pointer;">
                        GST Invoice
                    </div> -->
                </div>
                <div id="gst_mail_msg"></div>
                <div id="gst_mail_msg1" style="max-width:800px;margin:auto">
                    <?php
                    $mm = $_GET['gst_mail'];
                    if ($mm == 'sus') {
                    ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        Gst Invoice Has Been Sent on Given E-mail Id , Thank You For Using Our Services.
                    </div>
                    <?php
                    }
                    $sm = $_GET['service_mail'];
                    if ($sm == 'sus') {
                    ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        Service Invoice Has Been Sent on Given E-mail Id , Thank You For Using Our Services.
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div id="service" style="display:none;">
                    <!--<iframe src="advisortaxform.php" id="service" width="100%" height="1300px;" scrolling="yes" style="display:block;"></iframe>-->
                    <form method="post" name="form1" id='form1' action="advisortaxform.php" enctype="multipart/form-data" type="file">
                        <input name="email" id="email" value="" type="hidden">
                        <table style="border:1px solid #176a9c; max-width:800px" align="center" cellpadding="5px" cellspacing="0">
                            <tbody>
                                <tbody>
                                    <tr>
                                        <td class="bg-grey" colspan="3" align="center" height="50px"><h3>SERVICE TAX INVOICE</h3></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="20px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Invoice Number(Your Own Series)*</td>
                                        <td width="20px"></td>
                                        <td valign="top"><input name="invoiceno" id="invoice" size="61" value="" type="text" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Invoice Date (DD-MM-YYYY)*</td>
                                        <td width="20px"></td>
                                        <td valign="top"><input id="tDate" name="tDate" size="61" value="<?php echo date('d-m-Y'); ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="20px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">ARN Code</td>
                                        <td width="20px"></td>
                                        <td valign="top"><input name="ARNno" size="57" type="text" value="" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Service Provider Name(ARN Holder)*</td>
                                        <td width="20px"></td>
                                        <td valign="top"><input name="ServicerProvider" size="61" value="" type="text" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Service provider Address *</td>
                                        <td width="20px"></td>
                                        <td valign="top"><textarea name="ServicerProviderAddress" cols="59" rows="4" value="" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Service Provider Email Id *</td>
                                        <td width="20px"></td>
                                        <td valign="top"><input name="sEmail" size="61" value="" type="text" id="sEmail" required onchange="ShowAlert()"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Service tax Registration no. of the
                                        service provider PAN based <strong>(Ex :PAN+ST+001 Ex:ABXFC1234AST001)</strong></td>
                                        <td width="20px"></td>
                                        <td valign="middle"><input name="ServReg" size="61" type="text" value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <!--  <tr>
                                        <td valign="top">Upload  Company Your Logo(If Any)</td>
                                        <td width="20px"></td>
                                        <td valign="middle">
                                            <input type="file" name="pic"  value=""  onchange="loadFile(event);" id="pic">
                                            <img id="output" name="output"  />
                                            <input  type="hidden" name="imageid" id="imageid"/>
                                        </td>
                                    </tr>-->
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Name of AMC*: </td>
                                        <td width="20px"></td>
                                        <td valign="top">
                                            <input  type="hidden" name="amcnamehidden" id="amcnamehidden"/>
                                            <select name="AmcName" id="AmcName" onchange="OnDropDownChange(this);" required >
                                                <option value="----">--Select AMC--</option>
                                                <?php
                                                $count = $obj['count'];
                                                if ($count > 0) {
                                                $amcData = $obj['data'];
                                                foreach ($amcData as $key => $amc) {
                                                ?>
                                                <option value="<?php echo $key ?>(!)<?php echo $amc; ?>"><?php echo $amc ?></option>
                                                <?php
                                                }
                                                } else {
                                                ?>
                                                <option value="(!)">Data Not Found</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Address Of AMC *: </td>
                                        <td width="20px"></td>
                                        <td valign="top"><textarea type="text" id="txtSelectedAMC" name="txtSelectedAMC" value="<?php echo $_POST['txtSelectedAMC']; ?>" cols="63" rows="5" readonly></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="20px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" valign="top">Invoice for the month of &nbsp;&nbsp;
                                            <select name="Month" id="month">
                                                <option value="0"> Month </option>
                                                <option value="1">January</option>
                                                <option value="2">Febuary</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            &nbsp;&nbsp;&nbsp; <input onkeypress="return isNumberKey(event)" maxlength="4" name="year" id="year" placeholder=" YYYY" style="max-width:80px;" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <table style="border:1px solid #f00000;" border="1" cellpadding="5px" cellspacing="1" width="100%">
                                                <tbody><tr class="bg-grey">
                                                    <td width="70%"><h4>&nbsp;&nbsp;&nbsp;&nbsp;Description</h4></td>
                                                    <td align="center"><h4>Amount (Rs)</h4></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" height="20px">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>Distribution Commission for sale of Mutual Fund &nbsp;</td>
                                                    <td align="right"><input style="text-align:right;" id="disAmt" name="disAmt" onkeyup="calc();" onkeypress="return onlyNumbers(this.value);" type="text" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Net Brokerage Amount &nbsp;</td>
                                                    <td align="right"><input id="netv" name="netv" class="bg-none" readonly type="text" style="text-align: right;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Add: Service Tax @ 14% </td>
                                                    <td align="right"><input id="servTaxAmt" name="servTaxAmt" class="bg-none" readonly type="text" style="text-align: right;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Add: Swach Bharat Cess @ 0.50%</td>
                                                    <td align="right"><input id="swachCess" name="swachCess" class="bg-none" readonly type="text" style="text-align: right;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Add: Krishi Kalyan Cess @ 0.50% (Applicable w.e.f 1.06.2016) </td>
                                                    <td align="right"><input id="krishiCess" name="krishiCess" class="bg-none" readonly type="text" style="text-align: right;"></td>
                                                </tr>
                                                <tr>
                                                    <td><h4>Total Tax: </h4></td>
                                                    <td align="right"><input id="totalAmt" name="totalAmt" class="bg-none" readonly type="text" style="text-align: right;" required></td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="30px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Rupees in words :</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom:1px solid #000000;" height="30px"><input id="AmtWords" name="AmtWords" class="bg-none" readonly style="text-align:left;width:100%;" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="50px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="30px" align="right">For Service Provider </td>
                                        <td align="right">Authorized Signatory </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center" valign="middle">
                                            <!--  <input onclick="return toEmail('');email_post('');" name="UD_EMAIL" value="Email Form" type="submit" id="UD_EMAIL">-->
                                            <input class="btn btn-primary" name="UD_EMAIL" value="Email Form" type="button" id="UD_EMAIL" onClick="valid_entry();">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input class="btn btn-primary" onclick=" return pdf_post('');" name="PDF_MAIL" value="Download PDF" type="submit" id="PDF_MAIL">&nbsp;&nbsp;&nbsp;&nbsp;
                                            <!--  <input onclick="print_post('');" name="UD_PRINT" value="PrintForm" type="submit" id="UD_PRINT" >-->&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input class="btn btn-primary" value="Fill Next Form"  onclick="resetform();" type="button">
                                            <button type="hidden" class="btn btn-info btn-lg" id="email_modal" data-toggle="modal" data-target="#myModal" style="display:none;"></button>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </form>
                            <script type="text/javascript">
                            function email_post() {
                                /*var error_log_mail ='';
                            var Email           = document.getElementById("sEmail").value;*/
                            /* var mobile_no       = document.getElementById("mobile_no").value;
                            var mobile_no_len   = gst_mobile_no.length;
                            if(isNaN(mobile_no))
                            {
                            alert("Enter the valid Mobile Number");
                            document.getElementById("mobile_no").focus();
                            error_log_mail+='Enter the valid Mobile Number';
                            }
                            else
                            {
                            if(mobile_no_len=='10')
                            {
                            }
                            else
                            {
                            alert("Enter the valid Mobile Number");
                            document.getElementById("mobile_no").focus();
                            error_log_mail+='Enter the valid Mobile length ';
                            }
                            }*/
                            /* if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Email))
                            {
                            //return (true)
                            }
                            else
                            {
                            alert("You have entered an invalid email address!");
                            document.getElementById("sEmail").focus();
                            error_log_mail+='invalid email address';
                            }
                            
                            if(error_log_mail=='')
                            {*/
                            var pop_email = document.getElementById("pop_email").value;
                            document.getElementById("email").value = pop_email;
                            document.getElementById("form1").target = "_self";
                            document.getElementById("form1").action = "service_tax_invoice_mail.php";
                            document.getElementById("form1").submit();
                            /* }*/
                            }
                            function pdf_post()
                            {
                            //document.form1.action = "testpdf.php";
                                /* var error_log_mail ='';
                            
                            var Email           = document.getElementById("sEmail").value;*/
                            /*var mobile_no_len   = mobile_no.length;
                            var mobile_no       = document.getElementById("mobile_no").value;
                            if(isNaN(mobile_no))
                            {
                            alert("Enter the valid Mobile Number");
                            document.getElementById("mobile_no").focus();
                            error_log_mail+='Enter the valid Mobile Number';
                            }
                            else
                            {
                            if(mobile_no_len=='10')
                            {
                            }
                            else
                            {
                            alert("Enter the valid Mobile Number");
                            document.getElementById("mobile_no").focus();
                            error_log_mail+='Enter the valid Mobile length ';
                            }
                            }*/
                            /*if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(gst_Email))
                            {
                            //return (true)
                            }
                            else
                            {
                            alert("You have entered an invalid email address!");
                            document.getElementById("sEmail").focus();
                            error_log_mail+='invalid email address';
                            }*/
                            // alert(error_log);
                            /*if(error_log_mail=='')
                            {*/
                            document.getElementById("form1").target = "_new";
                            document.getElementById("form1").action = "service_tax_pdf.php";
                            /* }*/
                            }
                            function resetform() {
                            document.getElementById("invoice").value = '';
                            document.getElementById("month").value = '';
                            document.getElementById("year").value = '';
                            document.getElementById("disAmt").value = '';
                            document.getElementById("netv").value = '';
                            document.getElementById("servTaxAmt").value = '';
                            document.getElementById("swachCess").value = '';
                            document.getElementById("krishiCess").value = '';
                            document.getElementById("totalAmt").value = '';
                            document.getElementById("AmtWords").value = '';
                            }
                            </script>
                            <script src="numtowordinr.js" type="text/javascript"></script>
                            <script type="text/javascript">
                            function OnDropDownChange(dropDown) {
                            /* var selectedText = dropDown.options[dropDown.selectedIndex].innerHTML;
                            var selectedValue = dropDown.value;*/
                            var selectedText = dropDown.options[dropDown.selectedIndex].innerHTML;
                            var selectedValue_1 = dropDown.value;
                            var selectedValue_array = selectedValue_1.split('(!)');
                            selectedValue = selectedValue_array[0];
                            // alert(selectedValue);
                            document.getElementById('amcnamehidden').value = selectedValue;
                            if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                            } else {// code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("txtSelectedAMC").value = xmlhttp.responseText;
                            }
                            }
                            //  document.getElementById("search-result").innerHTML='<img src="images/image.gif"/>';
                            xmlhttp.open("GET", "ajax_entityAddre.php?aID=" + selectedValue, true);
                            xmlhttp.send();
                            }
                            function calc() {
                            var amount = document.getElementById('disAmt').value;
                            var month = document.getElementById('month').value;
                            var year = document.getElementById('year').value;
                            if (month == '0') {
                            alert('please enter month and year');
                            }
                            document.getElementById('disAmt').value = amount;
                            var netvalue = parseFloat(amount / 1.15).toFixed(2);
                            if (year <= 2016) {
                            if (year < 2016) {
                            var netvalue = parseFloat(amount / 1.145).toFixed(2);
                            } else if (month < 6) {
                            var netvalue = parseFloat(amount / 1.145).toFixed(2);
                            }
                            }
                            var net = Math.round(parseFloat(netvalue));
                            if (!isNaN(net)) {
                            document.getElementById('netv').value = netvalue;
                            return sum();
                            }
                            }
                            function sum() {
                            var txtFirstNumberValue = document.getElementById('netv').value;
                            var month = document.getElementById('month').value;
                            var year = document.getElementById('year').value;
                            var txtSecondNumberValue = parseFloat(txtFirstNumberValue * 0.14).toFixed(2);
                            var txtthirdNumberValue = parseFloat(txtFirstNumberValue * 0.005).toFixed(2);
                            var txtForthNumberValue = parseFloat(txtFirstNumberValue * 0.005).toFixed(2);
                            var result = Math.round(parseFloat(txtSecondNumberValue) + parseFloat(txtthirdNumberValue) + parseFloat(txtForthNumberValue));
                            // var result = Math.round(parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue) + parseFloat(txtthirdNumberValue) + parseFloat(txtForthNumberValue));
                            if (year <= 2016) {
                            if (year < 2016) {
                            var result = Math.round(parseFloat(txtSecondNumberValue) + parseFloat(txtthirdNumberValue));
                            } else if (month < 6) {
                            var result = Math.round(parseFloat(txtSecondNumberValue) + parseFloat(txtthirdNumberValue));
                            }
                            }
                            if (!isNaN(result)) {
                            document.getElementById('totalAmt').value = result;
                            document.getElementById('servTaxAmt').value = txtSecondNumberValue;
                            document.getElementById('swachCess').value = txtthirdNumberValue;
                            document.getElementById('krishiCess').value = txtForthNumberValue;
                            if (year <= 2016) {
                            if (year < 2016) {
                            document.getElementById('krishiCess').value = 0.00;
                            } else if (month < 6) {
                            document.getElementById('krishiCess').value = 0.00;
                            }
                            }
                            }
                            return NumToWord(result, 'AmtWords');
                            }
                            function valid_entry()
                            {
                            var totalAmt = $('#totalAmt').val();
                            var sEmail = $('#sEmail').val();
                            if (totalAmt != '' && sEmail != '')
                            {
                            //window.scrollTo(200, 0);
                            $('#email_modal').click();
                            } else
                            {
                            alert('Please Enter Email-Id and Amount');
                            }
                            }
                            </script>
                            <!--pawan-->
                        </div>
                        <div id="gst" style="display:block;">
                            <!--<iframe src="gst_invoice.php" id="gst" width="100%" height="1300px;" scrolling="yes" style="display:none"></iframe>-->
                            <table style="border:1px solid #f00000; max-width:800px; margin:0 auto;" align="center" cellpadding="5px" cellspacing="0" >
                                <tbody><tr>
                                    <td class="bg-grey" align="center" height="50px"><h3>GST INVOICE</h3></td>
                                </tr>
                                <tr>
                                    <td>
                                        <form method="post" name="gst_form1" id="gst_form1" action="#" enctype="multipart/form-data" type="file">
                                            <input name="gst_email" id="gst_email" value="" type="hidden">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" style="max-width:800px" >
                                                <tbody><tr>
                                                    <td colspan="3" height="20px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Invoice Number(Your Own Series)*</td>
                                                    <td width="20px"></td>
                                                    <td valign="top"><input name="gst_invoiceno" id="gst_invoice" size="61" value="" type="text" required></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Invoice Date (DD-MM-YYYY)*</td>
                                                    <td width="20px"></td>
                                                    <td valign="top"><input id="gst_tDate" name="gst_tDate" size="61" value="<?php echo date('d-m-Y'); ?>" required></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="20px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">HSN No.</td>
                                                    <td width="20px"></td>
                                                    <td valign="top"><input id="g_hsno" name="g_hsno" size="61" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="20px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">ARN Code *</td>
                                                    <td width="20px"></td>
                                                    <td valign="top"><input name="gst_ARNno" size="57" type="text" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Service Provider Name(ARN Holder)*</td>
                                                    <td width="20px"></td>
                                                    <td valign="top">
                                                        <input name="gst_name" size="61" value="" type="text" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Pan NO *</td>
                                                    <td width="20px"></td>
                                                    <td valign="top">
                                                        <input name="gst_pan_no" id="gst_pan_no" size="61" value="" type="text" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Mobile NO *</td>
                                                    <td width="20px"></td>
                                                    <td valign="top">
                                                        <input name="gst_mobile_no" id="gst_mobile_no" size="70" value="" type="text" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">State the Service provider *</td>
                                                    <td width="20px"></td>
                                                    <td valign="top">
                                                        <select name="gst_ServicerProvider_state" id="gst_ServicerProvider_state" onchange="gst_on_change_state();"  required style="margin-bottom:15px;">
                                                            <option selected="" value="">select</option>
                                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                            <option value="Assam">Assam</option>
                                                            <option value="Bihar">Bihar</option>
                                                            <option value="Chandigarh">Chandigarh</option>
                                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                                            <option value="Dadra Nagar Haveli">Dadra &amp; Nagar Haveli</option>
                                                            <option value="Daman Diu">Daman &amp; Diu</option>
                                                            <option value="Delhi">Delhi</option>
                                                            <option value="Goa">Goa</option>
                                                            <option value="Gujarat">Gujarat</option>
                                                            <option value="Haryana">Haryana</option>
                                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                            <option value="Jammu Kashmir">Jammu &amp; Kashmir</option>
                                                            <option value="Jharkhand">Jharkhand</option>
                                                            <option value="Karnataka">Karnataka</option>
                                                            <option value="Kerala">Kerala</option>
                                                            <option value="Lakshdweep">Lakshdweep</option>
                                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                            <option value="Maharashtra">Maharashtra</option>
                                                            <option value="Manipur">Manipur</option>
                                                            <option value="Meghalaya">Meghalaya</option>
                                                            <option value="Mizoram">Mizoram</option>
                                                            <option value="Nagaland">Nagaland</option>
                                                            <option value="Odisha">Odisha</option>
                                                            <option value="Pondicherry">Pondicherry</option>
                                                            <option value="Punjab">Punjab</option>
                                                            <option value="Rajasthan">Rajasthan</option>
                                                            <option value="Sikkim">Sikkim</option>
                                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                                            <option value="Telangana">Telangana</option>
                                                            <option value="Tripura">Tripura</option>
                                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                            <option value="Uttarakhand">Uttarakhand</option>
                                                            <option value="West Bengal">West Bengal</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Service provider Address *</td>
                                                    <td width="20px"></td>
                                                    <td valign="top"><textarea name="gst_ServicerProviderAddress" cols="59" rows="4" value="" required></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Service Provider Email Id *</td>
                                                    <td width="20px"></td>
                                                    <td valign="top">
                                                        <input name="gst_sEmail" size="70" value="" type="text" id="gst_sEmail" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">GSTIN Registration no. of the service provider</td>
                                                    <td width="20px"></td>
                                                    <td valign="middle"><input name="gst_ServReg" size="61" type="text" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <!--  <tr>
                                                    <td valign="top">Upload  Company Your Logo(If Any)</td>
                                                    <td width="20px"></td>
                                                    <td valign="middle">
                                                        <input type="file" name="pic"  value=""  onchange="loadFile(event);" id="pic">
                                                        <img id="output" name="output"  />
                                                        <input  type="hidden" name="imageid" id="imageid"/>
                                                    </td>
                                                </tr>-->
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Name of AMC*: </td>
                                                    <td width="20px"></td>
                                                    <td valign="top">
                                                        <input  type="hidden" name="amcnamehidden" id="amcnamehidden"/>
                                                        <select name="gst_AmcName" id="gst_AmcName" onchange="gst_OnDropDownChange(this);" required >
                                                            <option value="" id="gst_null_amc">--Select AMC--</option>
                                                            <?php
                                                            $count = $obj['count'];
                                                            if ($count > 0) {
                                                            $amcData = $obj['data'];
                                                            foreach ($amcData as $key => $amc) {
                                                            ?>
                                                            <option value="<?php echo $key ?>(!)<?php echo $amc; ?>"><?php echo $amc ?></option>
                                                            <?php
                                                            }
                                                            } else {
                                                            ?>
                                                            <option value="(!)">Data Not Found</option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Address Of AMC *: </td>
                                                    <td width="20px"></td>
                                                    <td valign="top"><textarea type="text" id="gst_txtSelectedAMC" name="gst_txtSelectedAMC" value="<?php echo $_POST['txtSelectedAMC']; ?>" cols="63" rows="5" readonly></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"> Service Recipient State: </td>
                                                    <td width="20px"></td>
                                                    <td valign="top">
                                                        <div id="amc_state" style="font-weight:800;"> </div>
                                                        <input type="hidden" name="hidden_amc_state" id="hidden_amc_state" size="61">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"> GSTIN of Service Recipient (to be filled by Service Provider): </td>
                                                    <td width="20px"></td>
                                                    <td valign="top">
                                                        <input type="text" name="R_GSTN" id="R_GSTN" size="61">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="20px"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" valign="top">Invoice for the month of  *&nbsp;&nbsp;
                                                        <select name="gst_Month" id="gst_month" required>
                                                            <option value="0"> Month </option>
                                                            <option value="1">January</option>
                                                            <option value="2">Febuary</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <!--  <input onkeypress="return isNumberKey(event)" maxlength="4" name="year" id="year" placeholder=" YYYY" style="width:80px;" type="text">-->
                                                        <select name="gst_year" id="gst_year" required>
                                                            <option value="" id="null_year"> Select Year </option>
                                                            <?php
                                                            $s_year = '2017';
                                                            $e_yeat = date('Y');
                                                            for ($s_year; $s_year <= $e_yeat; $s_year++) {
                                                            ?>
                                                            <option value="<?php echo $s_year ?>" id="<?php echo $s_year ?>"> <?php echo $s_year ?> </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="10px"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <table style="border:1px solid #176a9c;" border="1" cellpadding="5px" cellspacing="1" width="100%">
                                                            <tbody><tr class="bg-grey">
                                                                <td width="70%"><h4>&nbsp;&nbsp;&nbsp;&nbsp;Description</h4></td>
                                                                <td align="center"><h4>Amount (Rs)</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" height="20px">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Distribution Commission for sale of Mutual Fund &nbsp;</td>
                                                                <td align="right"><input style="text-align:right;" id="gst_disAmt" name="gst_disAmt" onkeyup="gst_calc();" onkeypress="return onlyNumbers(this.value);" type="text" required>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Net Brokerage Amount &nbsp;</td>
                                                                <td align="right"><input id="gst_netv" name="gst_netv" class="bg-none" readonly type="text" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Add: CGST @  <span id="cgst_rate"> </span> %</td>
                                                                <td align="right">
                                                                    <input id="cgst" name="cgst" class="bg-none" readonly type="text" style="text-align: right;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Add: SGST @ <span id="sgst_rate"> </span>%</td>
                                                                    <td align="right"><input id="sgst" name="sgst" class="bg-none" readonly type="text" style="text-align: right;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Add: IGST @ <span id="igst_rate"> </span> %</td>
                                                                    <td align="right"><input id="igst" name="igst" class="bg-none" readonly type="text" style="text-align: right;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h4>Total Tax: </h4></td>
                                                                    <td align="right"><input id="gst_totalAmt" name="gst_totalAmt" class="bg-none" readonly type="text" style="text-align: right;" required></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="30px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">Rupees in words :</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="border-bottom:1px solid #000000;" height="30px"><input id="gst_AmtWords" name="gst_AmtWords" class="bg-none" readonly style="text-align:left;width:100%;" type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="50px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" height="30px" align="right">For Service Provider </td>
                                                        <td align="right">Authorized Signatory </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="center" valign="middle">
                                                            <!-- <input onclick="return toEmail('');email_post('');" name="UD_EMAIL" value="Email Form" type="submit" id="UD_EMAIL">-->
                                                            <input name="gst_UD_EMAIL" value="Email Form" type="button" id="gst_UD_EMAIL" onClick="gst_valid_entry();">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input onclick="gst_pdf_post();" name="gst_PDF_MAIL" value="Download PDF" type="submit" id="gst_PDF_MAIL">&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <!--  <input onclick="print_post('');" name="UD_PRINT" value="PrintForm" type="submit" id="UD_PRINT" >-->&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input value="Fill Next Form"  onclick="gst_resetform_1();" type="button">
                                                            <button type="hidden" class="btn btn-info btn-lg" id="gst_email_modal" data-toggle="modal" data-target="#gst_myModal" style="display:none;"></button>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!------------------  GST Java Script ------------------------------->
                            <script type="text/javascript">
                            function gst_valid_entry()
                            {
                            var totalAmt = $('#gst_totalAmt').val();
                            var sEmail = $('#gst_sEmail').val();
                            if (totalAmt != '' && sEmail != '')
                            {
                            $('#gst_email_modal').click();
                            } else
                            {
                            alert('Please Enter Email-Id and Amount');
                            }
                            }
                            function gst_email_post()
                            {
                            var pop_email = document.getElementById("gst_pop_email").value;
                                //alert(pop_email);
                            document.getElementById("gst_email").value = pop_email;
                            document.getElementById("gst_form1").target = "_self";
                            document.getElementById("gst_form1").action = "gst_invoice_mail_new.php";
                            document.getElementById("gst_form1").submit();
                            /* document.getElementById("gst_form1").target ="_new";
                            document.getElementById("gst_form1").action = "gst_invoice_mail_new.php";*/
                            }
                            function gst_pdf_post()
                            {
                            document.getElementById("gst_form1").target = "_new";
                            document.getElementById("gst_form1").action = "gst_invoice_new_pdf.php";
                            }
                            </script>
                            <script>
                            function gst_resetform_1()
                            {
                            var invoicee = document.getElementById("gst_invoice").value;
                            var up_invoicee = +invoicee + 1;
                            document.getElementById("gst_invoice").value = up_invoicee;
                            document.getElementById("gst_disAmt").value = '';
                            document.getElementById("netv").value = '';
                            document.getElementById("cgst").value = '';
                            document.getElementById("sgst").value = '';
                            document.getElementById("igst").value = '';
                            document.getElementById("totalAmt").value = '';
                            document.getElementById("gst_AmtWords").value = '';
                            document.getElementById("amc_state").innerHTML = '';
                            document.getElementById("gst_null_amc").selected = 'true';
                            document.getElementById("gst_txtSelectedAMC").value = '';
                            document.getElementById("gst_invoice").focus();
                            }
                            function gst_on_change_state()
                            {
                            var amount = document.getElementById('gst_disAmt').value;
                            var ServicerProvider_state = document.getElementById('gst_ServicerProvider_state').value;
                            var amc_state = document.getElementById('hidden_amc_state').value;
                            if (amc_state != '' && ServicerProvider_state != '' && amount != '')
                            {
                            document.getElementById('gst_disAmt').value = amount;
                            var netvalue = parseFloat(amount / 1.18).toFixed(2);
                            var net = Math.round(parseFloat(netvalue));
                            if (!isNaN(net))
                            {
                            document.getElementById('gst_netv').value = netvalue;
                            return gst_sum();
                            }
                            }
                            }
                            function gst_calc()
                            {
                            var amount = document.getElementById('gst_disAmt').value;
                            var month = document.getElementById('gst_month').value;
                            var year = document.getElementById('gst_year').value;
                            if (month == '0' || year == '')
                            {
                            alert('Please Enter Month And Year');
                            } else
                            {
                            var ServicerProvider_state = document.getElementById('gst_ServicerProvider_state').value;
                            var amc_state = document.getElementById('hidden_amc_state').value;
                            if (amc_state != '' && ServicerProvider_state != '')
                            {
                            document.getElementById('gst_disAmt').value = amount;
                            var netvalue = parseFloat(amount / 1.18).toFixed(2);
                            var net = Math.round(parseFloat(netvalue));
                            if (!isNaN(net)) {
                            document.getElementById('gst_netv').value = netvalue;
                            return gst_sum();
                            }
                            } else
                            {
                            if (amc_state == '')
                            {
                            document.getElementById('gst_AmcName').focus();
                            document.getElementById('gst_AmcName').style.border = '1px solid red';
                            alert('Please Select Amc');
                            }
                            if (ServicerProvider_state == '')
                            {
                            document.getElementById('gst_ServicerProvider_state').focus();
                            document.getElementById('gst_ServicerProvider_state').style.border = '1px solid red';
                            alert('Please Select Service provider State');
                            }
                            }
                            }
                            }
                            function gst_sum()
                            {
                            var ServicerProvider_state = document.getElementById('gst_ServicerProvider_state').value;
                            var amc_state = document.getElementById('hidden_amc_state').value;
                            method = '';
                            if (ServicerProvider_state == amc_state)
                            {
                            document.getElementById('cgst_rate').innerHTML = '9';
                            document.getElementById('sgst_rate').innerHTML = '9';
                            document.getElementById('igst_rate').innerHTML = '';
                            document.getElementById('igst').value = '';
                            document.getElementById('gst_totalAmt').value = '';
                            var method = '1';
                            } else
                            {
                            document.getElementById('cgst_rate').innerHTML = '';
                            document.getElementById('sgst_rate').innerHTML = '';
                            document.getElementById('igst_rate').innerHTML = '18';
                            document.getElementById('cgst').value = '';
                            document.getElementById('sgst').value = '';
                            document.getElementById('gst_totalAmt').value = '';
                            var method = '2';
                            }
                            var net_amount = document.getElementById('gst_netv').value;
                            var month = document.getElementById('gst_month').value;
                            var year = document.getElementById('gst_year').value;
                            if (method == '1')
                            {
                            var val_1 = (net_amount / 100);
                            var part = val_1 * 9;
                            var values = parseFloat(part).toFixed(2);
                            document.getElementById('cgst').value = values;
                            document.getElementById('sgst').value = values;
                            var total = Math.round(parseFloat(+values + +values));
                            document.getElementById('gst_totalAmt').value = total;
                            } else
                            {
                            var val_1 = (net_amount / 100);
                            var part = (val_1 * 18).toFixed(2);
                            document.getElementById('igst').value = part;
                            document.getElementById('gst_totalAmt').value = Math.round(parseFloat(part));
                            }
                            var result = document.getElementById('gst_totalAmt').value;
                            return NumToWord(result, 'gst_AmtWords');
                            }
                            function printpage(divName) {
                            var printContents = document.getElementById(divName).innerHTML;
                            var originalContents = document.body.innerHTML;
                            document.body.innerHTML = printContents;
                            window.print();
                            document.body.innerHTML = originalContents;
                            }
                            </script>
                            <script src="numtowordinr.js" type="text/javascript"></script>
                            <script type="text/javascript">
                            function gst_OnDropDownChange(dropDown) {
                              // console.log(dropDown);
                            var selectedText = dropDown.options[dropDown.selectedIndex].innerHTML;
                              console.log(selectedText);
                            var selectedValue_1 = dropDown.value;
                            console.log(selectedValue_1);
                            var selectedValue_array = selectedValue_1.split('(!)');
                            selectedValue = selectedValue_array[0];
                            document.getElementById('amcnamehidden').value = selectedValue;
                            if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                            } else {// code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("gst_txtSelectedAMC").value = xmlhttp.responseText;
                            }
                            }
                            //  document.getElementById("search-result").innerHTML='<img src="images/image.gif"/>';
                            xmlhttp.open("GET", "gst_ajax_entityAddre.php?aID=" + selectedValue, true);
                            xmlhttp.send();
                            load_amc_state(selectedValue);
                            }
                            </script>
                            <script>
                            function load_amc_state(selectedValue)
                            {
                            $.ajax({
                            url: 'gst_load_amc_state.php',
                            type: "GET",
                            data: "entity_code=" + selectedValue,
                            cache: false,
                            success: function (responce)
                            {
                            // alert(responce);
                            $('#amc_state').html(responce);
                            $('#hidden_amc_state').val(responce);
                            }
                            })
                            }
                            </script>
                            <!-----------------//--- GST Java Script ------------------------------->
                        </div>
                        </div>
                    </section>
                    <?php
                    $mm = $_GET['gst_mail'];
                    if ($mm == 'sus') {
                    ?>
                    <script>
                    show_gst('not_tab');
                    </script>
                    <?php
                    }
                    $sm = $_GET['service_mail'];
                    if ($sm == 'sus') {
                    ?>
                    <script>
                    show_service_tax('not_tab');
                    </script>
                    <?php
                    }
                    ?>
                    <?php
                    include ('footer.php');
                    ?>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    <div class="modal fade" id="gst_myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form id="pop_up" name="pop_up" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"> Sent Mail To </h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <input type="text" name="gst_pop_email" id="gst_pop_email" class="form-control">
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default" data-dismiss="modal" onclick="gst_email_post();">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--------------------- Service Tax Model -------------------->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form id="pop_up" name="pop_up" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Sent Mail To </h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <input type="text" name="pop_email" id="pop_email" class="form-control">
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default" data-dismiss="modal" onclick="email_post();">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--------------------//- Service Tax Model -------------------->
                    </div><!----wrapper--->
                </body>
                <script>document.onkeydown = function(e)
                {
                if(event.keyCode == 123) {
                return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
                }
                if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
                }
                if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
                return false;
                }
                }
                </script>
            </html>