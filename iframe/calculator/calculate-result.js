function calculateResult() {
  var incomeTaxYear = $("#incomeTaxYear").val();
  var ageGroupValue = $("#ageGroupValue").val();

  //console.log('incomeTaxYear 1 ='+incomeTaxYear); console.log('ageGroupValue='+ageGroupValue);
  //if(((incomeTaxYear) == "25_new" && (parseInt(ageGroupValue)==1) || (parseInt(ageGroupValue)==2) || parseInt(ageGroupValue)==3)){
  if (
    incomeTaxYear == "25_new" &&
    [1, 2, 3].includes(parseInt(ageGroupValue))
  ) {
    //console.log('incomeTaxYear aa gaya hu');

    if (incomeTaxYear == "25_new") {
      incomeTaxYear = "25";
    }
    var slabCss = "";
    var ageGroupValue = $("#ageGroupValue").val();
    var ctcAmount = parseFloat($("#ctcAmount").val()) || 0;
    var nextIncomeTaxYear = parseInt(incomeTaxYear) + 1;
    var futureIncomeTaxYear = parseInt(nextIncomeTaxYear) + 1;
    switch (ageGroupValue) {
      case "1":
        ageGroupText = "Below 60 Year";
        break;
      case "2":
        ageGroupText = "Sr. Citizen >60 Year";
        break;
      case "3":
        ageGroupText = "Very Sr. Citizen >80 Year";
        break;
    }
    var totalAmountInput = parseFloat($("#totalAmountInput").val()) || 0;
    var slab1TaxPercentage = 5;
    var slab1DefaultAmount = 400000;
    var slab3DefaultAmount = 800000;
    let slab4DefaultAmount = 1200000;
    let slab5DefaultAmount = 1600000;
    let slab6DefaultAmount = 2000000;
    let slab7DefaultAmount = 2400000;

    var slab1CalculationAmount = 0;
    var slab2CalculationAmount = 0;
    var slab3CalculationAmount = 0;
    var slab4CalculationAmount = 0;
    var slab5CalculationAmount = 0;
    var slab6CalculationAmount = 0;
    var slab7CalculationAmount = 0;

    var slab1TaxAmount = 0;
    var slab2TaxAmount = 0;
    var slab3TaxAmount = 0;
    var slab4TaxAmount = 0;
    var slab5TaxAmount = 0;
    var slab6TaxAmount = 0;
    var slab7TaxAmount = 0;

    if (totalAmountInput > 2400000) {
      var remainingIncome = totalAmountInput;

      // Slab 1 (0%)
      slab1CalculationAmount = Math.min(remainingIncome, 400000);
      remainingIncome -= slab1CalculationAmount;

      // Slab 2 (5%)
      if (remainingIncome > 0) {
        slab2CalculationAmount = Math.min(remainingIncome, 400000);
        slab2TaxAmount = slab2CalculationAmount * 0.05;
        remainingIncome -= slab2CalculationAmount;
      }

      // Slab 3 (10%)
      if (remainingIncome > 0) {
        slab3CalculationAmount = Math.min(remainingIncome, 400000);
        slab3TaxAmount = slab3CalculationAmount * 0.1;
        remainingIncome -= slab3CalculationAmount;
      }

      // Slab 4 (15%)
      if (remainingIncome > 0) {
        slab4CalculationAmount = Math.min(remainingIncome, 400000);
        slab4TaxAmount = slab4CalculationAmount * 0.15;
        remainingIncome -= slab4CalculationAmount;
      }

      // Slab 5 (20%)
      if (remainingIncome > 0) {
        slab5CalculationAmount = Math.min(remainingIncome, 400000);
        slab5TaxAmount = slab5CalculationAmount * 0.2;
        remainingIncome -= slab5CalculationAmount;
      }

      // Slab 6 (25%)
      if (remainingIncome > 0) {
        slab6CalculationAmount = Math.min(remainingIncome, 400000);
        slab6TaxAmount = slab6CalculationAmount * 0.25;
        remainingIncome -= slab6CalculationAmount;
      }
      //console.log("remainingIncome====>", remainingIncome);

      // Slab 7 (30%) 👉 FIXED ISSUE HERE
      if (remainingIncome > 0) {
        slab7CalculationAmount = remainingIncome;
        slab7TaxAmount = slab7CalculationAmount * 0.3;
      }

      //console.log("slab7CalculationAmount====>", slab7CalculationAmount);
      //console.log("slab7TaxAmount====>", slab7TaxAmount);
    } else if (totalAmountInput > 2000000) {
      slab6CalculationAmount = totalAmountInput - 2000000;
      slab5CalculationAmount = 400000;
      slab4CalculationAmount = 400000;
      slab3CalculationAmount = 400000;
      slab2CalculationAmount = 400000;
      slab1CalculationAmount = 400000;

      slab6TaxAmount = (slab6CalculationAmount / 100) * 25;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * 5;
    } else if (totalAmountInput > 1600000) {
      slab5CalculationAmount = totalAmountInput - 1600000;
      slab4CalculationAmount = 400000;
      slab3CalculationAmount = 400000;
      slab2CalculationAmount = 400000;
      slab1CalculationAmount = 400000;

      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * 5;
    } else if (totalAmountInput > 1200000) {
      slab4CalculationAmount = totalAmountInput - 1200000;
      slab3CalculationAmount = 400000;
      slab2CalculationAmount = 400000;
      slab1CalculationAmount = 400000;

      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * 5;
    } else if (totalAmountInput > 800000) {
      slab3CalculationAmount = totalAmountInput - 800000;
      slab2CalculationAmount = 400000;
      slab1CalculationAmount = 400000;

      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * 5;
    } else if (totalAmountInput > 400000) {
      slab2CalculationAmount = totalAmountInput - 400000;
      slab1CalculationAmount = 400000;
      slab2TaxAmount = (slab2CalculationAmount / 100) * 5;
    } else {
      slab1CalculationAmount = totalAmountInput;
    }

    var totalTaxAmount =
      slab7TaxAmount +
      slab6TaxAmount +
      slab5TaxAmount +
      slab4TaxAmount +
      slab3TaxAmount +
      slab2TaxAmount +
      slab1TaxAmount;
    //Super Rich Surcharge calculation
    var surcharge15per = 0;
    var surcharge10per = 0;
    var surcharge37per = 0;

    if (totalAmountInput > 50000000) {
      surcharge37per = (totalTaxAmount / 100) * 37;
    } else if (totalAmountInput > 10000000) {
      surcharge15per = (totalTaxAmount / 100) * 15;
    } else if (totalAmountInput > 5000000) {
      surcharge10per = (totalTaxAmount / 100) * 10;
    }
    var superRichHtml = "";
    if (incomeTaxYear > 16) {
      superRichHtml =
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(37% on Tax if Income > Rs 6 Crore)<br>(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
        surcharge37per.toFixed(2) +
        "<br>" +
        surcharge15per.toFixed(2) +
        "<br>" +
        surcharge10per.toFixed(2) +
        "</td></tr></table></div></div>";
    }
    // else {
    //     if (incomeTaxYear > 12) {
    //         superRichHtml = '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)</div></th><td>' + surcharge15per.toFixed(2) + '</td></tr></table></div></div>';
    //     }
    // }

    // ================= EXISTING CODE SAME =================
    var taxWithSurcharge =
      totalTaxAmount + surcharge15per + surcharge10per + surcharge37per;

    // ================= 🔥 NEW: REBATE 87A =================
    var rebate87A = 0;
    var finalTaxAfterRebate = taxWithSurcharge;

    var taxableIncome = totalAmountInput;

    // ✅ Case 1: ≤ 7L
    if (taxableIncome <= 700000) {
      rebate87A = taxWithSurcharge;
      finalTaxAfterRebate = 0;
    }

    // ✅ Case 2: 7L – 12L
    else if (taxableIncome > 700000 && taxableIncome <= 1200000) {
      let maxTaxAllowed = taxableIncome - 700000;

      if (taxWithSurcharge > maxTaxAllowed) {
        rebate87A = taxWithSurcharge - maxTaxAllowed;
        finalTaxAfterRebate = maxTaxAllowed;
      } else {
        rebate87A = taxWithSurcharge;
        finalTaxAfterRebate = 0;
      }
    }

    // ✅ Case 3: 12L – 12.75L (marginal relief zone)
    else if (taxableIncome > 1200000 && taxableIncome <= 1275000) {
      let maxTaxAllowed = taxableIncome - 1200000;

      if (taxWithSurcharge > maxTaxAllowed) {
        rebate87A = taxWithSurcharge - maxTaxAllowed;
        finalTaxAfterRebate = maxTaxAllowed;
      }
    }

    // ✅ Case 4: > 12.75L → NO rebate
    else {
      rebate87A = 0;
      finalTaxAfterRebate = taxWithSurcharge;
    }

    // ================= CHANGE: CESS =================
    var educationCessPer = 3;
    if (
      incomeTaxYear == 18 ||
      incomeTaxYear == 19 ||
      incomeTaxYear == 20 ||
      incomeTaxYear == 21 ||
      incomeTaxYear == 22 ||
      incomeTaxYear == 23 ||
      incomeTaxYear == 24 ||
      incomeTaxYear == 25
    ) {
      var educationCessPer = 4;
    }

    // ❌ OLD: taxWithSurcharge
    // ✅ NEW:
    var educationCess = (finalTaxAfterRebate / 100) * educationCessPer;

    // ================= CHANGE: FINAL TAX =================
    // ❌ OLD:
    // var totalTaxLiability = taxWithSurcharge + educationCess;

    // ✅ NEW:
    var totalTaxLiability = finalTaxAfterRebate + educationCess;

    var monthlyTaxPayable = totalTaxLiability / 12;
    var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100; var taxIncomeRatio = ctcAmount > 0 ? (totalTaxLiability / ctcAmount) * 100 : 0;
    var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
    var AssessmentYear =
      "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

    var html =
      '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
<div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
<td>20' +
      incomeTaxYear +
      " - 20" +
      nextIncomeTaxYear +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
      nextIncomeTaxYear +
      " - 20" +
      futureIncomeTaxYear +
      '</td></tr>\n\
</table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
<td>' +
      ageGroupText +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
<tr><th>Your Taxable Income</th><td>' +
      totalAmountInput +
      '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
<div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
<table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
<th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center"> Upto ' +
      slab1DefaultAmount +
      "</td><td>" +
      slab1CalculationAmount +
      " </td>\n\
<td>0%</td><td>Nill</td></tr><tr " +
      slabCss +
      ' ><td class="text-center">' +
      slab1DefaultAmount +
      " to " +
      slab3DefaultAmount +
      "</td>\n\
<td>" +
      slab2CalculationAmount +
      " </td><td>" +
      slab1TaxPercentage +
      "%</td><td>" +
      slab2TaxAmount +
      '</td></tr>\n\<tr><td class="text-center">' +
      slab3DefaultAmount +
      " to " +
      slab4DefaultAmount +
      "</td><td>" +
      slab3CalculationAmount +
      " </td><td>10%</td>\n\
<td>" +
      slab3TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab4DefaultAmount +
      " to " +
      slab5DefaultAmount +
      "</td><td>" +
      slab4CalculationAmount +
      " </td><td>15%</td>\n\
<td>" +
      slab4TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab5DefaultAmount +
      " to " +
      slab6DefaultAmount +
      "</td><td>" +
      slab5CalculationAmount +
      " </td><td>20%</td>\n\
<td>" +
      slab5TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab6DefaultAmount +
      " to " +
      slab7DefaultAmount +
      "</td><td>" +
      slab6CalculationAmount +
      " </td><td>25%</td>\n\
<td>" +
      slab6TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab7DefaultAmount +
      " & above </td><td>" +
      slab7CalculationAmount +
      "</td><td>30%</td><td>" +
      slab7TaxAmount +
      '</td></tr>\n\
</tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
<div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
      totalTaxAmount +
      "</td>\n\
</tr></table></div></div>" +
      superRichHtml +
      '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
<tr><th>Tax With Surcharge</th><td>' +
      taxWithSurcharge +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Tax Before Rebate</th><td>' +
      taxWithSurcharge.toFixed(2) +
      "</td></tr>\
<tr><th>Less: Tax Rebate u/s 87A</th><td>" +
      rebate87A.toFixed(2) +
      "</td></tr>\
<tr><th>Tax After Rebate</th><td>" +
      finalTaxAfterRebate.toFixed(2) +
      '</td></tr>\n\
</table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
<th>Education Cess (' +
      educationCessPer +
      "%)</th><td>" +
      educationCess.toFixed(2) +
      '</td></tr></table></div></div>\n\
<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
Total Tax Liability</th><td>' +
      totalTaxLiability.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12">\n\
<div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
<td>' +
      monthlyTaxPayable.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
      taxIncomeRatio.toFixed(2) +
      "</td></tr>\n\
</table></div></div></div></div>";

    //    $("#tab-1a").removeClass("active");
    //    $("#tab-2a").addClass("active");
    //    $("#tab-1").removeClass("active");
    //    $("#tab-2").addClass("active");
    //    $("#tab-2a")[0].click();
    $("#step2ndDiv").html(html);

    $("#mFinancialYear").val(FinancialYear);
    $("#mAssessmentYear").val(AssessmentYear);
    $("#mAge").val(ageGroupValue);
    $("#mAgeGroupText").val(ageGroupText);

    $("#mYourTaxableIncome").val(totalAmountInput);
    $("#ms1").val(slab1CalculationAmount);
    $("#ms11").val("Nill");
    $("#ms2").val(slab2CalculationAmount);
    $("#ms22").val(slab2TaxAmount);
    $("#ms3").val(slab3CalculationAmount);
    $("#ms33").val(slab3TaxAmount);
    $("#ms4").val(slab4CalculationAmount);
    $("#ms44").val(slab4TaxAmount);
    $("#ms5").val(slab5CalculationAmount);
    $("#ms55").val(slab5TaxAmount);
    $("#ms6").val(slab6CalculationAmount);
    $("#ms66").val(slab6TaxAmount);
    $("#ms7").val(slab7CalculationAmount);
    $("#ms77").val(slab7TaxAmount);
    $("#mTotalTaxIncome").val(totalTaxAmount);
    var mSurcharge = surcharge15per.toFixed(2);
    var msurcharge10 = surcharge10per.toFixed(2);
    $("#mSurcharge").val(mSurcharge);
    $("#msurcharge10").val(msurcharge10);
    var mtaxWithSurchage = taxWithSurcharge.toFixed(2);
    $("#mtaxWithSurchage").val(mtaxWithSurchage);
    var meducationCess = educationCess.toFixed(2);
    $("#meducationCess").val(meducationCess);
    var mtotalTaxLiability = totalTaxLiability.toFixed(2);
    $("#mtotalTaxLiability").val(mtotalTaxLiability);
    var mmonthlyTaxPayable = monthlyTaxPayable.toFixed(2);
    $("#mmonthlyTaxPayable").val(mmonthlyTaxPayable);
    var mtaxIncomeRatio = taxIncomeRatio.toFixed(2);
    $("#mtaxIncomeRatio").val(mtaxIncomeRatio);

    $("#eduCessPersentage").val(educationCessPer);
    $("#slab1DefaultAmount").val(slab1DefaultAmount);
    $("#slab2DefaultAmount").val(slab2DefaultAmount);
    $("#slab3DefaultAmount").val(slab3DefaultAmount);
    $("#slab4DefaultAmount").val(slab4DefaultAmount);
    $("#slab5DefaultAmount").val(slab5DefaultAmount);
    $("#slab6DefaultAmount").val(slab6DefaultAmount);
    $("#slab7DefaultAmount").val(slab7DefaultAmount);
  } else if (incomeTaxYear == "24_new" && parseInt(ageGroupValue) == 1) {
    if (incomeTaxYear == "24_new") {
      incomeTaxYear = "24";
    }

    var ageGroupValue = $("#ageGroupValue").val();
    var ctcAmount = parseFloat($("#ctcAmount").val()) || 0;
    var nextIncomeTaxYear = parseInt(incomeTaxYear) + 1;
    var futureIncomeTaxYear = parseInt(nextIncomeTaxYear) + 1;
    var ageGroupText = "";
    var slab1DefaultAmount = 300000;
    // var slab2DefaultAmount = 300000;
    var slab3DefaultAmount = 600000;
    let slab4DefaultAmount = 900000;
    let slab5DefaultAmount = 1200000;
    let slab6DefaultAmount = 1500000;
    let slab7DefaultAmount = 1800000;
    var slabCss = "";
    switch (ageGroupValue) {
      case "1":
        ageGroupText = "Below 60 Year";
        break;
      case "2":
        ageGroupText = "Sr. Citizen >60 Year";
        slab1DefaultAmount = 300000;
        break;
      case "3":
        ageGroupText = "Very Sr. Citizen >80 Year";
        slab1DefaultAmount = 600000;
        slabCss = 'style="display: none"';
        break;
      default:
        ageGroupText = "Below 60 Year Default";
        break;
    }
    var totalAmountInput = $("#totalAmountInput").val();
    var slab7CalculationAmount = 0;
    var slab6CalculationAmount = 0;
    var slab5CalculationAmount = 0;
    var slab4CalculationAmount = 0;
    var slab3CalculationAmount = 0;
    var slab2CalculationAmount = 0;
    var slab1CalculationAmount = 300000 + " (75000 Standard Deducation)";
    var slab7TaxAmount = 0;
    var slab6TaxAmount = 0;
    var slab5TaxAmount = 0;
    var slab4TaxAmount = 0;
    var slab3TaxAmount = 0;
    var slab2TaxAmount = 0;
    var slab1TaxAmount = 0;
    var slab1TaxPercentage = 5;
    var incomeTaxPer = 25;

    //console.log('incomeTaxYear 2=',incomeTaxYear);
    //console.log('totalAmountInput New = ',totalAmountInput);

    if (totalAmountInput > 1500000) {
      slab7CalculationAmount = totalAmountInput - 1500000;
      slab6CalculationAmount = totalAmountInput - 1500000;
      slab5CalculationAmount = 300000;
      slab4CalculationAmount = 300000;
      slab3CalculationAmount = 300000;
      slab1CalculationAmount = 300000 + " (75000 Standard Deducation)";
      //console.log('slab7CalculationAmount 1=====',slab7CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab7TaxAmount = 0; //(slab7CalculationAmount / 100) * 30
      slab6TaxAmount = (slab6CalculationAmount / 100) * 30;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput >= 1500000 && totalAmountInput <= 1800000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = totalAmountInput - 1500000;
      slab5CalculationAmount = 300000; //1000000;
      slab4CalculationAmount = 300000;
      slab3CalculationAmount = 300000;
      //console.log('totalAmountInput =====>',totalAmountInput);
      //console.log('slab6CalculationAmount 2=====',slab6CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab6TaxAmount = (slab6CalculationAmount / 100) * 30;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 1200000 && totalAmountInput < 1500000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = totalAmountInput - 1200000;
      slab4CalculationAmount = 300000;
      slab3CalculationAmount = 300000;
      //console.log('slab3CalculationAmount 3=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 900000 && totalAmountInput <= 1200000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = totalAmountInput - 900000;
      slab3CalculationAmount = 300000;
      //console.log('slab4CalculationAmount 4=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 600000 && totalAmountInput <= 900000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = 0;
      slab3CalculationAmount = totalAmountInput - 600000;
      //console.log('slab3CalculationAmount 5=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;

      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;

      if (totalAmountInput <= 700000) {
        slab3TaxAmount = 0;
        slab2TaxAmount = 0;
      }
    } else if (totalAmountInput > 300000 && totalAmountInput <= 600000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = 0;
      slab3CalculationAmount = 0;
      slab2CalculationAmount = totalAmountInput - 300000;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput <= slab1DefaultAmount) {
      slab1CalculationAmount = totalAmountInput;
    }

    //console.log('slab5CalculationAmount$$$$$$$=',slab5CalculationAmount);
    //console.log(slab7TaxAmount,slab6TaxAmount, slab5TaxAmount, slab4TaxAmount , slab3TaxAmount , slab2TaxAmount , slab1TaxAmount);

    var totalTaxAmount =
      slab7TaxAmount +
      slab6TaxAmount +
      slab5TaxAmount +
      slab4TaxAmount +
      slab3TaxAmount +
      slab2TaxAmount +
      slab1TaxAmount;
    //console.log('totalTaxAmount=>',totalTaxAmount);
    //Super Rich Surcharge calculation
    var surcharge15per = 0;
    var surcharge10per = 0;
    var surcharge37per = 0;
    if (totalAmountInput > 50000000) {
      surcharge37per = (totalTaxAmount / 100) * 37;
    } else if (totalAmountInput > 10000000) {
      surcharge15per = (totalTaxAmount / 100) * incomeTaxPer;
    } else if (totalAmountInput < 10000000 && totalAmountInput > 5000000) {
      if (incomeTaxYear > 16) {
        surcharge10per = (totalTaxAmount / 100) * 10;
      }
    }
    var superRichHtml = "";
    if (incomeTaxYear > 16) {
      superRichHtml =
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(37% on Tax if Income > Rs 6 Crore)<br>(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
        surcharge37per.toFixed(2) +
        "<br>" +
        surcharge15per.toFixed(2) +
        "<br>" +
        surcharge10per.toFixed(2) +
        "</td></tr></table></div></div>";
    }
    // else {
    //     if (incomeTaxYear > 12) {
    //         superRichHtml = '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)</div></th><td>' + surcharge15per.toFixed(2) + '</td></tr></table></div></div>';
    //     }
    // }

    var taxWithSurcharge =
      totalTaxAmount + surcharge15per + surcharge10per + surcharge37per;
    var educationCessPer = 3;
    if (
      incomeTaxYear == 18 ||
      incomeTaxYear == 19 ||
      incomeTaxYear == 20 ||
      incomeTaxYear == 21 ||
      incomeTaxYear == 22 ||
      incomeTaxYear == 23 ||
      incomeTaxYear == 24
    ) {
      var educationCessPer = 4;
    }
    var educationCess = (taxWithSurcharge / 100) * educationCessPer;
    var totalTaxLiability = taxWithSurcharge + educationCess;
    var monthlyTaxPayable = totalTaxLiability / 12;
    //var taxIncomeRatio = (totalTaxLiability / totalAmountInput) * 100;
    var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100;

    var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
    var AssessmentYear =
      "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

    var html =
      '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
<div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
<td>20' +
      incomeTaxYear +
      " - 20" +
      nextIncomeTaxYear +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
      nextIncomeTaxYear +
      " - 20" +
      futureIncomeTaxYear +
      '</td></tr>\n\
</table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
<td>' +
      ageGroupText +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
<tr><th>Your Taxable Income</th><td>' +
      totalAmountInput +
      '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
<div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
<table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
<th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center"> Upto ' +
      slab1DefaultAmount +
      "</td><td>" +
      slab1CalculationAmount +
      " </td>\n\
<td>0%</td><td>Nill</td></tr><tr " +
      slabCss +
      ' ><td class="text-center">' +
      slab1DefaultAmount +
      " to " +
      slab3DefaultAmount +
      "</td>\n\
    <td>" +
      slab2CalculationAmount +
      " </td><td>" +
      slab1TaxPercentage +
      "%</td><td>" +
      slab2TaxAmount +
      '</td></tr>\n\
    <tr><td class="text-center">' +
      slab3DefaultAmount +
      " to " +
      slab4DefaultAmount +
      "</td><td>" +
      slab3CalculationAmount +
      " </td><td>10%</td>\n\
<td>" +
      slab3TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab4DefaultAmount +
      " to " +
      slab5DefaultAmount +
      "</td><td>" +
      slab4CalculationAmount +
      " </td><td>15%</td>\n\
<td>" +
      slab4TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab5DefaultAmount +
      " to " +
      slab6DefaultAmount +
      "</td><td>" +
      slab5CalculationAmount +
      " </td><td>20%</td>\n\
    <td>" +
      slab5TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab6DefaultAmount +
      " & above </td><td>" +
      slab6CalculationAmount +
      " </td><td>30%</td>\n\
    <td>" +
      slab6TaxAmount +
      '</td></tr></tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
<div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
      totalTaxAmount +
      "</td>\n\
</tr></table></div></div>" +
      superRichHtml +
      '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
<tr><th>Tax With Surcharge</th><td>' +
      taxWithSurcharge +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Tax with Surcharge less Rebate, if any</th><td>' +
      taxWithSurcharge.toFixed(2) +
      '</td></tr>\n\
</table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
<th>Education Cess (' +
      educationCessPer +
      "%)</th><td>" +
      educationCess.toFixed(2) +
      '</td></tr></table></div></div>\n\
<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
Total Tax Liability</th><td>' +
      totalTaxLiability.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12">\n\
<div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
<td>' +
      monthlyTaxPayable.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
      taxIncomeRatio.toFixed(2) +
      '</td></tr>\n\
    </table></div></div></div></div><a href="javascript:void(0)" onclick="backToCalculator()" class="btn btn-success" >Back To Calculator</a>\n\
    <div class="row"><div class="col-md-12 mt-3"><h5 class="summery-heading float-left mb-2">Send Report On Your Mail</h5></div>\n\
    <div class="col-12 col-sm-12 col-lg-12 mb-0"><div class="card wight-card card-ft border-0 p-0"><div class="card-body ">\n\
    <form role="form" class="horiz-form" id="calculatorForm" name="calculatorForm"><div class="row mx-0 light-gray-bg py-3 mb-1">\n\
    <div class="col-md-6"><div class="form-group"><label>Name</label><input class="form-control" type="text" id="name" name="name" />\n\
    </div></div><div class="col-md-6"><div class="form-group"><label>Email</label><input class="form-control" type="text" id="email" name="email" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>Mobile No.</label><input class="form-control" type="text" id="mobile" name="mobile" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>City</label>\n\
    <input class="form-control" type="text" id="city" name="city" />\n\
    <input class="form-control" type="hidden" id="mAge" name="mAge"  />\n\
    \n\<input class="form-control" type="hidden" id="mAgeGroupText" name="mAgeGroupText"  />\n\
    <input class="form-control" type="hidden" id="mFinancialYear" name="mFinancialYear" />\n\
    <input class="form-control" type="hidden" id="mAssessmentYear" name="mAssessmentYear" />\n\
    <input class="form-control" type="hidden" id="mYourTaxableIncome" name="mYourTaxableIncome" />\n\
    <input class="form-control" type="hidden" id="ms1" name="ms1" />\n\
    <input class="form-control" type="hidden" id="ms11" name="ms11" />\n\
    <input class="form-control" type="hidden" id="ms2" name="ms2" />\n\
    <input class="form-control" type="hidden" id="ms22" name="ms22" />\n\
    <input class="form-control" type="hidden" id="ms3" name="ms3" />\n\
    <input class="form-control" type="hidden" id="ms33" name="ms33" />\n\
    <input class="form-control" type="hidden" id="ms4" name="ms4" />\n\
    <input class="form-control" type="hidden" id="ms44" name="ms44" />\n\
    <input class="form-control" type="hidden" id="mTotalTaxIncome" name="mTotalTaxIncome" />\n\
    <input class="form-control" type="hidden" id="mSurcharge" name="mSurcharge" />\n\
    <input class="form-control" type="hidden" id="msurcharge10" name="msurcharge10" />\n\
    <input class="form-control" type="hidden" id="mtaxWithSurchage" name="mtaxWithSurchage" />\n\
    <input class="form-control" type="hidden" id="meducationCess" name="meducationCess" />\n\
    <input class="form-control" type="hidden" id="mtotalTaxLiability" name="mtotalTaxLiability" />\n\
    <input class="form-control" type="hidden" id="eduCessPersentage" name="eduCessPersentage" />\n\
    <input class="form-control" type="hidden" id="slab1DefaultAmount" name="slab1DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab2DefaultAmount" name="slab2DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab3DefaultAmount" name="slab3DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab4DefaultAmount" name="slab4DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab5DefaultAmount" name="slab5DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab6DefaultAmount" name="slab6DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab7DefaultAmount" name="slab7DefaultAmount" />\n\
    \n\<input class="form-control" type="hidden" id="mmonthlyTaxPayable" name="mmonthlyTaxPayable" />\n\
    <input class="form-control" type="hidden" id="mtaxIncomeRatio" name="mtaxIncomeRatio" /></div></div>\n\
    <div class="col-md-12 mb-2 mt-1"><button type="button" class="btn btn-success" onclick="sendITCacluatorResult();">Send Mail</button></div></div>\n\
    </form>\n\
    </div></div></div></div></div></div></div>';

    //    $("#tab-1a").removeClass("active");
    //    $("#tab-2a").addClass("active");
    //    $("#tab-1").removeClass("active");
    //    $("#tab-2").addClass("active");
    //    $("#tab-2a")[0].click();
    $("#step2ndDiv").html(html);

    $("#mFinancialYear").val(FinancialYear);
    $("#mAssessmentYear").val(AssessmentYear);
    $("#mAge").val(ageGroupValue);
    $("#mAgeGroupText").val(ageGroupText);

    $("#mYourTaxableIncome").val(totalAmountInput);
    $("#ms1").val(slab1CalculationAmount);
    $("#ms11").val("Nill");
    $("#ms2").val(slab2CalculationAmount);
    $("#ms22").val(slab2TaxAmount);
    $("#ms3").val(slab3CalculationAmount);
    $("#ms33").val(slab3TaxAmount);
    $("#ms4").val(slab4CalculationAmount);
    $("#ms44").val(slab4TaxAmount);
    $("#ms5").val(slab5CalculationAmount);
    $("#ms55").val(slab5TaxAmount);
    $("#ms6").val(slab6CalculationAmount);
    $("#ms66").val(slab6TaxAmount);
    $("#ms7").val(slab7CalculationAmount);
    $("#ms77").val(slab7TaxAmount);
    $("#mTotalTaxIncome").val(totalTaxAmount);
    var mSurcharge = surcharge15per.toFixed(2);
    var msurcharge10 = surcharge10per.toFixed(2);
    $("#mSurcharge").val(mSurcharge);
    $("#msurcharge10").val(msurcharge10);
    var mtaxWithSurchage = taxWithSurcharge.toFixed(2);
    $("#mtaxWithSurchage").val(mtaxWithSurchage);
    var meducationCess = educationCess.toFixed(2);
    $("#meducationCess").val(meducationCess);
    var mtotalTaxLiability = totalTaxLiability.toFixed(2);
    $("#mtotalTaxLiability").val(mtotalTaxLiability);
    var mmonthlyTaxPayable = monthlyTaxPayable.toFixed(2);
    $("#mmonthlyTaxPayable").val(mmonthlyTaxPayable);
    var mtaxIncomeRatio = taxIncomeRatio.toFixed(2);
    $("#mtaxIncomeRatio").val(mtaxIncomeRatio);

    $("#eduCessPersentage").val(educationCessPer);
    $("#slab1DefaultAmount").val(slab1DefaultAmount);
    $("#slab2DefaultAmount").val(slab2DefaultAmount);
    $("#slab3DefaultAmount").val(slab3DefaultAmount);
    $("#slab4DefaultAmount").val(slab4DefaultAmount);
    $("#slab5DefaultAmount").val(slab5DefaultAmount);
    $("#slab6DefaultAmount").val(slab6DefaultAmount);
    $("#slab7DefaultAmount").val(slab7DefaultAmount);
  } else if (incomeTaxYear == "23_new" && parseInt(ageGroupValue) == 1) {
    if (incomeTaxYear == "23_new") {
      incomeTaxYear = "23";
    }

    var ageGroupValue = $("#ageGroupValue").val();
    var ctcAmount = $("#ctcAmount").val();
    var nextIncomeTaxYear = parseInt(incomeTaxYear) + 1;
    var futureIncomeTaxYear = parseInt(nextIncomeTaxYear) + 1;
    var ageGroupText = "";
    var slab1DefaultAmount = 300000;
    // var slab2DefaultAmount = 300000;
    var slab3DefaultAmount = 600000;
    let slab4DefaultAmount = 900000;
    let slab5DefaultAmount = 1200000;
    let slab6DefaultAmount = 1500000;
    let slab7DefaultAmount = 1800000;
    var slabCss = "";
    switch (ageGroupValue) {
      case "1":
        ageGroupText = "Below 60 Year";
        break;
      case "2":
        ageGroupText = "Sr. Citizen >60 Year";
        slab1DefaultAmount = 300000;
        break;
      case "3":
        ageGroupText = "Very Sr. Citizen >80 Year";
        slab1DefaultAmount = 600000;
        slabCss = 'style="display: none"';
        break;
      default:
        ageGroupText = "Below 60 Year Default";
        break;
    }
    var totalAmountInput = $("#totalAmountInput").val();
    var slab7CalculationAmount = 0;
    var slab6CalculationAmount = 0;
    var slab5CalculationAmount = 0;
    var slab4CalculationAmount = 0;
    var slab3CalculationAmount = 0;
    var slab2CalculationAmount = 0;
    var slab1CalculationAmount = 250000 + " (50000 Standard Deducation)";
    var slab7TaxAmount = 0;
    var slab6TaxAmount = 0;
    var slab5TaxAmount = 0;
    var slab4TaxAmount = 0;
    var slab3TaxAmount = 0;
    var slab2TaxAmount = 0;
    var slab1TaxAmount = 0;
    var slab1TaxPercentage = 5;
    var incomeTaxPer = 25;

    //console.log('incomeTaxYear 2=',incomeTaxYear);
    //console.log('totalAmountInput New = ',totalAmountInput);

    if (totalAmountInput > 1500000) {
      slab7CalculationAmount = totalAmountInput - 1500000;
      slab6CalculationAmount = totalAmountInput - 1500000;
      slab5CalculationAmount = 300000;
      slab4CalculationAmount = 300000;
      slab3CalculationAmount = 300000;
      slab1CalculationAmount = 250000 + " (50000 Standard Deducation)";
      //console.log('slab7CalculationAmount 1=====',slab7CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab7TaxAmount = 0; //(slab7CalculationAmount / 100) * 30
      slab6TaxAmount = (slab6CalculationAmount / 100) * 30;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput >= 1500000 && totalAmountInput <= 1800000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = totalAmountInput - 1500000;
      slab5CalculationAmount = 300000; //1000000;
      slab4CalculationAmount = 300000;
      slab3CalculationAmount = 300000;
      //console.log('totalAmountInput =====>',totalAmountInput);
      //console.log('slab6CalculationAmount 2=====',slab6CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab6TaxAmount = (slab6CalculationAmount / 100) * 30;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 1200000 && totalAmountInput < 1500000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = totalAmountInput - 1200000;
      slab4CalculationAmount = 300000;
      slab3CalculationAmount = 300000;
      //console.log('slab3CalculationAmount 3=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 900000 && totalAmountInput <= 1200000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = totalAmountInput - 900000;
      slab3CalculationAmount = 300000;
      //console.log('slab4CalculationAmount 4=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 600000 && totalAmountInput <= 900000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = 0;
      slab3CalculationAmount = totalAmountInput - 600000;
      //console.log('slab3CalculationAmount 5=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;

      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;

      if (totalAmountInput <= 700000) {
        slab3TaxAmount = 0;
        slab2TaxAmount = 0;
      }
    } else if (totalAmountInput > 300000 && totalAmountInput <= 600000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = 0;
      slab3CalculationAmount = 0;
      slab2CalculationAmount = totalAmountInput - 300000;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput <= slab1DefaultAmount) {
      slab1CalculationAmount = totalAmountInput;
    }

    //console.log('slab5CalculationAmount$$$$$$$=',slab5CalculationAmount);
    //console.log(slab7TaxAmount,slab6TaxAmount, slab5TaxAmount, slab4TaxAmount , slab3TaxAmount , slab2TaxAmount , slab1TaxAmount);

    var totalTaxAmount =
      slab7TaxAmount +
      slab6TaxAmount +
      slab5TaxAmount +
      slab4TaxAmount +
      slab3TaxAmount +
      slab2TaxAmount +
      slab1TaxAmount;
    //console.log('totalTaxAmount=>',totalTaxAmount);
    //Super Rich Surcharge calculation
    var surcharge15per = 0;
    var surcharge10per = 0;
    if (ctcAmount > 10000000) {
      surcharge15per = (totalTaxAmount / 100) * incomeTaxPer;
    } else if (ctcAmount < 10000000 && ctcAmount > 5000000) {
      if (incomeTaxYear > 16) {
        surcharge10per = (totalTaxAmount / 100) * 10;
      }
    }
    var superRichHtml = "";
    if (incomeTaxYear > 16) {
      superRichHtml =
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
        surcharge15per.toFixed(2) +
        "<br>" +
        surcharge10per.toFixed(2) +
        "</td></tr></table></div></div>";
    }
    // else {
    //     if (incomeTaxYear > 12) {
    //         superRichHtml = '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)</div></th><td>' + surcharge15per.toFixed(2) + '</td></tr></table></div></div>';
    //     }
    // }

    var taxWithSurcharge = totalTaxAmount + surcharge15per + surcharge10per;
    var educationCessPer = 3;
    if (
      incomeTaxYear == 18 ||
      incomeTaxYear == 19 ||
      incomeTaxYear == 20 ||
      incomeTaxYear == 21 ||
      incomeTaxYear == 22 ||
      incomeTaxYear == 23
    ) {
      var educationCessPer = 4;
    }
    var educationCess = (taxWithSurcharge / 100) * educationCessPer;
    var totalTaxLiability = taxWithSurcharge + educationCess;
    var monthlyTaxPayable = totalTaxLiability / 12;
    //var taxIncomeRatio = (totalTaxLiability / totalAmountInput) * 100;
    var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100;

    var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
    var AssessmentYear =
      "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

    var html =
      '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
    <div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
    <td>20' +
      incomeTaxYear +
      " - 20" +
      nextIncomeTaxYear +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
      nextIncomeTaxYear +
      " - 20" +
      futureIncomeTaxYear +
      '</td></tr>\n\
    </table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
    <td>' +
      ageGroupText +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
    <tr><th>Your Taxable Income</th><td>' +
      totalAmountInput +
      '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
    <div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
    <table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
    <th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center"> Upto ' +
      slab1DefaultAmount +
      "</td><td>" +
      slab1CalculationAmount +
      " </td>\n\
    <td>0%</td><td>Nill</td></tr><tr " +
      slabCss +
      ' ><td class="text-center">' +
      slab1DefaultAmount +
      " to " +
      slab3DefaultAmount +
      "</td>\n\
    <td>" +
      slab2CalculationAmount +
      " </td><td>" +
      slab1TaxPercentage +
      "%</td><td>" +
      slab2TaxAmount +
      '</td></tr>\n\
    <tr><td class="text-center">' +
      slab3DefaultAmount +
      " to " +
      slab4DefaultAmount +
      "</td><td>" +
      slab3CalculationAmount +
      " </td><td>10%</td>\n\
    <td>" +
      slab3TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab4DefaultAmount +
      " to " +
      slab5DefaultAmount +
      "</td><td>" +
      slab4CalculationAmount +
      " </td><td>15%</td>\n\
    <td>" +
      slab4TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab5DefaultAmount +
      " to " +
      slab6DefaultAmount +
      "</td><td>" +
      slab5CalculationAmount +
      " </td><td>20%</td>\n\
    <td>" +
      slab5TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab6DefaultAmount +
      " & above </td><td>" +
      slab6CalculationAmount +
      " </td><td>30%</td>\n\
    <td>" +
      slab6TaxAmount +
      '</td></tr></tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
    <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
      totalTaxAmount +
      "</td>\n\
    </tr></table></div></div>" +
      superRichHtml +
      '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
    <tr><th>Tax With Surcharge</th><td>' +
      taxWithSurcharge +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Tax with Surcharge less Rebate, if any</th><td>' +
      taxWithSurcharge.toFixed(2) +
      '</td></tr>\n\
    </table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
    <th>Education Cess (' +
      educationCessPer +
      "%)</th><td>" +
      educationCess.toFixed(2) +
      '</td></tr></table></div></div>\n\
    <div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
    Total Tax Liability</th><td>' +
      totalTaxLiability.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12">\n\
    <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
    <td>' +
      monthlyTaxPayable.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
      taxIncomeRatio.toFixed(2) +
      '</td></tr>\n\
    </table></div></div></div></div><a href="javascript:void(0)" onclick="backToCalculator()" class="btn btn-success" >Back To Calculator</a>\n\
    <div class="row"><div class="col-md-12 mt-3"><h5 class="summery-heading float-left mb-2">Send Report On Your Mail</h5></div>\n\
    <div class="col-12 col-sm-12 col-lg-12 mb-0"><div class="card wight-card card-ft border-0 p-0"><div class="card-body ">\n\
    <form role="form" class="horiz-form" id="calculatorForm" name="calculatorForm"><div class="row mx-0 light-gray-bg py-3 mb-1">\n\
    <div class="col-md-6"><div class="form-group"><label>Name</label><input class="form-control" type="text" id="name" name="name" />\n\
    </div></div><div class="col-md-6"><div class="form-group"><label>Email</label><input class="form-control" type="text" id="email" name="email" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>Mobile No.</label><input class="form-control" type="text" id="mobile" name="mobile" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>City</label>\n\
    <input class="form-control" type="text" id="city" name="city" />\n\
    <input class="form-control" type="hidden" id="mAge" name="mAge"  />\n\
    \n\<input class="form-control" type="hidden" id="mAgeGroupText" name="mAgeGroupText"  />\n\
    <input class="form-control" type="hidden" id="mFinancialYear" name="mFinancialYear" />\n\
    <input class="form-control" type="hidden" id="mAssessmentYear" name="mAssessmentYear" />\n\
    <input class="form-control" type="hidden" id="mYourTaxableIncome" name="mYourTaxableIncome" />\n\
    <input class="form-control" type="hidden" id="ms1" name="ms1" />\n\
    <input class="form-control" type="hidden" id="ms11" name="ms11" />\n\
    <input class="form-control" type="hidden" id="ms2" name="ms2" />\n\
    <input class="form-control" type="hidden" id="ms22" name="ms22" />\n\
    <input class="form-control" type="hidden" id="ms3" name="ms3" />\n\
    <input class="form-control" type="hidden" id="ms33" name="ms33" />\n\
    <input class="form-control" type="hidden" id="ms4" name="ms4" />\n\
    <input class="form-control" type="hidden" id="ms44" name="ms44" />\n\
    <input class="form-control" type="hidden" id="mTotalTaxIncome" name="mTotalTaxIncome" />\n\
    <input class="form-control" type="hidden" id="mSurcharge" name="mSurcharge" />\n\
    <input class="form-control" type="hidden" id="msurcharge10" name="msurcharge10" />\n\
    <input class="form-control" type="hidden" id="mtaxWithSurchage" name="mtaxWithSurchage" />\n\
    <input class="form-control" type="hidden" id="meducationCess" name="meducationCess" />\n\
    <input class="form-control" type="hidden" id="mtotalTaxLiability" name="mtotalTaxLiability" />\n\
    <input class="form-control" type="hidden" id="eduCessPersentage" name="eduCessPersentage" />\n\
    <input class="form-control" type="hidden" id="slab1DefaultAmount" name="slab1DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab2DefaultAmount" name="slab2DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab3DefaultAmount" name="slab3DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab4DefaultAmount" name="slab4DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab5DefaultAmount" name="slab5DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab6DefaultAmount" name="slab6DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab7DefaultAmount" name="slab7DefaultAmount" />\n\
    \n\<input class="form-control" type="hidden" id="mmonthlyTaxPayable" name="mmonthlyTaxPayable" />\n\
    <input class="form-control" type="hidden" id="mtaxIncomeRatio" name="mtaxIncomeRatio" /></div></div>\n\
    <div class="col-md-12 mb-2 mt-1"><button type="button" class="btn btn-success" onclick="sendITCacluatorResult();">Send Mail</button></div></div>\n\
    </form>\n\
    </div></div></div></div></div></div></div>';

    //    $("#tab-1a").removeClass("active");
    //    $("#tab-2a").addClass("active");
    //    $("#tab-1").removeClass("active");
    //    $("#tab-2").addClass("active");
    //    $("#tab-2a")[0].click();
    $("#step2ndDiv").html(html);

    $("#mFinancialYear").val(FinancialYear);
    $("#mAssessmentYear").val(AssessmentYear);
    $("#mAge").val(ageGroupValue);
    $("#mAgeGroupText").val(ageGroupText);

    $("#mYourTaxableIncome").val(totalAmountInput);
    $("#ms1").val(slab1CalculationAmount);
    $("#ms11").val("Nill");
    $("#ms2").val(slab2CalculationAmount);
    $("#ms22").val(slab2TaxAmount);
    $("#ms3").val(slab3CalculationAmount);
    $("#ms33").val(slab3TaxAmount);
    $("#ms4").val(slab4CalculationAmount);
    $("#ms44").val(slab4TaxAmount);
    $("#ms5").val(slab5CalculationAmount);
    $("#ms55").val(slab5TaxAmount);
    $("#ms6").val(slab6CalculationAmount);
    $("#ms66").val(slab6TaxAmount);
    $("#ms7").val(slab7CalculationAmount);
    $("#ms77").val(slab7TaxAmount);
    $("#mTotalTaxIncome").val(totalTaxAmount);
    var mSurcharge = surcharge15per.toFixed(2);
    var msurcharge10 = surcharge10per.toFixed(2);
    $("#mSurcharge").val(mSurcharge);
    $("#msurcharge10").val(msurcharge10);
    var mtaxWithSurchage = taxWithSurcharge.toFixed(2);
    $("#mtaxWithSurchage").val(mtaxWithSurchage);
    var meducationCess = educationCess.toFixed(2);
    $("#meducationCess").val(meducationCess);
    var mtotalTaxLiability = totalTaxLiability.toFixed(2);
    $("#mtotalTaxLiability").val(mtotalTaxLiability);
    var mmonthlyTaxPayable = monthlyTaxPayable.toFixed(2);
    $("#mmonthlyTaxPayable").val(mmonthlyTaxPayable);
    var mtaxIncomeRatio = taxIncomeRatio.toFixed(2);
    $("#mtaxIncomeRatio").val(mtaxIncomeRatio);

    $("#eduCessPersentage").val(educationCessPer);
    $("#slab1DefaultAmount").val(slab1DefaultAmount);
    $("#slab2DefaultAmount").val(slab2DefaultAmount);
    $("#slab3DefaultAmount").val(slab3DefaultAmount);
    $("#slab4DefaultAmount").val(slab4DefaultAmount);
    $("#slab5DefaultAmount").val(slab5DefaultAmount);
    $("#slab6DefaultAmount").val(slab6DefaultAmount);
    $("#slab7DefaultAmount").val(slab7DefaultAmount);
  } else if (incomeTaxYear == "22_new" && parseInt(ageGroupValue) == 1) {
    if (incomeTaxYear == "23_new") {
      incomeTaxYear = "23";
    } else {
      incomeTaxYear = "22";
    }

    var ageGroupValue = $("#ageGroupValue").val();
    var ctcAmount = $("#ctcAmount").val();
    var nextIncomeTaxYear = parseInt(incomeTaxYear) + 1;
    var futureIncomeTaxYear = parseInt(nextIncomeTaxYear) + 1;
    var ageGroupText = "";
    var slab1DefaultAmount = 250000;
    // var slab2DefaultAmount = 300000;
    var slab3DefaultAmount = 500000;
    let slab4DefaultAmount = 750000;
    let slab5DefaultAmount = 1000000;
    let slab6DefaultAmount = 1250000;
    let slab7DefaultAmount = 1500000;
    var slabCss = "";
    switch (ageGroupValue) {
      case "1":
        ageGroupText = "Below 60 Year";
        break;
      case "2":
        ageGroupText = "Sr. Citizen >60 Year";
        slab1DefaultAmount = 300000;
        break;
      case "3":
        ageGroupText = "Very Sr. Citizen >80 Year";
        slab1DefaultAmount = 500000;
        slabCss = 'style="display: none"';
        break;
      default:
        ageGroupText = "Below 60 Year Default";
        break;
    }
    var totalAmountInput = $("#totalAmountInput").val();
    var slab7CalculationAmount = 0;
    var slab6CalculationAmount = 0;
    var slab5CalculationAmount = 0;
    var slab4CalculationAmount = 0;
    var slab3CalculationAmount = 0;
    var slab2CalculationAmount = 0;
    var slab1CalculationAmount = 250000;
    var slab7TaxAmount = 0;
    var slab6TaxAmount = 0;
    var slab5TaxAmount = 0;
    var slab4TaxAmount = 0;
    var slab3TaxAmount = 0;
    var slab2TaxAmount = 0;
    var slab1TaxAmount = 0;
    var slab1TaxPercentage = 5;
    var incomeTaxPer = 25;

    //console.log('incomeTaxYear 2=',incomeTaxYear);

    if (totalAmountInput > 1500000) {
      slab7CalculationAmount = totalAmountInput - 1500000;
      slab6CalculationAmount = 250000;
      slab5CalculationAmount = 250000;
      slab4CalculationAmount = 250000;
      slab3CalculationAmount = 250000;
      //console.log('slab6CalculationAmount 1=====',slab6CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab7TaxAmount = (slab7CalculationAmount / 100) * 30;
      slab6TaxAmount = (slab6CalculationAmount / 100) * 25;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 1250000 && totalAmountInput <= 1500000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = totalAmountInput - 1250000;
      slab5CalculationAmount = 250000; //1000000;
      slab4CalculationAmount = 250000;
      slab3CalculationAmount = 250000;
      //console.log('totalAmountInput 2=====',totalAmountInput);
      //console.log('slab6CalculationAmount 2=====',slab6CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab6TaxAmount = (slab6CalculationAmount / 100) * 25;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 1000000 && totalAmountInput <= 1200000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = totalAmountInput - 1000000;
      slab4CalculationAmount = 750000;
      slab3CalculationAmount = 500000;
      //console.log('slab3CalculationAmount 3=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 750000 && totalAmountInput <= 1000000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = totalAmountInput - 750000;
      slab3CalculationAmount = 250000;
      //console.log('slab3CalculationAmount 4=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 500000 && totalAmountInput <= 750000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = 0;
      slab3CalculationAmount = totalAmountInput - 500000;
      //console.log('slab3CalculationAmount 5=====',slab3CalculationAmount);
      slab2CalculationAmount = slab1DefaultAmount;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 250000 && totalAmountInput <= 500000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = 0;
      slab3CalculationAmount = 0;
      slab2CalculationAmount = totalAmountInput - 250000;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput <= slab1DefaultAmount) {
      slab1CalculationAmount = totalAmountInput;
    }

    //console.log('slab5CalculationAmount$$$$$$$=',slab5CalculationAmount);

    var totalTaxAmount =
      slab7TaxAmount +
      slab6TaxAmount +
      slab5TaxAmount +
      slab4TaxAmount +
      slab3TaxAmount +
      slab2TaxAmount +
      slab1TaxAmount;
    //Super Rich Surcharge calculation
    var surcharge15per = 0;
    var surcharge10per = 0;
    if (ctcAmount > 10000000) {
      surcharge15per = (totalTaxAmount / 100) * incomeTaxPer;
    } else if (ctcAmount < 10000000 && ctcAmount > 5000000) {
      if (incomeTaxYear > 16) {
        surcharge10per = (totalTaxAmount / 100) * 10;
      }
    }
    var superRichHtml = "";
    if (incomeTaxYear > 16) {
      superRichHtml =
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
        surcharge15per.toFixed(2) +
        "<br>" +
        surcharge10per.toFixed(2) +
        "</td></tr></table></div></div>";
    }
    // else {
    //     if (incomeTaxYear > 12) {
    //         superRichHtml = '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)</div></th><td>' + surcharge15per.toFixed(2) + '</td></tr></table></div></div>';
    //     }
    // }

    var taxWithSurcharge = totalTaxAmount + surcharge15per + surcharge10per;
    var educationCessPer = 3;
    if (
      incomeTaxYear == 18 ||
      incomeTaxYear == 19 ||
      incomeTaxYear == 20 ||
      incomeTaxYear == 21 ||
      incomeTaxYear == 22 ||
      incomeTaxYear == 23
    ) {
      var educationCessPer = 4;
    }
    var educationCess = (taxWithSurcharge / 100) * educationCessPer;
    var totalTaxLiability = taxWithSurcharge + educationCess;
    var monthlyTaxPayable = totalTaxLiability / 12;
    //var taxIncomeRatio = (totalTaxLiability / totalAmountInput) * 100;
    var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100;

    var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
    var AssessmentYear =
      "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

    var html =
      '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
    <div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
    <td>20' +
      incomeTaxYear +
      " - 20" +
      nextIncomeTaxYear +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
      nextIncomeTaxYear +
      " - 20" +
      futureIncomeTaxYear +
      '</td></tr>\n\
    </table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
    <td>' +
      ageGroupText +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
    <tr><th>Your Taxable Income</th><td>' +
      totalAmountInput +
      '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
    <div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
    <table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
    <th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center"> Upto ' +
      slab1DefaultAmount +
      "</td><td>" +
      slab1CalculationAmount +
      "</td>\n\
    <td>0%</td><td>Nill</td></tr><tr " +
      slabCss +
      ' ><td class="text-center">' +
      slab1DefaultAmount +
      " to " +
      slab3DefaultAmount +
      "</td>\n\
    <td>" +
      slab2CalculationAmount +
      "</td><td>" +
      slab1TaxPercentage +
      "%</td><td>" +
      slab2TaxAmount +
      '</td></tr>\n\
    <tr><td class="text-center">' +
      slab3DefaultAmount +
      " to " +
      slab4DefaultAmount +
      "</td><td>" +
      slab3CalculationAmount +
      "</td><td>10%</td>\n\
    <td>" +
      slab3TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab4DefaultAmount +
      " to " +
      slab5DefaultAmount +
      "</td><td>" +
      slab4CalculationAmount +
      "</td><td>15%</td>\n\
    <td>" +
      slab4TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab5DefaultAmount +
      " to " +
      slab6DefaultAmount +
      "</td><td>" +
      slab5CalculationAmount +
      "</td><td>20%</td>\n\
    <td>" +
      slab5TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab6DefaultAmount +
      " to " +
      slab7DefaultAmount +
      "</td><td>" +
      slab6CalculationAmount +
      "</td><td>25%</td>\n\
    <td>" +
      slab6TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab7DefaultAmount +
      " & above</td><td>" +
      slab7CalculationAmount +
      "</td>\n\
    <td>30%</td><td>" +
      slab7TaxAmount +
      '</td></tr></tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
    <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
      totalTaxAmount +
      "</td>\n\
    </tr></table></div></div>" +
      superRichHtml +
      '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
    <tr><th>Tax With Surcharge</th><td>' +
      taxWithSurcharge +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Tax with Surcharge less Rebate, if any</th><td>' +
      taxWithSurcharge.toFixed(2) +
      '</td></tr>\n\
    </table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
    <th>Education Cess (' +
      educationCessPer +
      "%)</th><td>" +
      educationCess.toFixed(2) +
      '</td></tr></table></div></div>\n\
    <div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
    Total Tax Liability</th><td>' +
      totalTaxLiability.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12">\n\
    <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
    <td>' +
      monthlyTaxPayable.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
      taxIncomeRatio.toFixed(2) +
      '</td></tr>\n\
    </table></div></div></div></div><a href="javascript:void(0)" onclick="backToCalculator()" class="btn btn-success" >Back To Calculator</a>\n\
    <div class="row"><div class="col-md-12 mt-3"><h5 class="summery-heading float-left mb-2">Send Report On Your Mail</h5></div>\n\
    <div class="col-12 col-sm-12 col-lg-12 mb-0"><div class="card wight-card card-ft border-0 p-0"><div class="card-body ">\n\
    <form role="form" class="horiz-form" id="calculatorForm" name="calculatorForm"><div class="row mx-0 light-gray-bg py-3 mb-1">\n\
    <div class="col-md-6"><div class="form-group"><label>Name</label><input class="form-control" type="text" id="name" name="name" />\n\
    </div></div><div class="col-md-6"><div class="form-group"><label>Email</label><input class="form-control" type="text" id="email" name="email" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>Mobile No.</label><input class="form-control" type="text" id="mobile" name="mobile" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>City</label>\n\
    <input class="form-control" type="text" id="city" name="city" />\n\
    <input class="form-control" type="hidden" id="mAge" name="mAge"  />\n\
    \n\<input class="form-control" type="hidden" id="mAgeGroupText" name="mAgeGroupText"  />\n\
    <input class="form-control" type="hidden" id="mFinancialYear" name="mFinancialYear" />\n\
    <input class="form-control" type="hidden" id="mAssessmentYear" name="mAssessmentYear" />\n\
    <input class="form-control" type="hidden" id="mYourTaxableIncome" name="mYourTaxableIncome" />\n\
    <input class="form-control" type="hidden" id="ms1" name="ms1" />\n\
    <input class="form-control" type="hidden" id="ms11" name="ms11" />\n\
    <input class="form-control" type="hidden" id="ms2" name="ms2" />\n\
    <input class="form-control" type="hidden" id="ms22" name="ms22" />\n\
    <input class="form-control" type="hidden" id="ms3" name="ms3" />\n\
    <input class="form-control" type="hidden" id="ms33" name="ms33" />\n\
    <input class="form-control" type="hidden" id="ms4" name="ms4" />\n\
    <input class="form-control" type="hidden" id="ms44" name="ms44" />\n\
    <input class="form-control" type="hidden" id="mTotalTaxIncome" name="mTotalTaxIncome" />\n\
    <input class="form-control" type="hidden" id="mSurcharge" name="mSurcharge" />\n\
    <input class="form-control" type="hidden" id="msurcharge10" name="msurcharge10" />\n\
    <input class="form-control" type="hidden" id="mtaxWithSurchage" name="mtaxWithSurchage" />\n\
    <input class="form-control" type="hidden" id="meducationCess" name="meducationCess" />\n\
    <input class="form-control" type="hidden" id="mtotalTaxLiability" name="mtotalTaxLiability" />\n\
    <input class="form-control" type="hidden" id="eduCessPersentage" name="eduCessPersentage" />\n\
    <input class="form-control" type="hidden" id="slab1DefaultAmount" name="slab1DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab2DefaultAmount" name="slab2DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab3DefaultAmount" name="slab3DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab4DefaultAmount" name="slab4DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab5DefaultAmount" name="slab5DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab6DefaultAmount" name="slab6DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab7DefaultAmount" name="slab7DefaultAmount" />\n\
    \n\<input class="form-control" type="hidden" id="mmonthlyTaxPayable" name="mmonthlyTaxPayable" />\n\
    <input class="form-control" type="hidden" id="mtaxIncomeRatio" name="mtaxIncomeRatio" /></div></div>\n\
    <div class="col-md-12 mb-2 mt-1"><button type="button" class="btn btn-success" onclick="sendITCacluatorResult();">Send Mail</button></div></div>\n\
    </form>\n\
    </div></div></div></div></div></div></div>';

    //    $("#tab-1a").removeClass("active");
    //    $("#tab-2a").addClass("active");
    //    $("#tab-1").removeClass("active");
    //    $("#tab-2").addClass("active");
    //    $("#tab-2a")[0].click();
    $("#step2ndDiv").html(html);

    $("#mFinancialYear").val(FinancialYear);
    $("#mAssessmentYear").val(AssessmentYear);
    $("#mAge").val(ageGroupValue);
    $("#mAgeGroupText").val(ageGroupText);

    $("#mYourTaxableIncome").val(totalAmountInput);
    $("#ms1").val(slab1CalculationAmount);
    $("#ms11").val("Nill");
    $("#ms2").val(slab2CalculationAmount);
    $("#ms22").val(slab2TaxAmount);
    $("#ms3").val(slab3CalculationAmount);
    $("#ms33").val(slab3TaxAmount);
    $("#ms4").val(slab4CalculationAmount);
    $("#ms44").val(slab4TaxAmount);
    $("#ms5").val(slab5CalculationAmount);
    $("#ms55").val(slab5TaxAmount);
    $("#ms6").val(slab6CalculationAmount);
    $("#ms66").val(slab6TaxAmount);
    $("#ms7").val(slab7CalculationAmount);
    $("#ms77").val(slab7TaxAmount);
    $("#mTotalTaxIncome").val(totalTaxAmount);
    var mSurcharge = surcharge15per.toFixed(2);
    var msurcharge10 = surcharge10per.toFixed(2);
    $("#mSurcharge").val(mSurcharge);
    $("#msurcharge10").val(msurcharge10);
    var mtaxWithSurchage = taxWithSurcharge.toFixed(2);
    $("#mtaxWithSurchage").val(mtaxWithSurchage);
    var meducationCess = educationCess.toFixed(2);
    $("#meducationCess").val(meducationCess);
    var mtotalTaxLiability = totalTaxLiability.toFixed(2);
    $("#mtotalTaxLiability").val(mtotalTaxLiability);
    var mmonthlyTaxPayable = monthlyTaxPayable.toFixed(2);
    $("#mmonthlyTaxPayable").val(mmonthlyTaxPayable);
    var mtaxIncomeRatio = taxIncomeRatio.toFixed(2);
    $("#mtaxIncomeRatio").val(mtaxIncomeRatio);

    $("#eduCessPersentage").val(educationCessPer);
    $("#slab1DefaultAmount").val(slab1DefaultAmount);
    $("#slab2DefaultAmount").val(slab2DefaultAmount);
    $("#slab3DefaultAmount").val(slab3DefaultAmount);
    $("#slab4DefaultAmount").val(slab4DefaultAmount);
    $("#slab5DefaultAmount").val(slab5DefaultAmount);
    $("#slab6DefaultAmount").val(slab6DefaultAmount);
    $("#slab7DefaultAmount").val(slab7DefaultAmount);
  } else if (
    (parseInt(incomeTaxYear) == 21 ||
      parseInt(incomeTaxYear) == 22 ||
      parseInt(incomeTaxYear) == 23 ||
      parseInt(incomeTaxYear) == 24 ||
      parseInt(incomeTaxYear) == 25) &&
    parseInt(ageGroupValue) == 6
  ) {
    var ageGroupValue = $("#ageGroupValue").val();
    var ctcAmount = $("#ctcAmount").val();
    var nextIncomeTaxYear = parseInt(incomeTaxYear) + 1;
    var futureIncomeTaxYear = parseInt(nextIncomeTaxYear) + 1;
    var ageGroupText = "";
    var slab1DefaultAmount = 250000;
    // var slab2DefaultAmount = 300000;
    var slab3DefaultAmount = 500000;
    let slab4DefaultAmount = 750000;
    let slab5DefaultAmount = 1000000;
    let slab6DefaultAmount = 1250000;
    let slab7DefaultAmount = 1500000;
    var slabCss = "";
    switch (ageGroupValue) {
      case "1":
        ageGroupText = "Below 60 Year";
        break;
      case "2":
        ageGroupText = "Sr. Citizen >60 Year";
        slab1DefaultAmount = 300000;
        break;
      case "3":
        ageGroupText = "Very Sr. Citizen >80 Year";
        slab1DefaultAmount = 500000;
        slabCss = 'style="display: none"';
        break;
      default:
        ageGroupText = "Below 60 Year Default";
        break;
    }
    var totalAmountInput = $("#totalAmountInput").val();
    var slab7CalculationAmount = 0;
    var slab6CalculationAmount = 0;
    var slab5CalculationAmount = 0;
    var slab4CalculationAmount = 0;
    var slab3CalculationAmount = 0;
    var slab2CalculationAmount = 0;
    var slab1CalculationAmount = 250000;
    var slab7TaxAmount = 0;
    var slab6TaxAmount = 0;
    var slab5TaxAmount = 0;
    var slab4TaxAmount = 0;
    var slab3TaxAmount = 0;
    var slab2TaxAmount = 0;
    var slab1TaxAmount = 0;
    var slab1TaxPercentage = 5;
    var incomeTaxPer = 25;

    if (totalAmountInput > 1500000) {
      slab7CalculationAmount = totalAmountInput - 1500000;
      slab6CalculationAmount = 1250000;
      slab5CalculationAmount = 1000000;
      slab4CalculationAmount = 750000;
      slab3CalculationAmount = 500000;
      slab2CalculationAmount = slab1DefaultAmount;
      slab7TaxAmount = (slab7CalculationAmount / 100) * 30;
      slab6TaxAmount = (slab6CalculationAmount / 100) * 25;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 1250000 && totalAmountInput <= 1500000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = totalAmountInput - 1200000;
      slab5CalculationAmount = 1000000;
      slab4CalculationAmount = 750000;
      slab3CalculationAmount = 500000;
      slab2CalculationAmount = slab1DefaultAmount;
      slab6TaxAmount = (slab6CalculationAmount / 100) * 25;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 1000000 && totalAmountInput <= 1200000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = totalAmountInput - 1000000;
      slab4CalculationAmount = 750000;
      slab3CalculationAmount = 500000;
      slab2CalculationAmount = slab1DefaultAmount;
      slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 750000 && totalAmountInput <= 1000000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = totalAmountInput - 750000;
      slab3CalculationAmount = 500000;
      slab2CalculationAmount = slab1DefaultAmount;
      slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 500000 && totalAmountInput <= 750000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = 0;
      slab3CalculationAmount = totalAmountInput - 500000;
      slab2CalculationAmount = slab1DefaultAmount;
      slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput > 250000 && totalAmountInput <= 500000) {
      slab7CalculationAmount = 0;
      slab6CalculationAmount = 0;
      slab5CalculationAmount = 0;
      slab4CalculationAmount = 0;
      slab3CalculationAmount = 0;
      slab2CalculationAmount = totalAmountInput - 250000;
      slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
    } else if (totalAmountInput <= slab1DefaultAmount) {
      slab1CalculationAmount = totalAmountInput;
    }

    var totalTaxAmount =
      slab7TaxAmount +
      slab6TaxAmount +
      slab5TaxAmount +
      slab4TaxAmount +
      slab3TaxAmount +
      slab2TaxAmount +
      slab1TaxAmount;
    //Super Rich Surcharge calculation
    var surcharge15per = 0;
    var surcharge10per = 0;
    if (ctcAmount > 10000000) {
      surcharge15per = (totalTaxAmount / 100) * incomeTaxPer;
    } else if (ctcAmount < 10000000 && ctcAmount > 5000000) {
      if (incomeTaxYear > 16) {
        surcharge10per = (totalTaxAmount / 100) * 10;
      }
    }
    var superRichHtml = "";
    if (incomeTaxYear > 16) {
      superRichHtml =
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
        surcharge15per.toFixed(2) +
        "<br>" +
        surcharge10per.toFixed(2) +
        "</td></tr></table></div></div>";
    }
    // else {
    //     if (incomeTaxYear > 12) {
    //         superRichHtml = '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)</div></th><td>' + surcharge15per.toFixed(2) + '</td></tr></table></div></div>';
    //     }
    // }

    var taxWithSurcharge = totalTaxAmount + surcharge15per + surcharge10per;
    var educationCessPer = 3;
    if (
      incomeTaxYear == 18 ||
      incomeTaxYear == 19 ||
      incomeTaxYear == 20 ||
      incomeTaxYear == 21
    ) {
      var educationCessPer = 4;
    }
    var educationCess = (taxWithSurcharge / 100) * educationCessPer;
    var totalTaxLiability = taxWithSurcharge + educationCess;
    var monthlyTaxPayable = totalTaxLiability / 12;
    //var taxIncomeRatio = (totalTaxLiability / totalAmountInput) * 100;
    var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100;

    var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
    var AssessmentYear =
      "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

    var html =
      '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
    <div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
    <td>20' +
      incomeTaxYear +
      " - 20" +
      nextIncomeTaxYear +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
      nextIncomeTaxYear +
      " - 20" +
      futureIncomeTaxYear +
      '</td></tr>\n\
    </table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
    <td>' +
      ageGroupText +
      '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
    <tr><th>Your Taxable Income</th><td>' +
      totalAmountInput +
      '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
    <div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
    <table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
    <th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center"> Upto ' +
      slab1DefaultAmount +
      "</td><td>" +
      slab1CalculationAmount +
      "</td>\n\
    <td>0%</td><td>Nill</td></tr><tr " +
      slabCss +
      ' ><td class="text-center">' +
      slab1DefaultAmount +
      " to " +
      slab3DefaultAmount +
      "</td>\n\
    <td>" +
      slab2CalculationAmount +
      "</td><td>" +
      slab1TaxPercentage +
      "%</td><td>" +
      slab2TaxAmount +
      '</td></tr>\n\
    <tr><td class="text-center">' +
      slab3DefaultAmount +
      " to " +
      slab4DefaultAmount +
      "</td><td>" +
      slab3CalculationAmount +
      "</td><td>10%</td>\n\
    <td>" +
      slab3TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab4DefaultAmount +
      " to " +
      slab5DefaultAmount +
      "</td><td>" +
      slab4CalculationAmount +
      "</td><td>15%</td>\n\
    <td>" +
      slab4TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab5DefaultAmount +
      " to " +
      slab6DefaultAmount +
      "</td><td>" +
      slab5CalculationAmount +
      "</td><td>20%</td>\n\
    <td>" +
      slab5TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab6DefaultAmount +
      " to " +
      slab7DefaultAmount +
      "</td><td>" +
      slab6CalculationAmount +
      "</td><td>25%</td>\n\
    <td>" +
      slab6TaxAmount +
      '</td></tr><tr><td class="text-center">' +
      slab7DefaultAmount +
      " & above</td><td>" +
      slab7CalculationAmount +
      "</td>\n\
    <td>30%</td><td>" +
      slab7TaxAmount +
      '</td></tr></tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
    <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
      totalTaxAmount +
      "</td>\n\
    </tr></table></div></div>" +
      superRichHtml +
      '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
    <tr><th>Tax With Surcharge</th><td>' +
      taxWithSurcharge +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Tax with Surcharge less Rebate, if any</th><td>' +
      taxWithSurcharge.toFixed(2) +
      '</td></tr>\n\
    </table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
    <th>Education Cess (' +
      educationCessPer +
      "%)</th><td>" +
      educationCess.toFixed(2) +
      '</td></tr></table></div></div>\n\
    <div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
    Total Tax Liability</th><td>' +
      totalTaxLiability.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12">\n\
    <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
    <td>' +
      monthlyTaxPayable.toFixed(2) +
      '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
      taxIncomeRatio.toFixed(2) +
      '</td></tr>\n\
    </table></div></div></div></div><a href="javascript:void(0)" onclick="backToCalculator()" class="btn btn-success" >Back To Calculator</a>\n\
    <div class="row"><div class="col-md-12 mt-3"><h5 class="summery-heading float-left mb-2">Send Report On Your Mail</h5></div>\n\
    <div class="col-12 col-sm-12 col-lg-12 mb-0"><div class="card wight-card card-ft border-0 p-0"><div class="card-body ">\n\
    <form role="form" class="horiz-form" id="calculatorForm" name="calculatorForm"><div class="row mx-0 light-gray-bg py-3 mb-1">\n\
    <div class="col-md-6"><div class="form-group"><label>Name</label><input class="form-control" type="text" id="name" name="name" />\n\
    </div></div><div class="col-md-6"><div class="form-group"><label>Email</label><input class="form-control" type="text" id="email" name="email" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>Mobile No.</label><input class="form-control" type="text" id="mobile" name="mobile" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>City</label>\n\
    <input class="form-control" type="text" id="city" name="city" />\n\
    <input class="form-control" type="hidden" id="mAge" name="mAge"  />\n\
    \n\<input class="form-control" type="hidden" id="mAgeGroupText" name="mAgeGroupText"  />\n\
    <input class="form-control" type="hidden" id="mFinancialYear" name="mFinancialYear" />\n\
    <input class="form-control" type="hidden" id="mAssessmentYear" name="mAssessmentYear" />\n\
    <input class="form-control" type="hidden" id="mYourTaxableIncome" name="mYourTaxableIncome" />\n\
    <input class="form-control" type="hidden" id="ms1" name="ms1" />\n\
    <input class="form-control" type="hidden" id="ms11" name="ms11" />\n\
    <input class="form-control" type="hidden" id="ms2" name="ms2" />\n\
    <input class="form-control" type="hidden" id="ms22" name="ms22" />\n\
    <input class="form-control" type="hidden" id="ms3" name="ms3" />\n\
    <input class="form-control" type="hidden" id="ms33" name="ms33" />\n\
    <input class="form-control" type="hidden" id="ms4" name="ms4" />\n\
    <input class="form-control" type="hidden" id="ms44" name="ms44" />\n\
    <input class="form-control" type="hidden" id="mTotalTaxIncome" name="mTotalTaxIncome" />\n\
    <input class="form-control" type="hidden" id="mSurcharge" name="mSurcharge" />\n\
    <input class="form-control" type="hidden" id="msurcharge10" name="msurcharge10" />\n\
    <input class="form-control" type="hidden" id="mtaxWithSurchage" name="mtaxWithSurchage" />\n\
    <input class="form-control" type="hidden" id="meducationCess" name="meducationCess" />\n\
    <input class="form-control" type="hidden" id="mtotalTaxLiability" name="mtotalTaxLiability" />\n\
    <input class="form-control" type="hidden" id="eduCessPersentage" name="eduCessPersentage" />\n\
    <input class="form-control" type="hidden" id="slab1DefaultAmount" name="slab1DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab2DefaultAmount" name="slab2DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab3DefaultAmount" name="slab3DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab4DefaultAmount" name="slab4DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab5DefaultAmount" name="slab5DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab6DefaultAmount" name="slab6DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab7DefaultAmount" name="slab7DefaultAmount" />\n\
    \n\<input class="form-control" type="hidden" id="mmonthlyTaxPayable" name="mmonthlyTaxPayable" />\n\
    <input class="form-control" type="hidden" id="mtaxIncomeRatio" name="mtaxIncomeRatio" /></div></div>\n\
    <div class="col-md-12 mb-2 mt-1"><button type="button" class="btn btn-success" onclick="sendITCacluatorResult();">Send Mail</button></div></div>\n\
    </form>\n\
    </div></div></div></div></div></div></div>';

    //    $("#tab-1a").removeClass("active");
    //    $("#tab-2a").addClass("active");
    //    $("#tab-1").removeClass("active");
    //    $("#tab-2").addClass("active");
    //    $("#tab-2a")[0].click();
    $("#step2ndDiv").html(html);

    $("#mFinancialYear").val(FinancialYear);
    $("#mAssessmentYear").val(AssessmentYear);
    $("#mAge").val(ageGroupValue);
    $("#mAgeGroupText").val(ageGroupText);

    $("#mYourTaxableIncome").val(totalAmountInput);
    $("#ms1").val(slab1CalculationAmount);
    $("#ms11").val("Nill");
    $("#ms2").val(slab2CalculationAmount);
    $("#ms22").val(slab2TaxAmount);
    $("#ms3").val(slab3CalculationAmount);
    $("#ms33").val(slab3TaxAmount);
    $("#ms4").val(slab4CalculationAmount);
    $("#ms44").val(slab4TaxAmount);
    $("#ms5").val(slab5CalculationAmount);
    $("#ms55").val(slab5TaxAmount);
    $("#ms6").val(slab6CalculationAmount);
    $("#ms66").val(slab6TaxAmount);
    $("#ms7").val(slab7CalculationAmount);
    $("#ms77").val(slab7TaxAmount);
    $("#mTotalTaxIncome").val(totalTaxAmount);
    var mSurcharge = surcharge15per.toFixed(2);
    var msurcharge10 = surcharge10per.toFixed(2);
    $("#mSurcharge").val(mSurcharge);
    $("#msurcharge10").val(msurcharge10);
    var mtaxWithSurchage = taxWithSurcharge.toFixed(2);
    $("#mtaxWithSurchage").val(mtaxWithSurchage);
    var meducationCess = educationCess.toFixed(2);
    $("#meducationCess").val(meducationCess);
    var mtotalTaxLiability = totalTaxLiability.toFixed(2);
    $("#mtotalTaxLiability").val(mtotalTaxLiability);
    var mmonthlyTaxPayable = monthlyTaxPayable.toFixed(2);
    $("#mmonthlyTaxPayable").val(mmonthlyTaxPayable);
    var mtaxIncomeRatio = taxIncomeRatio.toFixed(2);
    $("#mtaxIncomeRatio").val(mtaxIncomeRatio);

    $("#eduCessPersentage").val(educationCessPer);
    $("#slab1DefaultAmount").val(slab1DefaultAmount);
    $("#slab2DefaultAmount").val(slab2DefaultAmount);
    $("#slab3DefaultAmount").val(slab3DefaultAmount);
    $("#slab4DefaultAmount").val(slab4DefaultAmount);
    $("#slab5DefaultAmount").val(slab5DefaultAmount);
    $("#slab6DefaultAmount").val(slab6DefaultAmount);
    $("#slab7DefaultAmount").val(slab7DefaultAmount);
  } else {
    //console.log('f year one 1234=');
    var ctcAmount = $("#ctcAmount").val();
    var nextIncomeTaxYear = parseInt(incomeTaxYear) + 1;
    var futureIncomeTaxYear = parseInt(nextIncomeTaxYear) + 1;
    var ageGroupText = "";
    var slab1DefaultAmount = 250000;
    var slab2DefaultAmount = 600000;
    var slab3DefaultAmount = 900000;
    var slabCss = "";

    var NewIncomeTaxYear = incomeTaxYear;

    if (incomeTaxYear == "23_new") {
      incomeTaxYear = "23";
    }

    if (incomeTaxYear == "24_new") {
      incomeTaxYear = "24";
    }

    if (incomeTaxYear == "25_new") {
      incomeTaxYear = "25";
    }

    switch (ageGroupValue) {
      case "1":
        ageGroupText = "Below 60 Year";
        break;
      case "2":
        ageGroupText = "Sr. Citizen >60 Year";
        slab1DefaultAmount = 200000;
        if (
          incomeTaxYear == "23" ||
          incomeTaxYear == "24" ||
          incomeTaxYear == "25"
        ) {
          slab1DefaultAmount = 300000;
        }
        //console.log('slab1DefaultAmount PPL2=',slab1DefaultAmount);
        break;
      case "3":
        ageGroupText = "Very Sr. Citizen >80 Year";
        slab1DefaultAmount = 500000;
        slabCss = 'style="display: none"';
        break;
      default:
        ageGroupText = "Below 60 Year Default";
        break;
    }
    var totalAmountInput = $("#totalAmountInput").val();
    var slab4CalculationAmount = 0;
    var slab3CalculationAmount = 0;
    var slab2CalculationAmount = 0;

    //console.log('NewIncomeTaxYear demo = ',NewIncomeTaxYear);
    //console.log('ageGroupValue demo = ',ageGroupValue);

    if (incomeTaxYear == "23_new") {
      incomeTaxYear = "23";
    }
    if (incomeTaxYear == "22_new") {
      incomeTaxYear = "22";
    }
    if (incomeTaxYear == "24_new") {
      incomeTaxYear = "24";
    }
    if (incomeTaxYear == "25_new") {
      incomeTaxYear = "25";
    }
    if (
      (incomeTaxYear == "22" ||
        incomeTaxYear == "23" ||
        parseInt(incomeTaxYear) == 24 ||
        parseInt(incomeTaxYear) == 25) &&
      ageGroupValue == "2"
    ) {
      if (totalAmountInput > 500000 && totalAmountInput <= 1000000) {
        var slab1CalculationAmount = 200000;
        if (
          incomeTaxYear == "23" ||
          incomeTaxYear == "24" ||
          incomeTaxYear == "25"
        ) {
          var slab1CalculationAmount = 300000;
        }
      } else if (totalAmountInput > 1000000 && totalAmountInput <= 10000000) {
        var slab1CalculationAmount = 200000;
        if (
          incomeTaxYear == "23" ||
          incomeTaxYear == "24" ||
          incomeTaxYear == "25"
        ) {
          var slab1CalculationAmount = 300000;
        }
      } else {
        var slab1CalculationAmount = 300000;
      }
      slab1TaxPercentage = 5;
    } else {
      var slab1CalculationAmount = 250000;
    }

    if (
      (incomeTaxYear == "22" ||
        incomeTaxYear == "23" ||
        incomeTaxPer == "24" ||
        incomeTaxPer == "25") &&
      ageGroupValue == "3"
    ) {
      var slab1CalculationAmount = 300000;

      if (
        (incomeTaxYear == "23" ||
          incomeTaxPer == "24" ||
          incomeTaxPer == "25") &&
        ageGroupValue == "3"
      ) {
        var slab1CalculationAmount = 500000;
      }
      slab1TaxPercentage = 20;
    }

    var surcharge15per = 0;
    var surcharge10per = 0;
    var taxWithSurcharge = 0;
    var educationCess = 0;
    var totalTaxLiability = 0;
    var monthlyTaxPayable = 0;
    var taxIncomeRatio = 0;

    if (NewIncomeTaxYear == "24_new" || NewIncomeTaxYear == "25_new") {
      var slab4TaxAmount = 0;
      var slab3TaxAmount = 0;
      var slab2TaxAmount = 0;
      var slab1TaxAmount = 0;
      var slab4TaxPercentage = 0;
      var slab3TaxPercentage = 0;
      var slab2TaxPercentage = 0;
      var slab1TaxPercentage = 0;
      var incomeTaxPer = 25;

      var slab7TaxAmount = 0;
      var slab6TaxAmount = 0;
      var slab5TaxAmount = 0;

      var slab3DefaultAmount = 600000;
      let slab4DefaultAmount = 900000;
      let slab5DefaultAmount = 1200000;
      let slab6DefaultAmount = 1500000;
      let slab7DefaultAmount = 1800000;

      //console.log('slab1DefaultAmount=',slab1DefaultAmount);
      //console.log('ageGroupValue=',ageGroupValue);

      switch (incomeTaxYear) {
        case "25":
        case "24":
        case "22":
        case "23":
          slab1TaxPercentage = 5;
          //            incomeTaxPer = 10;
          switch (ageGroupValue) {
            case "1":
              //slab1DefaultAmount = 200000;
              break;
            case "2":
              //slab1DefaultAmount = 300000;
              break;
            case "3":
              slab1DefaultAmount = 300000;
              break;
          }
          break;
        case "21":
        case "20":
        case "19":
        case "18":
          slab1TaxPercentage = 5;
          break;
        case "17":
          slab1TaxPercentage = 5;
          break;
        case "16":
          slab1TaxPercentage = 10;
          break;
        case "15":
          slab1TaxPercentage = 10;
          incomeTaxPer = 12;
          break;
        case "14":
          slab1TaxPercentage = 10;
          incomeTaxPer = 3;
          break;
        case "13":
          slab1TaxPercentage = 10;
          incomeTaxPer = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 200000;
              //console.log('Yes111',slab1DefaultAmount);
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
        case "12":
          slab1TaxPercentage = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 200000;
              //console.log('Yes222',slab1DefaultAmount);
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
        case "11":
          slab1TaxPercentage = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 180000;
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
      }

      if (
        (incomeTaxYear == "23" ||
          incomeTaxYear == "24" ||
          incomeTaxYear == "25") &&
        ageGroupValue == "3"
      ) {
        var slab1CalculationAmount = 300000;
      }

      //console.log('slab1DefaultAmount prav=',slab1DefaultAmount);
      if (totalAmountInput > 1500000) {
        slab7CalculationAmount = totalAmountInput - 1500000;
        slab6CalculationAmount = totalAmountInput - 1500000;
        slab5CalculationAmount = 300000;
        slab4CalculationAmount = 300000;
        slab3CalculationAmount = 300000;
        slab1CalculationAmount = 300000 + " (75000 Standard Deducation)";
        //console.log('slab7CalculationAmount 1=====',slab7CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab7TaxAmount = 0; //(slab7CalculationAmount / 100) * 30
        slab6TaxAmount = (slab6CalculationAmount / 100) * 30;
        slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
        slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput >= 1500000 && totalAmountInput <= 1800000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = totalAmountInput - 1500000;
        slab5CalculationAmount = 300000; //1000000;
        slab4CalculationAmount = 300000;
        slab3CalculationAmount = 300000;
        //console.log('totalAmountInput =====>',totalAmountInput);
        //console.log('slab6CalculationAmount 2=====',slab6CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab6TaxAmount = (slab6CalculationAmount / 100) * 30;
        slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
        slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput > 1200000 && totalAmountInput < 1500000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = 0;
        slab5CalculationAmount = totalAmountInput - 1200000;
        slab4CalculationAmount = 300000;
        slab3CalculationAmount = 300000;
        //console.log('slab3CalculationAmount 3=====',slab3CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
        slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput > 900000 && totalAmountInput <= 1200000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = 0;
        slab5CalculationAmount = 0;
        //console.log('totalAmountInput 4=====',totalAmountInput);
        slab4CalculationAmount = totalAmountInput - 900000;
        slab3CalculationAmount = 300000;
        //console.log('slab4CalculationAmount 4=====',slab4CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput > 600000 && totalAmountInput <= 900000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = 0;
        slab5CalculationAmount = 0;
        slab4CalculationAmount = 0;
        slab3CalculationAmount = totalAmountInput - 600000;
        //console.log('slab3CalculationAmount 5=====',slab3CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
        if (totalAmountInput <= 700000) {
          slab3TaxAmount = 0;
          slab2TaxAmount = 0;
        }
      } else if (totalAmountInput > 300000 && totalAmountInput <= 600000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = 0;
        slab5CalculationAmount = 0;
        slab4CalculationAmount = 0;
        slab3CalculationAmount = 0;
        slab2CalculationAmount = totalAmountInput - 300000;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput <= slab1DefaultAmount) {
        slab1CalculationAmount = totalAmountInput;
        //console.log('slab1CalculationAmount DDDDD= ',slab1CalculationAmount);
      }

      //console.log('slab4TaxAmount 1',slab4TaxAmount);
      //console.log('slab3TaxAmount 1',slab3TaxAmount);
      //console.log('slab2TaxAmount 1',slab2TaxAmount);
      //console.log('slab1TaxAmount 1',slab1TaxAmount);
      //var totalTaxAmount = slab4TaxAmount + slab3TaxAmount + slab2TaxAmount + slab1TaxAmount;
      //console.log(slab2TaxAmount,slab4TaxAmount,slab3TaxAmount,slab1TaxAmount);
      //var totalTaxAmount = slab2TaxAmount + slab4TaxAmount + slab3TaxAmount + slab1TaxAmount;
      var totalTaxAmount =
        slab7TaxAmount +
        slab6TaxAmount +
        slab5TaxAmount +
        slab4TaxAmount +
        slab3TaxAmount +
        slab2TaxAmount +
        slab1TaxAmount;
      //console.log('slab1DefaultAmount PP1 &&&&&',slab1DefaultAmount);
      //console.log('slab1DefaultAmount PP2 &&&&&',slab1CalculationAmount);

      //Super Rich Surcharge calculation
      var surcharge15per = 0;
      var surcharge10per = 0;
      var surcharge37per = 0;
      if (totalAmountInput > 50000000) {
        surcharge37per = (totalTaxAmount / 100) * 37;
      } else if (totalAmountInput > 10000000) {
        surcharge15per = (totalTaxAmount / 100) * incomeTaxPer;
      } else if (totalAmountInput < 10000000 && totalAmountInput > 5000000) {
        if (incomeTaxYear > 16) {
          surcharge10per = (totalTaxAmount / 100) * 10;
        }
      }
      var superRichHtml = "";
      if (incomeTaxYear > 16) {
        superRichHtml =
          '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(37% on Tax if Income > Rs 6 Crore)<br>(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
          surcharge37per.toFixed(2) +
          "<br>" +
          surcharge15per.toFixed(2) +
          "<br>" +
          surcharge10per.toFixed(2) +
          "</td></tr></table></div></div>";
      }

      var taxWithSurcharge =
        totalTaxAmount + surcharge15per + surcharge10per + surcharge37per;
      var educationCessPer = 3;
      if (
        incomeTaxYear == 18 ||
        incomeTaxYear == 19 ||
        incomeTaxYear == 20 ||
        incomeTaxYear == 21 ||
        incomeTaxYear == 22 ||
        incomeTaxYear == 23 ||
        incomeTaxYear == 24 ||
        incomeTaxYear == 25
      ) {
        var educationCessPer = 4;
      }
      var educationCess = (taxWithSurcharge / 100) * educationCessPer;
      var totalTaxLiability = taxWithSurcharge + educationCess;
      var monthlyTaxPayable = totalTaxLiability / 12;
      //var taxIncomeRatio = (totalTaxLiability / totalAmountInput) * 100;
      var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100;

      var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
      var AssessmentYear =
        "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

      //    else{
      //        var slab1CalculationAmount = 250000;
      //    }

      var html =
        '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
    <div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
    <td>20' +
        incomeTaxYear +
        " - 20" +
        nextIncomeTaxYear +
        '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
        nextIncomeTaxYear +
        " - 20" +
        futureIncomeTaxYear +
        '</td></tr>\n\
    </table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
    <td>' +
        ageGroupText +
        '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
    <tr><th>Your Taxable Income</th><td>' +
        totalAmountInput +
        '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
    <div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
    <table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
    <th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center"> Upto ' +
        slab1DefaultAmount +
        "</td><td>" +
        slab1CalculationAmount +
        ' </td>\n\
    <td>0%</td><td>Nill</td></tr><tr><td class="text-center">' +
        slab1DefaultAmount +
        " to " +
        slab3DefaultAmount +
        "</td>\n\
    <td>" +
        slab2CalculationAmount +
        " </td><td>" +
        slab1TaxPercentage +
        "%</td><td>" +
        slab2TaxAmount +
        '</td></tr>\n\
    <tr><td class="text-center">' +
        slab3DefaultAmount +
        " to " +
        slab4DefaultAmount +
        "</td><td>" +
        slab3CalculationAmount +
        " </td><td>10%</td>\n\
    <td>" +
        slab3TaxAmount +
        '</td></tr><tr><td class="text-center">' +
        slab4DefaultAmount +
        " to " +
        slab5DefaultAmount +
        "</td><td>" +
        slab4CalculationAmount +
        " </td><td>15%</td>\n\
    <td>" +
        slab4TaxAmount +
        '</td></tr><tr><td class="text-center">' +
        slab5DefaultAmount +
        " to " +
        slab6DefaultAmount +
        "</td><td>" +
        slab5CalculationAmount +
        " </td><td>20%</td>\n\
    <td>" +
        slab5TaxAmount +
        '</td></tr><tr><td class="text-center">' +
        slab6DefaultAmount +
        " & above </td><td>" +
        slab6CalculationAmount +
        " </td><td>30%</td>\n\
    <td>" +
        slab6TaxAmount +
        '</td></tr></tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
    <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
        totalTaxAmount +
        "</td>\n\
    </tr></table></div></div>" +
        superRichHtml +
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
    <tr><th>Tax With Surcharge</th><td>' +
        taxWithSurcharge +
        '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Tax with Surcharge less Rebate, if any</th><td>' +
        taxWithSurcharge.toFixed(2) +
        '</td></tr>\n\
    </table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
    <th>Education Cess (' +
        educationCessPer +
        "%)</th><td>" +
        educationCess.toFixed(2) +
        '</td></tr></table></div></div>\n\
    <div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
    Total Tax Liability</th><td>' +
        totalTaxLiability.toFixed(2) +
        '</td></tr></table></div></div><div class="col-md-12">\n\
    <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
    <td>' +
        monthlyTaxPayable.toFixed(2) +
        '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
    <table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
        taxIncomeRatio.toFixed(2) +
        '</td></tr>\n\
    </table></div></div></div></div><a href="javascript:void(0)" onclick="backToCalculator()" class="btn btn-success" >Back To Calculator</a>\n\
    <div class="row"><div class="col-md-12 mt-3"><h5 class="summery-heading float-left mb-2">Send Report On Your Mail</h5></div>\n\
    <div class="col-12 col-sm-12 col-lg-12 mb-0"><div class="card wight-card card-ft border-0 p-0"><div class="card-body ">\n\
    <form role="form" class="horiz-form" id="calculatorForm" name="calculatorForm"><div class="row mx-0 light-gray-bg py-3 mb-1">\n\
    <div class="col-md-6"><div class="form-group"><label>Name</label><input class="form-control" type="text" id="name" name="name" />\n\
    </div></div><div class="col-md-6"><div class="form-group"><label>Email</label><input class="form-control" type="text" id="email" name="email" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>Mobile No.</label><input class="form-control" type="text" id="mobile" name="mobile" /></div>\n\
    </div><div class="col-md-6"><div class="form-group"><label>City</label>\n\
    <input class="form-control" type="text" id="city" name="city" />\n\
    <input class="form-control" type="hidden" id="mAge" name="mAge"  />\n\
    \n\<input class="form-control" type="hidden" id="mAgeGroupText" name="mAgeGroupText"  />\n\
    <input class="form-control" type="hidden" id="mFinancialYear" name="mFinancialYear" />\n\
    <input class="form-control" type="hidden" id="mAssessmentYear" name="mAssessmentYear" />\n\
    <input class="form-control" type="hidden" id="mYourTaxableIncome" name="mYourTaxableIncome" />\n\
    <input class="form-control" type="hidden" id="ms1" name="ms1" />\n\
    <input class="form-control" type="hidden" id="ms11" name="ms11" />\n\
    <input class="form-control" type="hidden" id="ms2" name="ms2" />\n\
    <input class="form-control" type="hidden" id="ms22" name="ms22" />\n\
    <input class="form-control" type="hidden" id="ms3" name="ms3" />\n\
    <input class="form-control" type="hidden" id="ms33" name="ms33" />\n\
    <input class="form-control" type="hidden" id="ms4" name="ms4" />\n\
    <input class="form-control" type="hidden" id="ms44" name="ms44" />\n\
    <input class="form-control" type="hidden" id="mTotalTaxIncome" name="mTotalTaxIncome" />\n\
    <input class="form-control" type="hidden" id="mSurcharge" name="mSurcharge" />\n\
    <input class="form-control" type="hidden" id="msurcharge10" name="msurcharge10" />\n\
    <input class="form-control" type="hidden" id="mtaxWithSurchage" name="mtaxWithSurchage" />\n\
    <input class="form-control" type="hidden" id="meducationCess" name="meducationCess" />\n\
    <input class="form-control" type="hidden" id="mtotalTaxLiability" name="mtotalTaxLiability" />\n\
    <input class="form-control" type="hidden" id="eduCessPersentage" name="eduCessPersentage" />\n\
    <input class="form-control" type="hidden" id="slab1DefaultAmount" name="slab1DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab2DefaultAmount" name="slab2DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab3DefaultAmount" name="slab3DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab4DefaultAmount" name="slab4DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab5DefaultAmount" name="slab5DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab6DefaultAmount" name="slab6DefaultAmount" />\n\
    <input class="form-control" type="hidden" id="slab7DefaultAmount" name="slab7DefaultAmount" />\n\
    \n\<input class="form-control" type="hidden" id="mmonthlyTaxPayable" name="mmonthlyTaxPayable" />\n\
    <input class="form-control" type="hidden" id="mtaxIncomeRatio" name="mtaxIncomeRatio" /></div></div>\n\
    <div class="col-md-12 mb-2 mt-1"><button type="button" class="btn btn-success" onclick="sendITCacluatorResult();">Send Mail</button></div></div>\n\
    </form>\n\
    </div></div></div></div></div></div></div>';
    } else if (NewIncomeTaxYear == "23_new") {
      var slab4TaxAmount = 0;
      var slab3TaxAmount = 0;
      var slab2TaxAmount = 0;
      var slab1TaxAmount = 0;
      var slab4TaxPercentage = 0;
      var slab3TaxPercentage = 0;
      var slab2TaxPercentage = 0;
      var slab1TaxPercentage = 0;
      var incomeTaxPer = 15;

      var slab7TaxAmount = 0;
      var slab6TaxAmount = 0;
      var slab5TaxAmount = 0;

      var slab3DefaultAmount = 600000;
      let slab4DefaultAmount = 900000;
      let slab5DefaultAmount = 1200000;
      let slab6DefaultAmount = 1500000;
      let slab7DefaultAmount = 1800000;

      //console.log('slab1DefaultAmount=',slab1DefaultAmount);
      //console.log('ageGroupValue=',ageGroupValue);

      switch (incomeTaxYear) {
        case "25":
        case "24":
        case "22":
        case "23":
          slab1TaxPercentage = 5;
          //            incomeTaxPer = 10;
          switch (ageGroupValue) {
            case "1":
              //slab1DefaultAmount = 200000;
              break;
            case "2":
              //slab1DefaultAmount = 300000;
              break;
            case "3":
              slab1DefaultAmount = 300000;
              break;
          }
          break;
        case "21":
        case "20":
        case "19":
        case "18":
          slab1TaxPercentage = 5;
          break;
        case "17":
          slab1TaxPercentage = 5;
          break;
        case "16":
          slab1TaxPercentage = 10;
          break;
        case "15":
          slab1TaxPercentage = 10;
          incomeTaxPer = 12;
          break;
        case "14":
          slab1TaxPercentage = 10;
          incomeTaxPer = 3;
          break;
        case "13":
          slab1TaxPercentage = 10;
          incomeTaxPer = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 200000;
              //console.log('Yes111',slab1DefaultAmount);
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
        case "12":
          slab1TaxPercentage = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 200000;
              //console.log('Yes222',slab1DefaultAmount);
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
        case "11":
          slab1TaxPercentage = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 180000;
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
      }

      if (incomeTaxYear == "23" && ageGroupValue == "3") {
        var slab1CalculationAmount = 300000;
      }

      if (incomeTaxYear == "24" && ageGroupValue == "3") {
        var slab1CalculationAmount = 300000;
      }
      if (incomeTaxYear == "25" && ageGroupValue == "3") {
        var slab1CalculationAmount = 300000;
      }

      //console.log('slab1DefaultAmount prav=',slab1DefaultAmount);
      if (totalAmountInput > 1500000) {
        slab7CalculationAmount = totalAmountInput - 1500000;
        slab6CalculationAmount = totalAmountInput - 1500000;
        slab5CalculationAmount = 300000;
        slab4CalculationAmount = 300000;
        slab3CalculationAmount = 300000;
        slab1CalculationAmount = 250000 + " (50000 Standard Deducation)";
        //console.log('slab7CalculationAmount 1=====',slab7CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab7TaxAmount = 0; //(slab7CalculationAmount / 100) * 30
        slab6TaxAmount = (slab6CalculationAmount / 100) * 30;
        slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
        slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput >= 1500000 && totalAmountInput <= 1800000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = totalAmountInput - 1500000;
        slab5CalculationAmount = 300000; //1000000;
        slab4CalculationAmount = 300000;
        slab3CalculationAmount = 300000;
        //console.log('totalAmountInput =====>',totalAmountInput);
        //console.log('slab6CalculationAmount 2=====',slab6CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab6TaxAmount = (slab6CalculationAmount / 100) * 30;
        slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
        slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput > 1200000 && totalAmountInput < 1500000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = 0;
        slab5CalculationAmount = totalAmountInput - 1200000;
        slab4CalculationAmount = 300000;
        slab3CalculationAmount = 300000;
        //console.log('slab3CalculationAmount 3=====',slab3CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab5TaxAmount = (slab5CalculationAmount / 100) * 20;
        slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput > 900000 && totalAmountInput <= 1200000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = 0;
        slab5CalculationAmount = 0;
        //console.log('totalAmountInput 4=====',totalAmountInput);
        slab4CalculationAmount = totalAmountInput - 900000;
        slab3CalculationAmount = 300000;
        //console.log('slab4CalculationAmount 4=====',slab4CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab4TaxAmount = (slab4CalculationAmount / 100) * 15;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput > 600000 && totalAmountInput <= 900000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = 0;
        slab5CalculationAmount = 0;
        slab4CalculationAmount = 0;
        slab3CalculationAmount = totalAmountInput - 600000;
        //console.log('slab3CalculationAmount 5=====',slab3CalculationAmount);
        slab2CalculationAmount = slab1DefaultAmount;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 10;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
        if (totalAmountInput <= 700000) {
          slab3TaxAmount = 0;
          slab2TaxAmount = 0;
        }
      } else if (totalAmountInput > 300000 && totalAmountInput <= 600000) {
        slab7CalculationAmount = 0;
        slab6CalculationAmount = 0;
        slab5CalculationAmount = 0;
        slab4CalculationAmount = 0;
        slab3CalculationAmount = 0;
        slab2CalculationAmount = totalAmountInput - 300000;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput <= slab1DefaultAmount) {
        slab1CalculationAmount = totalAmountInput;
        //console.log('slab1CalculationAmount DDDDD= ',slab1CalculationAmount);
      }

      //console.log('slab4TaxAmount 1',slab4TaxAmount);
      //console.log('slab3TaxAmount 1',slab3TaxAmount);
      //console.log('slab2TaxAmount 1',slab2TaxAmount);
      //console.log('slab1TaxAmount 1',slab1TaxAmount);
      //var totalTaxAmount = slab4TaxAmount + slab3TaxAmount + slab2TaxAmount + slab1TaxAmount;
      //console.log(slab2TaxAmount,slab4TaxAmount,slab3TaxAmount,slab1TaxAmount);
      //var totalTaxAmount = slab2TaxAmount + slab4TaxAmount + slab3TaxAmount + slab1TaxAmount;
      var totalTaxAmount =
        slab7TaxAmount +
        slab6TaxAmount +
        slab5TaxAmount +
        slab4TaxAmount +
        slab3TaxAmount +
        slab2TaxAmount +
        slab1TaxAmount;
      //console.log('slab1DefaultAmount PP1 &&&&&',slab1DefaultAmount);
      //console.log('slab1DefaultAmount PP2 &&&&&',slab1CalculationAmount);

      //Super Rich Surcharge calculation
      var surcharge15per = 0;
      var surcharge10per = 0;
      if (totalAmountInput > 10000000) {
        surcharge15per = (totalTaxAmount / 100) * incomeTaxPer;
      } else if (totalAmountInput < 10000000 && totalAmountInput > 5000000) {
        if (incomeTaxYear > 16) {
          surcharge10per = (totalTaxAmount / 100) * 10;
        }
      }
      var superRichHtml = "";
      if (incomeTaxYear > 16) {
        superRichHtml =
          '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
          surcharge15per.toFixed(2) +
          "<br>" +
          surcharge10per.toFixed(2) +
          "</td></tr></table></div></div>";
      } else {
        if (incomeTaxYear > 12) {
          superRichHtml =
            '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)</div></th><td>' +
            surcharge15per.toFixed(2) +
            "</td></tr></table></div></div>";
        }
      }

      var taxWithSurcharge = totalTaxAmount + surcharge15per + surcharge10per;
      var educationCessPer = 3;
      if (
        incomeTaxYear == 18 ||
        incomeTaxYear == 19 ||
        incomeTaxYear == 20 ||
        incomeTaxYear == 21 ||
        incomeTaxYear == 22 ||
        incomeTaxYear == 23
      ) {
        var educationCessPer = 4;
      }
      var educationCess = (taxWithSurcharge / 100) * educationCessPer;
      var totalTaxLiability = taxWithSurcharge + educationCess;
      var monthlyTaxPayable = totalTaxLiability / 12;
      //var taxIncomeRatio = (totalTaxLiability / totalAmountInput) * 100;
      var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100;

      var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
      var AssessmentYear =
        "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

      //    else{
      //        var slab1CalculationAmount = 250000;
      //    }

      var html =
        '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
        <div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
        <td>20' +
        incomeTaxYear +
        " - 20" +
        nextIncomeTaxYear +
        '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
        <table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
        nextIncomeTaxYear +
        " - 20" +
        futureIncomeTaxYear +
        '</td></tr>\n\
        </table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
        <td>' +
        ageGroupText +
        '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
        <tr><th>Your Taxable Income</th><td>' +
        totalAmountInput +
        '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
        <div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
        <table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
        <th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center"> Upto ' +
        slab1DefaultAmount +
        "</td><td>" +
        slab1CalculationAmount +
        ' </td>\n\
        <td>0%</td><td>Nill</td></tr><tr><td class="text-center">' +
        slab1DefaultAmount +
        " to " +
        slab3DefaultAmount +
        "</td>\n\
        <td>" +
        slab2CalculationAmount +
        " </td><td>" +
        slab1TaxPercentage +
        "%</td><td>" +
        slab2TaxAmount +
        '</td></tr>\n\
        <tr><td class="text-center">' +
        slab3DefaultAmount +
        " to " +
        slab4DefaultAmount +
        "</td><td>" +
        slab3CalculationAmount +
        " </td><td>10%</td>\n\
        <td>" +
        slab3TaxAmount +
        '</td></tr><tr><td class="text-center">' +
        slab4DefaultAmount +
        " to " +
        slab5DefaultAmount +
        "</td><td>" +
        slab4CalculationAmount +
        " </td><td>15%</td>\n\
        <td>" +
        slab4TaxAmount +
        '</td></tr><tr><td class="text-center">' +
        slab5DefaultAmount +
        " to " +
        slab6DefaultAmount +
        "</td><td>" +
        slab5CalculationAmount +
        " </td><td>20%</td>\n\
        <td>" +
        slab5TaxAmount +
        '</td></tr><tr><td class="text-center">' +
        slab6DefaultAmount +
        " & above </td><td>" +
        slab6CalculationAmount +
        " </td><td>30%</td>\n\
        <td>" +
        slab6TaxAmount +
        '</td></tr></tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
        <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
        totalTaxAmount +
        "</td>\n\
        </tr></table></div></div>" +
        superRichHtml +
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
        <tr><th>Tax With Surcharge</th><td>' +
        taxWithSurcharge +
        '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
        <table class="incom-summery table table-bordered"><tr><th>Tax with Surcharge less Rebate, if any</th><td>' +
        taxWithSurcharge.toFixed(2) +
        '</td></tr>\n\
        </table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
        <th>Education Cess (' +
        educationCessPer +
        "%)</th><td>" +
        educationCess.toFixed(2) +
        '</td></tr></table></div></div>\n\
        <div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
        Total Tax Liability</th><td>' +
        totalTaxLiability.toFixed(2) +
        '</td></tr></table></div></div><div class="col-md-12">\n\
        <div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
        <td>' +
        monthlyTaxPayable.toFixed(2) +
        '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
        <table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
        taxIncomeRatio.toFixed(2) +
        '</td></tr>\n\
        </table></div></div></div></div><a href="javascript:void(0)" onclick="backToCalculator()" class="btn btn-success" >Back To Calculator</a>\n\
        <div class="row"><div class="col-md-12 mt-3"><h5 class="summery-heading float-left mb-2">Send Report On Your Mail</h5></div>\n\
        <div class="col-12 col-sm-12 col-lg-12 mb-0"><div class="card wight-card card-ft border-0 p-0"><div class="card-body ">\n\
        <form role="form" class="horiz-form" id="calculatorForm" name="calculatorForm"><div class="row mx-0 light-gray-bg py-3 mb-1">\n\
        <div class="col-md-6"><div class="form-group"><label>Name</label><input class="form-control" type="text" id="name" name="name" />\n\
        </div></div><div class="col-md-6"><div class="form-group"><label>Email</label><input class="form-control" type="text" id="email" name="email" /></div>\n\
        </div><div class="col-md-6"><div class="form-group"><label>Mobile No.</label><input class="form-control" type="text" id="mobile" name="mobile" /></div>\n\
        </div><div class="col-md-6"><div class="form-group"><label>City</label>\n\
        <input class="form-control" type="text" id="city" name="city" />\n\
        <input class="form-control" type="hidden" id="mAge" name="mAge"  />\n\
        \n\<input class="form-control" type="hidden" id="mAgeGroupText" name="mAgeGroupText"  />\n\
        <input class="form-control" type="hidden" id="mFinancialYear" name="mFinancialYear" />\n\
        <input class="form-control" type="hidden" id="mAssessmentYear" name="mAssessmentYear" />\n\
        <input class="form-control" type="hidden" id="mYourTaxableIncome" name="mYourTaxableIncome" />\n\
        <input class="form-control" type="hidden" id="ms1" name="ms1" />\n\
        <input class="form-control" type="hidden" id="ms11" name="ms11" />\n\
        <input class="form-control" type="hidden" id="ms2" name="ms2" />\n\
        <input class="form-control" type="hidden" id="ms22" name="ms22" />\n\
        <input class="form-control" type="hidden" id="ms3" name="ms3" />\n\
        <input class="form-control" type="hidden" id="ms33" name="ms33" />\n\
        <input class="form-control" type="hidden" id="ms4" name="ms4" />\n\
        <input class="form-control" type="hidden" id="ms44" name="ms44" />\n\
        <input class="form-control" type="hidden" id="mTotalTaxIncome" name="mTotalTaxIncome" />\n\
        <input class="form-control" type="hidden" id="mSurcharge" name="mSurcharge" />\n\
        <input class="form-control" type="hidden" id="msurcharge10" name="msurcharge10" />\n\
        <input class="form-control" type="hidden" id="mtaxWithSurchage" name="mtaxWithSurchage" />\n\
        <input class="form-control" type="hidden" id="meducationCess" name="meducationCess" />\n\
        <input class="form-control" type="hidden" id="mtotalTaxLiability" name="mtotalTaxLiability" />\n\
        <input class="form-control" type="hidden" id="eduCessPersentage" name="eduCessPersentage" />\n\
        <input class="form-control" type="hidden" id="slab1DefaultAmount" name="slab1DefaultAmount" />\n\
        <input class="form-control" type="hidden" id="slab2DefaultAmount" name="slab2DefaultAmount" />\n\
        <input class="form-control" type="hidden" id="slab3DefaultAmount" name="slab3DefaultAmount" />\n\
        <input class="form-control" type="hidden" id="slab4DefaultAmount" name="slab4DefaultAmount" />\n\
        <input class="form-control" type="hidden" id="slab5DefaultAmount" name="slab5DefaultAmount" />\n\
        <input class="form-control" type="hidden" id="slab6DefaultAmount" name="slab6DefaultAmount" />\n\
        <input class="form-control" type="hidden" id="slab7DefaultAmount" name="slab7DefaultAmount" />\n\
        \n\<input class="form-control" type="hidden" id="mmonthlyTaxPayable" name="mmonthlyTaxPayable" />\n\
        <input class="form-control" type="hidden" id="mtaxIncomeRatio" name="mtaxIncomeRatio" /></div></div>\n\
        <div class="col-md-12 mb-2 mt-1"><button type="button" class="btn btn-success" onclick="sendITCacluatorResult();">Send Mail</button></div></div>\n\
        </form>\n\
        </div></div></div></div></div></div></div>';
    } else if (
      (incomeTaxYear == "23" ||
        incomeTaxYear == "24" ||
        incomeTaxYear == "25") &&
      (ageGroupValue == "2" || ageGroupValue == "1")
    ) {
      var slab2DefaultAmount = 500000;
      var slab3DefaultAmount = 1000000;

      if (incomeTaxYear == "23" && ageGroupValue == "3") {
        //var slab2DefaultAmount = 500000;
      }

      var slab4TaxAmount = 0;
      var slab3TaxAmount = 0;
      var slab2TaxAmount = 0;
      var slab1TaxAmount = 0;
      var slab4TaxPercentage = 0;
      var slab3TaxPercentage = 0;
      var slab2TaxPercentage = 0;
      var slab1TaxPercentage = 0;
      var incomeTaxPer = 25;

      switch (incomeTaxYear) {
        case "25":
        case "24":
        case "22":
        case "23":
        //            slab1TaxPercentage = 10;
        //            incomeTaxPer = 10;
        //            switch (ageGroupValue) {
        //                case "1":
        //                    slab1DefaultAmount = 200000;
        //                    break;
        //                case "2":
        //                    slab1DefaultAmount = 300000;
        //                    break;
        //                case "3":
        //                    slab1DefaultAmount = 500000;
        //                    break;
        //            }
        //            break;
        case "21":
        case "20":
        case "19":
        case "18":
          slab1TaxPercentage = 5;
          break;
        case "17":
          slab1TaxPercentage = 5;
          break;
        case "16":
          slab1TaxPercentage = 10;
          break;
        case "15":
          slab1TaxPercentage = 10;
          incomeTaxPer = 12;
          break;
        case "14":
          slab1TaxPercentage = 10;
          incomeTaxPer = 3;
          break;
        case "13":
          slab1TaxPercentage = 10;
          incomeTaxPer = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 200000;
              //console.log('Yes111',slab1DefaultAmount);
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
        case "12":
          slab1TaxPercentage = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 200000;
              //console.log('Yes222',slab1DefaultAmount);
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
        case "11":
          slab1TaxPercentage = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 180000;
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
      }

      if (totalAmountInput > 1000000) {
        slab4CalculationAmount = totalAmountInput - 1000000; //1100000
        slab3CalculationAmount = 500000;

        slab2CalculationAmount = slab1DefaultAmount;
        if (totalAmountInput > 1000000) {
          slab2CalculationAmount = 300000;

          if (
            (incomeTaxYear == "23" ||
              incomeTaxYear == "24" ||
              incomeTaxYear == "25") &&
            ageGroupValue == "2"
          ) {
            slab2CalculationAmount = 200000;
          }

          if (
            (incomeTaxYear == "23" ||
              incomeTaxYear == "24" ||
              incomeTaxYear == "25") &&
            ageGroupValue == "1"
          ) {
            slab2CalculationAmount = 250000;
          }
        }
        //console.log('slab2CalculationAmount pppp=',slab2CalculationAmount);
        slab4TaxAmount = (slab4CalculationAmount / 100) * 30;
        slab3TaxAmount = (slab3CalculationAmount / 100) * 20;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput > 500000 && totalAmountInput <= 1000000) {
        slab4CalculationAmount = 0;
        slab3CalculationAmount = totalAmountInput - 500000;
        slab2CalculationAmount = slab1DefaultAmount;
        //console.log('slab2CalculationAmount 2=',slab2CalculationAmount);
        //console.log('slab1TaxPercentage 2=',slab1TaxPercentage);
        slab3TaxAmount = (slab3CalculationAmount / 100) * 20;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
        //console.log('slab2TaxAmount 2=',slab2TaxAmount);
        if (
          (incomeTaxYear == "22" ||
            incomeTaxYear == "23" ||
            incomeTaxYear == "24" ||
            incomeTaxYear == "25") &&
          ageGroupValue == "2"
        ) {
          var slab2CalculationAmount = slab2DefaultAmount - slab1DefaultAmount;
          slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
        }
        if (
          (incomeTaxYear == "22" ||
            incomeTaxYear == "23" ||
            incomeTaxYear == "24" ||
            incomeTaxYear == "25") &&
          ageGroupValue == "3"
        ) {
          var slab2CalculationAmount = slab2DefaultAmount - slab1DefaultAmount;
          slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
        }
      } else if (
        totalAmountInput > slab1DefaultAmount &&
        totalAmountInput <= 500000
      ) {
        slab4CalculationAmount = 0;
        slab3CalculationAmount = 0;
        //console.log('totalAmountInput 3=',totalAmountInput);
        //console.log('slab1DefaultAmount 3=',slab1DefaultAmount);

        slab2CalculationAmount = totalAmountInput - slab1DefaultAmount;
        //console.log('slab2CalculationAmount 3=',slab2CalculationAmount);
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput <= slab1DefaultAmount) {
        //        console.log('slab1CalculationAmount=',slab1CalculationAmount);
        //        console.log('totalAmountInput=',totalAmountInput);
        //console.log('slab1DefaultAmount#########=',slab1DefaultAmount);
        slab1CalculationAmount = totalAmountInput;
      }

      //console.log('slab4TaxAmount 1',slab4TaxAmount);
      //console.log('slab3TaxAmount 1',slab3TaxAmount);
      //console.log('slab2TaxAmount 1',slab2TaxAmount);
      //console.log('slab1TaxAmount 1',slab1TaxAmount);
      //var totalTaxAmount = slab4TaxAmount + slab3TaxAmount + slab2TaxAmount + slab1TaxAmount;
      console.log(
        slab2TaxAmount,
        slab4TaxAmount,
        slab3TaxAmount,
        slab1TaxAmount,
      );
      var totalTaxAmount =
        slab2TaxAmount + slab4TaxAmount + slab3TaxAmount + slab1TaxAmount;
      //console.log('slab1DefaultAmount PP1 &&&&&',slab1DefaultAmount);
      //console.log('slab1DefaultAmount PP2 &&&&&',slab1CalculationAmount);

      //Super Rich Surcharge calculation
      var surcharge15per = 0;
      var surcharge10per = 0;
      var surcharge37per = 0;
      if (totalAmountInput > 50000000) {
        surcharge37per = (totalTaxAmount / 100) * 37;
      } else if (totalAmountInput > 10000000) {
        surcharge15per = (totalTaxAmount / 100) * incomeTaxPer;
      } else if (totalAmountInput < 10000000 && totalAmountInput > 5000000) {
        if (incomeTaxYear > 16) {
          surcharge10per = (totalTaxAmount / 100) * 10;
        }
      }
      var superRichHtml = "";
      if (incomeTaxYear > 16) {
        superRichHtml =
          '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(37% on Tax if Income > Rs 6 Crore)<br>(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
          surcharge37per.toFixed(2) +
          "<br>" +
          surcharge15per.toFixed(2) +
          "<br>" +
          surcharge10per.toFixed(2) +
          "</td></tr></table></div></div>";
      } else {
        if (incomeTaxYear > 12) {
          superRichHtml =
            '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)</div></th><td>' +
            surcharge15per.toFixed(2) +
            "</td></tr></table></div></div>";
        }
      }
      var taxWithSurcharge =
        totalTaxAmount + surcharge15per + surcharge10per + surcharge37per;
      var educationCessPer = 3;
      if (
        incomeTaxYear == 18 ||
        incomeTaxYear == 19 ||
        incomeTaxYear == 20 ||
        incomeTaxYear == 21 ||
        incomeTaxYear == 22 ||
        incomeTaxYear == 23 ||
        incomeTaxYear == 24 ||
        incomeTaxYear == 25
      ) {
        var educationCessPer = 4;
      }
      var educationCess = (taxWithSurcharge / 100) * educationCessPer;
      var totalTaxLiability = taxWithSurcharge + educationCess;
      var monthlyTaxPayable = totalTaxLiability / 12;
      //var taxIncomeRatio = (totalTaxLiability / totalAmountInput) * 100;
      var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100;

      var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
      var AssessmentYear =
        "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

      //    else{
      //        var slab1CalculationAmount = 250000;
      //    }

      var html =
        '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
<div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
<td>20' +
        incomeTaxYear +
        " - 20" +
        nextIncomeTaxYear +
        '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
        nextIncomeTaxYear +
        " - 20" +
        futureIncomeTaxYear +
        '</td></tr>\n\
</table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
<td>' +
        ageGroupText +
        '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
<tr><th>Your Taxable Income</th><td>' +
        totalAmountInput +
        '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
<div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
<table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
<th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center">Upto ' +
        slab1DefaultAmount +
        "</td><td>" +
        slab1CalculationAmount +
        ' </td>\n\
<td>0%</td><td>Nill</td></tr><tr><td class="text-center">' +
        slab1DefaultAmount +
        " to " +
        slab2DefaultAmount +
        "</td>\n\
<td>" +
        slab2CalculationAmount +
        " </td><td>" +
        slab1TaxPercentage +
        "% </td><td>" +
        slab2TaxAmount +
        '</td></tr><tr>\n\
<td class="text-center">' +
        slab2DefaultAmount +
        " to " +
        slab3DefaultAmount +
        "</td><td>" +
        slab3CalculationAmount +
        "  </td><td>20%</td>\n\
<td>" +
        slab3TaxAmount +
        '</td></tr><tr><td class="text-center">' +
        slab3DefaultAmount +
        " & above</td><td>" +
        slab4CalculationAmount +
        " </td>\n\
<td>30%</td><td>" +
        slab4TaxAmount +
        '</td></tr></tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
<div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
        totalTaxAmount +
        "</td>\n\
</tr></table></div></div>" +
        superRichHtml +
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
<tr><th>Tax With Surcharge</th><td>' +
        taxWithSurcharge +
        '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Tax with Surcharge less Rebate, if any</th><td>' +
        taxWithSurcharge.toFixed(2) +
        '</td></tr>\n\
</table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
<th>Education Cess (' +
        educationCessPer +
        "%)</th><td>" +
        educationCess.toFixed(2) +
        '</td></tr></table></div></div>\n\
<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
Total Tax Liability</th><td>' +
        totalTaxLiability.toFixed(2) +
        '</td></tr></table></div></div><div class="col-md-12">\n\
<div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
<td>' +
        monthlyTaxPayable.toFixed(2) +
        '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
        taxIncomeRatio.toFixed(2) +
        '</td></tr>\n\
</table></div></div></div></div><a href="javascript:void(0)" onclick="backToCalculator()" class="btn btn-success" >Back To Calculator</a>\n\
<div class="row"><div class="col-md-12 mt-3"><h5 class="summery-heading float-left mb-2">Send Report On Your Mail</h5></div>\n\
<div class="col-12 col-sm-12 col-lg-12 mb-0"><div class="card wight-card card-ft border-0 p-0"><div class="card-body ">\n\
<form role="form" class="horiz-form" id="calculatorForm" name="calculatorForm"><div class="row mx-0 light-gray-bg py-3 mb-1">\n\
<div class="col-md-6"><div class="form-group"><label>Name</label><input class="form-control" type="text" id="name" name="name" />\n\
</div></div><div class="col-md-6"><div class="form-group"><label>Email</label><input class="form-control" type="text" id="email" name="email" /></div>\n\
</div><div class="col-md-6"><div class="form-group"><label>Mobile No.</label><input class="form-control" type="text" id="mobile" name="mobile" /></div>\n\
</div><div class="col-md-6"><div class="form-group"><label>City</label>\n\
<input class="form-control" type="text" id="city" name="city" />\n\
<input class="form-control" type="hidden" id="mAge" name="mAge"  />\n\
\n\<input class="form-control" type="hidden" id="mAgeGroupText" name="mAgeGroupText"  />\n\
<input class="form-control" type="hidden" id="mFinancialYear" name="mFinancialYear" />\n\
<input class="form-control" type="hidden" id="mAssessmentYear" name="mAssessmentYear" />\n\
<input class="form-control" type="hidden" id="mYourTaxableIncome" name="mYourTaxableIncome" />\n\
<input class="form-control" type="hidden" id="ms1" name="ms1" />\n\
<input class="form-control" type="hidden" id="ms11" name="ms11" />\n\
<input class="form-control" type="hidden" id="ms2" name="ms2" />\n\
<input class="form-control" type="hidden" id="ms22" name="ms22" />\n\
<input class="form-control" type="hidden" id="ms3" name="ms3" />\n\
<input class="form-control" type="hidden" id="ms33" name="ms33" />\n\
<input class="form-control" type="hidden" id="ms4" name="ms4" />\n\
<input class="form-control" type="hidden" id="ms44" name="ms44" />\n\
<input class="form-control" type="hidden" id="mTotalTaxIncome" name="mTotalTaxIncome" />\n\
<input class="form-control" type="hidden" id="mSurcharge" name="mSurcharge" />\n\
<input class="form-control" type="hidden" id="msurcharge10" name="msurcharge10" />\n\
<input class="form-control" type="hidden" id="mtaxWithSurchage" name="mtaxWithSurchage" />\n\
<input class="form-control" type="hidden" id="meducationCess" name="meducationCess" />\n\
<input class="form-control" type="hidden" id="mtotalTaxLiability" name="mtotalTaxLiability" />\n\
<input class="form-control" type="hidden" id="eduCessPersentage" name="eduCessPersentage" />\n\
<input class="form-control" type="hidden" id="slab1DefaultAmount" name="slab1DefaultAmount" />\n\
<input class="form-control" type="hidden" id="slab2DefaultAmount" name="slab2DefaultAmount" />\n\
<input class="form-control" type="hidden" id="slab3DefaultAmount" name="slab3DefaultAmount" />\n\
\n\<input class="form-control" type="hidden" id="mmonthlyTaxPayable" name="mmonthlyTaxPayable" />\n\
<input class="form-control" type="hidden" id="mtaxIncomeRatio" name="mtaxIncomeRatio" /></div></div>\n\
<div class="col-md-12 mb-2 mt-1"><button type="button" class="btn btn-success" onclick="sendITCacluatorResult();">Send Mail</button></div></div>\n\
</form>\n\
</div></div></div></div></div></div></div>';
    } else if (
      (incomeTaxYear == "23" ||
        incomeTaxYear == "24" ||
        incomeTaxYear == "25") &&
      ageGroupValue == "3"
    ) {
      var slab2DefaultAmount = 1000000;
      var slab3DefaultAmount = 1000000;

      if (incomeTaxYear == "23" && ageGroupValue == "3") {
        //var slab2DefaultAmount = 500000;
      }

      var slab4TaxAmount = 0;
      var slab3TaxAmount = 0;
      var slab2TaxAmount = 0;
      var slab1TaxAmount = 0;
      var slab4TaxPercentage = 0;
      var slab3TaxPercentage = 0;
      var slab2TaxPercentage = 0;
      var slab1TaxPercentage = 0;
      var incomeTaxPer = 25;

      switch (incomeTaxYear) {
        case "25":
        case "24":
        case "22":
        case "23":
        //            slab1TaxPercentage = 10;
        //            incomeTaxPer = 10;
        //            switch (ageGroupValue) {
        //                case "1":
        //                    slab1DefaultAmount = 200000;
        //                    break;
        //                case "2":
        //                    slab1DefaultAmount = 300000;
        //                    break;
        //                case "3":
        //                    slab1DefaultAmount = 500000;
        //                    break;
        //            }
        //            break;
        case "21":
        case "20":
        case "19":
        case "18":
          slab1TaxPercentage = 5;
          break;
        case "17":
          slab1TaxPercentage = 5;
          break;
        case "16":
          slab1TaxPercentage = 10;
          break;
        case "15":
          slab1TaxPercentage = 10;
          incomeTaxPer = 12;
          break;
        case "14":
          slab1TaxPercentage = 10;
          incomeTaxPer = 3;
          break;
        case "13":
          slab1TaxPercentage = 10;
          incomeTaxPer = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 200000;
              //console.log('Yes111',slab1DefaultAmount);
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
        case "12":
          slab1TaxPercentage = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 200000;
              //console.log('Yes222',slab1DefaultAmount);
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
        case "11":
          slab1TaxPercentage = 10;
          switch (ageGroupValue) {
            case "1":
              slab1DefaultAmount = 180000;
              break;
            case "2":
              slab1DefaultAmount = 250000;
              break;
            case "3":
              slab1DefaultAmount = 500000;
              break;
          }
          break;
      }

      //console.log('slab1TaxPercentage New =',slab1TaxPercentage);
      slab1TaxPercentage = 20;

      if (totalAmountInput > 1000000) {
        slab4CalculationAmount = totalAmountInput - 1000000; //1100000
        slab3CalculationAmount = 500000;

        slab2CalculationAmount = slab1DefaultAmount;
        if (totalAmountInput > 1000000) {
          slab2CalculationAmount = 500000;

          if (
            (incomeTaxYear == "23" ||
              incomeTaxYear == "24" ||
              incomeTaxYear == "25") &&
            ageGroupValue == "2"
          ) {
            slab2CalculationAmount = 200000;
          }

          if (
            (incomeTaxYear == "23" ||
              incomeTaxYear == "24" ||
              incomeTaxYear == "25") &&
            ageGroupValue == "1"
          ) {
            slab2CalculationAmount = 250000;
          }
        }
        //console.log('slab2CalculationAmount pppp=',slab2CalculationAmount);
        slab4TaxAmount = (slab4CalculationAmount / 100) * 30;
        slab3TaxAmount = 0; //(slab3CalculationAmount / 100) * 20;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput > 500000 && totalAmountInput <= 1000000) {
        slab4CalculationAmount = 0;
        slab3CalculationAmount = totalAmountInput - 500000;
        slab2CalculationAmount = slab1DefaultAmount;
        //console.log('slab2CalculationAmount 2=',slab2CalculationAmount);
        //console.log('slab1TaxPercentage 2=',slab1TaxPercentage);
        slab3TaxAmount = 0; //(slab3CalculationAmount / 100) * 20;
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
        //console.log('slab2TaxAmount 2=',slab2TaxAmount);
        if (
          (incomeTaxYear == "22" ||
            incomeTaxYear == "23" ||
            incomeTaxYear == "24" ||
            incomeTaxYear == "25") &&
          ageGroupValue == "2"
        ) {
          var slab2CalculationAmount = slab2DefaultAmount - slab1DefaultAmount;
          slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
        }
        if (
          (incomeTaxYear == "22" ||
            incomeTaxYear == "23" ||
            incomeTaxYear == "24" ||
            incomeTaxYear == "25") &&
          ageGroupValue == "3"
        ) {
          var slab2CalculationAmount = totalAmountInput - 500000; //slab2DefaultAmount-slab1DefaultAmount;
          slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
        }
      } else if (
        totalAmountInput > slab1DefaultAmount &&
        totalAmountInput <= 500000
      ) {
        slab4CalculationAmount = 0;
        slab3CalculationAmount = 0;
        //console.log('totalAmountInput 3=',totalAmountInput);
        //console.log('slab1DefaultAmount 3=',slab1DefaultAmount);

        slab2CalculationAmount = totalAmountInput - slab1DefaultAmount;
        //console.log('slab2CalculationAmount 3=',slab2CalculationAmount);
        slab2TaxAmount = (slab2CalculationAmount / 100) * slab1TaxPercentage;
      } else if (totalAmountInput <= slab1DefaultAmount) {
        //        console.log('slab1CalculationAmount=',slab1CalculationAmount);
        //        console.log('totalAmountInput=',totalAmountInput);
        //console.log('slab1DefaultAmount#########=',slab1DefaultAmount);
        slab1CalculationAmount = totalAmountInput;
      }

      //console.log('slab4TaxAmount 1',slab4TaxAmount);
      //console.log('slab3TaxAmount 1',slab3TaxAmount);
      //console.log('slab2TaxAmount 1',slab2TaxAmount);
      //console.log('slab1TaxAmount 1',slab1TaxAmount);
      //var totalTaxAmount = slab4TaxAmount + slab3TaxAmount + slab2TaxAmount + slab1TaxAmount;
      //console.log(slab2TaxAmount,slab4TaxAmount,slab3TaxAmount,slab1TaxAmount);
      var totalTaxAmount =
        slab2TaxAmount + slab4TaxAmount + slab3TaxAmount + slab1TaxAmount;
      //console.log('slab1DefaultAmount PP1 &&&&&',slab1DefaultAmount);
      //console.log('slab1DefaultAmount PP2 &&&&&',slab1CalculationAmount);

      //Super Rich Surcharge calculation
      var surcharge15per = 0;
      var surcharge10per = 0;
      var surcharge37per = 0;
      if (totalAmountInput > 50000000) {
        surcharge37per = (totalTaxAmount / 100) * 37;
      } else if (totalAmountInput > 10000000) {
        surcharge15per = (totalTaxAmount / 100) * incomeTaxPer;
      } else if (totalAmountInput < 10000000 && totalAmountInput > 5000000) {
        if (incomeTaxYear > 16) {
          surcharge10per = (totalTaxAmount / 100) * 10;
        }
      }
      var superRichHtml = "";
      if (incomeTaxYear > 16) {
        superRichHtml =
          '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(37% on Tax if Income > Rs 6 Crore)<br>(15% on Tax if Income > Rs 1 Crore)<br>(10% on Tax if Income > Rs 50 lakhs < Rs 1 Crore)</div></th><td>' +
          surcharge37per.toFixed(2) +
          "<br>" +
          surcharge15per.toFixed(2) +
          "<br>" +
          surcharge10per.toFixed(2) +
          "</td></tr></table></div></div>";
      } else {
        if (incomeTaxYear > 12) {
          superRichHtml =
            '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th class="width-300">Super Rich Surcharge<div class="f-10">(15% on Tax if Income > Rs 1 Crore)</div></th><td>' +
            surcharge15per.toFixed(2) +
            "</td></tr></table></div></div>";
        }
      }

      var taxWithSurcharge =
        totalTaxAmount + surcharge15per + surcharge10per + surcharge37per;
      var educationCessPer = 3;
      if (
        incomeTaxYear == 18 ||
        incomeTaxYear == 19 ||
        incomeTaxYear == 20 ||
        incomeTaxYear == 21 ||
        incomeTaxYear == 22 ||
        incomeTaxYear == 23 ||
        incomeTaxYear == 24 ||
        incomeTaxYear == 25
      ) {
        var educationCessPer = 4;
      }
      var educationCess = (taxWithSurcharge / 100) * educationCessPer;
      var totalTaxLiability = taxWithSurcharge + educationCess;
      var monthlyTaxPayable = totalTaxLiability / 12;
      //var taxIncomeRatio = (totalTaxLiability / totalAmountInput) * 100;
      var taxIncomeRatio = (totalTaxLiability / ctcAmount) * 100;

      var FinancialYear = "20" + incomeTaxYear + " - 20" + nextIncomeTaxYear;
      var AssessmentYear =
        "20" + nextIncomeTaxYear + " - 20" + futureIncomeTaxYear;

      //    else{
      //        var slab1CalculationAmount = 250000;
      //    }

      var html =
        '<div class="row"><div class="col-md-8 mb-0"><div class="card wight-card card-ft border-0 py-0"><div class="card-body">\n\
<div class="row mb-3"><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Financial Year</th>\n\
<td>20' +
        incomeTaxYear +
        " - 20" +
        nextIncomeTaxYear +
        '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Assessment Year</th><td>20' +
        nextIncomeTaxYear +
        " - 20" +
        futureIncomeTaxYear +
        '</td></tr>\n\
</table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Age Group</th>\n\
<td>' +
        ageGroupText +
        '</td></tr></table></div></div><div class="col-md-6"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
<tr><th>Your Taxable Income</th><td>' +
        totalAmountInput +
        '</td></tr></table></div></div></div><div class="row"><div class="col-md-12">\n\
<div class="step-box  float-left">Your Tax Slab </div></div><div class="col-md-12 mt-2"><div class="table-responsive">\n\
<table class="table table-striped table-align-boder" cellspacing="0" width="100%"><thead><tr><th>Tax Slab </th><th>Slab Income</th><th>Tax Rate</th>\n\
<th>Tax Amount</th></tr></thead><tbody><tr><td class="text-center">Upto ' +
        slab1DefaultAmount +
        "</td><td>" +
        slab1CalculationAmount +
        ' </td>\n\
<td>0%</td><td>Nill</td></tr><tr><td class="text-center">' +
        slab1DefaultAmount +
        " to " +
        slab2DefaultAmount +
        "</td>\n\
<td>" +
        slab2CalculationAmount +
        " </td><td>" +
        slab1TaxPercentage +
        "% </td><td>" +
        slab2TaxAmount +
        '</td></tr>\n\
<tr><td class="text-center">' +
        slab3DefaultAmount +
        " & above</td><td>" +
        slab4CalculationAmount +
        "  </td>\n\
<td>30%</td><td>" +
        slab4TaxAmount +
        '</td></tr></tbody></table></div></div></div><div class="row mt-3"><div class="col-md-12">\n\
<div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Tax On Income</th><td>' +
        totalTaxAmount +
        "</td>\n\
</tr></table></div></div>" +
        superRichHtml +
        '<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered">\n\
<tr><th>Tax With Surcharge</th><td>' +
        taxWithSurcharge +
        '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Tax with Surcharge less Rebate, if any</th><td>' +
        taxWithSurcharge.toFixed(2) +
        '</td></tr>\n\
</table></div></div><div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr>\n\
<th>Education Cess (' +
        educationCessPer +
        "%)</th><td>" +
        educationCess.toFixed(2) +
        '</td></tr></table></div></div>\n\
<div class="col-md-12"><div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>\n\
Total Tax Liability</th><td>' +
        totalTaxLiability.toFixed(2) +
        '</td></tr></table></div></div><div class="col-md-12">\n\
<div class="table-responsive"><table class="incom-summery table table-bordered"><tr><th>Monthly Tax Payable Rs.</th>\n\
<td>' +
        monthlyTaxPayable.toFixed(2) +
        '</td></tr></table></div></div><div class="col-md-12"><div class="table-responsive">\n\
<table class="incom-summery table table-bordered"><tr><th>Tax/Income Ratio (in%)</th><td>' +
        taxIncomeRatio.toFixed(2) +
        '</td></tr>\n\
</table></div></div></div></div><a href="javascript:void(0)" onclick="backToCalculator()" class="btn btn-success" >Back To Calculator</a>\n\
<div class="row"><div class="col-md-12 mt-3"><h5 class="summery-heading float-left mb-2">Send Report On Your Mail</h5></div>\n\
<div class="col-12 col-sm-12 col-lg-12 mb-0"><div class="card wight-card card-ft border-0 p-0"><div class="card-body ">\n\
<form role="form" class="horiz-form" id="calculatorForm" name="calculatorForm"><div class="row mx-0 light-gray-bg py-3 mb-1">\n\
<div class="col-md-6"><div class="form-group"><label>Name</label><input class="form-control" type="text" id="name" name="name" />\n\
</div></div><div class="col-md-6"><div class="form-group"><label>Email</label><input class="form-control" type="text" id="email" name="email" /></div>\n\
</div><div class="col-md-6"><div class="form-group"><label>Mobile No.</label><input class="form-control" type="text" id="mobile" name="mobile" /></div>\n\
</div><div class="col-md-6"><div class="form-group"><label>City</label>\n\
<input class="form-control" type="text" id="city" name="city" />\n\
<input class="form-control" type="hidden" id="mAge" name="mAge"  />\n\
\n\<input class="form-control" type="hidden" id="mAgeGroupText" name="mAgeGroupText"  />\n\
<input class="form-control" type="hidden" id="mFinancialYear" name="mFinancialYear" />\n\
<input class="form-control" type="hidden" id="mAssessmentYear" name="mAssessmentYear" />\n\
<input class="form-control" type="hidden" id="mYourTaxableIncome" name="mYourTaxableIncome" />\n\
<input class="form-control" type="hidden" id="ms1" name="ms1" />\n\
<input class="form-control" type="hidden" id="ms11" name="ms11" />\n\
<input class="form-control" type="hidden" id="ms2" name="ms2" />\n\
<input class="form-control" type="hidden" id="ms22" name="ms22" />\n\
<input class="form-control" type="hidden" id="ms3" name="ms3" />\n\
<input class="form-control" type="hidden" id="ms33" name="ms33" />\n\
<input class="form-control" type="hidden" id="ms4" name="ms4" />\n\
<input class="form-control" type="hidden" id="ms44" name="ms44" />\n\
<input class="form-control" type="hidden" id="mTotalTaxIncome" name="mTotalTaxIncome" />\n\
<input class="form-control" type="hidden" id="mSurcharge" name="mSurcharge" />\n\
<input class="form-control" type="hidden" id="msurcharge10" name="msurcharge10" />\n\
<input class="form-control" type="hidden" id="mtaxWithSurchage" name="mtaxWithSurchage" />\n\
<input class="form-control" type="hidden" id="meducationCess" name="meducationCess" />\n\
<input class="form-control" type="hidden" id="mtotalTaxLiability" name="mtotalTaxLiability" />\n\
<input class="form-control" type="hidden" id="eduCessPersentage" name="eduCessPersentage" />\n\
<input class="form-control" type="hidden" id="slab1DefaultAmount" name="slab1DefaultAmount" />\n\
<input class="form-control" type="hidden" id="slab2DefaultAmount" name="slab2DefaultAmount" />\n\
<input class="form-control" type="hidden" id="slab3DefaultAmount" name="slab3DefaultAmount" />\n\
\n\<input class="form-control" type="hidden" id="mmonthlyTaxPayable" name="mmonthlyTaxPayable" />\n\
<input class="form-control" type="hidden" id="mtaxIncomeRatio" name="mtaxIncomeRatio" /></div></div>\n\
<div class="col-md-12 mb-2 mt-1"><button type="button" class="btn btn-success" onclick="sendITCacluatorResult();">Send Mail</button></div></div>\n\
</form>\n\
</div></div></div></div></div></div></div>';
    }

    //    $("#tab-1a").removeClass("active");
    //    $("#tab-2a").addClass("active");
    //    $("#tab-1").removeClass("active");
    //    $("#tab-2").addClass("active");
    $("#step2ndDiv").html(html);

    $("#mFinancialYear").val(FinancialYear);
    $("#mAssessmentYear").val(AssessmentYear);
    $("#mAge").val(ageGroupValue);
    $("#mAgeGroupText").val(ageGroupText);

    $("#mYourTaxableIncome").val(totalAmountInput);
    $("#ms1").val(slab1CalculationAmount);
    $("#ms11").val("Nill");
    $("#ms2").val(slab2CalculationAmount);
    $("#ms22").val(slab2TaxAmount);
    $("#ms3").val(slab3CalculationAmount);
    $("#ms33").val(slab3TaxAmount);
    $("#ms4").val(slab4CalculationAmount);
    $("#ms44").val(slab4TaxAmount);
    $("#mTotalTaxIncome").val(totalTaxAmount);
    var mSurcharge = surcharge15per.toFixed(2);
    var msurcharge10 = surcharge10per.toFixed(2);
    $("#mSurcharge").val(mSurcharge);
    $("#msurcharge10").val(msurcharge10);
    var mtaxWithSurchage = taxWithSurcharge.toFixed(2);
    $("#mtaxWithSurchage").val(mtaxWithSurchage);
    var meducationCess = educationCess.toFixed(2);
    $("#meducationCess").val(meducationCess);
    var mtotalTaxLiability = totalTaxLiability.toFixed(2);
    $("#mtotalTaxLiability").val(mtotalTaxLiability);
    var mmonthlyTaxPayable = monthlyTaxPayable.toFixed(2);
    $("#mmonthlyTaxPayable").val(mmonthlyTaxPayable);
    var mtaxIncomeRatio = taxIncomeRatio.toFixed(2);
    $("#mtaxIncomeRatio").val(mtaxIncomeRatio);

    $("#eduCessPersentage").val(educationCessPer);
    $("#slab1DefaultAmount").val(slab1DefaultAmount);
    $("#slab2DefaultAmount").val(slab2DefaultAmount);
    $("#slab3DefaultAmount").val(slab3DefaultAmount);
  }
  $("#tab-2a")[0].click();
}

function deductionInformationFunction() {
  $("#ageGroupValue").val(""); // dropdown reset
  $("#ctcAmount").val(""); // input reset

  var selectYear = $("#incomeTaxYear").val();
  var checkDeduction = "TRUE";
  if (selectYear == "22_new") {
    selectYear = "22";
    var checkDeduction = "FALSE";
  }
  if (selectYear == "23_new") {
    selectYear = "23";
    var checkDeduction = "FALSE";
  }

  if (
    selectYear == "24_new" ||
    selectYear == "24" ||
    selectYear == "25_new" ||
    selectYear == "25"
  ) {
    var checkDeduction = "FALSE";
  }

  var ageGroupValue = $("#ageGroupValue option:selected").val();

  $.post("incometaxfile.php", {
    selectYear: selectYear,
    ageGroupValue: ageGroupValue,
    checkDeduction: checkDeduction
  }, function (res) {
    $("#deductionInformationDiv").html(res);
  });


  selectYear != "21" || ageGroupValue != "1"
    ? $("#newamount80tta_div").hide()
    : $("#newamount80tta_div").show();
  var standardDeductionsAmount = "40,000";
  if (
    selectYear == "19" ||
    selectYear == "20" ||
    selectYear == "21" ||
    selectYear == "22" ||
    selectYear == "23" ||
    selectYear == "24" ||
    selectYear == "25"
  ) {
    standardDeductionsAmount = "50,000";
    // if (ageGroupValue == '1') {
    //     ddbAmount = "40,000";
    // }
    // var taxBenifitsAmount = "2";
  } else if (selectYear == "24_new" || selectYear == "25_new") {
    standardDeductionsAmount = "75,000";
  }
  var standardDeductionsMsg =
    "Standard Deductions : " + standardDeductionsAmount;
  $("#standardDeductionsId").attr("placeholder", standardDeductionsMsg);
}

function changeAgeGroup() {
  var selectYear = $("#incomeTaxYear").val();
  $("#ctcAmount").val("");
  var checkDeduction = "TRUE";
  if (selectYear == "22_new") {
    selectYear = "22";
    var checkDeduction = "FALSE";
  }
  if (selectYear == "23_new") {
    selectYear = "23";
    var checkDeduction = "FALSE";
  }

  if (selectYear == "24_new" || selectYear == "25_new") {
    var checkDeduction = "FALSE";
  }

  var ageGroupValue = $("#ageGroupValue option:selected").val();

  $.post("incometaxfile.php", {
    selectYear: selectYear,
    ageGroupValue: ageGroupValue,
    checkDeduction: checkDeduction
  }, function (res) {
    $("#deductionInformationDiv").html(res);
  });

  //console.log('selectYear='+selectYear);
  //console.log('ageGroupValue='+ageGroupValue);

  $("#deductionsusID").show();
  if (
    (selectYear == "22" ||
      selectYear == "23" ||
      selectYear == "24" ||
      selectYear == "24_new" ||
      selectYear == "25" ||
      selectYear == "25_new") &&
    ageGroupValue == "1"
  ) {
    //console.log('aa gaya');
    $("#deductionsusID").hide();
  }

  var ageGroupValue = $("#ageGroupValue option:selected").val();
  var standardDeductionsAmount = "40,000";
  var ddbAmount = "10,0000";
  var taxBenifitsAmount = "2.5";

  if (
    selectYear == "19" ||
    selectYear == "20" ||
    selectYear == "21" ||
    selectYear == "22" ||
    selectYear == "23" ||
    selectYear == "24" ||
    selectYear == "25"
  ) {
    //console.log
    standardDeductionsAmount = "50,000";
    if (ageGroupValue == "1") {
      ddbAmount = "40,000";
    }
    var taxBenifitsAmount = "2";
  } else if (selectYear == "24_new" || selectYear == "25_new") {
    standardDeductionsAmount = "75,000";
  }

  if (
    (selectYear == "22" ||
      selectYear == "23" ||
      selectYear == "24" ||
      selectYear == "25") &&
    ageGroupValue == "1"
  ) {
    $("#newamount80tta_div").show();
  } else {
    selectYear != "21" || ageGroupValue != "1"
      ? $("#newamount80tta_div").hide()
      : $("#newamount80tta_div").show();
  }

  var standardDeductionsMsg =
    "Standard Deductions : " + standardDeductionsAmount;
  var taxDeductionsAmountMsg = "Deductions u/s 80DDB Up to- " + ddbAmount;
  var taxBenifitsAmountMsg =
    "Interest Paid On Home Loan (Max 1.5 L / " + taxBenifitsAmount + " L)";
  $("#standardDeductionsId").attr("placeholder", standardDeductionsMsg);
  $("#taxDeductionsAmount").attr("placeholder", taxDeductionsAmountMsg);
  $("#taxBenifitsAmount").attr("placeholder", taxBenifitsAmountMsg);
}

function calculateTaxableIncome() {
  var incomeTaxYear = $("#incomeTaxYear").val();
  var ageGroupValue = $("#ageGroupValue").val();
  var ctcAmount = $("#ctcAmount").val();
  if (incomeTaxYear == '') {
    showNotificationMessage("error", "Please select income tax year");
    return false;
  }
  if (ageGroupValue == '') {
    showNotificationMessage("error", "Please select age group");
    return false;
  }
  //console.log(ctcAmount);
  if (ctcAmount == '') {
    showNotificationMessage("error", "Please inter gross amount");
    return false;
  }

  //    var hraMedicalTaxAmount = $("#hraMedicalTaxAmount").val();
  //    var amount80c = $("#amount80c").val();
  //    var amount80ccg = $("#amount80ccg").val();
  //    var amount80ccd = $("#amount80ccd").val();
  //    var amount80d = $("#amount80d").val();
  //    var amount80tta = $("#amount80tta").val();
  //    var amount80g = $("#amount80g").val();
  //    var amount80e = $("#amount80e").val();
  //    var newamount80tta = $("#newamount80tta").val();
  //    var taxBenifitsAmount = $("#taxBenifitsAmount").val();

  var hraMedicalTaxAmount = parseFloat($("#hraMedicalTaxAmount").val()) || 0;
  var amount80c = parseFloat($("#amount80c").val()) || 0;
  var amount80ccg = parseFloat($("#amount80ccg").val()) || 0;
  var amount80ccd = parseFloat($("#amount80ccd").val()) || 0;
  var amount80d = parseFloat($("#amount80d").val()) || 0;
  var amount80tta = parseFloat($("#amount80tta").val()) || 0;
  var amount80g = parseFloat($("#amount80g").val()) || 0;
  var amount80e = parseFloat($("#amount80e").val()) || 0;
  var newamount80tta = parseFloat($("#newamount80tta").val()) || 0;
  var taxBenifitsAmount = parseFloat($("#taxBenifitsAmount").val()) || 0;



  if (hraMedicalTaxAmount > ctcAmount) {
    showNotificationMessage("error", "Deduction Amount Greater Than Gross Income");
    return false;
  }

  if (hraMedicalTaxAmount != '' && ctcAmount > hraMedicalTaxAmount) {
    ctcAmount = ctcAmount - hraMedicalTaxAmount;
    //console.log('ctcAmount 1=',ctcAmount);
  }
  if (amount80c != '' && ctcAmount > amount80c) {
    if (amount80c > 150000) {
      showNotificationMessage("error", "80C Amount deduction of Maximum Rs.150000");
      amount80c = 150000;
      $("#amount80c").val(amount80c);
    }
    ctcAmount = ctcAmount - amount80c;
    //console.log('ctcAmount 2=',ctcAmount);
  }

  if (amount80ccg != '' && ctcAmount > amount80ccg) {
    if (amount80ccg > 50000) {
      showNotificationMessage("error", "80CCG Amount deduction of Maximum Rs.50000");
      amount80ccg = 50000;
      $("#amount80ccg").val(amount80ccg);
    }
    ctcAmount = ctcAmount - (amount80ccg / 2);
    //console.log('ctcAmount 3=',ctcAmount);
  }

  if (amount80ccd != '' && ctcAmount > amount80ccd) {
    if (amount80ccd > 50000) {
      showNotificationMessage("error", "80CCD Amount deduction of Maximum Rs.50000");
      amount80ccd = 50000;
      $("#amount80ccd").val(amount80ccd);
    }
    ctcAmount = ctcAmount - amount80ccd;
    //console.log('ctcAmount 4=',ctcAmount);
  }

  if (newamount80tta != '' && ctcAmount > newamount80tta) {
    if (newamount80tta > 10000) {
      showNotificationMessage("error", "80tta recive only Rs.10000");
      newamount80tta = 10000;
      $("#newamount80tta").val(newamount80tta);
    }
    ctcAmount = ctcAmount - newamount80tta;
    //console.log('ctcAmount 5=',ctcAmount);
  }

  if (incomeTaxYear == '22_new' && ageGroupValue != '1') {
    incomeTaxYear = '22';
  }

  if (incomeTaxYear == '23_new' && (ageGroupValue == '1' || ageGroupValue == '2' || ageGroupValue == '3')) {
    incomeTaxYear = '23';
  }

  if (incomeTaxYear == '24_new' && (ageGroupValue == '1' || ageGroupValue == '2' || ageGroupValue == '3')) {
    incomeTaxYear = '24_new';
  } else if (incomeTaxYear == '24' && (ageGroupValue == '1' || ageGroupValue == '2' || ageGroupValue == '3')) {
    incomeTaxYear = '24';
  }

  if (amount80d != '' && ctcAmount > amount80d) {
    if (incomeTaxYear == "19" || incomeTaxYear == "20" || incomeTaxYear == "21" || incomeTaxYear == "22" || incomeTaxYear == "23" || incomeTaxYear == "24" || incomeTaxYear == "24_new") {
      var amount80dMaxAmount = "50000";
      if (ageGroupValue == 1) {
        var amount80dMaxAmount = "25000";
      }
      if (amount80d > amount80dMaxAmount) {
        showNotificationMessage("error", "80D Amount deduction of Maximum Rs." + amount80dMaxAmount);
        amount80d = amount80dMaxAmount;
        $("#amount80d").val(amount80d);
      }
    } else {
      if (amount80d > 35000) {
        showNotificationMessage("error", "80D Amount deduction of Maximum Rs.35000");
        amount80d = 35000;
        $("#amount80d").val(amount80d);
      }
    }
    ctcAmount = ctcAmount - amount80d;
    //console.log('ctcAmount 6=',ctcAmount);
  }

  //console.log('incomeTaxYear=',incomeTaxYear);
  //console.log('ageGroupValue=',ageGroupValue);

  if (incomeTaxYear == '18' || incomeTaxYear == '19' || incomeTaxYear == '20' || incomeTaxYear == '21' || incomeTaxYear == '22' || incomeTaxYear == '23' || incomeTaxYear == '24' || incomeTaxYear == "24_new") {

    if (incomeTaxYear == '22') {
      if (ageGroupValue != 2 && ageGroupValue != 3) {
        $("#taxDeductionsAmount").prop("disabled", true);
        $("#amount80tta").prop("disabled", true);
        $("#taxDeductionsAmount").val('');
        $("#amount80tta").val('');
      } else {
        $("#taxDeductionsAmount").prop("disabled", false);
        $("#amount80tta").prop("disabled", false);
      }
    } else if (incomeTaxYear == '23') {
      if (ageGroupValue != 2 && ageGroupValue != 3) {
        $("#taxDeductionsAmount").prop("disabled", true);
        $("#amount80tta").prop("disabled", true);
        $("#taxDeductionsAmount").val('');
        $("#amount80tta").val('');
      } else {
        $("#taxDeductionsAmount").prop("disabled", false);
        $("#amount80tta").prop("disabled", false);
      }
    } else if (incomeTaxYear == '24' || incomeTaxYear == "24_new") {
      if (ageGroupValue != 2 && ageGroupValue != 3) {
        $("#taxDeductionsAmount").prop("disabled", true);
        $("#amount80tta").prop("disabled", true);
        $("#taxDeductionsAmount").val('');
        $("#amount80tta").val('');
      } else {
        $("#taxDeductionsAmount").prop("disabled", false);
        $("#amount80tta").prop("disabled", false);
      }
    } else {
      if (ageGroupValue != 2) {
        $("#taxDeductionsAmount").prop("disabled", true);
        $("#amount80tta").prop("disabled", true);
        $("#taxDeductionsAmount").val('');
        $("#amount80tta").val('');
      } else {
        $("#taxDeductionsAmount").prop("disabled", false);
        $("#amount80tta").prop("disabled", false);
      }
    }


  }


  if (amount80tta != '' && ctcAmount > amount80tta) { //console.log('amount80tta',amount80tta);
    var amount80ttaMaxAmount = 10000;
    if (incomeTaxYear == "19" || incomeTaxYear == "20" || incomeTaxYear == "21" || incomeTaxYear == "22" || incomeTaxYear == "23" || incomeTaxYear == "24" || incomeTaxYear == "24_new") {
      var amount80ttaMaxAmount = 50000;
    }
    if (amount80tta > amount80ttaMaxAmount) {
      if (ageGroupValue != 1) {
        showNotificationMessage("error", "80TTB Amount deduction of Maximum Rs." + amount80ttaMaxAmount);
      }
      amount80tta = amount80ttaMaxAmount;
      $("#amount80tta").val(amount80tta);
    }
    ctcAmount = ctcAmount - amount80tta;
    //console.log('ctcAmount 7=',ctcAmount);
  }

  if (amount80g != '' && ctcAmount > amount80g) {
    ctcAmount = ctcAmount - amount80g;
    //console.log('ctcAmount 8=',ctcAmount);
  }
  if (amount80e != '' && ctcAmount > amount80e) {  //console.log('amount80e',amount80e);
    ctcAmount = ctcAmount - amount80e;
    //console.log('ctcAmount 9=',ctcAmount);
  }

  if (taxBenifitsAmount != '') {
    if (taxBenifitsAmount > 200000) {
      showNotificationMessage("error", "Tax Benifits Amount deduction of Maximum Rs.200000");
      taxBenifitsAmount = 200000;
      $("#taxBenifitsAmount").val(taxBenifitsAmount);
    }

    if (ctcAmount > taxBenifitsAmount) {
      ctcAmount = ctcAmount - taxBenifitsAmount;
      //console.log('ctcAmount 10=',ctcAmount);
    }
  }

  //console.log('incomeTaxYear 1##=',incomeTaxYear);
  if (incomeTaxYear == '18' || incomeTaxYear == '19' || incomeTaxYear == '20' || incomeTaxYear == '21' || incomeTaxYear == '22' || incomeTaxYear == '23' || incomeTaxYear == '24' || incomeTaxYear == "24_new") {
    var standartDeduction = 50000;
    var taxDeductionsAmountMaximum = 100000;
    if (incomeTaxYear == '18') {
      standartDeduction = 40000;
    }
    if (incomeTaxYear == '19' || incomeTaxYear == '20') {
      if (ageGroupValue == 1) {
        var taxDeductionsAmountMaximum = 40000;
      }
    }

    if (incomeTaxYear == '24_new') {
      standartDeduction = 75000;
    }

    if (ageGroupValue == 2) {
      var taxDeductionsAmount = $("#taxDeductionsAmount").val();
      if (taxDeductionsAmount > taxDeductionsAmountMaximum) {
        showNotificationMessage("error", "Deductions u/s 80DDB of Maximum Rs." + taxDeductionsAmountMaximum);
        taxDeductionsAmount = taxDeductionsAmountMaximum;
        $("#taxDeductionsAmount").val(taxDeductionsAmountMaximum);
        //ctcAmount = ctcAmount - standartDeduction-taxDeductionsAmount;
      }
      //console.log(ctcAmount,standartDeduction,taxDeductionsAmount);
      ctcAmount = ctcAmount - standartDeduction - taxDeductionsAmount;
      //console.log('ctcAmount 11=',ctcAmount);
    } else {
      ctcAmount = ctcAmount - standartDeduction;
      //console.log('ctcAmount 12=',ctcAmount);
    }
  }

  $("#totalAmountSpan").html(ctcAmount);
  $("#totalAmountInput").val(ctcAmount);
}