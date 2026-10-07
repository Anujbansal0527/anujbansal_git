<?php ob_start();
require ('phpmailer/PHPMailerAutoload.php');

		  $host = "localhost";
        $user = "redtechn_user";
        $pass = "REPLACE_WITH_PRIVATE_VALUE";
        $data = "redtechn_databs";
		  $con = mysqli_connect($host, $user, $pass, $data);
		  header("Cache-Control: no-cache, must-revalidate");     
		  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		  $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
		  clearstatcache();
		  session_start();
		  require_once('MPDF57/mpdf.php'); 
		  $mpdf = new mPDF();
           
	   $invoice             = $_REQUEST['gst_invoiceno'];
           $email_subject       = "Your email subject line";
           $invoiceno           = $_REQUEST['gst_invoiceno'];
           $tdate               = $_REQUEST['gst_tDate'];
           $arnno               = "ARN-".$_REQUEST['gst_ARNno'];
           $sevicepname         = $_REQUEST['gst_name'];
	   $Panno               = $_REQUEST['gst_pan_no'];
           $hsno                = $_REQUEST['g_hsno'];
	   $serviceprovideradd  = $_REQUEST['gst_ServicerProviderAddress'];
           $semail              = $_REQUEST['gst_sEmail'];
           //$sregno              = $_REQUEST['ServReg'];
           $logo                = $_REQUEST['pic'];
           $amcname             = $amcname_value;
           $addAmc              = addslashes(trim($_REQUEST['gst_addAmc'])); //echo $addAmc; die();
        //   $addAmc = preg_replace('/\s+/','',$addAmc);
		
		 $Service_Recipient_State           = $_REQUEST['hidden_amc_state'];
		 $ServicerProvider                  = $_REQUEST['gst_ServicerProvider'];
		 $gstno_Servicer_Provider           = $_REQUEST['gst_ServReg'];
		 $AmcName_array                     = explode('(!)',$_REQUEST['gst_AmcName']);
		 $AmcName                           = $AmcName_array[1];
		 $amcname_address                   = addslashes(trim($_REQUEST['gst_txtSelectedAMC']));
		 $ServicerProvider_state            = $_REQUEST['gst_ServicerProvider_state'];
		 $R_GSTN                            = $_REQUEST['R_GSTN'];
		 $disamt                            = $_REQUEST['gst_disAmt'];
                 $netbrokage                        = $_REQUEST['gst_netv'];
                 $cgst                              = $_REQUEST['cgst'];
                 $sgst                              = $_REQUEST['sgst'];
		 $rate_cgst                         ='9';
		 $rate_sgst                         ='9';
	         $rate_igst                         ='18';
                 $igst                              = $_REQUEST['igst'];
		 $mobile                            = $_REQUEST['gst_mobile_no'];
               
		 if($igst=='')
		   {
			  $rate_cgst ='9';
			  $rate_sgst ='9';  
			  $rate_igst ='';
		   }
		   else
		   {
			   $rate_igst ='18';
			   $rate_cgst ='';
			   $rate_sgst ='';  
		   }
		   
		   
           $totalAmt                   = $_REQUEST['gst_totalAmt'];
           $AmtWords                   = $_REQUEST['gst_AmtWords'];
           $month                      = $_REQUEST['gst_Month'];
        //   $monthN = array (1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');
//$month= $monthN[(int)$month];
          $year                        = $_REQUEST['gst_year'];
          $file                         = $_FILES['pic'];
          $preview_file                 = false;
          $arn_no                       = $_REQUEST['gst_ARNno']; 
          $output                       = $_REQUEST['imageid'];
          $yourFileName                 = time().'-'.$_REQUEST['gst_ARNno'].'.pdf';
          $tem                          = $_FILES['pic']['tmp_name'];
          $stringadd                    = str_replace(' ', '-', $addAmc); 
          $stringadd                    = preg_replace('/[^A-Za-z0-9\-]/', '', $stringadd); 
       
 $email_message="<style>  
    .bg-grey{
    background: #4495D4 none repeat scroll 0 0;
    color: #ffffff;
    font-size:16pt;
    border:1px solid #000;
} 
</style>
<table style='border:1px solid #176a9c;' align='center' cellpadding='5px' cellspacing='0' width='800'>
      <tbody><tr>
        <td class='bg-grey' Style='background: #4495D4 none repeat scroll 0 0;color: #ffffff;' align='center' colspan='3' height='50px'><h3>GST INVOICE</h3></td>
      </tr>
    <tr>
    <tr><td colspan='3' height='20px'></td></tr>
          <tr>
             <td valign='top' style='font-size:12pt; width:40%;' align='left' >Invoice Number </td>            
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$invoice</td>
             <td style='width:35%;'></td>
          </tr>   
           <tr>
             <td height='10px'></td> <td height='10px' ></td> <td height='10px'></td>
          </tr>
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>Invoice Date </td>
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$tdate</td>
             <td style='width:35%;'></td>
          </tr>
          <tr>
             <td colspan='3' height='20px'></td>
          </tr>
          

         <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>HSN No. </td>
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$hsno</td>
             <td style='width:35%;'></td>
          </tr>
          <tr>
             <td colspan='3' height='20px'></td>
          </tr>

          <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>ARN Code</td>
              <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$arnno</td>
              <td width='35%'></td>
          </tr>
         
          <tr>
             <td colspan='3' height='10px'></td>
          </tr>
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>Service Provider Name(ARN Holder)</td>             
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$sevicepname</td>
             <td width='35%'></td>
          </tr>
		  
          <tr>
             <td colspan='3' height='10px'></td>
          </tr>
		  
		  
		  <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>Pan No</td>             
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$Panno</td>
             <td width='35%'></td>
          </tr>
		  
		  
		   <tr>
             <td colspan='3' height='10px'></td>
          </tr>
		  
		  
		  <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>Mobile No</td>             
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$mobile </td>
             <td width='35%'></td>
          </tr>
		  
		  
		  <tr>
             <td colspan='3' height='10px'></td>
          </tr>
		  
		  
		  <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>State the Service Provider </td>             
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'> $ServicerProvider_state </td>
             <td width='35%'></td>
          </tr>
		  
		  
		  
          <tr>
             <td colspan='3' height='10px'></td>
          </tr>
		  
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>Service provider Address</td>            
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'> $serviceprovideradd</td>
              <td width='35%'></td>
          </tr>
          <tr>
             <td colspan='3' height='10px'></td>
          </tr>
           <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>Service Provider Email Id</td>             
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$semail</td>
              <td width='35%'></td>
          </tr>
          <tr>
             <td colspan='3' height='10px'></td>
          </tr>
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;'>GSTIN Registration no. of the Service Provider.</td>             
             <td valign='middle' style='font-size:12pt;width:40%;padding-left:30px;'>$gstno_Servicer_Provider</td>
              <td width='35%'></td>
          </tr>          
          <tr>
             <td colspan='3' height='10px'></td>
          </tr>
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;'>Name of AMC: </td>            
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;'>$AmcName</td>
             <td width='35%'></td>
          </tr>
          <tr>
             <td colspan='3' height='10px'></td>
          </tr>
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;'>Address Of AMC  </td>             
             <td valign='top' style='font-size:12pt;width:40%;text-align:justify;padding-left:30px;'>$amcname_address</td>
              <td width='35%'></td>
          </tr>
		  
		  <tr>
             <td colspan='3' height='10px'></td>
          </tr>
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;'>Service Recipient State:  </td>             
             <td valign='top' style='font-size:12pt;width:40%;text-align:justify;padding-left:30px;'> $Service_Recipient_State </td>
              <td width='35%'></td>
          </tr>
		  
		  
		  
		  <tr>
             <td colspan='3' height='10px'></td>
          </tr>
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;'> GSTIN of Service Recipient  </td>             
             <td valign='top' style='font-size:12pt;width:40%;text-align:justify;padding-left:30px;'>$R_GSTN </td>
              <td width='35%'></td>
          </tr>
		  
		  
          <tr>
             <td valign='top' style='font-size:12pt;width:25%;'>Invoice for the month</td>
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;'>$month.$year</td>
             <td width='35%'></td>
          </tr>          
          
            <tr class='bg-grey'  style='background: #4495D4 none repeat scroll 0 0;color: #ffffff;'>
            <td  style='font-size:16pt;color:#fff;'><h4>Description</h4></td>
            <td  align='center' style='font-size:16pt;color:#fff;text-align:center;padding-left:50px;'><h4>Amount (Rs)</h4></td>
            <td></td>
                       </tr>
         
    <td style='font-size:12pt;width:25%;'>Distribution Commission for sale of Mutual Fund </td>
    <td align='right' style='font-size:12pt;width:25%;'>$disamt </td>
     <td></td>
  </tr>
  <tr>
    <td style='font-size:12pt;width:25%;'>Net Brokerage Amount &nbsp;</td>
    <td align='right' style='font-size:12pt;width:25%;'>$netbrokage</td>
     <td></td>
  </tr>
          <tr>
            <td style='font-size:12pt;width:25%;'>Add: CGST @ $rate_cgst % </td>
            <td align='right' style='font-size:12pt;width:25%;'>$cgst</td>
             <td></td>
          </tr>
          <tr>
            <td style='font-size:12pt;width:25%;'>Add: SGST @ $rate_sgst %</td>
            <td align='right' style='font-size:12pt;width:25%;'>$sgst</td>
             <td></td>
          </tr>
          <tr>
            <td style='font-size:12pt;width:25%;'>Add: IGST @ $rate_igst % </td>
            <td align='right' style='font-size:12pt;width:25%;'> $igst </td>
             <td></td>
          </tr>
          <tr>
             <td style='font-size:12pt;width:25%;'><h4>Total Tax: </h4></td>
            <td align='right' style='font-size:12pt;width:25%;'>$totalAmt</td>
             <td></td>
          </tr>
        </tbody></table>
             
          <table><tbody>
           <tr>
             <td colspan='3' height='30px'></td>
          </tr>
          <tr>
             <td>Rupees in words :   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             <td style='border-bottom:1px solid #000000;' height='30px'>$AmtWords</td> 
             <td>&nbsp;</td>
          </tr>
         
           <tr>
             <td colspan='3' height='50px'>&nbsp;</td>
          </tr>
          <tr>
             <td  height='30px' align='right'>For Service Provider </td>
             <td></td>
             <td>Authorized Signatory</td>
          </tr>
  
                
    </tbody></table>";   


	if($_POST['gst_email']=='')
	{
	    $email_to = $semail;
	}
	else
	{
	   $email_to = $_POST['gst_email'].','.$semail;	
	}

//$email_to =  $semail;
$email_from="servicetaxinvoice@redvisiontech.com";
$email_subject="GST INVOICE OF "." "."ARN-".$_REQUEST['ARNno']; 

define('GUSER','servicetaxinvoice@redvisiontech.com'); // GMail username
define('GPWD','servicetax!@#$%'); 
define('SMTPSERVER','mail.redvisiontech.com');

function smtpmailer($to,$from,$from_name,$subject,$body) 
{ 
	global $error;    
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	//$mail->Host = 'smtp.live.com';
	// $mail->Port = 25; 
	$mail->Host = SMTPSERVER;
	$mail->Username = GUSER;  
	$mail->Password = GPWD;        
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject; 
	$mail->Body = $body;
	$mail->IsHTML(true); 
	$mail->AddAddress($to);
	if(!$mail->Send()) {
	$error = 'Mail error: '.$mail->ErrorInfo; 
	return false;
	} else {
	$error = 'Message sent!';
	return true;
	}
} 



$addr = explode(',',$email_to);

foreach ($addr as $ad) {
    $email=(trim($ad));       

  if (smtpmailer($email,$email_from,$sevicepname,$email_subject,$email_message)) {
    
} else {
    if (!smtpmailer($email_to,$email_from,$sevicepname,$email_subject,$email_message, false)) {
        if (!empty($error)) echo $error;
    } else {
        echo 'Invoice has been sent on given email id';
    } 
    } 
    }

header("location:invoices.php?gst_mail=sus#gst_mail_msg");
 
	
    /* $mpdf->SetFooter("This is a  Computer generated Invoice and requires no signature");
    $mpdf->WriteHTML($Tabledata);   
    $mpdf->Output();
   //$mpdf->SetDisplayMode('fullpage');
   // $mpdf->Output($yourFileName, 'I');
   $mpdf->Output('gst_pdf/'.$yourFileName,'F');
    ob_flush();
    exit;*/
	?>