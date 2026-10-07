<?php require("config.php"); require("session.php");

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Admin Panel</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
            <style>
            a{
                color:#f00000;
            }
            #table-id tr th {
    color: #e5e5e5;
}
        table th , table td{
        text-align: center;
        }
        table tr:nth-child(even){
        background-color: #e4e3e3
        }
        th {
        background: #333;
        color: #fff;
        }
        .pagination {
        margin: 0;
        }
        .pagination li:hover{
        cursor: pointer;
        }
        .header_wrap {
        padding:30px 0;
        }
        .num_rows {
        width: 20%;
        float:left;
        }
        .tb_search{
        width: 20%;
        float:right;
        }
        .pagination-container {
        width: 70%;
        float:left;
        }
        .rows_count {
        width: 20%;
        float:right;
        text-align:right;
        color: #999;
        }
        thead th {
        background-color: #3c2d3e !important;
        }
        .pagination-container li {
        background-color: #ddd;
        display: inline-block;
        width: 35px;
        height: 35px;
        border-radius: 3px;
        margin: 2px;
        text-align: center;
        padding: 5px;
        color: #3c2d3e;
        }
        .pagination-container li.active {
        background-color: #f00000;
        color: #ffffff;
        }
        .excel_sheet.pull-right {
        margin-right: 15px;
        vertical-align: middle;
        margin-top: 0px;
       }
       .pagination li span {
    display: contents;
    width: 100%;
    float: none;
}
       .pagination li span > span {
    display: none;
}
.btn-primary {
    color: #fff;
    background-color: #f00000;
    border-color: #f00000;
}
        </style>

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <!--header start-->
    <?php include("inc/header.php"); ?> 
    <!--header end-->

    <!--sidebar start-->
    <?php include("inc/left.php"); ?> 
    <!--sidebar end-->



        <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Add New</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Add New File</li>
            </ol>
          </div>
        </div>


      <div class="candibdate_data">
                        <?php
                        $select_candidate=mysqli_query($con,"select * from landing_leads order by id DESC") or (die(mysqli_error($con)));
                        ?>
                        <div class="header_wrap">
                            <div class="num_rows">
                                
                                <div class="form-group">    <!--        Show Numbers Of Rows        -->
                                <select class  ="form-control" name="state" id="maxRows">
                                    
                                    
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                    <option value="100">100</option>
                                    <option value="5000">Show ALL Rows</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="tb_search">
                            <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search.." class="form-control">
                        </div>
                        <div class="excel_sheet pull-right">
                            <a class="dataExport btn btn-primary" data-type="excel">Export Excel</a>
                        </div>
                    </div>
         
                        
                    
                    <table id="table-id" class="table table-striped table-hover table-bordered results table_export">
                        <thead>
                            <tr>
                                
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">City</th>
                                <th scope="col">ARN No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $sn=0;
                            while($candidate=mysqli_fetch_array($select_candidate)){
                            $timestamp = strtotime($candidate['date']);
                            
                            // Creating new date format from that timestamp
                            $new_date = date("d-m-Y", $timestamp);
                            $sn++;
                            ?>
                            <tr>
                                
                                <td><?php echo $candidate['username']; ?></td>
                                <td><?php echo $candidate['email']; ?></td>
                                <td><?php echo $candidate['mobile']; ?></td>
                                <td><?php echo $candidate['city']; ?></td>
                                <td><?php echo $candidate['arn']; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <!--     Start Pagination -->
                    <div class='pagination-container'>
                        <nav>
                            <ul class="pagination">
                                <!-- Here the JS Function Will Add the Rows -->
                            </ul>
                        </nav>
                    </div>
                    <div class="rows_count">Showing 11 to 20 of 91 entries</div>
                </div>

      </section>

    </section>
    <!--main content end-->
    
  </section>
  <!-- container section start -->

    <!--footer start-->
    <?php include("inc/footer.php"); ?> 
    <!--footer end-->

    <script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

    <script src="candidate_assets/js/tableExport.js"></script>
    <script type="text/javascript" src="candidate_assets/js/jquery.base64.js"></script>
    <script src="candidate_assets/js/export.js"></script>
    <script>
    getPagination('#table-id');
    $('#maxRows').trigger('change');
    function getPagination (table){
    $('#maxRows').on('change',function(){
    $('.pagination').html('');                      // reset pagination div
    var trnum = 0 ;                                 // reset tr counter
    var maxRows = parseInt($(this).val());          // get Max Rows from select option
    
    var totalRows = $(table+' tbody tr').length;        // numbers of rows
    $(table+' tr:gt(0)').each(function(){          // each TR in  table and not the header
    trnum++;                                    // Start Counter
    if (trnum > maxRows ){                      // if tr number gt maxRows
    
    $(this).hide();                         // fade it out
    }if (trnum <= maxRows ){$(this).show();}// else fade in Important in case if it ..
    });                                            //  was fade out to fade it in
    if (totalRows > maxRows){                      // if tr total rows gt max rows option
    var pagenum = Math.ceil(totalRows/maxRows); // ceil total(rows/maxrows) to get ..
    //  numbers of pages
    for (var i = 1; i <= pagenum ;){            // for each page append pagination li
    $('.pagination').append('<li data-page="'+i+'">\
        <span>'+ i++ +'<span class="sr-only">(current)</span></span>\
    </li>').show();
    }                                           // end for i
    
    
    }                                               // end if row count > max rows
    $('.pagination li:first-child').addClass('active'); // add active class to the first li
    
    
    //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
    showig_rows_count(maxRows, 1, totalRows);
    //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
    $('.pagination li').on('click',function(e){     // on click each page
    e.preventDefault();
    var pageNum = $(this).attr('data-page');    // get it's number
    var trIndex = 0 ;                           // reset tr counter
    $('.pagination li').removeClass('active');  // remove active class from all li
    $(this).addClass('active');                 // add active class to the clicked
    
    
    //SHOWING ROWS NUMBER OUT OF TOTAL
    showig_rows_count(maxRows, pageNum, totalRows);
    //SHOWING ROWS NUMBER OUT OF TOTAL
    
    
    
    $(table+' tr:gt(0)').each(function(){      // each tr in table not the header
    trIndex++;                              // tr index counter
    // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
    if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
    $(this).hide();
    }else {$(this).show();}                 //else fade in
    });                                        // end of for each tr in table
    });                                     // end of on click pagination list
    });
    // end of on select change
    
    // END OF PAGINATION
    
    }
    
    // SI SETTING
    $(function(){
    // Just to append id number for each row
    default_index();
    
    });
    //ROWS SHOWING FUNCTION
    function showig_rows_count(maxRows, pageNum, totalRows) {
    //Default rows showing
    var end_index = maxRows*pageNum;
    var start_index = ((maxRows*pageNum)- maxRows) + parseFloat(1);
    var string = 'Showing '+ start_index + ' to ' + end_index +' of ' + totalRows + ' entries';
    $('.rows_count').html(string);
    }
    // CREATING INDEX
    function default_index() {
    $('table tr:eq(0)').prepend('<th> ID </th>')
    var id = 0;
    $('table tr:gt(0)').each(function(){
    id++
    $(this).prepend('<td>'+id+'</td>');
    });
    }
    // All Table search script
    function FilterkeyWord_all_table() {
    
    // Count td if you want to search on all table instead of specific column
    var count = $('.table').children('tbody').children('tr:first-child').children('td').length;
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("search_input_all");
    var input_value =     document.getElementById("search_input_all").value;
    filter = input.value.toLowerCase();
    if(input_value !=''){
    table = document.getElementById("table-id");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) {
    
    var flag = 0;
    
    for(j = 0; j < count; j++){
    td = tr[i].getElementsByTagName("td")[j];
    if (td) {
    
    var td_text = td.innerHTML;
    if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
    //var td_text = td.innerHTML;
    //td.innerHTML = 'shaban';
    flag = 1;
    } else {
    //DO NOTHING
    }
    }
    }
    if(flag==1){
    tr[i].style.display = "";
    }else {
    tr[i].style.display = "none";
    }
    }
    }else {
    //RESET TABLE
    $('#maxRows').trigger('change');
    }
    }
    </script>

</body>

</html>






