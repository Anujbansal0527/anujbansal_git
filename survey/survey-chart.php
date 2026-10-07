<?php include('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Social Media Survey</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/inter/font.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <style>
    .chart-row h4 {
    font-size: 20px;
    line-height: 22px;
    transform: translateY(50px);
    position: relative;
    z-index: 99;
}
    /* .survey-barchart > div > div {
    width: 100% !important;
}
.survey-barchart > div > div svg {
    width: 100% !important;
} */
    </style>

    <body>


    <?php
    include('config.php');

// Question One Query
    $sqli = "SELECT ans_one FROM online_survey";
    $query = mysqli_query($con, $sqli);
    $array = [];
    while($row = mysqli_fetch_array($query)){
    $new = $row['ans_one'];

     $str_arr = explode (",", $new); 

    foreach ($str_arr as $value) {
      array_push($array,$value); 
    }
    }

// Question Two Query
    $sqli2 = "SELECT ans_two FROM online_survey";
    $query2 = mysqli_query($con, $sqli2);
    $array2 = [];
    while($row2 = mysqli_fetch_array($query2)){
    $new2 = $row2['ans_two'];
     $str_arr2 = explode (",", $new2); 
    foreach ($str_arr2 as $value2) {
      array_push($array2,$value2); 
    }
    }

    // Question Three Query
    $sqli3 = "SELECT ans_three FROM online_survey";
    $query3 = mysqli_query($con, $sqli3);
    $array3 = [];
    while($row3 = mysqli_fetch_array($query3)){
    $new3 = $row3['ans_three'];
     $str_arr3 = explode (",", $new3); 
    foreach ($str_arr3 as $value3) {
      array_push($array3,$value3); 
    }
    }

    // Question Four Query
    $sqli4 = "SELECT ans_four FROM online_survey";
    $query4 = mysqli_query($con, $sqli4);
    $array4 = [];
    while($row4 = mysqli_fetch_array($query4)){
    $new4 = $row4['ans_four'];
      $str_arr4 = explode (",", $new4); 
    foreach ($str_arr4 as $value4) {
      array_push($array4,$value4); 
    }
    }

    // Question Five Query
    $sqli5 = "SELECT ans_five FROM online_survey";
    $query5 = mysqli_query($con, $sqli5);
    $array5 = [];
    while($row5 = mysqli_fetch_array($query5)){
    $new5 = $row5['ans_five'];
      $str_arr5 = explode (",", $new5); 
    foreach ($str_arr5 as $value5) {
      array_push($array5,$value5); 
    }
    }
    ?>

<div class="container">
<!-- Chart 1 -->
<div class="chart-row">
  <h4>1. Which social media platforms does your MFD business currently utilize for lead generation?</h4>
<div id="barchart_values1" class="survey-barchart" style="width: 100%; height: 400px;"></div>
</div>

<!-- Chart 2 -->
<div class="chart-row">
  <h4>2. MFDs, how frequently do you post on your social media accounts?</h4>
  <div id="barchart_values2" class="survey-barchart" style="width: 100%; height: 400px;"></div>
</div>
  
<!-- Chart 3 -->
<div class="chart-row">
<h4>3. What is your primary goal for using social media for your MFD business?</h4>
<div id="barchart_values3" class="survey-barchart" style="width: 100%; height: 500px;"></div>
</div>

<!-- Chart 4 -->
<div class="chart-row">
<h4>4. Which financial influencer do you follow on social media?</h4>
<div id="barchart_values4" class="survey-barchart" style="width: 100%; height: 400px;"></div>
</div>

<!-- Chart 5 -->
<div class="chart-row">
<h4>5. Which Youtuber do you like the most?</h4>
<div id="barchart_values5" class="survey-barchart" style="width: 100%; height: 500px;"></div>
</div>


</div>

<!-- Jquery -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/survey.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  // Create Array One
var users = <?php echo json_encode($array); ?>;
// STRING ARRAY TO NUMBER ARRAY
var finalUsers = [];
length = users.length;

for (var i = 0; i < length; i++)
finalUsers.push(parseInt(users[i]));
// STRING ARRAY TO NUMBER ARRAY
var facebook = finalUsers.filter(checkAnswer1);
var twitter = finalUsers.filter(checkAnswer2);
var instagram = finalUsers.filter(checkAnswer3);
var linkedin = finalUsers.filter(checkAnswer4);
var youtube = finalUsers.filter(checkAnswer5);

function checkAnswer5(chans5) {
  return chans5 >= 5;
}
function checkAnswer4(chans4) {
  return chans4 >= 4  && chans4 < 5;
}
function checkAnswer3(chans3) {
  return chans3 >= 3  && chans3 < 4;
}
function checkAnswer2(chans2) {
  return chans2 >= 2  && chans2 < 3;
}
function checkAnswer1(chans1) {
  return chans1 <= 1;
}


// Create Array Two
var users2 = <?php echo json_encode($array2); ?>;
// STRING ARRAY TO NUMBER ARRAY
var finalUsersTwo = [];
length2 = users2.length;

for (var i = 0; i < length2; i++)
finalUsersTwo.push(parseInt(users2[i]));
// STRING ARRAY TO NUMBER ARRAY
var ansTwoOptionOne = finalUsersTwo.filter(checkAnswerTwo1);
var ansTwoOptionTwo = finalUsersTwo.filter(checkAnswerTwo2);
var ansTwoOptionThree = finalUsersTwo.filter(checkAnswerTwo3);
var ansTwoOptionFour = finalUsersTwo.filter(checkAnswerTwo4);
var ansTwoOptionFive = finalUsersTwo.filter(checkAnswerTwo5);

function checkAnswerTwo5(chansTwo5) {
  return chansTwo5 >= 5;
}
function checkAnswerTwo4(chansTwo4) {
  return chansTwo4 >= 4  && chansTwo4 < 5;
}
function checkAnswerTwo3(chansTwo3) {
  return chansTwo3 >= 3  && chansTwo3 < 4;
}
function checkAnswerTwo2(chansTwo2) {
  return chansTwo2 >= 2  && chansTwo2 < 3;
}
function checkAnswerTwo1(chansTwo1) {
  return chansTwo1 <= 1;
}

// Create Array Three
var users3 = <?php echo json_encode($array3); ?>;
// STRING ARRAY TO NUMBER ARRAY
var finalUsersThree = [];
length3 = users3.length;

for (var i = 0; i < length3; i++)
finalUsersThree.push(parseInt(users3[i]));
// STRING ARRAY TO NUMBER ARRAY
var ansThreeOptionOne = finalUsersThree.filter(checkAnswerThree1);
var ansThreeOptionTwo = finalUsersThree.filter(checkAnswerThree2);
var ansThreeOptionThree = finalUsersThree.filter(checkAnswerThree3);
var ansThreeOptionFour = finalUsersThree.filter(checkAnswerThree4);
var ansThreeOptionFive = finalUsersThree.filter(checkAnswerThree5);
var ansThreeOptionSix = finalUsersThree.filter(checkAnswerThree6);
var ansThreeOptionSeven = finalUsersThree.filter(checkAnswerThree7);

function checkAnswerThree7(chansThree7) {
  return chansThree7 >= 7;
}
function checkAnswerThree6(chansThree6) {
  return chansThree6 >= 6  && chansThree6 < 7;
}
function checkAnswerThree5(chansThree5) {
  return chansThree5 >= 5  && chansThree5 < 6;
}
function checkAnswerThree4(chansThree4) {
  return chansThree4 >= 4  && chansThree4 < 5;
}
function checkAnswerThree3(chansThree3) {
  return chansThree3 >= 3  && chansThree3 < 4;
}
function checkAnswerThree2(chansThree2) {
  return chansThree2 >= 2  && chansThree2 < 3;
}
function checkAnswerThree1(chansThree1) {
  return chansThree1 <= 1;
}


// Create Array Four
var users4 = <?php echo json_encode($array4); ?>;
// STRING ARRAY TO NUMBER ARRAY
var finalUsersFour = [];
length4 = users4.length;

for (var i = 0; i < length4; i++)
finalUsersFour.push(parseInt(users4[i]));
// STRING ARRAY TO NUMBER ARRAY
var ansFourOptionOne = finalUsersFour.filter(checkAnswerFour1);
var ansFourOptionTwo = finalUsersFour.filter(checkAnswerFour2);
var ansFourOptionThree = finalUsersFour.filter(checkAnswerFour3);
var ansFourOptionFour = finalUsersFour.filter(checkAnswerFour4);
var ansFourOptionFive = finalUsersFour.filter(checkAnswerFour5);
var ansFourOptionSix = finalUsersFour.filter(checkAnswerFour6);
var ansFourOptionSeven = finalUsersFour.filter(checkAnswerFour7);

function checkAnswerFour7(chansFour7) {
  return chansFour7 >= 7;
}
function checkAnswerFour6(chansFour6) {
  return chansFour6 >= 6  && chansFour6 < 7;
}
function checkAnswerFour5(chansFour5) {
  return chansFour5 >= 5  && chansFour5 < 6;
}
function checkAnswerFour4(chansFour4) {
  return chansFour4 >= 4  && chansFour4 < 5;
}
function checkAnswerFour3(chansFour3) {
  return chansFour3 >= 3  && chansFour3 < 4;
}
function checkAnswerFour2(chansFour2) {
  return chansFour2 >= 2  && chansFour2 < 3;
}
function checkAnswerFour1(chansFour1) {
  return chansFour1 <= 1;
}

// Create Array Five
var users5 = <?php echo json_encode($array5); ?>;
// STRING ARRAY TO NUMBER ARRAY
var finalUsersFive = [];
length5 = users5.length;

for (var i = 0; i < length5; i++)
finalUsersFive.push(parseInt(users5[i]));
// STRING ARRAY TO NUMBER ARRAY
var ansFiveOptionOne = finalUsersFive.filter(checkAnswerFive1);
var ansFiveOptionTwo = finalUsersFive.filter(checkAnswerFive2);
var ansFiveOptionThree = finalUsersFive.filter(checkAnswerFive3);
var ansFiveOptionFour = finalUsersFive.filter(checkAnswerFive4);
var ansFiveOptionFive = finalUsersFive.filter(checkAnswerFive5);
var ansFiveOptionSix = finalUsersFive.filter(checkAnswerFive6);
var ansFiveOptionSeven = finalUsersFive.filter(checkAnswerFive7);

function checkAnswerFive7(chansFive7) {
  return chansFive7 >= 7;
}
function checkAnswerFive6(chansFive6) {
  return chansFive6 >= 6  && chansFive6 < 7;
}
function checkAnswerFive5(chansFive5) {
  return chansFive5 >= 5  && chansFive5 < 6;
}
function checkAnswerFive4(chansFive4) {
  return chansFive4 >= 4  && chansFive4 < 5;
}
function checkAnswerFive3(chansFive3) {
  return chansFive3 >= 3  && chansFive3 < 4;
}
function checkAnswerFive2(chansFive2) {
  return chansFive2 >= 2  && chansFive2 < 3;
}
function checkAnswerFive1(chansFive1) {
  return chansFive1 <= 1;
}


// Chart 1 Function
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart1);
    function drawChart1() {

      var facebookLength = facebook.length;
      var twitterLength = twitter.length;
      var instagramLength = instagram.length;
      var linkedinLength = linkedin.length;
      var youtubeLength = youtube.length;

      var data1 = google.visualization.arrayToDataTable([
        ["Element", "Answers", { role: "style" } ],
        ["Facebook", facebookLength, "#76A7FA"],
        ["Twitter", twitterLength, "#76A7FA"],
        ["Instagram", instagramLength, "#76A7FA"],
        ["LinkedIn", linkedinLength, "#76A7FA"],
        ["Youtube", youtubeLength, "#76A7FA"]
      ]);

      var view1 = new google.visualization.DataView(data1);
      view1.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options1 = {
        width: 1200,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart1 = new google.visualization.BarChart(document.getElementById("barchart_values1"));
      chart1.draw(view1, options1);
  }


  // Chart 2 Function
  google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart2() {
      var ansTwoOptionOneLength = ansTwoOptionOne.length;
      var ansTwoOptionTwoLength = ansTwoOptionTwo.length;
      var ansTwoOptionThreeLength = ansTwoOptionThree.length;
      var ansTwoOptionFourLength = ansTwoOptionFour.length;
      var ansTwoOptionFiveLength = ansTwoOptionFive.length;

      var data2 = google.visualization.arrayToDataTable([
        ["Element", "Answers", { role: "style" } ],
        ["Multiple times a day", ansTwoOptionOneLength, "#76A7FA"],
        ["Once a day", ansTwoOptionTwoLength, "#76A7FA"],
        ["2-3 times a week", ansTwoOptionThreeLength, "#76A7FA"],
        ["Once a week", ansTwoOptionFourLength, "#76A7FA"],
        ["Less than once a week", ansTwoOptionFiveLength, "#76A7FA"]
        
      ]);

      var view2 = new google.visualization.DataView(data2);
      view2.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      var options2 = {
        width: 1200,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart2 = new google.visualization.BarChart(document.getElementById("barchart_values2"));
      chart2.draw(view2, options2);
  }

    // Chart 3 Function
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart3);
    function drawChart3() {
      var ansThreeOptionOneLength = ansThreeOptionOne.length;
      var ansThreeOptionTwoLength = ansThreeOptionTwo.length;
      var ansThreeOptionThreeLength = ansThreeOptionThree.length;
      var ansThreeOptionFourLength = ansThreeOptionFour.length;
      var ansThreeOptionFiveLength = ansThreeOptionFive.length;
      var ansThreeOptionSixLength = ansThreeOptionSix.length;
      var ansThreeOptionSevenLength = ansThreeOptionSeven.length;
      
      var data3 = google.visualization.arrayToDataTable([
        ["Element", "Answers", { role: "style" } ],
        ["Brand awareness", ansThreeOptionOneLength, "#76A7FA"],
        ["Lead generation", ansThreeOptionTwoLength, "#76A7FA"],
        ["Customer engagement", ansThreeOptionThreeLength, "#76A7FA"],
        ["Driving website traffic", ansThreeOptionFourLength, "#76A7FA"],
        ["Sales and conversions", ansThreeOptionFiveLength, "#76A7FA"],
        ["Communication", ansThreeOptionSixLength, "#76A7FA"],
        ["Entertainment", ansThreeOptionSevenLength, "#76A7FA"]
      ]);

      var view3 = new google.visualization.DataView(data3);
      view3.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      var options3 = {
        width: 1200,
        height: 500,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart3 = new google.visualization.BarChart(document.getElementById("barchart_values3"));
      chart3.draw(view3, options3);
  }

      // Chart 4 Function
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart4);
    function drawChart4() {
      var ansFourOptionOneLength = ansFourOptionOne.length;
      var ansFourOptionTwoLength = ansFourOptionTwo.length;
      var ansFourOptionThreeLength = ansFourOptionThree.length;
      var ansFourOptionFourLength = ansFourOptionFour.length;
      var ansFourOptionFiveLength = ansFourOptionFive.length;
      var ansFourOptionSixLength = ansFourOptionSix.length;
      var ansFourOptionSevenLength = ansFourOptionSeven.length;
      
      var data4 = google.visualization.arrayToDataTable([
        ["Element", "Answers", { role: "style" } ],
        ["Pranjal Kamra", ansFourOptionOneLength, "#76A7FA"],
        ["CA Rachna Ranade", ansFourOptionTwoLength, "#76A7FA"],
        ["Sharan Hegde", ansFourOptionThreeLength, "#76A7FA"],
        ["Neha Nagar", ansFourOptionFourLength, "#76A7FA"],
        ["Ankur Warikoo", ansFourOptionFiveLength, "#76A7FA"],
        ["Akshat Shrivastava", ansFourOptionSixLength, "#76A7FA"],
        ["Other", ansFourOptionSevenLength, "#76A7FA"]
      ]);

      var view4 = new google.visualization.DataView(data4);
      view4.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      var options4 = {
        width: 1200,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart4 = new google.visualization.BarChart(document.getElementById("barchart_values4"));
      chart4.draw(view4, options4);
  }

// Chart 5 Function
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart5);
    function drawChart5() {
      var ansFiveOptionOneLength = ansFiveOptionOne.length;
      var ansFiveOptionTwoLength = ansFiveOptionTwo.length;
      var ansFiveOptionThreeLength = ansFiveOptionThree.length;
      var ansFiveOptionFourLength = ansFiveOptionFour.length;
      var ansFiveOptionFiveLength = ansFiveOptionFive.length;
      var ansFiveOptionSixLength = ansFiveOptionSix.length;
      var ansFiveOptionSevenLength = ansFiveOptionSeven.length;
      
      var data5 = google.visualization.arrayToDataTable([
        ["Element", "Answers", { role: "style" } ],
        ["CA Rachna Ranade (CA Rachna Ranade)", ansFiveOptionOneLength, "#76A7FA"],
        ["Pranjal Kamra (Pranjal Kamra)", ansFiveOptionTwoLength, "#76A7FA"],
        ["Ankur Warikoo (Ankur Warikoo)", ansFiveOptionThreeLength, "#76A7FA"],
        ["Anant Ladha (Invest Aaj For Kal)", ansFiveOptionFourLength, "#76A7FA"],
        ["Mukul Malik (Asset Yogi)", ansFiveOptionFiveLength, "#76A7FA"],
        ["Rishabh Jain and Mandeep Gill (Labour Law Advisor)", ansFiveOptionSixLength, "#76A7FA"],
        ["Other", ansFiveOptionSevenLength, "#76A7FA"]
      ]);

      var view5 = new google.visualization.DataView(data5);
      view5.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      var options5 = {
        width: 1200,
        height: 500,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart5 = new google.visualization.BarChart(document.getElementById("barchart_values5"));
      chart5.draw(view5, options5);
  }

  </script>

</body>

</html>