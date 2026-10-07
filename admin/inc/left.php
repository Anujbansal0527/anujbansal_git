<?php include"config.php";

$MaxID1 = mysqli_query($con,"SELECT max( id )FROM `ip address`");  
$MaxID2= mysqli_fetch_array($MaxID1);
$MaxID3 = $MaxID2[0];
$ID1 = (($MaxID3)-(1));
$ID2 =   $ID1;
$ID3 = mysqli_query($con,"SELECT `ip`,`date` FROM `ip address` WHERE id = '".$ID2."'");  
$ID4 = mysqli_fetch_array($ID3);
?>

<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">
      <li class="active">
        <a class="" href="index.php">
          <i class="icon_house_alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
        <li class="sub-menu">
        <a href="candidates_data.php" class="">
          <i class="icon_profile"></i>
          <span>Candidates</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="landing_leads.php" class="">
          <i class="icon_profile"></i>
          <span>Landing Leads</span>
        </a>
      </li>
      
      
      <!--<li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_documents_alt"></i>-->
      <!--    <span>Manage Website Pages</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="static_page.php?id=1">About</a></li>-->
      <!--    <li><a href="static_page.php?id=2">Mutual Funds</a></li>-->
      <!--    <li><a href="static_page.php?id=4">Insurance</a></li>-->
      <!--    <li><a href="static_page.php?id=9">Real Estate</a></li>-->
      <!--    <li><a href="static_page.php?id=5">Tax Planning</a></li>-->
      <!--    <li><a href="static_page.php?id=7">Retirement Planning</a></li>-->
      <!--     <li><a href="static_page.php?id=6">FD & Bonds</a></li>-->
      <!--  </ul>-->
      <!--</li>-->

      <!--<li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_desktop"></i>-->
      <!--    <span>Manage Blog Post</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="add_new_post.php">Add Post</a></li>-->
      <!--    <li><a href="manage_post.php">Manage Post</a></li>-->
      <!--    <li><a href="manage_category.php">Manage Category</a></li>-->
      <!--  </ul>-->
      <!--</li>-->

      <!--<li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_document_alt"></i>-->
      <!--    <span>Manage Files</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="add_file.php">Add Files</a></li>-->
      <!--    <li><a href="manage_files.php">Delete Files</a></li></ul>-->
      <!--</li>-->
      
      <!--<li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_document_alt"></i>-->
      <!--    <span>Manage Testimonials</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="add_testimonial.php">Add Testimonial</a></li>-->
      <!--    <li><a href="manage_testimonial.php">Manage Testimonial</a></li></ul>-->
      <!--</li>-->

      <!--<li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_desktop"></i>-->
      <!--    <span>Manage Video</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="add_video.php">Add Video</a></li>-->
      <!--    <li><a href="manage_video.php">Manage Video</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
      

      <!--<li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_desktop"></i>-->
      <!--    <span>Manage Banner</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="add_banner.php">Add Banner</a></li>-->
      <!--    <li><a href="manage_banner.php">Manage Banner</a></li>-->
      <!--  </ul>-->
      <!--   </li>-->

      <!-- <li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_desktop"></i>-->
      <!--    <span>Manage Popup</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="manageaddpopup.php">Manage Popup</a></li>-->
      <!--    <li><a href="addpopup.php">Add Popup</a></li>-->
      <!--    <li><a href="popupdate.php">Manage Popup Status</a></li></ul>-->
      <!--</li>-->

      <!--<li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_desktop"></i>-->
      <!--    <span>Manage ADS</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="add_ads.php">Add ADS</a></li>-->
      <!--    <li><a href="manage_add.php">Manage ADS</a></li>-->
      <!--  </ul>-->
      <!--   </li>-->
         
      <!--    <li class="sub-menu">-->
      <!--  <a href="javascript:;" class="">-->
      <!--    <i class="icon_desktop"></i>-->
      <!--    <span>Manage ARN Number</span>-->
      <!--    <span class="menu-arrow arrow_carrot-right"></span>-->
      <!--  </a>-->
      <!--  <ul class="sub">-->
      <!--    <li><a href="arn_add.php">Add ARN</a></li>-->
      <!--    <li><a href="arn.php">Manage ARN</a></li>-->
      <!--  </ul>-->
      <!--</li>-->

      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_desktop"></i>
          <span>Last Login</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a href="javascript:;">IP Address :<?php echo $ID4['ip']; ?></a></li>
        <li><a href="javascript:;"> Date:       <?php echo $ID4['date']; ?></a></li></ul>
      </li>


      
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>