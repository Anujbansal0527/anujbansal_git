<?php echo $endOfUrl === "income-tax-calculator" ? '<div>' : ''; ?>
<?php echo $endOfUrl === "income-tax-calculator" ? '<h4 class="step-box float-left fw-500 mb-3">Deduction Information</h4>' : '<div class="step-box  float-left">Deduction Information</div>'; ?>
<div class="light-gray-bg w-100 float-left<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ' mt-2 p-4 mb-2'; ?>">
    <div class="row">
        <?php
        $standardDeductionsAmount = "40,000";
        $ddbAmount = "10,0000";
        $taxBenifitMsg = "Interest Paid On Home Loan (Max 1.5 L / 2.5 L)";
        if ($selectYear == "19" || $selectYear == "20" || $selectYear == "21" || $selectYear == "22") {
            $standardDeductionsAmount = "50,000";
            $taxBenifitMsg = "Interest Paid On Home Loan (Max 1.5 L / 2 L)";
            if ($ageGroupValue == '1') {
                $ddbAmount = "40,000";
            }
        }
        ?>
        <?php if ($divHraMedicalTax) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ''; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">HRA, Medical, Convenyance & Professional Tax</label>
                    <input type="text" class="form-control" placeholder="U/S 10 A & Professional Tax" id="hraMedicalTaxAmount" name="hraMedicalTaxAmount" value="" onblur="calculateTaxableIncome()"  onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        <?php if ($div80c) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ''; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Deduction under 80C</label>
                    <input type="text" class="form-control" placeholder="ELSS, Life Insurance, NPS, PF, PPF etc" id="amount80c" name="amount80c" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        <?php if ($div80ccg) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ''; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Deduction under Section 80CCG</label>
                    <input type="text" class="form-control" placeholder="RGESS, deduction 50% of Max 50000" id="amount80ccg" name="amount80ccg" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        <?php if ($div80ccd) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ''; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Deduction under Section 80CCD</label>
                    <input type="text" class="form-control" placeholder="NPS (National Pension System)" id="amount80ccd" name="amount80ccd" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        <?php if ($div80d) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ''; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Deduction under Section 80 D <span class="hint-question" href="#" data-toggle="modal" data-target="#modal" data-placement="top" title="" data-original-title="Hint Text....">?</span> </label>
                    <input type="text" class="form-control" placeholder="Health Insurance Premium (Self, Parents)" id="amount80d" name="amount80d" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        <?php if ($div80tta) { ?>
            <div class="col-md-6" id="deductionsusID">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ''; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Deduction u/s 80 TTB</label>
                    <input type="text" class="form-control" placeholder="Interest Received on Savings Bank A/C" id="amount80tta" name="amount80tta" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        <?php if ($div80g) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ''; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Deductions u/s 80 G (Donations)</label>
                    <input type="text" class="form-control" placeholder="Maximum of 10% of the gross total income" id="amount80g" name="amount80g" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        <?php if ($div80e) { ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Deductions u/s 80 E</label>
                    <input type="text" class="form-control" placeholder="Interest Paid on Education Loan" id="amount80e" name="amount80e" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        <?php if ($divTaxBenifits) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ' mb-0'; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Tax Benefit u/s 24</label>
                    <input type="text" class="form-control" placeholder="<?php echo $taxBenifitMsg;?>" id="taxBenifitsAmount" name="taxBenifitsAmount" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>
        
        <?php if ($deductions80DDB) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ' mb-0'; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Deductions u/s 80DDB</label>
                    <input type="text" class="form-control" placeholder="Deductions u/s 80DDB Up to- <?php echo $ddbAmount;?>" id="taxDeductionsAmount" name="taxDeductionsAmount" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" />
                </div>
            </div>
        <?php } ?>

        <?php if ($newamount80tta) { ?>
            <div class="col-md-6" id="newamount80tta_div">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ' mb-0'; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Savings u/s 80 TTA<span class="hint-question" href="#" data-toggle="modal" data-target="#newmodal" data-placement="top" title="" data-original-title="Hint Text....">?</span> </label>
                    <input type="text" class="form-control" placeholder="Interest Received on Savings Bank A/C" id="newamount80tta" name="newamount80tta" value="" max="5" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome() "/>
                </div>
            </div>
        <?php } ?>
        
        <?php if ($StandardDeductions) { ?>
            <div class="col-md-6">
                <div class="form-group<?php echo $endOfUrl === "income-tax-calculator" ? ' mb-3' : ' mb-0'; ?>">
                    <label class="<?php echo $endOfUrl === "income-tax-calculator" ? 'form-label' : ''; ?>">Standard Deductions</label>
                    <input type="text" class="form-control" placeholder="Standard Deductions : <?php echo $standardDeductionsAmount?>" id="standardDeductionsId" name="standardDeductionsId" value="" onblur="calculateTaxableIncome()" onkeypress="calculateTaxableIncome()" disabled="" />
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php echo $endOfUrl === "income-tax-calculator" ? '<div class="row">' : ''; ?>
<div class="<?php echo $endOfUrl === "income-tax-calculator" ? 'col-auto mb-3' : 'w-100 float-left mb-2 px-4  p-2 light-gray-bg'; ?>">
    <h5 class="summery-heading float-left my-1 f-18">Taxable Income - <span class="text-success" id="totalAmountSpan" >0.00</span></h5>
    <input type="hidden" id="totalAmountInput" name="totalAmountInput" value="" >
</div>
<div class="<?php echo $endOfUrl === "income-tax-calculator" ? 'col-auto mb-3' : 'w-100 float-left mb-2'; ?>">
    <div class="form-group mb-0 clearfix">
        <button type="button" class="btn btn-success mt-1" onclick="calculateResult()">Submit</button>
    </div>
</div>
<?php echo $endOfUrl === "income-tax-calculator" ? '</div>' : ''; ?>

<?php echo $endOfUrl === "income-tax-calculator" ? '</div>' : ''; ?>



<div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title f-18" id="modalHeading">Note</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-1">
                <div class="card wight-card card-ft border-0 py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="f-14">For individuals less than 65 years of age, amount of health insurance premium paid or Rs. 15,000, whichever is lesser. For senior citizens above 65 years, amount of health insurance premium paid or Rs. 35,000, whichever is lesser.</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-success mb-3" data-dismiss="modal">OK</button>
<!--                                <button type="button" class="close" data-dismiss="modal">×</button>-->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newmodal">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title f-18" id="modalHeading">Note</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-1">
                <div class="card wight-card card-ft border-0 py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="f-14">Upto Rs.10,000/- on interest on deposits(not being time deposits) in a saving account.</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-success mb-3" data-dismiss="modal">OK</button>
<!--                                <button type="button" class="close" data-dismiss="modal">×</button>-->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


