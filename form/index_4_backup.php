<?php
ini_set("session.auto_start", 0);
{
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
 $form_dir 	    =	$_GET['dn'];
 $form_name	   =	$_GET['form_name'];
 $arn_no          =	$_GET['arn_no'];
 $euin_no	     =	$_GET['euin_no'];
//  $arn1	     =	$_GET['arn1'];


// initiate FPDI
$pdf = new FPDI();


$ax1=0;
$ay1=0;
$ex1=0;
$ey1=0;
$ex11=0;
$ey11=0;

$ax2=0;
$ay2=0;
$ex2=0;
$ey2=0;


$ax3=0;
$ay3=0;
$ex3=0;
$ey3=0;

$ax4=0;
$ay4=0;
$ex4=0;
$ey4=0;

$ax5=0;
$ay5=0;
$ex5=0;
$ey5=0;


$ax16=0;
$ay16=0;
$ex16=0;
$ey16=0;


$pdf->SetFont('Helvetica');
$pdf->SetFontSize('10');

if (is_dir($form_dir))
{ 
  if($form_dir=='mf')
 {

  if ($dh = opendir($form_dir))
	{
		
		 if(file_exists($form_dir.'/'.$form_name))
		   {        
		         $pageCount = $pdf->setSourceFile($form_dir.'/'.$form_name);
			       
			        if($form_name=='ADITYA-BIRLA-CAPITAL-COMMON-APPLICATION-FORM.pdf')
					{
					$ax1  =  22;         $ay1  = 68;
					$ex1  = 140;         $ey1  = 68;
				// 	$ex11  = 43;         $ey11  = 25;
					$pdf->SetFont('arial');
                   // $pdf->SetFontSize('30');
					}
					else
					if($form_name=='ICICI_kim_with_caf.pdf')
					{					
					$ax1  =  22;         $ay1  = 68;
					$ex1  = 140;         $ey1  = 68;
				// 	$ex11  = 43;         $ey11  = 25;
					$pdf->SetFont('arial');
                   // $pdf->SetFontSize('30');
					}
					else
					if($form_name=='SAHARA-INFRASTRUCTURE-FUND.pdf')
					{					
					$ax1  = 26;          $ay1  = 63;
					$ex1  = 125;         $ey1  = 63;
				// 	$ex11  = 130;         $ey11  = 25;
					}
					else
					if($form_name=='Sahara-liquid-fund.pdf')
					{					
					$ax1  = 28;          $ay1  = 63;
					$ex1  = 128;         $ey1  = 63;
				// 	$ex11  = 130;         $ey11  = 25;
					}

					else
					if($form_name=='SAHARA-MIDCAP-FUND.pdf')
					{					
					$ax1  = 26;          $ay1  = 62;
					$ex1  = 128;         $ey1  = 62;
				// 	$ex11  = 130;         $ey11  = 25;
					}
					else
					if($form_name=='SAHARA-Power-Natural-R.pdf')
					{					
					$ax1  = 38;          $ay1  = 63;
					$ex1  = 125;         $ey1  = 63;
				// 	$ex11  = 110;         $ey11  = 37;
					}
					else	
					if($form_name=='SAHARA-REAL-FUND.pdf')
					{					
					$ax1  = 25;          $ay1  = 62;
					$ex1  = 130;         $ey1  = 62;
				// 	$ex11  = 80;         $ey11  = 110;
					}
					else	
					if($form_name=='Sahara-Star-Value.pdf')
					{					
					$ax1  = 25;          $ay1  = 62;
					$ex1  = 120;         $ey1  = 62;
				// 	$ex11  = 140;         $ey11  = 62;
					}
					
					else	
					if($form_name=='Sahara-super-20.pdf')
					{					
					$ax1  = 30;          $ay1  = 62;
					$ex1  = 122;          $ey1  = 62;
				// 	$ex11  = 142;          $ey11  = 44;
					}
                    else	
					if($form_name=='Sahara-tax-gain.pdf')
					{					
					$ax1  = 30;          $ay1  = 62;
					$ex1  = 122;          $ey1  = 62;
				// 	$ex11  = 142;          $ey11  = 25;
					}

					else
					if($form_name=='Sahara-Wealth-Plus-fund.pdf')
					{					
					$ax1  = 30;           $ay1  = 62;
					$ex1  = 122;          $ey1  = 62;
				// 	$ex11  = 97;          $ey11  = 25;
					}
					else
					if($form_name=='SBIMF-common-application-form-debt-liquid-schemes.pdf')
					{					
					$ax1  = 22;           $ay1  = 33;
					$ex1  = 108;          $ey1  = 33;
				// 	$ex11  = 108;          $ey11  = 25;
					}
					else
					if($form_name=='SBIMF-common-application-form-equity-schemes.pdf')
					{					
					$ax1  = 16;           $ay1  = 26;
					$ex1  = 150;          $ey1  = 26;
				// 	$ex11  = 180;          $ey11  = 25;
					}
					else
					if($form_name=='Tata-Mutual-fund-Common-application.pdf')
					{					
					$ax1  = 22;           $ay1  = 29;
					$ex1  = 123;          $ey1  = 29;
				// 	$ex11  = 123;          $ey11  = 25;
					}
					else
					if($form_name=='Taurus-Common-Application-Form.pdf')
					{					
					$ax1  = 32;           $ay1  = 53;
					$ex1  = 108;           $ey1  = 53;
				// 	$ex11  = 108;           $ey11  = 25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}

					else
					if($form_name=='Union-MF-Common-KIM.pdf')
					{					
					$ax1  = 33;           $ay1  =  48;
					$ex1  = 120;          $ey1  =  48;
				// 	$ex11  = 120;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='UTIMF-Common-Application-Form-Equity-Hybrid-Funds.pdf')
					{					
					$ax1  = 33;           $ay1  =  23;
					$ex1  = 80;          $ey1  =  23;
				// 	$ex11  = 80;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='UTIMF-Common-app-Liquid.pdf')
					{					
					$ax1  = 25;           $ay1  =  21;
					$ex1  = 125;          $ey1  =  21;
				// 	$ex11  = 125;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}


                   else
					if($form_name=='ADITYA-BIRLA-CAPITAL-COMMON-APPLICATION-FORM.pdf')
					{					
					$ax1  = 25;           $ay1  =  20;
					$ex1  = 125;          $ey1  =  20;
				// 	$ex11  = 125;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
                    else
					if($form_name=='Axis-MF-Common-Application-Form-Debt-and-Fund-of-Fund-Schemes-1.pdf')
					{					
					$ax1  = 25;           $ay1  =  50;
					$ex1  = 25;          $ey1  =  60;
				// 	$ex11  = 125;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='Axis-MF-Common-Application-Form-Equity-Hybrid-Index-and-Fund-of-Fund-Schemes.pdf')
					{					
					$ax1  = 25;           $ay1  =  50;
					$ex1  = 25;          $ey1  =  60;
				// 	$ex11  = 135;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('11');
					}
					else
					if($form_name=='Baroda-Mutual-Fund-common-application-Combined-Debt-KIM.pdf')
					{					
					$ax1  = 20;           $ay1  =  50;
					$ex1  = 80;          $ey1  =  50;
				// 	$ex11  = 135;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}


					else
					if($form_name=='BNP-Common-app-form-Debt-KIM.pdf')
					{					
					$ax1  = 27;           $ay1  =  37;
					$ex1  = 142;          $ey1  =  37;
				// 	$ex11  = 135;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='BNP-Common-app-form-Equity-KIM.pdf')
					{					
					$ax1  = 27;           $ay1  =  39;
					$ex1  = 145;          $ey1  =  39;
				// 	$ex11  = 125;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}


					else
					if($form_name=='BOI-AXA-common-App-form-kim-debt.pdf')
					{					
					$ax1  = 27;           $ay1  =  40;
					$ex1  = 125;          $ey1  =  40;
				// 	$ex11  = 125;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='BOI-Axa-common-App-Form-kim-equity.pdf')
					{					
					$ax1  = 27;           $ay1  =  25;
					$ex1  = 155;          $ey1  =  25;
				// 	$ex11  = 155;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}


					else
					if($form_name=='Canara-robeco-equity-hybrid-fund_regular-plan.pdf')
					{					
					$ax1  = 27;           $ay1  =  42;
					$ex1  = 122;          $ey1  =  42;
				// 	$ex11  = 152;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='Common-Application-Form.pdf')
					{					
					$ax1  = 27;           $ay1  =  67;
					$ex1  = 140;          $ey1  =  67;
				// 	$ex11  = 140;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('8');
					}
					else
					if($form_name=='Common-Debt-KIM.pdf')
					{					
					$ax1  = 27;           $ay1  =  44;
					$ex1  = 125;          $ey1  =  44;
				// 	$ex11  = 125;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					
			
			        else
					if($form_name=='Common-KIM-Debt.pdf')
					{					
					$ax1  = 19;           $ay1  =  46;
					$ex1  = 96;          $ey1  =  46;
				// 	$ex11  = 120;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='DSPIM-common-application-form.pdf')
					{					
					$ax1  = 30;           $ay1  =  30;
					$ex1  = 125;          $ey1  =  30;
				// 	$ex11  = 125;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}

					else
					if($form_name=='Edelweiss-Application-Form-STEP-Facility.pdf')
					{					
					$ax1  = 25;           $ay1  =  50;
					$ex1  = 130;          $ey1  =  50;
				// 	$ex11  = 110;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='Edelweiss-Common-Application-form.pdf')
					{					
					$ax1  = 25;           $ay1  =  50;
					$ex1  = 130;          $ey1  =  50;
				// 	$ex11  = 170;          $ey11  =  25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
		
					else
					if($form_name=='Franklin_templeton_family-solutions_Common Application.pdf')
					{					
					$ax1  = 21;           $ay1  = 46;
					$ex1  = 120;           $ey1  = 46;
				// 	$ex11  = 120;           $ey11  = 25;
					}
					else
					if($form_name=='Franklin-templetion-debt-Common-application-form.pdf')
					{					
					$ax1  = 23;              $ay1  = 22;
					$ex1  = 130;           $ey1  = 22;
				// 	$ex11  = 130;           $ey11  = 25;
					}
					else
					if($form_name=='Franklin-templeton-equity-Common-Application-Form.pdf')
					{					
					$ax1  = 21;              $ay1  = 22;
					$ex1  = 125;             $ey1  = 22;
				// 	$ex11  = 105;             $ey11  = 25;
					}
					else
					if($form_name=='HDFC-Common-Debt.pdf')
					{					
					$ax1  = 20;              $ay1  = 44;
					$ex1  = 149;             $ey1  = 44;
				// 	$ex11  = 118;             $ey11  = 25;
					}
					else
					if($form_name=='HDFC-Common-Equity.pdf')
					{					
					$ax1  = 26;              $ay1  = 43;
					$ex1  = 153;             $ey1  = 43;
				// 	$ex11  = 175;             $ey11  = 25;
					}
					else
					if($form_name=='HSBC-common-application-form.pdf')
					{					
					$ax1  = 30;              $ay1  = 30;
					$ex1  = 130;             $ey1  = 30;
				// 	$ex11  = 130;             $ey11  = 30;
					}
					else
					if($form_name=='ICICI-Common-Application.pdf')
					{					
					$ax1  = 35;              $ay1  = 50;
					$ex1  = 130;             $ey1  = 50;
				// 	$ex11  = 130;             $ey11  = 25;
					}
					else
					if($form_name=='ICICI-prudential-child-care-fund-gift-plan.pdf')
					{					
					$ax1  = 18;              $ay1  = 49;
					$ex1  = 170;             $ey1  = 49;
				// 	$ex11  = 180;             $ey11  = 25;
					}
					else
					if($form_name=='IDBI-Common-application-form.pdf')
					{					
					$ax1  = 34;              $ay1  = 35;
					$ex1  = 144;             $ey1  = 35;
				// 	$ex11  = 85;             $ey11  = 25;
					}
					if($form_name=='IDFC-Common-FORM.pdf')
					{					
					$ax1  = 32;              $ay1  = 28;
					$ex1  = 135;             $ey1  = 28;
				// 	$ex11  = 85;             $ey11  = 25;
					}
					else
					if($form_name=='Indiabullsamc-common-application-auto-debit-nach-mandate-form.pdf')
					{					
					$ax1  = 25;              $ay1  = 44;
					$ex1  = 144;             $ey1  = 44;
				// 	$ex11  = 125;             $ey11  = 25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					else
					if($form_name=='Invesco-india-financial-services-fund-common-application.pdf')
					{					
					$ax1  = 74;              $ay1  = 40;
					$ex1  = 74;             $ey1  = 54;
				// 	$ex11  = 125;             $ey11  = 25;
					}
					else
					if($form_name=='JM-Mutual-Fund-Application-Form.pdf')
					{					
					$ax1  = 22;              $ay1  = 36;
					$ex1  = 105;             $ey1  = 36;
				// 	$ex11  = 140;             $ey11  = 25;
					}
					else
					if($form_name=='KIM-and-Common-Application-Form-For-Non-ETF-Schemes.pdf')
					{					
					$ax1  = 22;              $ay1  = 32;
					$ex1  = 90;             $ey1  = 32;
				// 	$ex11  = 143;             $ey11  = 25;
					}
					else
					if($form_name=='Kotak-MF-Commonaf.pdf')
					{					
					$ax1  = 28;              $ay1  = 29;
					$ex1  = 180;             $ey1  = 29;
				// 	$ex11  = 90;             $ey11  = 25;
					}
					else
					if($form_name=='L-and-T-Common-application.pdf')
					{					
					$ax1  = 22;              $ay1  = 48;
					$ex1  = 133;             $ey1  = 48;
				// 	$ex11  = 133;             $ey11  = 25;
					}
					else
					if($form_name=='LICMF-Common-Application-Form-of-Debt-Schemes.pdf')
					{					
					$ax1  = 30;              $ay1  = 35;
					$ex1  = 100;             $ey1  = 35;
				// 	$ex11  = 100;             $ey11  = 35;
					}
					else
					if($form_name=='LICMF-Common-Application-Form-of-Equity-Hybrid-&-ULIS-Schemes.pdf')
					{					
					$ax1  = 34;              $ay1  = 47;
				// 	$ex1  = 115;             $ey1  = 40;
					$ex11  = 115;             $ey11  = 40;
					}
					else
					if($form_name=='Mahindra-Manulife-Common-Application-Form.pdf')
					{					
					$ax1  = 28;              $ay1  = 42;
					$ex1  = 100;             $ey1  = 42;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Mirae-asset-common-application-form.pdf')
					{					
					$ax1  = 28;              $ay1  = 45;
					$ex1  = 118;             $ey1  = 45;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Motilal-oswal-Common-Application-Form.pdf')
					{					
					$ax1  = 55;              $ay1  = 13;
					$ex1  = 183;             $ey1  = 13;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Nippon-India-MF-Common-Application-Form-of-Debt-and-Liquid-Schemes.pdf')
					{					
					$ax1  = 28;              $ay1  = 54;
					$ex1  = 178;             $ey1  = 26;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Nippon-India-MF-Common-Application-Form-of-Equity.pdf')
					{					
					$ax1  = 28;              $ay1  = 28;
					$ex1  = 138;             $ey1  = 28;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='pgim-india-common-application-form(smart-form).pdf')
					{					
					$ax1  = 15;              $ay1  = 37;
					$ex1  = 180;             $ey1  = 37;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='PPFAS-conservative-Common-hybrid-fund.pdf')
					{					
					$ax1  = 28;              $ay1  = 54;
					$ex1  = 178;             $ey1  = 26;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='PPFAS-parikh-liquid-fund.pdf')
					{					
					$ax1  = 28;              $ay1  = 54;
					$ex1  = 178;             $ey1  = 26;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='PPFAS-tax-saver-fund.pdf')
					{					
					$ax1  = 28;              $ay1  = 57;
					$ex1  = 160;             $ey1  = 57;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Principal-Midcap-Fund-application-form.pdf')
					{					
					$ax1  = 25;              $ay1  = 60;
					$ex1  = 85;             $ey1  = 60;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Principal-Small-Cap-Fund-application-Form.pdf')
					{					
					$ax1  = 21;              $ay1  = 66;
					$ex1  = 81;             $ey1  = 66;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Quant-MF-Common-Application-Form.pdf')
					{					
					$ax1  = 28;              $ay1  = 48;
					$ex1  = 120;             $ey1  = 48;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Quantum-MF-Common-application-form-ETF.pdf')
					{					
					$ax1  = 28;              $ay1  = 41;
					$ex1  = 118;             $ey1  = 41;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Quantum-MF-Common-Application-Form-For-Non-ETF-Schemes.pdf')
					{					
					$ax1  = 28;              $ay1  = 32;
					$ex1  = 92;             $ey1  = 32;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='SAHARA-Banking-AND-FS-FUND.pdf')
					{					
					$ax1  = 28;              $ay1  = 64;
					$ex1  = 125;             $ey1  = 64;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Sahara-Growth-fund.pdf')
					{					
					$ax1  = 28;              $ay1  = 63;
					$ex1  = 125;             $ey1  = 63;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='Franklin-templeton-family-solutions-Common-Application.pdf')
					{					
					$ax1  = 22;              $ay1  = 26;
					$ex1  = 128;             $ey1  = 26;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='SAHARA-MF-COMMON-APPLICATION-FORM.pdf')
					{					
					$ax1  = 26;              $ay1  = 86;
					$ex1  = 128;             $ey1  = 86;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					else
					if($form_name=='SBIMF-common-application-form-debt-liquid-schemes.pdf')
					{					
					$ax1  = 26;              $ay1  = 86;
					$ex1  = 128;             $ey1  = 86;
				// 	$ex11  = 178;             $ey11  = 25;
					}
					
			}
		   else
		   {
		   echo"File Not Exit";
		   }
			  // iterate through all pages
			  for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
			  {
						// import a page
						$templateId = $pdf->importPage($pageNo);
						// get the size of the imported page
						$size = $pdf->getTemplateSize($templateId);
					
					
						// create a page (landscape or portrait depending on the imported page size)
						if ($size['w'] > $size['h']) {
							$pdf->AddPage('L', array($size['w'], $size['h']));
						} else {
							$pdf->AddPage('P', array($size['w'], $size['h']));
						}
					
						// use the imported page
						$pdf->useTemplate($templateId);
						
					   if($pageNo == '1')
						{
							  if(($ax1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ax1, $ay1);
							  $pdf->Write(0, $arn_no);
							  }
							  
							  if(($ex1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ex1, $ey1);
							  $pdf->Write(0, $euin_no);
							  }
							  
							 // if(($ex11!=0)&&($ey1!=0))
							 // {
							 // $pdf->SetXY($ex11, $ey11);
							 // $pdf->Write(0, $arn1);
							 // }
						}
						
						if($pageNo==2)
						{
						
							if(($ax2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
							}
							
							if(($ex2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
							}
						}
						
						if($pageNo == '3')
						{
						   if(($ax3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
							}
						}
						
						if($pageNo == '4')
						{
						   if(($ax4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
							}
						}
					
			 }
			  
			   
			  //close the directory
			 closedir($dh);
			 
			  // Output the new PDF
			 $pdf->Output($form_name,'I');
		}
  }
  
  
  
  
  //sip form axis
  
  

  if ($dh = opendir($form_dir))
	{
		if($form_dir=='sip_form_new')
      {
		 if(file_exists($form_dir.'/'.$form_name))
		   {        
		         $pageCount = $pdf->setSourceFile($form_dir.'/'.$form_name);
			       
			        if($form_name=='ICICI-SIP-Mandate-PAN.pdf')
					{
					
					$ax1  = 160;          $ay1  = 13;
					$ex1  = 180;         $ey1  = 13;
					}
                    
                    else
					if($form_name=='Edelweiss-SIP-MAndate.pdf')
					{
					$ax1  = 29;            $ay1  = 42;
					$ex1  = 140;           $ey1  = 42;	
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}

					else
					if($form_name=='DSPIM-Fatca.pdf')
					{
					$ax1  = 80;            $ay1  = 6;
					$ex1  = 105;           $ey1  = 6;	
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}


					else
					if($form_name=='Axis-MF-SIP-with-Mandate-Debt.pdf')
					{
					$ax1  = 25;            $ay1  = 41;
					$ex1  = 25;           $ey1  = 49;	
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}

					else
					if($form_name=='TATA-MF-otm-plus-sip.pdf')
					{
					$ax1  = 120;            $ay1  = 6;
					$ex1  = 140;           $ey1  = 6;	
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='SBI-MF-sip-enrolment-form.pdf')
					{
					$ax1  = 30;            $ay1  = 39;
					$ex1  = 140;            $ey1  = 39;	
					}
					else
					if($form_name=='Quantum-MF-otm.pdf')
					{
					$ax1  = 140;             $ay1  = 6;
					$ex1  = 160;            $ey1  = 6;	
					}
					else
					if($form_name=='Quantum-MF-Systematic-Transaction-Form-SIP-STP-SWP.pdf')
					{
					$ax1  = 28;             $ay1  = 44;
					$ex1  = 90;            $ey1  = 44;	
					}
					else
					if($form_name=='PPFAS-OTM-nach-SIP-form.pdf')
					{
					$ax1  = 120;             $ay1  = 6;
					$ex1  = 133;            $ey1  = 6;	
					}
					else
					if($form_name=='pgim-MF-sip-transaction-form-with-top-up.pdf')
					{
					$ax1  = 22;             $ay1  = 37;
					$ex1  = 180;            $ey1  = 37;	
					}
					else
					if($form_name=='Mirae-MFsip-form.pdf')
					{
					$ax1  = 33;             $ay1  = 35;
					$ex1  = 145;            $ey1  = 35;	
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('8');	
					}
					else
					if($form_name=='JM-Financial-SIP-Registration-cum-mandate-form-for-existing-investor.pdf')
					{
					$ax1  = 25;             $ay1  = 24;
					$ex1  = 160;            $ey1  = 24;	

					$pdf->SetFont('arial');
                    $pdf->SetFontSize('8');	
					}
					else
					if($form_name=='Indiabulls-sipregistrationcumautodebit-nach-mandate.pdf')
					{
					$ax1  = 25;             $ay1  = 22;
					$ex1  = 140;            $ey1  = 22;	
					}
					else
					if($form_name=='Quant-MF-SIP-ENROLLMENT-DETAILS.pdf')
					{
					$ax1  = 27;             $ay1  = 45;
					$ex1  = 132;             $ey1  = 45;
					}
					else
					if($form_name=='DSP-MF-otm-sip-form-multiple-sips.pdf')
					{
					$ax1  = 32;             $ay1  = 29;
					$ex1  = 111;             $ey1  = 29;	
					}
					else
					if($form_name=='Canara-SIP-Registration-Cum-Mandate-Nach-Form.pdf')
					{
					$ax1  = 28;             $ay1  = 28;
					$ex1  = 157;             $ey1  = 28;	
				    $pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					else
					if($form_name=='BOIAXA-sip-auto-debit-form.pdf')
					{
					$ax1  = 30;             $ay1  = 50;
					$ex1  = 105;            $ey1  = 50;	
					}
					else
					if($form_name=='Axis-MF-SIP-with-Mandate-Equity.pdf')
					{
					$ax1  = 25;             $ay1  = 41;
					$ex1  = 25;            $ey1  = 49;	

					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					else
					if($form_name=='Axis-MF-SIP-Registation-Form-with-OTM.pdf')
					{
					$ax1  = 22;             $ay1  = 19;
					$ex1  = 129;            $ey1  = 19;	
					}
					else
					if($form_name=='Aditya-BSL-SIP-Facility-Appl-Form.pdf')
					{
					$ax1  = 25;             $ay1  = 63;
					$ex1  = 175;            $ey1  = 63;	
					}
					else
					if($form_name=='UTIMF-SIP-Equity-Hybrid-Funds.pdf')
					{
					$ax1  = 25;             $ay1  = 40;
					$ex1  = 105;             $ey1  = 40;	
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					else
					if($form_name=='LandT-MF-SIP-Investment-Form-Mandate-Form-for-NACHECSAuto-Debit.pdf')
					{
					$ax1  = 24;             $ay1  = 40;
					$ex1  = 135;             $ey1  = 40;		
					}
					else
					if($form_name=='Principal-Midcap-Fund-SIP.pdf')
					{
					$ax1  = 120;             $ay1  = 6;
					$ex1  = 140;             $ey1  = 6;		
					}
					else
					if($form_name=='Principal-Small-Cap-Fund-SIP.pdf')
					{
					$ax1  = 120;             $ay1  = 6;
					$ex1  = 140;            $ey1  = 6;	
					}
					else
					if($form_name=='Baroda-MF-DebitMandateNACHRegistration-Form.pdf')
					{
					$ax1  = 21;             $ay1  = 39;
					$ex1  = 105;            $ey1  = 39;		
					}
					else
					if($form_name=='Baroda-MF-Fatca-Debt.pdf')
					{
					$ax1  = 27;             $ay1  = 6;
					$ex1  = 100;            $ey1  = 6;		
					}
					else
					if($form_name=='BNP-Debt-Fatca.pdf')
					{
					$ax1  = 27;             $ay1  = 6;
					$ex1  = 100;            $ey1  = 6;		
					}
					else
					if($form_name=='BNP-Fatca-Equity.pdf')
					{
					$ax1  = 27;             $ay1  = 6;
					$ex1  = 100;            $ey1  = 6;		
					}
					else
					if($form_name=='BNP-Paribas-SIP-FORM.pdf')
					{
					$ax1  = 27;             $ay1  = 38;
					$ex1  = 149;            $ey1  = 38;		
					}
					else
					if($form_name=='Franklin-templetion-debt-SIP-NAch.pdf')
					{
					$ax1  = 24;             $ay1  = 21;
					$ex1  = 130;            $ey1  = 21;		
					}
					else
					if($form_name=='Franklin-templeton-equity-SIP-Nach.pdf')
					{
					$ax1  = 27;             $ay1  = 30;
					$ex1  = 100;            $ey1  = 30;		
					}
					else
					if($form_name=='Franklin-templeton-family-solutions-SIP.pdf')
					{
					$ax1  = 27;             $ay1  = 22;
					$ex1  = 115;            $ey1  = 22;		
					}
					else
					if($form_name=='HDFC-Debt-SIP.pdf')
					{
					$ax1  = 27;             $ay1  = 65;
					$ex1  = 145;            $ey1  = 65;		
					}
					else
					if($form_name=='HDFC-Equity-SIP.pdf')
					{
					$ax1  = 27;             $ay1  = 72;
					$ex1  = 145;            $ey1  = 72;		
					}
					else
					if($form_name=='HSBC-SIP-Mandate.pdf')
					{
					$ax1  = 27;             $ay1  = 30;
					$ex1  = 125;            $ey1  = 30;		
					}
					else
					if($form_name=='EMF-Fatca.pdf')
					{
					$ax1  = 27;             $ay1  = 30;
					$ex1  = 100;            $ey1  = 30;		
					}
					else
					if($form_name=='EMF-SIP.pdf')
					{
					$ax1  = 27;             $ay1  = 30;
					$ex1  = 100;            $ey1  = 30;		
					}
					else
					if($form_name=='Sahara-Star-SIP.pdf')
					{
					$ax1  = 35;             $ay1  = 40;
					$ex1  = 144;            $ey1  = 40;		
					}
					else
					if($form_name=='Taurus-SIP.pdf')
					{
					$ax1  = 27;             $ay1  = 30;
					$ex1  = 100;            $ey1  = 30;		
					}
					else
					if($form_name=='SBIMF-SIP-equity-schemes.pdf')
					{
					$ax1  = 27;             $ay1  = 39;
					$ex1  = 150;            $ey1  = 39;		
					}
					else
					if($form_name=='NipponIndiaMF-SIP.pdf')
					{
					$ax1  = 27;             $ay1  = 28;
					$ex1  = 140;            $ey1  = 28;		
					}
					else
					if($form_name=='Motilal-oswal-SIP-Form.pdf')
					{
					$ax1  = 27;             $ay1  = 25;
					$ex1  = 175;            $ey1  = 25;		
					}
					else
					if($form_name=='Mahindra-Manulife-SIP.pdf')
					{
					$ax1  = 27;             $ay1  = 38;
					$ex1  = 100;            $ey1  = 38;		
					}
					else
					if($form_name=='LICMF-SIP-Form-of-Equity-Hybrid-&-ULIS-Schemes.pdf')
					{
					$ax1  = 27;             $ay1  = 30;
					$ex1  = 100;            $ey1  = 30;		
					}
					else
					if($form_name=='LICMF-SIP-Form-of-Debt-Schemes.pdf')
					{
					$ax1  = 27;             $ay1  = 30;
					$ex1  = 100;            $ey1  = 30;		
					}
					else
					if($form_name=='KotakMF-SIP.pdf')
					{
					$ax1  = 27;             $ay1  = 22;
					$ex1  = 180;            $ey1  = 22;		
					}
					else
					if($form_name=='Invesco-SIP.pdf')
					{
					$ax1  = 100;             $ay1  = 37;
					$ex1  = 100;            $ey1  = 45;		
					}
					else
					if($form_name=='IDFC-SIP.pdf')
					{
					$ax1  = 25;             $ay1  = 29;
					$ex1  = 125;            $ey1  = 29;		
					}
					else
					if($form_name=='IDBI-SIP-STP-SWP.pdf')
					{
					$ax1  = 27;             $ay1  = 35;
					$ex1  = 135;            $ey1  = 35;		
					}
					else
					if($form_name=='ICICI-SIP-Folio.pdf')
					{
					$ax1  = 160;             $ay1  = 153;
					$ex1  = 180;            $ey1  = 15;		
					}
		    }
			
			
		   else
		   {
		   echo"File Not Exit";
		   }
			  // iterate through all pages
			  for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
			  {
						// import a page
						$templateId = $pdf->importPage($pageNo);
						// get the size of the imported page
						$size = $pdf->getTemplateSize($templateId);
					
					
						// create a page (landscape or portrait depending on the imported page size)
						if ($size['w'] > $size['h']) {
							$pdf->AddPage('L', array($size['w'], $size['h']));
						} else {
							$pdf->AddPage('P', array($size['w'], $size['h']));
						}
					
						// use the imported page
						$pdf->useTemplate($templateId);
						
					   if($pageNo == '1')
						{
							  if(($ax1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ax1, $ay1);
							  $pdf->Write(0, $arn_no);
							  }
							  
							  if(($ex1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ex1, $ey1);
							  $pdf->Write(0, $euin_no);
							  }
						}
						
						if($pageNo==2)
						{
						
							if(($ax2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
							}
							
							if(($ex2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
							}
						}
						
						if($pageNo == '3')
						{
						   if(($ax3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
							}
						}
						
						if($pageNo == '4')
						{
						   if(($ax4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
							}
						}
					
			 }
			  
			   
			  //close the directory
			 closedir($dh);
			 
			  // Output the new PDF
			 $pdf->Output($form_name,'I');
		}
  
  
	}
	
	
	
	
	
	
	//STP form axis
  
  

  if ($dh = opendir($form_dir))
	{
		if($form_dir=='stp_form_new')
      {
		 if(file_exists($form_dir.'/'.$form_name))
		   {        
		         $pageCount = $pdf->setSourceFile($form_dir.'/'.$form_name);
		         
		         if($form_name=='SBI_MF_swp-enrollment-form.pdf')
					{
					$ax1  = 60;          $ay1  = 18;
					$ex1  = 148;          $ey1  = 18;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Shriram_MF_STP-SWP-Form.pdf')
					{
					$ax1  = 30;           $ay1  = 30;
					$ex1  = 120;          $ey1  = 30;
					}
					else
					if($form_name=='Sundaram_STP.pdf')
					{
					$ax1  = 28;           $ay1  = 35;
					$ex1  = 100;          $ey1  = 35;
					}
					else
					if($form_name=='Sundaram_SWP.pdf')
					{
					$ax1  = 95;           $ay1  = 37;
					$ex1  = 110;          $ey1  = 37;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Tata_MF_stp.pdf')
					{
					$ax1  = 30;           $ay1  = 37;
					$ex1  = 160;          $ey1  = 37;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='TataMF_flex_stp.pdf')
					{
					$ax1  = 25;           $ay1  = 35;
					$ex1  = 160;          $ey1  = 35;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='TataMF_SWP.pdf')
					{
					$ax1  = 80;           $ay1  = 25;
					$ex1  = 120;          $ey1  = 25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Taurus_STP_SWP.pdf')
					{
					$ax1  = 35;           $ay1  = 36;
					$ex1  = 110;          $ey1  = 36;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='UTI_MF_SWP.pdf')
					{
					$ax1  = 35;           $ay1  = 35;
					$ex1  = 120;          $ey1  = 35;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Whiteoak_MF_stp_swp_.pdf')
					{
					$ax1  = 20;           $ay1  = 45;
					$ex1  = 180;          $ey1  = 45;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Aditya_Birla_STP_SWP.pdf')
					{
					$ax1  = 30;           $ay1  = 65;
					$ex1  = 120;          $ey1  = 65;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Axis_MF_STP.pdf')
					{
					$ax1  = 18;           $ay1  = 33;
					$ex1  = 130;          $ey1  = 33;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='BNP_STP.pdf')
					{
					$ax1  = 25;           $ay1  = 33;
					$ex1  = 120;          $ey1  = 33;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='boi-axa_STP-large-mid-cap-equity-fund.pdf')
					{
					$ax1  = 33;           $ay1  = 42;
					$ex1  = 80;          $ey1  = 42;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='boi-axa-STP-liquid-fund-kim.pdf')
					{
					$ax1  = 33;           $ay1  = 42;
					$ex1  = 80;          $ey1  = 42;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='DSPIM_flex-stp-form.pdf')
					{
					$ax1  = 26;           $ay1  = 42;
					$ex1  = 110;          $ey1  = 42;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='DSPIM_stp-swp-dtp-registration-form.pdf')
					{
					$ax1  = 25;           $ay1  = 25;
					$ex1  = 110;          $ey1  = 25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Edelweiss_STP.pdf')
					{
					$ax1  = 35;           $ay1  = 49;
					$ex1  = 130;          $ey1  = 49;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='HDFC_Flex_STP.pdf')
					{
					$ax1  = 32;           $ay1  = 48;
					$ex1  = 150;          $ey1  = 48;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='HDFC_STP.pdf')
					{
					$ax1  = 32;           $ay1  = 44;
					$ex1  = 150;          $ey1  = 44;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='ICIC_flex-stp-form.pdf')
					{
					$ax1  = 35;           $ay1  = 42;
					$ex1  = 120;          $ey1  = 42;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='ICICI_systematic-transfer-plan-(stp)-form.pdf')
					{
					$ax1  = 30;           $ay1  = 19;
					$ex1  = 150;          $ey1  = 19;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='IDBI-SIP-STP-SWP.pdf')
					{
					$ax1  = 30;           $ay1  = 35;
					$ex1  = 140;          $ey1  = 35;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='IDFC_STP.pdf')
					{
					$ax1  = 30;           $ay1  = 42;
					$ex1  = 100;          $ey1  = 42;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='IDFC_SWP.pdf')
					{
					$ax1  = 30;           $ay1  = 35;
					$ex1  = 100;          $ey1  = 35;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Invesco_MF_STP.pdf')
					{
					$ax1  = 90;           $ay1  = 42;
					$ex1  = 90;          $ey1  = 55;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Invesco_MF_SWP.pdf')
					{
					$ax1  = 90;           $ay1  = 42;
					$ex1  = 90;          $ey1  = 55;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Kotak_FlexSTPForm.pdf')
					{
					$ax1  = 35;           $ay1  = 28;
					$ex1  = 170;          $ey1  = 28;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Kotak_STP-SWP-Form.pdf')
					{
					$ax1  = 35;           $ay1  = 28;
					$ex1  = 170;          $ey1  = 28;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='L-and-T_MF_STP.pdf')
					{
					$ax1  = 30;           $ay1  = 45;
					$ex1  = 140;          $ey1  = 45;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Mahindra_Manu_Flex-STP-Form.pdf')
					{
					$ax1  = 35;           $ay1  = 53;
					$ex1  = 100;          $ey1  = 53;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Mahindra_Manu_STP_-CASTP-Form.pdf')
					{
					$ax1  = 35;           $ay1  = 53;
					$ex1  = 100;          $ey1  = 53;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Mirae_stp-swp-form.pdf')
					{
					$ax1  = 35;           $ay1  = 42;
					$ex1  = 120;          $ey1  = 42;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Motilal_Oswal-stp-form.pdf')
					{
					$ax1  = 35;           $ay1  = 33;
					$ex1  = 180;          $ey1  = 33;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='NAVI_MF_with_PDC.pdf')
					{
					$ax1  = 35;           $ay1  = 25;
					$ex1  = 150;          $ey1  = 25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='NAVI_MF_without_PDC.pdf')
					{
					$ax1  = 35;           $ay1  = 25;
					$ex1  = 150;          $ey1  = 25;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Nippon_MF_STP_Form-of-Debt-and-Liquid-Schemes.pdf')
					{
					$ax1  = 25;           $ay1  = 30;
					$ex1  = 150;          $ey1  = 30;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='PGIM_STP_SWP.pdf')
					{
					$ax1  = 22;           $ay1  = 33;
					$ex1  = 180;          $ey1  = 33;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='PPFAS_STP_Form.pdf')
					{
					$ax1  = 25;           $ay1  = 38;
					$ex1  = 150;          $ey1  = 38;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='PPFAS_systematic-withdrawal-plan_form.pdf')
					{
					$ax1  = 35;           $ay1  = 42;
					$ex1  = 100;          $ey1  = 42;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Quant_MF_SYSTEMATIC_TRANSFER_PLAN_STP_ENROLMENT_FORM.pdf')
					{
					$ax1  = 35;           $ay1  = 49;
					$ex1  = 100;          $ey1  = 49;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='Quant_MF_SYSTEMATIC_WITHDRAWAL_PLAN_SWP_APPLICATION_FORM.pdf')
					{
					$ax1  = 35;           $ay1  = 49;
					$ex1  = 100;          $ey1  = 49;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='SBI_MF_stp-enrollment-form.pdf')
					{
					$ax1  = 35;           $ay1  = 35;
					$ex1  = 150;          $ey1  = 35;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
				
					
			       
			 //       if($form_name=='BNP-Stp-Equity.pdf')
				// 	{
				// 	$ax1  = 27;          $ay1  = 43;
				// 	$ex1  = 148;          $ey1  = 43;
				// 	$pdf->SetFont('arial');
    //                 $pdf->SetFontSize('9');	
				// 	}
				// 	else
				// 	if($form_name=='DSPIM-sip-stp.pdf')
				// 	{
				// 	$ax1  = 30;           $ay1  = 23;
				// 	$ex1  = 120;          $ey1  = 23;
				// 	}
				// 	else
				// 	if($form_name=='HDFC_Debt_STP.pdf')
				// 	{
				// 	$ax1  = 28;           $ay1  = 50;
				// 	$ex1  = 160;          $ey1  = 50;
				// 	}
				// 	else
				// 	if($form_name=='Axis-MF-STP-Debt.pdf')
				// 	{
				// 	$ax1  = 30;           $ay1  = 37;
				// 	$ex1  = 30;          $ey1  = 45;
				// 	$pdf->SetFont('arial');
    //                 $pdf->SetFontSize('9');	
				// 	}
				// 	else
				// 	if($form_name=='Axis-MF-STP-Equity.pdf')
				// 	{
				// 	$ax1  = 30;           $ay1  = 37;
				// 	$ex1  = 30;          $ey1  = 45;
				// 	$pdf->SetFont('arial');
    //                 $pdf->SetFontSize('9');	
				// 	}
				// 	else
				// 	if($form_name=='Baroda-MF-STP-SWP-Debt.pdf')
				// 	{
				// 	$ax1  = 25;           $ay1  = 45;
				// 	$ex1  = 105;          $ey1  = 45;
				// 	$pdf->SetFont('arial');
    //                 $pdf->SetFontSize('9');	
				// 	}
				// 	else
				// 	if($form_name=='BNP-STP-Debt.pdf')
				// 	{
				// 	$ax1  = 35;           $ay1  = 42;
				// 	$ex1  = 150;          $ey1  = 42;
				// 	$pdf->SetFont('arial');
    //                 $pdf->SetFontSize('9');	
				// 	}
			 }
			
			
		   else
		   {
		   echo"File Not Exit";
		   }
			  // iterate through all pages
			  for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
			  {
						// import a page
						$templateId = $pdf->importPage($pageNo);
						// get the size of the imported page
						$size = $pdf->getTemplateSize($templateId);
					
					
						// create a page (landscape or portrait depending on the imported page size)
						if ($size['w'] > $size['h']) {
							$pdf->AddPage('L', array($size['w'], $size['h']));
						} else {
							$pdf->AddPage('P', array($size['w'], $size['h']));
						}
					
						// use the imported page
						$pdf->useTemplate($templateId);
						
					   if($pageNo == '1')
						{
							  if(($ax1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ax1, $ay1);
							  $pdf->Write(0, $arn_no);
							  }
							  
							  if(($ex1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ex1, $ey1);
							  $pdf->Write(0, $euin_no);
							  }
						}
						
						if($pageNo==2)
						{
						
							if(($ax2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
							}
							
							if(($ex2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
							}
						}
						
						if($pageNo == '3')
						{
						   if(($ax3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
							}
						}
						
						if($pageNo == '4')
						{
						   if(($ax4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
							}
						}
					
			 }
			  
			   
			  //close the directory
			 closedir($dh);
			 
			  // Output the new PDF
			 $pdf->Output($form_name,'I');
		}
  
  
	}
	
	
	
	
	//swp_form_Axis
	
	 if ($dh = opendir($form_dir))
	{
		if($form_dir=='swp_form_new')
      {
		 if(file_exists($form_dir.'/'.$form_name))
		   {        
		         $pageCount = $pdf->setSourceFile($form_dir.'/'.$form_name);
			       
			        if($form_name=='ADITYA-BIRLA-MF-SWP-FORM.pdf')
					{
					$ax1  = 20;           $ay1  = 67;
					$ex1  = 120;          $ey1  = 67;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='AXIS-MF-SWP-FORM.pdf')
					{
					$ax1  = 18;           $ay1  = 32;
					$ex1  = 128;          $ey1  = 32;
					}
					else
					if($form_name=='BARODA-PIONEER-MF-SWP-FORM.pdf')
					{
					$ax1  = 50;           $ay1  = 50;
					$ex1  = 170;          $ey1  = 50;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}

					else
					if($form_name=='BNP-PARIBAS-MF-SWP-FORM.pdf')
					{
					$ax1  = 30;           $ay1  = 40;
					$ex1  = 173;          $ey1  = 40;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}

					else
					if($form_name=='BOI-MF-SWP-FORM.pdf')
					{
					$ax1  = 40;           $ay1  = 54;
					$ex1  = 85;          $ey1  = 54;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='CANARA-REBECO-MF-SWP-FORM.pdf')
					{
				/*	$ax1  = 25;           $ay1  = 40;
					$ex1  = 175;           $ey1  = 40; */
					}
					else
					if($form_name=='DSP-MF-SWP-FORM.pdf')
					{
					$ax1  = 25;           $ay1  = 23;
					$ex1  = 120;           $ey1  = 23;
					}
					
					else
					if($form_name=='EDELWEISS-MF-SWP-FORM.pdf')
					{
					$ax1  = 32;           $ay1  = 48;
					$ex1  = 135;           $ey1  = 48;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='ESCORTS-MF-SWP-FORM.pdf')
					{
					$ax1  = 14;           $ay1  = 47;
					$ex1  = 125;           $ey1  = 47;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='FRANKLIN-MF-SWP-FORM.pdf')
					{
					$ax1  = 48;           $ay1  = 29;
					$ex1  = 155;           $ey1  = 29;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='HDFC-MF-SWP-FORM.pdf')
					{
				/*	$ax1  = 32;           $ay1  = 55;
					$ex1  = 110;           $ey1  = 55;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	*/
					}
					else
					if($form_name=='ICICI-MF-SWP-FORM.pdf')
					{
				/*	$ax1  = 14;           $ay1  = 47;
					$ex1  = 135;           $ey1  = 47;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	*/
					}
					else
					if($form_name=='IDBI-MF-SWP-FORM.pdf')
					{
					$ax1  = 40;           $ay1  = 57;
					$ex1  = 132;           $ey1  = 57;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					else
					if($form_name=='IDFC-MF-SWP-FORM.pdf')
					{
					$ax1  = 30;           $ay1  = 38;
					$ex1  = 150;           $ey1  = 38;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');	
					}
					
					else
					if($form_name=='INDIABULLS-MF-SWP-FORM.pdf')
					{
					/*$ax1  = 30;           $ay1  = 38;
					$ex1  = 153;          $ey1  = 38;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');*/
					}

					else
					if($form_name=='INVESCO-MF-SWP-FORM.pdf')
					{
					$ax1  = 80;           $ay1  = 47;
					$ex1  = 80;          $ey1  = 60;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					
                    else
					if($form_name=='JM-MF-SWP-FORM.pdf')
					{
					$ax1  = 23;           $ay1  = 45;
					$ex1  = 115;          $ey1  = 45;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}

					else
					if($form_name=='KOTAK-MF-SWP-FORM.pdf')
					{
					$ax1  = 30;           $ay1  = 30;
					$ex1  = 180;           $ey1  = 30;
				    $pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					else
					if($form_name=='LIC-MF-SWP-FORM.pdf')
					{
					$ax1  = 22;           $ay1  = 23;
					$ex1  = 140;           $ey1  = 23;
				    $pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					else
					if($form_name=='LNT-MF-STP-SWP.pdf')
					{
					$ax1  = 20;            $ay1  = 55;
					$ex1  = 70;           $ey1  = 55;
				    $pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}			
					else
					if($form_name=='MAHINDRA-MF-SWP-FORM.pdf')
					{
					$ax1  = 33;           $ay1  = 60;
					$ex1  = 95;           $ey1  = 60;
				    $pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					else
					if($form_name=='MIRAE-MF-SWP-FORM.pdf')
					{
					$ax1  = 20;           $ay1  = 35;
					$ex1  = 125;           $ey1  = 35;
					}

					else
					if($form_name=='MOTILAL-MF-SWP-FORM.pdf')
					{
					$ax1  = 25;           $ay1  = 36;
					$ex1  = 170;           $ey1  = 36;
					}

					else
					if($form_name=='NIPPON-INDIA-MF-SWP-FORM.pdf')
					{
					$ax1  = 25;           $ay1  = 33;
					$ex1  = 90;          $ey1  = 33;
				    $pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
					}
					else
					if($form_name=='PEERLESS-MF-SWP-FORM.pdf')
					{
				/*	$ax1  = 33;           $ay1  = 48;
					$ex1  = 115;          $ey1  = 48; */
				    }
					else
					if($form_name=='PGIM-MF-SWP-FORM.pdf')
					{
					$ax1  = 25;           $ay1  = 33;
					$ex1  = 180;          $ey1  = 33;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
				    }
					else
					if($form_name=='PPFAS-MF-SWP-FORM.pdf')
				    {
					$ax1  = 20;           $ay1  = 40;
					$ex1  = 90;           $ey1  = 40;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9'); 
				    }
					else
					if($form_name=='PRINCIPAL-MF-SWP-FORM.pdf')
					{
					$ax1  = 20;           $ay1  = 45;
					$ex1  = 80;           $ey1  = 45;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('12');
				    }
					else
					if($form_name=='QUANTUM-MF-SWP-FORM.pdf')
					{
					$ax1  = 25;           $ay1  = 45;
					$ex1  = 90;          $ey1  = 45;
					}
					else
					if($form_name=='SBI-MF-SWP-FORM.pdf')
					{
				/*	$ax1  = 45;            $ay1  = 40;
					$ex1  = 152;           $ey1  = 40; */
					}
					else
					if($form_name=='SUNDARAM-MF-SWP-FORM.pdf')
					{
					$ax1  = 95;            $ay1  = 35;
				//	$ex1  = 90;            $ey1  = 45;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');
					}
					else
					if($form_name=='TATA-MF-SWP-FORM.pdf')
					{
					/*$ax1  = 30;            $ay1  = 45;
					$ex1  = 95;            $ey1  = 32;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('9');*/
					}
					else
					if($form_name=='TAURUS-MF-SWP-FORM.pdf')
					{
					$ax1  = 27;            $ay1  = 50;
					//$ex1  = 125;            $ey1  = 50;
				}
					else
					if($form_name=='UNION-MF-SWP-FORM.pdf')
					{
					/*$ax1  = 80;            $ay1  = 170;
					$ex1  = 430;           $ey1  = 185;
					$pdf->SetFont('arial');
                    $pdf->SetFontSize('30');*/
					}
					
					else
					if($form_name=='UTI-MF-SWP-FORM.pdf')
					{
					/*$ax1  = 40;            $ay1  = 36;
					$ex1  = 145;            $ey1  = 36;*/
					}
	
					
		    }
			
			
		   else
		   {
		   echo"File Not Exit";
		   }
			  // iterate through all pages
			  for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
			  {
						// import a page
						$templateId = $pdf->importPage($pageNo);
						// get the size of the imported page
						$size = $pdf->getTemplateSize($templateId);
					
					
						// create a page (landscape or portrait depending on the imported page size)
						if ($size['w'] > $size['h']) {
							$pdf->AddPage('L', array($size['w'], $size['h']));
						} else {
							$pdf->AddPage('P', array($size['w'], $size['h']));
						}
					
						// use the imported page
						$pdf->useTemplate($templateId);
						
					   if($pageNo == '1')
						{
							  if(($ax1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ax1, $ay1);
							  $pdf->Write(0, $arn_no);
							  }
							  
							  if(($ex1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ex1, $ey1);
							  $pdf->Write(0, $euin_no);
							  }
						}
						
						if($pageNo==2)
						{
						
							if(($ax2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
							}
							
							if(($ex2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
							}
						}
						
						if($pageNo == '3')
						{
						   if(($ax3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
							}
						}
						
						if($pageNo == '4')
						{
						   if(($ax4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
							}
						}
					
			 }
			  
			   
			  //close the directory
			 closedir($dh);
			 
			  // Output the new PDF
			 $pdf->Output($form_name,'I');
		}
  
  
	}
	
	// swp form end
	
	
	
	
	
	//other form start
	
	 if ($dh = opendir($form_dir))
	{
		if($form_dir=='other')
      {
		 if(file_exists($form_dir.'/'.$form_name))
		   {        
		         $pageCount = $pdf->setSourceFile($form_dir.'/'.$form_name);


						
					if($form_name=='ANNEXURE-KYC-INDIVIDUAL.pdf')
					{
					/* 	$ax1  = 75;           $ay1  = 29;
						$ex1  = 140;          $ey1  = 29; */
					}
					else
					if($form_name=='BANK-ACCOUNTS-REGISTRATION-FORM.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
                    else
					if($form_name=='BANKER-ATTESTATION-FORMAT.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					if($form_name=='BANK-MANDATE-DETAILS-WITH-ATTESTATION-FROM-BANK.pdf')
					{
					 //$ax1  = 125;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					else
					if($form_name=='BANK-UPDATION-FORM.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}if($form_name=='CHANGE-OF-BROKER-COMMON.pdf')
					{
					 //$ax1  = 125;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					else
					if($form_name=='CKYC-APPLICATION-FORM.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					
					else
					if($form_name=='CKYC-APPLICATION-FORM-FOR-INDIVIDUAL.pdf')
					{
					 //$ax1  = 125;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
				
					else
					if($form_name=='COMMON-TRANSACTION-FORM.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}if($form_name=='COMMON-UPDATION-EMAIL.pdf')
					{
					 //$ax1  = 125;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					else
					if($form_name=='COMMON-UPDATION-NOMINEE.pdf')
					{
					$ax1  = 55;           $ay1  = 26;
					$ex1  = 180;          $ey1  = 26;
					}if($form_name=='COMMON-UPDATION-PAN.pdf')
					{
					 //$ax1  = 125;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					else
					if($form_name=='FATCA-CRS-DECLARATION-FORM-INDIVIDUAL.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}if($form_name=='FORM-FOR-CANCELLATION-OF-SIP _ SWP _ STP.pdf')
					{
					// $ax1  = 125;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					else
					if($form_name=='KARVY-COMMON-TRANSACTION-FORM.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}	
				
			        
			        if($form_name=='KNOW-YOUR-CLIENT-KYC-APPLICATION-FORM-FOR-NON-INDIVIDUALS-ONLY.pdf')
					{
					 //$ax1  = 125;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					else
					if($form_name=='MINOR-ATTAINING-MAJORITY-REQUEST-FORM-TO-CHANGE-STATUS.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					else
					if($form_name=='NOMINEE-REGISTRATION-CANCELLATION-FORM.pdf')
					{
					//$ax1  = 55;           $ay1  = 26;
					//$ex1  = 180;          $ey1  = 26;
					}
					else
					if($form_name=='OPT-IN-FORM.pdf')
					{
					//$ax1  = 20;           $ay1  = 35;
					//$ex1  = 90;          $ey1  = 35;
					}
					else
					if($form_name=='REVISED-CANCELLATION-OF-SIP-STP-SWP.pdf')
					{
					//$ax1  = 185;           $ay1  = 24;
					//$ex1  = 181;           $ey1  = 30;
					}		
				
										
		   }
			else
		   {
		   echo"File Not Exist";
		   ?>
		   <script>
		       window.location.href = "https://redvisiontech.com";
		   </script>
		   <?php
		  // header("location: https://www.redvisiontech.com");
		  // header('Location: https://www.redvisiontech.com');
		  // exit;
		   }
			  // iterate through all pages
			  for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
			  {
						// import a page
						$templateId = $pdf->importPage($pageNo);
						// get the size of the imported page
						$size = $pdf->getTemplateSize($templateId);
					
					
						// create a page (landscape or portrait depending on the imported page size)
						if ($size['w'] > $size['h']) {
							$pdf->AddPage('L', array($size['w'], $size['h']));
						} else {
							$pdf->AddPage('P', array($size['w'], $size['h']));
						}
					
						// use the imported page
						$pdf->useTemplate($templateId);
						
					   if($pageNo == '1')
						{
							  if(($ax1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ax1, $ay1);
							  $pdf->Write(0, $arn_no);
							  }
							  
							  if(($ex1!=0)&&($ay1!=0))
							  {
							  $pdf->SetXY($ex1, $ey1);
							  $pdf->Write(0, $euin_no);
							  }
						}
						
						if($pageNo==2)
						{
						
							if(($ax2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
							}
							
							if(($ex2!=0)&&($ay2!=0))
							{
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
							}
						}
						
						if($pageNo == '3')
						{
						   if(($ax3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex3!=0)&&($ay3!=0))
							{
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
							}
						}
						
						if($pageNo == '4')
						{
						   if(($ax4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex4!=0)&&($ay4!=0))
							{
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
							}
						}

						if($pageNo == '16')
						{
						   if(($ax16!=0)&&($ay16!=0))
							{
							$pdf->SetXY($ax16, $ay16);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex16!=0)&&($ay16!=0))
							{
							$pdf->SetXY($ex16, $ey16);
							$pdf->Write(0, $euin_no);
							}
						}

						if($pageNo == '18')
						{
						   if(($ax18!=0)&&($ay18!=0))
							{
							$pdf->SetXY($ax18, $ay18);
							$pdf->Write(0, $arn_no);
							}
							
							if(($ex18!=0)&&($ay18!=0))
							{
							$pdf->SetXY($ex18, $ey18);
							$pdf->Write(0, $euin_no);
							}
						}
					
			 }
			  
			   
			  //close the directory
			 closedir($dh);
			 
			  // Output the new PDF
			 $pdf->Output($form_name,'I');
		}
  
  
	}
	
	// other form end
	
	
	
	
	
	
  	
  }
  else
  {
  echo "form Not Avaliable";
  }

 } 
?>