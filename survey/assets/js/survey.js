const btnPrev = document.querySelectorAll('.previous-btn');
const btnNext = document.querySelectorAll('.next-btn');
const btnNextOne = document.getElementsByClassName('next-btn-one');
const progress = document.getElementById('progress');
const formSteps = document.querySelectorAll('.form-step');
const progressSteps = document.querySelectorAll('.progress-step');

const checkItems = document.querySelectorAll('.form-check-input');

// const radioItems = $("input[type='radio']");
// const checkboxItems = $("input[type='checkbox']");

var checkOne = $("input[name='surveyOne']");
var checkTwo = $("input[name='surveyTwo']");
var checkThree = $("input[name='surveyThree']");


var checkFourOne = $("#surveyFour1");
var checkFourTwo = $("#surveyFour2");
var checkFourThree = $("#surveyFour3");
var checkFourFour = $("#surveyFour4");
var checkFourFive = $("#surveyFour5");
var checkFourSix = $("#surveyFour6");

var checkFiveOne = $("#surveyFive1");
var checkFiveTwo = $("#surveyFive2");
var checkFiveThree = $("#surveyFive3");
var checkFiveFour = $("#surveyFive4");
var checkFiveFive = $("#surveyFive5");
var checkFiveSix = $("#surveyFive6");


// var checkFiveOne = $("#surveyFour1");



let formStepNum = 0;







// checkItems.forEach((checkItem) =>{
//     checkItem.click(function() {
//         btnNext.attr("disabled", !checkItem.is(":checked"));
//     });
// });
checkOne.change(function() {
    $('.next-btn-one').attr("disabled", !checkOne.is(":checked"));
});
checkTwo.change(function() {
    $('.next-btn-two').attr("disabled", !checkTwo.is(":checked"));
});
checkThree.change(function() {
    $('.next-btn-three').attr("disabled", !checkThree.is(":checked"));
});


// Check For 4 Question
checkFourOne.change(function() {
    $('.next-btn-four').attr("disabled", !checkFourOne.is(":checked"));
});
checkFourTwo.change(function() {
    $('.next-btn-four').attr("disabled", !checkFourTwo.is(":checked"));
});
checkFourThree.change(function() {
    $('.next-btn-four').attr("disabled", !checkFourThree.is(":checked"));
});
checkFourFour.change(function() {
    $('.next-btn-four').attr("disabled", !checkFourFour.is(":checked"));
});
checkFourFive.change(function() {
    $('.next-btn-four').attr("disabled", !checkFourFive.is(":checked"));
});
checkFourSix.change(function() {
    $('.next-btn-four').attr("disabled", !checkFourSix.is(":checked"));
});


// Check For 5 Question
checkFiveOne.change(function() {
    $('.next-btn-five').attr("disabled", !checkFiveOne.is(":checked"));
});
checkFiveTwo.change(function() {
    $('.next-btn-five').attr("disabled", !checkFiveTwo.is(":checked"));
});
checkFiveThree.change(function() {
    $('.next-btn-five').attr("disabled", !checkFiveThree.is(":checked"));
});
checkFiveFour.change(function() {
    $('.next-btn-five').attr("disabled", !checkFiveFour.is(":checked"));
});
checkFiveFive.change(function() {
    $('.next-btn-five').attr("disabled", !checkFiveFive.is(":checked"));
});
checkFiveSix.change(function() {
    $('.next-btn-five').attr("disabled", !checkFiveSix.is(":checked"));
});



btnNext.forEach((btn) =>{
    btn.addEventListener('click', ()=> {
        formStepNum++;
        updateFormSteps();
        updateProgressbar()
    });
});
btnPrev.forEach((btn) =>{
    btn.addEventListener('click', ()=> {
        formStepNum--;
        updateFormSteps();
        updateProgressbar()
    });
});

function updateFormSteps(){
    formSteps.forEach((formstep) =>{
        if(formstep.classList.contains('form-step-active')){
            formstep.classList.remove('form-step-active');
        }
    })
    formSteps[formStepNum].classList.add('form-step-active');
}

function updateProgressbar(){
    progressSteps.forEach((progressStep, index) =>{
        if(index < formStepNum + 1){
            progressStep.classList.add('progress-step-active');
        }
        else{
            progressStep.classList.remove('progress-step-active');
        }
    })


const progressActive = document.querySelectorAll('.progress-step-active');
console.log(progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%");

}