<?php include "config.php";

$MaxID1 = mysqli_query($con, "SELECT max( id )FROM `ip address`");
$MaxID2 = mysqli_fetch_array($MaxID1);
$MaxID3 = $MaxID2[0];
$ID1 = (($MaxID3) - (1));
$ID2 =   $ID1;
$ID3 = mysqli_query($con, "SELECT `ip`,`date` FROM `ip address` WHERE id = '" . $ID2 . "'");
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
        <a href="javascript:;" class="">
          <i class="icon_document_alt"></i>
          <span>Manage Blog Post</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a href="add_post.php">Add Post</a></li>
          <li><a href="manage_post.php">Manage Post</a></li>
          <li><a href="manage_category.php">Manage Category</a></li>
        </ul>
      </li>
      
      <li class="active">
        <a class="" href="add_emailer.php">
          <i class="icon_mail_alt"></i>
          <span>Add Emailer</span>
        </a>
      </li>


      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_desktop"></i>
          <span>Last Login</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a href="javascript:;">IP Address :<?php echo $ID4['ip']; ?></a></li>
          <li><a href="javascript:;"> Date: <?php echo $ID4['date']; ?></a></li>
        </ul>
      </li>



    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>