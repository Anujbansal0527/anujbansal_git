<div class="<?php echo $endOfUrl === "income-tax-calculator" ? 'col-auto mb-3' : 'w-100 float-left mb-2 px-4  p-2 light-gray-bg'; ?>">
    <h5 class="summery-heading float-left my-1 f-18">Taxable Income - <span class="text-success" id="totalAmountSpan" >0.00</span></h5>
    <input type="hidden" id="totalAmountInput" name="totalAmountInput" value="" >
</div>
<div class="<?php echo $endOfUrl === "income-tax-calculator" ? 'col-auto mb-3' : 'w-100 float-left mb-2'; ?>">
    <div class="form-group mb-0 clearfix">
        <button type="button" class="btn <?php echo $endOfUrl === "income-tax-calculator" ? ' btn-primary btn-primary-themed' : ' btn-success'; ?> mt-1" onclick="calculateResult()">Submit</button>
    </div>
</div>

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
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


