<?php require("config.php");
require("session.php");
if (isset($_POST['gallery'])) {
    $date = date('Y-m-d');
    $target_path = "files/";
    $total = 15728640;
    $size = $_FILES['ad_image']['size'];
    if ($total >= $size) {
        $file_name_path = $_FILES['ad_image'];
        $filename = $_FILES['ad_image']['name'];
        if ($filename != '') {
            $nm = strrev($_FILES['ad_image']['name']);
            $nmar = explode(".", $nm);
            $ext = strrev($nmar[0]);
            if (($ext == "pdf") || ($ext == "doc")) {
                $id = generate_unique_id();
                $target_path = $target_path . basename($id);
                if ($file_name_path["type"] == "application/pdf")
                    $target_path = $target_path . ".pdf";
                if ($file_name_path["type"] == "application/msword")
                    $target_path = $target_path . ".doc";
                if (move_uploaded_file($file_name_path['tmp_name'], $target_path)) {
                    $file = substr($target_path, 6);
                    $insert_join = mysqli_query($con, "insert into files set path='" . $file . "', section='" . $_POST['section'] . "', name='" . $_POST['fname'] . "'") or die(mysqli_error());
                    $msg = "?>File Successfully Added!";
                } else {
                    $msg = "There was an error uploading the file, please try again!";
                }
            } else {
                $msg = "File Type Not Supported";
            }
        } else {
            $msg = "Please select a file";
        }
    } else {
        $msg = "File size should be less than 15MB!!";
    }
}
function generate_unique_id()
{
    $day = date('d', time());
    $month = date('m', time());
    $year = date('Y', time());
    $hour = date('H', time());
    $min = date('i', time());
    $sec = date('s', time());
    $un_id = sprintf("%02d%04d%02d", rand(0, 999), rand(0, 99), $sec);
    //echo $un_id=round(rand(99,999)*rand(1234,8965)*$sec*$min);
    return $un_id;
}
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
        a {
            color: #f00000;
        }

        #table-id tr th {
            color: #e5e5e5;
        }

        table th,
        table td {
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: #e4e3e3
        }

        th {
            background: #333;
            color: #fff;
        }

        .pagination {
            margin: 0;
            white-space: nowrap;
            overflow: auto;
        }

        .pagination li:hover {
            cursor: pointer;
        }

        .header_wrap {
            padding: 30px 0;
        }

        .num_rows {
            width: 20%;
            float: left;
        }

        .tb_search {
            width: 20%;
            float: right;
        }

        .pagination-container {
            width: 70%;
            float: left;
        }

        .rows_count {
            width: 20%;
            float: right;
            text-align: right;
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

        .pagination li span>span {
            display: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #f00000;
            border-color: #f00000;
        }

        /* STATUS RADIO */

        input[type="checkbox"],
        input[type="radio"] {
            position: absolute;
            right: 9000px;
        }

        /*Check box*/
        input[type="checkbox"]+.label-text:before {
            content: "\f096";
            font-family: "FontAwesome";
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            width: 1em;
            display: inline-block;
            margin-right: 5px;
        }

        input[type="checkbox"]:checked+.label-text:before {
            content: "\f14a";
            color: #2980b9;
            animation: effect 250ms ease-in;
        }

        input[type="checkbox"]:disabled+.label-text {
            color: #aaa;
        }

        input[type="checkbox"]:disabled+.label-text:before {
            content: "\f0c8";
            color: #ccc;
        }

        /*Radio box*/

        input[type="radio"]+.label-text:before {
            content: "\f10c";
            font-family: "FontAwesome";
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            width: 1em;
            display: inline-block;
            margin-right: 5px;
        }

        input[type="radio"]:checked+.label-text:before {
            content: "\f192";
            color: #8e44ad;
            animation: effect 250ms ease-in;
        }

        input[type="radio"]:disabled+.label-text {
            color: #aaa;
        }

        input[type="radio"]:disabled+.label-text:before {
            content: "\f111";
            color: #ccc;
        }

        /*Radio Toggle*/

        .toggle input[type="radio"]+.label-text:before {
            content: "\f204";
            font-family: "FontAwesome";
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            width: 1em;
            display: inline-block;
            margin-right: 10px;
        }

        .toggle input[type="radio"]:checked+.label-text:before {
            content: "\f205";
            color: #16a085;
            animation: effect 250ms ease-in;
        }

        .toggle input[type="radio"]:disabled+.label-text {
            color: #aaa;
        }

        .toggle input[type="radio"]:disabled+.label-text:before {
            content: "\f204";
            color: #ccc;
        }


        @keyframes effect {
            0% {
                transform: scale(0);
            }

            25% {
                transform: scale(1.3);
            }

            75% {
                transform: scale(1.4);
            }

            100% {
                transform: scale(1);
            }
        }

        .btn-success.note_submit {
            display: block;
            width: 100%;
            margin-top: 5px;
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
                    $select_candidate = mysqli_query($con, "select * from candidate_data order by id DESC") or (die(mysqli_error($con)));
                    ?>
                    <div class="header_wrap">
                        <div class="num_rows">

                            <div class="form-group"> <!-- Show Numbers Of Rows -->
                                <select class="form-control" name="state" id="maxRows">


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
                                <th scope="col">Job Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Resume</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sn = 0;
                            while ($candidate = mysqli_fetch_array($select_candidate)) {
                                $timestamp = strtotime($candidate['date']);
                                $new_date = date("d-m-Y", $timestamp);
                                $sn++;
                            ?>
                                <tr class="candidate_table_row">
                                    <td><?php echo $candidate['candidate']; ?></td>
                                    <td><?php echo $candidate['email']; ?></td>
                                    <td><?php echo $candidate['mobile']; ?></td>
                                    <td><?php echo $candidate['job']; ?></td>
                                    <td><?php echo $new_date ?></td>
                                    <td><a href="../<?php echo $candidate['resume']; ?>" target="_blank">Download</a></td>
                                    <td id="<?= $candidate['id']; ?>"><?php echo $candidate['status']; ?></td>
                                    <td>
                                        <form class="candidate_status_form">
                                            <?php
                                            if ($candidate['status'] == '') {
                                            ?>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewscheduled_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interview Scheduled</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewed_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interviewed</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Rejected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Rejected</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Shortlisted_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Shortlisted</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="OnHold_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">On Hold</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Selected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Selected</span>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            if ($candidate['status'] == 'Interviewscheduled') {
                                            ?>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" checked class="candidate_status" name="candidate_status" value="Interviewscheduled_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interview Scheduled</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewed_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interviewed</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Rejected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Rejected</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Shortlisted_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Shortlisted</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="OnHold_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">On Hold</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Selected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Selected</span>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            if ($candidate['status'] == 'Interviewed') {
                                            ?>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewscheduled_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interview Scheduled</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" checked class="candidate_status" name="candidate_status" value="Interviewed_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interviewed</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Rejected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Rejected</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Shortlisted_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Shortlisted</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="OnHold_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">On Hold</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Selected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Selected</span>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            if ($candidate['status'] == 'Rejected') {
                                            ?>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewscheduled_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interview Scheduled</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewed_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interviewed</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" checked class="candidate_status" name="candidate_status" value="Rejected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Rejected</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Shortlisted_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Shortlisted</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="OnHold_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">On Hold</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Selected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Selected</span>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            if ($candidate['status'] == 'Shortlisted') {
                                            ?>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewscheduled_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interview Scheduled</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewed_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interviewed</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Rejected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Rejected</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" checked class="candidate_status" name="candidate_status" value="Shortlisted_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Shortlisted</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="OnHold_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">On Hold</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Selected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Selected</span>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            if ($candidate['status'] == 'OnHold') {
                                            ?>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewscheduled_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interview Scheduled</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewed_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interviewed</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Rejected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Rejected</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Shortlisted_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Shortlisted</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" checked class="candidate_status" name="candidate_status" value="OnHold_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">On Hold</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Selected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Selected</span>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            if ($candidate['status'] == 'Selected') {
                                            ?>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewscheduled_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interview Scheduled</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interviewed_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Interviewed</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Rejected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Rejected</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Interview Shortlisted_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Shortlisted</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" class="candidate_status" name="candidate_status" value="Hold_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">On Hold</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="toggle">
                                                        <input type="radio" checked class="candidate_status" name="candidate_status" value="Selected_<?= $candidate['id']; ?>_<?= $candidate['email']; ?>"> <span class="label-text">Selected</span>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="candidate_note_form">
                                            <div class="form-group note-input-group">
                                                <textarea name="note" id="note_<?= $candidate['id']; ?>" class="form-control note" value="<?= $candidate['note']; ?>"><?= $candidate['note']; ?></textarea>
                                                <input type="hidden" name="hidden_note" id="hidden_note" class="form-control" value="<?= $candidate['id']; ?>_<?= $candidate['email']; ?>">
                                                <input type="submit" id="note_submit" data-noteid="<?= $candidate['id']; ?>" value="Add" class="btn btn-success note_submit">
                                            </div>
                                        </form>
                                    </td>
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

        function getPagination(table) {
            $('#maxRows').on('change', function() {
                $('.pagination').html(''); // reset pagination div
                var trnum = 0; // reset tr counter
                var maxRows = parseInt($(this).val()); // get Max Rows from select option

                var totalRows = $(table + ' tbody tr').length; // numbers of rows
                $(table + ' tr:gt(0)').each(function() { // each TR in  table and not the header
                    trnum++; // Start Counter
                    if (trnum > maxRows) { // if tr number gt maxRows

                        $(this).hide(); // fade it out
                    }
                    if (trnum <= maxRows) {
                        $(this).show();
                    } // else fade in Important in case if it ..
                }); //  was fade out to fade it in
                if (totalRows > maxRows) { // if tr total rows gt max rows option
                    var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                    //  numbers of pages
                    for (var i = 1; i <= pagenum;) { // for each page append pagination li
                        $('.pagination').append('<li data-page="' + i + '">\
        <span>' + i++ + '<span class="sr-only">(current)</span></span>\
    </li>').show();
                    } // end for i


                } // end if row count > max rows
                $('.pagination li:first-child').addClass('active'); // add active class to the first li


                //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
                showig_rows_count(maxRows, 1, totalRows);
                //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
                $('.pagination li').on('click', function(e) { // on click each page
                    e.preventDefault();
                    var pageNum = $(this).attr('data-page'); // get it's number
                    var trIndex = 0; // reset tr counter
                    $('.pagination li').removeClass('active'); // remove active class from all li
                    $(this).addClass('active'); // add active class to the clicked


                    //SHOWING ROWS NUMBER OUT OF TOTAL
                    showig_rows_count(maxRows, pageNum, totalRows);
                    //SHOWING ROWS NUMBER OUT OF TOTAL



                    $(table + ' tr:gt(0)').each(function() { // each tr in table not the header
                        trIndex++; // tr index counter
                        // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                        if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        } //else fade in
                    }); // end of for each tr in table
                }); // end of on click pagination list
            });
            // end of on select change

            // END OF PAGINATION

        }

        // SI SETTING
        $(function() {
            // Just to append id number for each row
            default_index();

        });
        //ROWS SHOWING FUNCTION
        function showig_rows_count(maxRows, pageNum, totalRows) {
            //Default rows showing
            var end_index = maxRows * pageNum;
            var start_index = ((maxRows * pageNum) - maxRows) + parseFloat(1);
            var string = 'Showing ' + start_index + ' to ' + end_index + ' of ' + totalRows + ' entries';
            $('.rows_count').html(string);
        }
        // CREATING INDEX
        function default_index() {
            $('table tr:eq(0)').prepend('<th> ID </th>')
            var id = 0;
            $('table tr:gt(0)').each(function() {
                id++
                $(this).prepend('<td>' + id + '</td>');
            });
        }
        // All Table search script
        function FilterkeyWord_all_table() {

            // Count td if you want to search on all table instead of specific column
            var count = $('.table').children('tbody').children('tr:first-child').children('td').length;
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("search_input_all");
            var input_value = document.getElementById("search_input_all").value;
            filter = input.value.toLowerCase();
            if (input_value != '') {
                table = document.getElementById("table-id");
                tr = table.getElementsByTagName("tr");
                // Loop through all table rows, and hide those who don't match the search query
                for (i = 1; i < tr.length; i++) {

                    var flag = 0;

                    for (j = 0; j < count; j++) {
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
                    if (flag == 1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            } else {
                //RESET TABLE
                $('#maxRows').trigger('change');
            }
        }


        // On status change submit candidate status form
        $('input[name=candidate_status]').change(function() {
            let candidate_sts = $(this).val();
            var candidate_sts_split = candidate_sts.split('_');
            let candidate_status = candidate_sts_split[0];
            let candidate_status_id = candidate_sts_split[1];
            let candidate_email = candidate_sts_split[2];
            console.log(candidate_email);

            jQuery.ajax({
                url: "candidate_status_data.php",
                data: 'candidate_status_id=' + candidate_status_id + '&candidate_status=' + candidate_status + '&candidate_email=' + candidate_email,
                type: "POST",
                success: function(data) {
                    var mydata1 = data.split('_');
                    let return_id = mydata1[0];
                    let return_status = mydata1[1];
                    let myReturnId = '#'.concat(return_id);
                    $(myReturnId).html(return_status);
                },
                error: function() {}
            });
        });

        // Note Submit Form
        jQuery(document).on('click', '.note_submit', function(e) {
            e.preventDefault();
            let $this = jQuery(this); // Store reference to `this`
            let candidate_note_id = $this.attr('data-noteid');
            const original_note_value = $this.siblings('textarea').val();
            console.log(candidate_note_id);
            console.log(original_note_value);

            jQuery.ajax({
                url: "candidate_note_data.php",
                data: 'candidate_note_id=' + candidate_note_id + '&original_note_value=' + original_note_value,
                type: "POST",
                success: function(data) {
                    $this.siblings('textarea').val(data);
                },
                error: function() {
                    console.error('An error occurred');
                }
            });
        });
    </script>

</body>

</html>