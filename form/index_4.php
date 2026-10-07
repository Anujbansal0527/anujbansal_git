<?php
ini_set("session.auto_start", 0); {
	require_once('fpdf/fpdf.php');
	require_once('fpdi/fpdi.php');
	$form_dir 	    =	$_GET['dn'];
	$form_name	   =	$_GET['form_name'];
	$arn_no          =	$_GET['arn_no'];
	$euin_no	     =	$_GET['euin_no'];
	//  $arn1	     =	$_GET['arn1'];


	// initiate FPDI
	$pdf = new FPDI();


	$ax1 = 0;
	$ay1 = 0;
	$ex1 = 0;
	$ey1 = 0;
	$ex11 = 0;
	$ey11 = 0;

	$ax2 = 0;
	$ay2 = 0;
	$ex2 = 0;
	$ey2 = 0;


	$ax3 = 0;
	$ay3 = 0;
	$ex3 = 0;
	$ey3 = 0;

	$ax4 = 0;
	$ay4 = 0;
	$ex4 = 0;
	$ey4 = 0;

	$ax5 = 0;
	$ay5 = 0;
	$ex5 = 0;
	$ey5 = 0;


	$ax16 = 0;
	$ay16 = 0;
	$ex16 = 0;
	$ey16 = 0;


	$pdf->SetFont('Helvetica');
	$pdf->SetFontSize('10');

	if (is_dir($form_dir)) {
		if ($form_dir == 'mf') {

			if ($dh = opendir($form_dir)) {

				if (file_exists($form_dir . '/' . $form_name)) {
					$pageCount = $pdf->setSourceFile($form_dir . '/' . $form_name);

					if ($form_name == '360-ONE MF Common Application Form.pdf') {
						$ax1  =  22;
						$ay1  = 35;
						$ex1  = 100;
						$ey1  = 35;
						// 	$ex11  = 43;         $ey11  = 25;
						$pdf->SetFont('arial');
						// $pdf->SetFontSize('30');
					} else
					if ($form_name == 'Aditya Birla MF Common-Application-Form.pdf') {
						$ax1  =  22;
						$ay1  = 68;
						$ex1  = 140;
						$ey1  = 68;
						// 	$ex11  = 43;         $ey11  = 25;
						$pdf->SetFont('arial');
						// $pdf->SetFontSize('30');
					} else
					if ($form_name == 'AXIS MF Common Application FORM.pdf') {
						$ax1  = 10;
						$ay1  = 54;
						$ex1  = 85;
						$ey1  = 54;
						// 	$ex11  = 130;         $ey11  = 25;
					} else
					if ($form_name == 'Bajaj MF Common Application Form.pdf') {
						$ax1  = 28;
						$ay1  = 45;
						$ex1  = 150;
						$ey1  = 45;
						// 	$ex11  = 130;         $ey11  = 25;
					} else
					if ($form_name == 'Bandhan MF Common Application Form.pdf') {
						$ax1  = 26;
						$ay1  = 27;
						$ex1  = 128;
						$ey1  = 27;
						// 	$ex11  = 130;         $ey11  = 25;
					} else
					if ($form_name == 'Baroda BNP Common Application Form.pdf') {
						$ax1  = 38;
						$ay1  = 63;
						$ex1  = 125;
						$ey1  = 63;
						// 	$ex11  = 110;         $ey11  = 37;
					} else	
					if ($form_name == 'Canara Robeco MF Common Application Form.pdf') {
						$ax1  = 25;
						$ay1  = 45;
						$ex1  = 130;
						$ey1  = 45;
						// 	$ex11  = 80;         $ey11  = 110;
					} else	
					if ($form_name == 'DSP MF Common Application Form.pdf') {
						$ax1  = 25;
						$ay1  = 25;
						$ex1  = 120;
						$ey1  = 25;
						// 	$ex11  = 140;         $ey11  = 62;
					} else	
					if ($form_name == 'Edelweiss MF Common Application Form.pdf') {
						$ax1  = 30;
						$ay1  = 44;
						$ex1  = 132;
						$ey1  = 45;
						// 	$ex11  = 142;          $ey11  = 44;
					} else	
					if ($form_name == 'Franklin-Templeton-Common-Application-Form.pdf') {
						$ax1  = 20;
						$ay1  = 20;
						$ex1  = 132;
						$ey1  = 20;
						// 	$ex11  = 142;          $ey11  = 25;
					} else
					if ($form_name == 'HDFC MF Common Form For Equity Fund .pdf') {
						$ax1  = 32;
						$ay1  = 43;
						$ex1  = 139;
						$ey1  = 43;
						// 	$ex11  = 97;          $ey11  = 25;
					} else
					if ($form_name == 'HSBC MF Common Application Form For Debt.pdf') {
						$ax1  = 22;
						$ay1  = 36;
						$ex1  = 108;
						$ey1  = 33;
						// 	$ex11  = 108;          $ey11  = 25;
					} else
					if ($form_name == 'HSBC MF Common Application Form For Equity.pdf') {
						$ax1  = 30;
						$ay1  = 40;
						$ex1  = 127;
						$ey1  = 40;
						// 	$ex11  = 180;          $ey11  = 25;
					} else
					if ($form_name == 'ICICI MF Common Application Form.pdf') {
						$ax1  = 22;
						$ay1  = 29;
						$ex1  = 180;
						$ey1  = 29;
						// 	$ex11  = 123;          $ey11  = 25;
					} else
					if ($form_name == 'Indiabulls Common Application Form.pdf') {
						$ax1  = 27;
						$ay1  = 27;
						$ex1  = 138;
						$ey1  = 27;
						// 	$ex11  = 108;           $ey11  = 25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Invesco MF Common Application Form.pdf') {
						$ax1  = 33;
						$ay1  =  48;
						$ex1  = 120;
						$ey1  =  48;
						// 	$ex11  = 120;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('12');
					} else
					if ($form_name == 'ITI MF Common Application Form.pdf') {
						$ax1  = 43;
						$ay1  =  43;
						$ex1  = 153;
						$ey1  =  43;
						// 	$ex11  = 80;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'JM Common Application Form.pdf') {
						$ax1  = 25;
						$ay1  =  37;
						$ex1  = 100;
						$ey1  =  37;
						// 	$ex11  = 125;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('12');
					} else
					if ($form_name == 'KOTAK MF COMMON APPLICATION FORM.pdf') {
						$ax1  = 25;
						$ay1  =  27;
						$ex1  = 165;
						$ey1  =  27;
						// 	$ex11  = 125;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('12');
					} else
					if ($form_name == 'LIC Common Application Form.pdf') {
						$ax1  = 25;
						$ay1  =  40;
						$ex1  = 155;
						$ey1  =  40;
						// 	$ex11  = 125;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('12');
					} else
					if ($form_name == 'Mahindra MF Common Application Form.pdf') {
						$ax1  = 25;
						$ay1  =  50;
						$ex1  = 145;
						$ey1  =  50;
						// 	$ex11  = 135;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'MIRAE MF COMMON APPLICATION FORM.pdf') {
						$ax1  = 20;
						$ay1  =  40;
						$ex1  = 120;
						$ey1  =  40;
						// 	$ex11  = 135;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'MOTILAL OSWAL MF COMMON APPLICATION FORM.pdf') {
						$ax1  = 27;
						$ay1  =  15;
						$ex1  = 180;
						$ey1  =  15;
						// 	$ex11  = 135;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('12');
					} else
					if ($form_name == 'NAVI MF COMMON APPLICATION FORM.pdf') {
						$ax1  = 20;
						$ay1  =  34;
						$ex1  = 32;
						$ey1  =  34;
						// 	$ex11  = 125;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'NIPPON Common Application Form.pdf') {
						$ax1  = 27;
						$ay1  =  27;
						$ex1  = 145;
						$ey1  =  27;
						// 	$ex11  = 125;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'NJ MF Common Application Form.pdf') {
						$ax1  = 27;
						$ay1  =  31;
						$ex1  = 155;
						$ey1  =  31;
						// 	$ex11  = 155;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'PGIM India Common Application Form.pdf') {
						$ax1  = 27;
						$ay1  =  42;
						$ex1  = 122;
						$ey1  =  42;
						// 	$ex11  = 152;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('12');
					} else
					if ($form_name == 'PPFAS MF COMMON APPLICATION FORM.pdf') {
						$ax1  = 27;
						$ay1  =  50;
						$ex1  = 120;
						$ey1  =  50;
						// 	$ex11  = 140;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('8');
					} else
					if ($form_name == 'Quant MF Common Application Form.pdf') {
						$ax1  = 27;
						$ay1  =  46;
						$ex1  = 115;
						$ey1  =  46;
						// 	$ex11  = 125;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('12');
					} else
					if ($form_name == 'Quantum MF Common Form.pdf') {
						$ax1  = 19;
						$ay1  =  41;
						$ex1  = 126;
						$ey1  =  41;
						// 	$ex11  = 120;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'SAMCO MF COMMON APPLICATION FORM.pdf') {
						$ax1  = 30;
						$ay1  =  33;
						$ex1  = 129;
						$ey1  =  33;
						// 	$ex11  = 125;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'SBI MF Common Application Form For Debt Fund.pdf') {
						$ax1  = 25;
						$ay1  =  25;
						$ex1  = 140;
						$ey1  =  25;
						// 	$ex11  = 110;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'SBI MF Common Application Form For Equity Fund.pdf') {
						$ax1  = 25;
						$ay1  =  25;
						$ex1  = 150;
						$ey1  =  25;
						// 	$ex11  = 170;          $ey11  =  25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'SHRIRAM MF COMMON APPLICATION FORM.pdf') {
						$ax1  = 21;
						$ay1  = 60;
						$ex1  = 140;
						$ey1  = 60;
						// 	$ex11  = 120;           $ey11  = 25;
					} else
					if ($form_name == 'Sundaram MF Common Application Form.pdf') {
						$ax1  = 23;
						$ay1  = 40;
						$ex1  = 90;
						$ey1  = 40;
						// 	$ex11  = 130;           $ey11  = 25;
					} else
					if ($form_name == 'Tata MF Common Application Form.pdf') {
						$ax1  = 21;
						$ay1  = 43;
						$ex1  = 165;
						$ey1  = 43;
						// 	$ex11  = 105;             $ey11  = 25;
					} else
					if ($form_name == 'Taurus MF Common Application Form.pdf') {
						$ax1  = 20;
						$ay1  = 44;
						$ex1  = 149;
						$ey1  = 44;
						// 	$ex11  = 118;             $ey11  = 25;
					} else
					if ($form_name == 'TRUST MF  Common Application Form.pdf') {
						$ax1  = 26;
						$ay1  = 43;
						$ex1  = 153;
						$ey1  = 43;
						// 	$ex11  = 175;             $ey11  = 25;
					} else
					if ($form_name == 'Union MF Common Application Form.pdf') {
						$ax1  = 30;
						$ay1  = 31;
						$ex1  = 120;
						$ey1  = 31;
						// 	$ex11  = 130;             $ey11  = 30;
					} else
					if ($form_name == 'UTI MF Common Application Form.pdf') {
						$ax1  = 20;
						$ay1  = 50;
						$ex1  = 130;
						$ey1  = 50;
						// 	$ex11  = 130;             $ey11  = 25;
					} else
					if ($form_name == 'WhiteOak Common Application Form.pdf') {
						$ax1  = 18;
						$ay1  = 49;
						$ex1  = 115;
						$ey1  = 49;
						// 	$ex11  = 180;             $ey11  = 25;
					}
				} else {
					echo "File Not Exit";
				}
				// iterate through all pages
				for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
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

					if ($pageNo == '1') {
						if (($ax1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ax1, $ay1);
							$pdf->Write(0, $arn_no);
						}

						if (($ex1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ex1, $ey1);
							$pdf->Write(0, $euin_no);
						}

						// if(($ex11!=0)&&($ey1!=0))
						// {
						// $pdf->SetXY($ex11, $ey11);
						// $pdf->Write(0, $arn1);
						// }
					}

					if ($pageNo == 2) {

						if (($ax2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
						}

						if (($ex2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
						}
					}

					if ($pageNo == '3') {
						if (($ax3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
						}

						if (($ex3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '4') {
						if (($ax4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
						}

						if (($ex4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
						}
					}
				}


				//close the directory
				closedir($dh);

				// Output the new PDF
				$pdf->Output($form_name, 'I');
			}
		}




		//sip form axis



		if ($dh = opendir($form_dir)) {
			if ($form_dir == 'sip_form_new') {
				if (file_exists($form_dir . '/' . $form_name)) {
					$pageCount = $pdf->setSourceFile($form_dir . '/' . $form_name);

					if ($form_name == '360-ONE MF SIP FORM.pdf') {

						$ax1  = 30;
						$ay1  = 32;
						$ex1  = 100;
						$ey1  = 32;
					} else
					if ($form_name == 'Aditya Birla MF SIP Form.pdf') {
						$ax1  = 29;
						$ay1  = 63;
						$ex1  = 170;
						$ey1  = 63;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Axis MF SIP Form.pdf') {
						$ax1  = 30;
						$ay1  = 47;
						$ex1  = 30;
						$ey1  = 55;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Bajaj MF SIP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 35;
						$ex1  = 145;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Bandhan MF SIP Form.pdf') {
						$ax1  = 25;
						$ay1  = 27;
						$ex1  = 120;
						$ey1  = 27;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Bank of india MF SIP.pdf') {
						$ax1  = 30;
						$ay1  = 48;
						$ex1  = 80;
						$ey1  = 48;
					} else
					if ($form_name == 'Baroda BNP Paribas SIP Form.pdf') {
						$ax1  = 30;
						$ay1  = 30;
						$ex1  = 115;
						$ey1  = 30;
					} else
					if ($form_name == 'Canara Robeco SIP Form.pdf') {
						$ax1  = 28;
						$ay1  = 30;
						$ex1  = 120;
						$ey1  = 30;
					} else
					if ($form_name == 'DSP MF SIP Form.pdf') {
						$ax1  = 28;
						$ay1  = 30;
						$ex1  = 118;
						$ey1  = 30;
					} else
					if ($form_name == 'Edelweiss MF SIP FORM.pdf') {
						$ax1  = 22;
						$ay1  = 42;
						$ex1  = 140;
						$ey1  = 42;
					} else
					if ($form_name == 'Franklin MF SIP Form.pdf') {
						$ax1  = 28;
						$ay1  = 20;
						$ex1  = 140;
						$ey1  = 20;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('8');
					} else
					if ($form_name == 'HDFC MF SIP Form.pdf') {
						$ax1  = 30;
						$ay1  = 63;
						$ex1  = 150;
						$ey1  = 63;

						$pdf->SetFont('arial');
						$pdf->SetFontSize('8');
					} else
					if ($form_name == 'HSBC MF SIP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 37;
						$ex1  = 115;
						$ey1  = 37;
					} else
					if ($form_name == 'ICICI MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 28;
						$ex1  = 160;
						$ey1  = 28;
					} else
					if ($form_name == 'Invesco MF SIP Form.pdf') {
						$ax1  = 32;
						$ay1  = 29;
						$ex1  = 111;
						$ey1  = 29;
					} else
					if ($form_name == 'ITI MF SIP FORM.pdf') {
						$ax1  = 28;
						$ay1  = 50;
						$ex1  = 117;
						$ey1  = 50;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'JM MF SIP FORM.pdf') {
						$ax1  = 30;
						$ay1  = 50;
						$ex1  = 105;
						$ey1  = 50;
					} else
					if ($form_name == 'KOTAK MF SIP Form.pdf') {
						$ax1  = 25;
						$ay1  = 23;
						$ex1  = 180;
						$ey1  = 23;

						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'LIC SIP Form.pdf') {
						$ax1  = 22;
						$ay1  = 50;
						$ex1  = 145;
						$ey1  = 50;
					} else
					if ($form_name == 'Mahindra SIP Form.pdf') {
						$ax1  = 25;
						$ay1  = 40;
						$ex1  = 145;
						$ey1  = 40;
					} else
					if ($form_name == 'MIRAE MF SIP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 35;
						$ex1  = 120;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Motilal MF SIP Form.pdf') {
						$ax1  = 24;
						$ay1  = 25;
						$ex1  = 180;
						$ey1  = 25;
					} else
					if ($form_name == 'NAVI MF SIP Form.pdf') {
						$ax1  = 30;
						$ay1  = 35;
						$ex1  = 80;
						$ey1  = 35;
					} else
					if ($form_name == 'Nippon MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 33;
						$ex1  = 140;
						$ey1  = 30;
					} else
					if ($form_name == 'NJ MF SIP Form.pdf') {
						$ax1  = 21;
						$ay1  = 33;
						$ex1  = 150;
						$ey1  = 33;
					} else
					if ($form_name == 'PGIM MF SIP Form.pdf') {
						$ax1  = 20;
						$ay1  = 37;
						$ex1  = 180;
						$ey1  = 37;
					} else
					if ($form_name == 'PPFAS MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 45;
						$ex1  = 120;
						$ey1  = 45;
					} else
					if ($form_name == 'Quant MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 38;
						$ex1  = 100;
						$ey1  = 38;
					} else
					if ($form_name == 'Quantum SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 141;
						$ex1  = 120;
						$ey1  = 141;
					} else
					if ($form_name == 'SAMCO MF SIP FORM.pdf') {
						$ax1  = 24;
						$ay1  = 30;
						$ex1  = 130;
						$ey1  = 30;
					} else
					if ($form_name == 'SBI MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 33;
						$ex1  = 150;
						$ey1  = 33;
					} else
					if ($form_name == 'Sundaram MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 30;
						$ex1  = 130;
						$ey1  = 30;
					} else
					if ($form_name == 'TATA MF SIP FORM.pdf') {
						$ax1  = 128;
						$ay1  = 53;
						$ex1  = 168;
						$ey1  = 53;
					}
					// 	else
					// 	if($form_name=='TATA MF SIP FORM.pdf')
					// 	{
					// 	$ax1  = 27;             $ay1  = 72;
					// 	$ex1  = 145;            $ey1  = 72;		
					// 	}
					else
					if ($form_name == 'Taurus MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 30;
						$ex1  = 105;
						$ey1  = 30;
					} else
					if ($form_name == 'TRUST MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 46;
						$ex1  = 110;
						$ey1  = 46;
					} else
					if ($form_name == 'Union MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 117;
						$ex1  = 120;
						$ey1  = 117;
					} else
					if ($form_name == 'WhiteOak MF SIP Form.pdf') {
						$ax1  = 27;
						$ay1  = 30;
						$ex1  = 120;
						$ey1  = 30;
					}
				} else {
					echo "File Not Exit";
				}
				// iterate through all pages
				for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
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

					if ($pageNo == '1') {
						if (($ax1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ax1, $ay1);
							$pdf->Write(0, $arn_no);
						}

						if (($ex1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ex1, $ey1);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == 2) {

						if (($ax2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
						}

						if (($ex2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
						}
					}

					if ($pageNo == '3') {
						if (($ax3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
						}

						if (($ex3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '4') {
						if (($ax4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
						}

						if (($ex4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
						}
					}
				}


				//close the directory
				closedir($dh);

				// Output the new PDF
				$pdf->Output($form_name, 'I');
			}
		}






		//STP form axis



		if ($dh = opendir($form_dir)) {
			if ($form_dir == 'stp_form_new') {
				if (file_exists($form_dir . '/' . $form_name)) {
					$pageCount = $pdf->setSourceFile($form_dir . '/' . $form_name);

					if ($form_name == '360 One MF STP Form.pdf') {
						$ax1  = 30;
						$ay1  = 35;
						$ex1  = 108;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Aditya Birla STP Form.pdf') {
						$ax1  = 30;
						$ay1  = 65;
						$ex1  = 120;
						$ey1  = 65;
					} else
					if ($form_name == 'Axis MF STP Form.pdf') {
						$ax1  = 15;
						$ay1  = 33;
						$ex1  = 130;
						$ey1  = 33;
					} else
					if ($form_name == 'Bajaj MF STP Form.pdf') {
						$ax1  = 30;
						$ay1  = 53;
						$ex1  = 158;
						$ey1  = 53;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Bandhan MF STP Form.pdf') {
						$ax1  = 30;
						$ay1  = 38;
						$ex1  = 90;
						$ey1  = 38;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Baroda BNP_STP_Form.pdf') {
						$ax1  = 25;
						$ay1  = 35;
						$ex1  = 120;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'BOI MF STP Form.pdf') {
						$ax1  = 80;
						$ay1  = 25;
						$ex1  = 120;
						$ey1  = 25;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Canara Robeco MF STP Form.pdf') {
						$ax1  = 35;
						$ay1  = 36;
						$ex1  = 110;
						$ey1  = 36;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'DSP MF STP Form.pdf') {
						$ax1  = 35;
						$ay1  = 23;
						$ex1  = 120;
						$ey1  = 23;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Edelweiss MF STP form.pdf') {
						$ax1  = 24;
						$ay1  = 47;
						$ex1  = 180;
						$ey1  = 47;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'HDFC MF STP Form .pdf') {
						$ax1  = 30;
						$ay1  = 45;
						$ex1  = 160;
						$ey1  = 45;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'HSBC MF STP Form.pdf') {
						$ax1  = 18;
						$ay1  = 43;
						$ex1  = 138;
						$ey1  = 43;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'ICICI MF STP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 20;
						$ex1  = 100;
						$ey1  = 20;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Invesco MF STP Form.pdf') {
						$ax1  = 90;
						$ay1  = 37;
						$ex1  = 98;
						$ey1  = 45;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'ITI MF STP FORM.pdf') {
						$ax1  = 28;
						$ay1  = 54;
						$ex1  = 110;
						$ey1  = 54;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Kotak MF STP Form.pdf') {
						$ax1  = 26;
						$ay1  = 21;
						$ex1  = 170;
						$ey1  = 21;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'LIC STP Form.pdf') {
						$ax1  = 25;
						$ay1  = 40;
						$ex1  = 150;
						$ey1  = 40;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					}
					// 	else
					// 	if($form_name=='LIC STP Form.pdf')
					// 	{
					// 	$ax1  = 35;           $ay1  = 49;
					// 	$ex1  = 130;          $ey1  = 49;
					// 	$pdf->SetFont('arial');
					//                 $pdf->SetFontSize('9');	
					// 	}
					// 	else
					// 	if($form_name=='LIC STP Form.pdf')
					// 	{
					// 	$ax1  = 32;           $ay1  = 48;
					// 	$ex1  = 150;          $ey1  = 48;
					// 	$pdf->SetFont('arial');
					//                 $pdf->SetFontSize('9');	
					// 	}
					else
					if ($form_name == 'Mahindra MF STP Form.pdf') {
						$ax1  = 32;
						$ay1  = 52;
						$ex1  = 90;
						$ey1  = 52;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Mirae Asset MF STP Form.pdf') {
						$ax1  = 35;
						$ay1  = 42;
						$ex1  = 120;
						$ey1  = 42;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Motilal oswal MF STP Form.pdf') {
						$ax1  = 27;
						$ay1  = 35;
						$ex1  = 180;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'NAVI MF STP FORM.pdf') {
						$ax1  = 30;
						$ay1  = 35;
						$ex1  = 100;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Nippon India MF STP Form.pdf') {
						$ax1  = 27;
						$ay1  = 28;
						$ex1  = 140;
						$ey1  = 28;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'NJ MF STP Form.pdf') {
						$ax1  = 30;
						$ay1  = 33;
						$ex1  = 140;
						$ey1  = 33;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'PPFAS MF STP Form.pdf') {
						$ax1  = 25;
						$ay1  = 38;
						$ex1  = 150;
						$ey1  = 38;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Quant MF STP Form.pdf') {
						$ax1  = 30;
						$ay1  = 48;
						$ex1  = 105;
						$ey1  = 50;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Quantum STP Form.pdf') {
						$ax1  = 35;
						$ay1  = 45;
						$ex1  = 120;
						$ey1  = 45;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'SAMCO MF STP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 38;
						$ex1  = 145;
						$ey1  = 38;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'SBI MF STP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 37;
						$ex1  = 160;
						$ey1  = 37;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Shriram MF STP Form.pdf') {
						$ax1  = 35;
						$ay1  = 33;
						$ex1  = 170;
						$ey1  = 33;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'TATA MF STP FORM.pdf') {
						$ax1  = 35;
						$ay1  = 35;
						$ex1  = 160;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Taurus MF STP Form.pdf') {
						$ax1  = 35;
						$ay1  = 42;
						$ex1  = 95;
						$ey1  = 42;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Union MF STP Form.pdf') {
						$ax1  = 25;
						$ay1  = 38;
						$ex1  = 120;
						$ey1  = 38;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'WhiteOak MF STP Form.pdf') {
						$ax1  = 18;
						$ay1  = 50;
						$ex1  = 184;
						$ey1  = 50;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					}
				} else {
					echo "File Not Exit";
				}
				// iterate through all pages
				for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
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

					if ($pageNo == '1') {
						if (($ax1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ax1, $ay1);
							$pdf->Write(0, $arn_no);
						}

						if (($ex1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ex1, $ey1);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == 2) {

						if (($ax2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
						}

						if (($ex2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
						}
					}

					if ($pageNo == '3') {
						if (($ax3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
						}

						if (($ex3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '4') {
						if (($ax4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
						}

						if (($ex4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
						}
					}
				}


				//close the directory
				closedir($dh);

				// Output the new PDF
				$pdf->Output($form_name, 'I');
			}
		}




		//swp_form_Axis

		if ($dh = opendir($form_dir)) {
			if ($form_dir == 'swp_form_new') {
				if (file_exists($form_dir . '/' . $form_name)) {
					$pageCount = $pdf->setSourceFile($form_dir . '/' . $form_name);

					if ($form_name == '360ONE MF SWP Form.pdf') {
						$ax1  = 20;
						$ay1  = 40;
						$ex1  = 100;
						$ey1  = 40;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Aditya Birla SWP Form.pdf') {
						$ax1  = 24;
						$ay1  = 65;
						$ex1  = 118;
						$ey1  = 65;
					} else
					if ($form_name == 'Axis MF SWP Form.pdf') {
						$ax1  = 16;
						$ay1  = 33;
						$ex1  = 130;
						$ey1  = 33;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Bajaj MF SWP Form.pdf') {
						$ax1  = 20;
						$ay1  = 55;
						$ex1  = 153;
						$ey1  = 55;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Bandhan MF SWP Form.pdf') {
						$ax1  = 20;
						$ay1  = 36;
						$ex1  = 95;
						$ey1  = 36;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Baroda BNP MF SWP Form.pdf') {
						$ax1  = 25;
						$ay1  = 40;
						$ex1  = 114;
						$ey1  = 40;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Canara Robeco MF SWP Form.pdf') {
						$ax1  = 100;
						$ay1  = 23;
						$ex1  = 120;
						$ey1  = 23;
					} else
					if ($form_name == 'DSP MF SWP Form.pdf') {
						$ax1  = 20;
						$ay1  = 22;
						$ex1  = 115;
						$ey1  = 22;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Edelweiss MF SWP form.pdf') {
						$ax1  = 25;
						$ay1  = 49;
						$ex1  = 135;
						$ey1  = 49;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'FRANKLIN MF SWP FORM.pdf') {
						$ax1  = 48;
						$ay1  = 29;
						$ex1  = 155;
						$ey1  = 29;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'HDFC MF SWP Form.pdf') {
						$ax1  = 32;
						$ay1  = 35;
						$ex1  = 110;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'HSBC MF SWP Form.pdf') {
						$ax1  = 20;
						$ay1  = 43;
						$ex1  = 135;
						$ey1  = 43;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'ICICI MF SWP Form.pdf') {
						$ax1  = 25;
						$ay1  = 35;
						$ex1  = 102;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Invesco MF SWP Form.pdf') {
						$ax1  = 85;
						$ay1  = 42;
						$ex1  = 95;
						$ey1  = 55;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'ITI MF SWP FORM.pdf') {
						$ax1  = 30;
						$ay1  = 52;
						$ex1  = 112;
						$ey1  = 52;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'JM MF SWP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 44;
						$ex1  = 110;
						$ey1  = 44;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Kotak MF SWP Form.pdf') {
						$ax1  = 23;
						$ay1  = 20;
						$ex1  = 170;
						$ey1  = 20;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'LIC SWP Form.pdf') {
						$ax1  = 30;
						$ay1  = 40;
						$ex1  = 150;
						$ey1  = 40;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Mahindra MF SWP Form.pdf') {
						$ax1  = 120;
						$ay1  = 23;
						$ex1  = 140;
						$ey1  = 23;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Mirae Asset MF SWP Form.pdf') {
						$ax1  = 20;
						$ay1  = 40;
						$ex1  = 120;
						$ey1  = 40;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Motilal oswal MF SWP Form.pdf') {
						$ax1  = 25;
						$ay1  = 35;
						$ex1  = 175;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'NAVI MF SWP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 35;
						$ex1  = 100;
						$ey1  = 35;
					} else
					if ($form_name == 'Nippon India MF SWP Form.pdf') {
						$ax1  = 25;
						$ay1  = 36;
						$ex1  = 150;
						$ey1  = 36;
					} else
					if ($form_name == 'NJ MF SWP Form.pdf') {
						$ax1  = 25;
						$ay1  = 33;
						$ex1  = 140;
						$ey1  = 33;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('12');
					} else
					if ($form_name == 'PGIM MF SWP FORM.pdf') {
						$ax1  = 25;
						$ay1  = 33;
						$ex1  = 180;
						$ey1  = 33;
					} else
					if ($form_name == 'PPFAS MF SWP Form.pdf') {
						$ax1  = 25;
						$ay1  = 47;
						$ex1  = 180;
						$ey1  = 47;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Quant MF SWP Form.pdf') {
						$ax1  = 25;
						$ay1  = 55;
						$ex1  = 105;
						$ey1  = 55;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Quantum SWP Form.pdf') {
						$ax1  = 25;
						$ay1  = 45;
						$ex1  = 130;
						$ey1  = 45;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'SAMCO MF SWP FORM.pdf') {
						$ax1  = 20;
						$ay1  = 35;
						$ex1  = 140;
						$ey1  = 35;
					} else
					if ($form_name == 'SBI MF SWP FORM.pdf') {
						$ax1  = 130;
						$ay1  = 20;
						$ex1  = 152;
						$ey1  = 20;
					} else
					if ($form_name == 'Shriram MF SWP Form.pdf') {
						$ax1  = 30;
						$ay1  = 35;
						$ex1  = 170;
						$ey1  = 35;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'Sundaram MF SWP Form.pdf') {
						$ax1  = 85;
						$ay1  = 36;
						$ex1  = 115;
						$ey1  = 36;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'TATA MF SWP FORM.pdf') {
						$ax1  = 27;
						$ay1  = 50;
						$ex1  = 125;
						$ey1  = 50;
					} else
					if ($form_name == 'Taurus MF SWP Form.pdf') {
						$ax1  = 27;
						$ay1  = 42;
						$ex1  = 95;
						$ey1  = 42;
					} else
					if ($form_name == 'Union MF SWP FORM.pdf') {
						$ax1  = 70;
						$ay1  = 30;
						$ex1  = 90;
						$ey1  = 30;
						$pdf->SetFont('arial');
						$pdf->SetFontSize('9');
					} else
					if ($form_name == 'UTI MF SWP FORM.pdf') {
						$ax1  = 40;
						$ay1  = 36;
						$ex1  = 145;
						$ey1  = 36;
					} else
					if ($form_name == 'WhiteOak MF SWP Form.pdf') {
						$ax1  = 20;
						$ay1  = 55;
						$ex1  = 185;
						$ey1  = 55;
					}
				} else {
					echo "File Not Exit";
				}
				// iterate through all pages
				for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
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

					if ($pageNo == '1') {
						if (($ax1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ax1, $ay1);
							$pdf->Write(0, $arn_no);
						}

						if (($ex1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ex1, $ey1);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == 2) {

						if (($ax2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
						}

						if (($ex2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
						}
					}

					if ($pageNo == '3') {
						if (($ax3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
						}

						if (($ex3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '4') {
						if (($ax4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
						}

						if (($ex4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
						}
					}
				}


				//close the directory
				closedir($dh);

				// Output the new PDF
				$pdf->Output($form_name, 'I');
			}
		}

		// swp form end





		//other form start

		if ($dh = opendir($form_dir)) {
			if ($form_dir == 'other') {
				if (file_exists($form_dir . '/' . $form_name)) {
					$pageCount = $pdf->setSourceFile($form_dir . '/' . $form_name);



					if ($form_name == 'cams-change-of-broker-form.pdf') {
						$ax1  = 75;
						$ay1  = 29;
						$ex1  = 140;
						$ey1  = 29;
					} else
					if ($form_name == 'CAMS-PAN-based-Email-Id-Mobile-No-Updation-Form.pdf') {
						$ax1  = 55;
						$ay1  = 26;
						$ex1  = 180;
						$ey1  = 26;
					} else
					if ($form_name == 'Form for Fresh Nomination  Change of Existing Nomination.pdf') {
						$ax1  = 55;
						$ay1  = 26;
						$ex1  = 180;
						$ey1  = 26;
					}
					if ($form_name == 'CKYC APPLICATION FORM FOR INDIVIDUAL.pdf') {
						$ax1  = 125;
						$ay1  = 26;
						$ex1  = 180;
						$ey1  = 26;
					} else
					if ($form_name == 'KFintech-PAN based Email Id  Mobile No. Updation Form.pdf') {
						$ax1  = 55;
						$ay1  = 26;
						$ex1  = 180;
						$ey1  = 26;
					}
					if ($form_name == 'MINOR ATTAINING MAJORITY REQUEST FORM TO CHANGE STATUS.pdf') {
						$ax1  = 125;
						$ay1  = 26;
						$ex1  = 180;
						$ey1  = 26;
					} else
					if ($form_name == 'OPT IN FORM.pdf') {
						$ax1  = 55;
						$ay1  = 26;
						$ex1  = 180;
						$ey1  = 26;
					}
				} else {
					echo "File Not Exist";
?>
					<script>
						window.location.href = "https://redvisiontechnologies.com";
					</script>
				<?php
					// header("location: https://www.redvisiontechnologies.com");
					// header('Location: https://www.redvisiontechnologies.com');
					// exit;
				}
				// iterate through all pages
				for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
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

					if ($pageNo == '1') {
						if (($ax1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ax1, $ay1);
							$pdf->Write(0, $arn_no);
						}

						if (($ex1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ex1, $ey1);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == 2) {

						if (($ax2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
						}

						if (($ex2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
						}
					}

					if ($pageNo == '3') {
						if (($ax3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
						}

						if (($ex3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '4') {
						if (($ax4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
						}

						if (($ex4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '16') {
						if (($ax16 != 0) && ($ay16 != 0)) {
							$pdf->SetXY($ax16, $ay16);
							$pdf->Write(0, $arn_no);
						}

						if (($ex16 != 0) && ($ay16 != 0)) {
							$pdf->SetXY($ex16, $ey16);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '18') {
						if (($ax18 != 0) && ($ay18 != 0)) {
							$pdf->SetXY($ax18, $ay18);
							$pdf->Write(0, $arn_no);
						}

						if (($ex18 != 0) && ($ay18 != 0)) {
							$pdf->SetXY($ex18, $ey18);
							$pdf->Write(0, $euin_no);
						}
					}
				}


				//close the directory
				closedir($dh);

				// Output the new PDF
				$pdf->Output($form_name, 'I');
			}
		}

		// other form end


		//KIM form start
		if ($dh = opendir($form_dir)) {
			if ($form_dir == 'kim') {
				if (file_exists($form_dir . '/' . $form_name)) {
					$pageCount = $pdf->setSourceFile($form_dir . '/' . $form_name);
				} else {
					echo "File Not Exist";
				?>
					<script>
						window.location.href = "https://redvisiontechnologies.com";
					</script>
				<?php
				}
				
						// iterate through all pages
				for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
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

					if ($pageNo == '1') {
						if (($ax1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ax1, $ay1);
							$pdf->Write(0, $arn_no);
						}

						if (($ex1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ex1, $ey1);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == 2) {

						if (($ax2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
						}

						if (($ex2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
						}
					}

					if ($pageNo == '3') {
						if (($ax3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
						}

						if (($ex3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '4') {
						if (($ax4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
						}

						if (($ex4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '16') {
						if (($ax16 != 0) && ($ay16 != 0)) {
							$pdf->SetXY($ax16, $ay16);
							$pdf->Write(0, $arn_no);
						}

						if (($ex16 != 0) && ($ay16 != 0)) {
							$pdf->SetXY($ex16, $ey16);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '18') {
						if (($ax18 != 0) && ($ay18 != 0)) {
							$pdf->SetXY($ax18, $ay18);
							$pdf->Write(0, $arn_no);
						}

						if (($ex18 != 0) && ($ay18 != 0)) {
							$pdf->SetXY($ex18, $ey18);
							$pdf->Write(0, $euin_no);
						}
					}
				}
				
				//close the directory
				closedir($dh);

				// Output the new PDF
				$pdf->Output($form_name, 'I');
			}
		}
		// KIM form end

		//SID form start
		if ($dh = opendir($form_dir)) {
			if ($form_dir == 'sid') {
				if (file_exists($form_dir . '/' . $form_name)) {
					$pageCount = $pdf->setSourceFile($form_dir . '/' . $form_name);
				} else {
					echo "File Not Exist";
				?>
					<script>
						window.location.href = "https://redvisiontechnologies.com";
					</script>
				<?php
				}
				
						// iterate through all pages
				for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
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

					if ($pageNo == '1') {
						if (($ax1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ax1, $ay1);
							$pdf->Write(0, $arn_no);
						}

						if (($ex1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ex1, $ey1);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == 2) {

						if (($ax2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
						}

						if (($ex2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
						}
					}

					if ($pageNo == '3') {
						if (($ax3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
						}

						if (($ex3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '4') {
						if (($ax4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
						}

						if (($ex4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '16') {
						if (($ax16 != 0) && ($ay16 != 0)) {
							$pdf->SetXY($ax16, $ay16);
							$pdf->Write(0, $arn_no);
						}

						if (($ex16 != 0) && ($ay16 != 0)) {
							$pdf->SetXY($ex16, $ey16);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '18') {
						if (($ax18 != 0) && ($ay18 != 0)) {
							$pdf->SetXY($ax18, $ay18);
							$pdf->Write(0, $arn_no);
						}

						if (($ex18 != 0) && ($ay18 != 0)) {
							$pdf->SetXY($ex18, $ey18);
							$pdf->Write(0, $euin_no);
						}
					}
				}
				
				//close the directory
				closedir($dh);

				// Output the new PDF
				$pdf->Output($form_name, 'I');
			}
		}
		// SID form end

		//SAI form start
		if ($dh = opendir($form_dir)) {
			if ($form_dir == 'sai') {
				if (file_exists($form_dir . '/' . $form_name)) {
					$pageCount = $pdf->setSourceFile($form_dir . '/' . $form_name);
				} else {
					echo "File Not Exist";
				?>
					<script>
						window.location.href = "https://redvisiontechnologies.com";
					</script>
<?php
				}
				
						// iterate through all pages
				for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
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

					if ($pageNo == '1') {
						if (($ax1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ax1, $ay1);
							$pdf->Write(0, $arn_no);
						}

						if (($ex1 != 0) && ($ay1 != 0)) {
							$pdf->SetXY($ex1, $ey1);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == 2) {

						if (($ax2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ax2, $ay2);
							$pdf->Write('', $arn_no);
						}

						if (($ex2 != 0) && ($ay2 != 0)) {
							$pdf->SetXY($ex2, $ey2);
							$pdf->Write('', $euin_no);
						}
					}

					if ($pageNo == '3') {
						if (($ax3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ax3, $ay3);
							$pdf->Write(0, $arn_no);
						}

						if (($ex3 != 0) && ($ay3 != 0)) {
							$pdf->SetXY($ex3, $ey3);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '4') {
						if (($ax4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ax4, $ay4);
							$pdf->Write(0, $arn_no);
						}

						if (($ex4 != 0) && ($ay4 != 0)) {
							$pdf->SetXY($ex4, $ey4);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '16') {
						if (($ax16 != 0) && ($ay16 != 0)) {
							$pdf->SetXY($ax16, $ay16);
							$pdf->Write(0, $arn_no);
						}

						if (($ex16 != 0) && ($ay16 != 0)) {
							$pdf->SetXY($ex16, $ey16);
							$pdf->Write(0, $euin_no);
						}
					}

					if ($pageNo == '18') {
						if (($ax18 != 0) && ($ay18 != 0)) {
							$pdf->SetXY($ax18, $ay18);
							$pdf->Write(0, $arn_no);
						}

						if (($ex18 != 0) && ($ay18 != 0)) {
							$pdf->SetXY($ex18, $ey18);
							$pdf->Write(0, $euin_no);
						}
					}
				}
				
				//close the directory
				closedir($dh);

				// Output the new PDF
				$pdf->Output($form_name, 'I');
			}
		}
		// SAI form end



	} else {
		echo "form Not Avaliable";
	}
}
?>