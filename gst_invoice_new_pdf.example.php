<?php 
ob_start();
ob_clean();
flush();
session_start();
$host = "localhost";
$user = "redtechn_user";
$pass = "REPLACE_WITH_PRIVATE_VALUE";
$data = "redtechn_databs";
$con = mysqli_connect($host, $user, $pass, $data);

header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: public");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
header("Content-Description: PHP Generated Data");
$header = "Content-type:text/plain; charset=iso-8859-1\r\n";
clearstatcache();
require_once('vendor/autoload.php'); 
    // $mpdf = new mPDF();
    
    $mpdf = new \Mpdf\Mpdf();
    

   $arr = explode(' ',trim($amcname_value));

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
          $yourFileName=$arr[0].$month.'2016'.$arnno;
          $tem                         = $_FILES['pic']['tmp_name'];
          $stringadd                   = str_replace(' ', '-', $addAmc); 
          $stringadd                   = preg_replace('/[^A-Za-z0-9\-]/', '', $stringadd); 
       
	$temp = explode(' ',$addAmc);
	$address2 = ""; $temp2 = array();
	for($i=0; $i<count($temp); $i++){ if($temp[$i]!=' '){ array_push($temp2,$temp[$i]); } }
	for($i=0; $i<count($temp2); $i++)
	{
		if((($i+1)%5)==0 && $temp2[$i]!=''){ $address2 .= $temp2[$i].'<br/>'; }
		else{ $address2 .= $temp2[$i]." "; }
}


	$num_row_query      = mysqli_query($con,"SELECT id FROM `advisertax_info` WHERE `ARN Number`='$arnno' and Section='Gst'");
	$num_row            = mysqli_num_rows($num_row_query);
	$row                = mysqli_fetch_array($num_row_query);
	$row_id             = $row['id']; 
	
	if($num_row ==0)
	{
	$entry_date = date('d-m-Y:H:i:s');
	$ins_amc=mysqli_query($con,"INSERT INTO `advisertax_info`(`ARN Number`, `Service Provider Name`, `Service Provider Address`, `Service Provider Email ID`,`mobile_no`,`Section`,`entry_date`) VALUES ('$arnno','$sevicepname','$serviceprovideradd','$semail','$gst_mobile_no','Gst','$entry_date')");
	}
	else
	{
	mysqli_query($con,"UPDATE `advisertax_info` SET `ARN Number`='$arnno',`Service Provider Name`='$sevicepname',`Service Provider Address`='$serviceprovideradd',`Service Provider Email ID`='$semail',`mobile_no`='$gst_mobile_no',`Section`='Gst' WHERE `id`=$row_id");
	}

     

    $Tabledata="<style>  
    .bg-grey{
    background: #4495D4 none repeat scroll 0 0;
    color: #ffffff;
    font-size:16pt;
    border:1px solid #000;
} 
</style>
<table align='center' style='width=100%; border:1px solid #000;' >
      <tbody><tr>
        <td class='bg-grey' Style='background: #4495D4 none repeat scroll 0 0;color: #ffffff;' align='center' colspan='3' height='50px' style=font-size:20px;> <h3>GST INVOICE</h3></td>
      </tr>
    <tr>
    <tr><td colspan='3' height='10px'></td></tr>
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
             <td colspan='3' height='10px'></td>
          </tr>
          

          <tr>
             <td valign='top' style='font-size:12pt;width:25%;' align='left'>HSN No. </td>
             <td valign='top' style='font-size:12pt;width:40%;padding-left:30px;' align='left'>$hsno</td>
             <td style='width:35%;'></td>
          </tr>
          <tr>
             <td colspan='3' height='10px'></td>
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
            <td  align='right' style='font-size:16pt;color:#fff;text-align:right;padding-left:50px;'><h4>Amount (Rs)</h4></td>
            <td></td>
                       </tr>
          
		  
          <tr>
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
             <td colspan='3' height='10px'></td>
          </tr>
          <tr>
             <td>Rupees in words :   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             <td style='border-bottom:1px solid #000000;' height='30px'>$AmtWords</td> 
             <td>&nbsp;</td>
          </tr>
         
           <tr>
             <td colspan='3' height='10px'>&nbsp;</td>
          </tr>
          <tr>
             <td  height='20px' align='right'>For Service Provider </td>
             <td></td>
             <td>Authorized Signatory</td>
          </tr>
  
                
    </tbody></table>";
    $css="<style>  
    .bg-grey{
    background: #4495D4 none repeat scroll 0 0;
    color: #ffffff;
    font-size:16pt;
    border:1px solid #000;
} ";
     $mpdf->SetFooter("This is a  Computer generated Invoice and requires no signature");
    // $mpdf->WriteHTML($css,1); 
     $mpdf->WriteHTML($Tabledata);   
    $mpdf->Output();
   //$mpdf->SetDisplayMode('fullpage');
   $mpdf->Output($yourFileName, 'I');
    ob_flush();
    exit;?>